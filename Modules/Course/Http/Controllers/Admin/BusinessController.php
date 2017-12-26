<?php namespace Modules\Course\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Business;
use Illuminate\Http\Request;
use Lang;
use Modules\Course\Repositories\BusinessRepository;
use Storage;

class BusinessController extends Controller
{

    private $repository;

    public function __construct(BusinessRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $businesses = $this->repository->scopeQuery(function ($q) {
            return $q->orderBy('name', 'asc');
        })->paginate(10000);
        return view('course::admin.businesses.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('course::admin.businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect(route('course.admin.businesses.index'))->with('success', Lang::get('message.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $business = $this->repository->find($id);
        return view('course::admin.businesses.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $business = $this->repository->find($id);

        return view('course::admin.businesses.edit', compact('business'));
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
        $old = $this->repository->find($id);
        $courses=[];
        foreach($old->courses as $course){
            $courses[]=$course->path;
        }
        $this->repository->update($request->all(), $id);
        $novo = $this->repository->find($id);
        foreach ($courses as $key=>$course) {
            // dd($course->path);
            // dd($course.' - '.$novo->courses[$key]->path);
            if($course!=$novo->courses[$key]->path){
                Storage::drive('courses')->move($course, $novo->courses[$key]->path);
            }
        }
        return redirect(route('course.admin.businesses.index'))->with('success', Lang::get('message.success.update'));
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return redirect(route('course.admin.businesses.index'))->with('success', Lang::get('message.success.delete'));

    }

}
