<?php namespace Modules\Course\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Module;
use Modules\Course\Repositories\ModuleRepository;
use Modules\Course\Repositories\CourseRepository;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class ModuleController extends Controller {

	private $repository;
	private $course;


	function __construct(ModuleRepository $repository, CourseRepository $course) {
		$this->repository = $repository;
		$this->course = $course;

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$modules = $this->repository->scopeQuery(function($q){
			return $q->orderBy('course_id','desc');
		})->paginate();
		return view('course::admin.modules.index', compact('modules'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$courses = $this->course->all()->lists('name','id');

		return view('course::admin.modules.create', compact('courses'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$newModule = $this->repository->create($request->all());
		return redirect(route('course.admin.modules.show',$newModule->id))->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$module = $this->repository->find($id);
		return view('course::admin.modules.show', compact('module'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$module = $this->repository->find($id);
		$courses = $this->course->all()->lists('name','id');

		return view('course::admin.modules.edit', compact('module', 'courses'));
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
		$this->repository->update($request->all(),$id);
		return redirect(route('course.admin.modules.index'))->with('success', Lang::get('message.success.update'));
	}

	public function delete($id){
		$this->repository->delete($id);
		return redirect(route('course.admin.modules.index'))->with('success', Lang::get('message.success.delete'));

	}

}