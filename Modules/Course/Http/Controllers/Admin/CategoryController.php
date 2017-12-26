<?php namespace Modules\Course\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Category;
use Illuminate\Http\Request;
use Lang;
use Modules\Course\Repositories\CategoryRepository;
use Storage;
class CategoryController extends Controller
{

    private $repository;
    private $category;

    public function __construct(CategoryRepository $repository, CategoryRepository $category)
    {
        $this->repository = $repository;
        $this->category   = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->repository->all();
        return view('course::admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->all()->lists('name_full', 'id');

        return view('course::admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect(route('course.admin.categories.index'))->with('success', Lang::get('message.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = $this->repository->find($id);
        return view('course::admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category   = $this->repository->find($id);
        $categories = $this->category->all()->lists('name_full', 'id');

        return view('course::admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        //$this->validate($request, ['name' => 'required']); // Uncomment and modify if needed.
        $cat = $this->repository->find($id);
        $old_path = $cat->path;

        $this->repository->update($request->all(), $id);

        $cat = $this->repository->find($id);
        $new_path = $cat->path;
        if($old_path!=$new_path){
            @Storage::disk('courses')->move($old_path, $new_path);
        }
        return redirect(route('course.admin.categories.index'))->with('success', Lang::get('message.success.update'));
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return redirect(route('course.admin.categories.index'))->with('success', Lang::get('message.success.delete'));

    }

}
