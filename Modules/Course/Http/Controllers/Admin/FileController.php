<?php namespace Modules\Course\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Lang;
use Modules\Course\Entities\Course;
use Modules\Course\Entities\File;
use Modules\Course\Entities\Module;
use Modules\Course\Repositories\FileRepository;
use Modules\Course\Repositories\ModuleRepository;

class FileController extends Controller
{

    private $repository;
    private $module;

    public function __construct(FileRepository $repository, ModuleRepository $module)
    {
        $this->repository = $repository;
        $this->module     = $module;

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $files = $this->repository->scopeQuery(function ($q) {
            return $q->orderBy('id', 'desc');
        })->all();
        return view('course::admin.files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $modules = $this->module->all()->lists('name', 'id');

        return view('course::admin.files.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $data         = $request->all();
            $file         = $request->file('file');
            $data['name'] = $file->getClientOriginalName();
            $data['ext']  = $file->getClientOriginalExtension();
            $newFile      = $this->repository->create($data);
            $category     = $this->getCatDir($newFile->module->course->category);
            // dd($category);
            $file->move(public_path('courses/' . $category . '/[' . $newFile->module->course->business->name . '] ' . $newFile->module->course->name . '/' . $newFile->module->name), $file->getClientOriginalName());
            return redirect(route('course.admin.modules.show', $data['module_id']))->with('success', Lang::get('message.success.create'));
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $file = $this->repository->find($id);
        return view('course::admin.files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $file    = $this->repository->find($id);
        $modules = $this->module->all()->lists('name', 'id');

        return view('course::admin.files.edit', compact('file', 'modules'));
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
        $file = $this->repository->update($request->all(), $id);
        return redirect(route('course.admin.courses.show', $file->module->course_id))->with('success', Lang::get('message.success.update'));
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return redirect(route('course.admin.files.index'))->with('success', Lang::get('message.success.delete'));

    }
    public function getCatDir($category)
    {
        $cats = [$category->name];
        if ($category->category_id > 0) {
            $cats[] = $this->getCatDir($category->category);
        }
        $cats = array_reverse($cats);
        return implode('/', $cats);
    }
    public function complete($id)
    {
        $file = $this->repository->find($id);
        $file = $this->repository->update(['complete' => !$file->complete], $id);
        return redirect(route('course.admin.files.show', $id))->with('success', Lang::get('message.success.update'));
    }
    public function upload(Request $request, $module_id)
    {
        $data              = $request->all();
        $file              = $request->file('file');
        $data['name']      = $file->getClientOriginalName();
        $data['ext']       = $file->getClientOriginalExtension();
        $data['module_id'] = $module_id;
        $newFile           = $this->repository->create($data);
        $category          = $this->getCatDir($newFile->module->course->category);
        $file->move(public_path('courses/' . $category . '/[' . $newFile->module->course->business->name . '] ' . $newFile->module->course->name . '/' . $newFile->module->name), $file->getClientOriginalName());
    }

    public function module(Request $request, $course_id)
    {
        $files = Input::file('files');
        foreach ($files as $i => $file) {
            if (strlen($file->getClientOriginalName()) > 1) {
                $fullpath = strip_tags($_POST['paths'][$i]);
                $path     = dirname($fullpath);
                $course   = Course::find($course_id);
                $category = $this->getCatDir($course->category);
                $base     = 'courses/' . $category . '/[' . $course->business->name . '] ' . $course->name . '/';
                if (!is_dir(public_path($base . $path))) {
                    mkdir(public_path($base . $path), 0777, true);
                }
                $module = Module::firstOrCreate([
                    'name'=>$path,
                    'course_id'=>$course_id
                ]);
                if ($file->move(public_path($base . $path), $file->getClientOriginalName())) {
                    $data = [];
                    $data['module_id'] = $module->id;
                    $data['name'] = $file->getClientOriginalName();
                    $data['ext']  = $file->getClientOriginalExtension();
                    $newFile      = File::firstOrCreate($data);
                }
            }
        }
        // return $data;
    }
}
