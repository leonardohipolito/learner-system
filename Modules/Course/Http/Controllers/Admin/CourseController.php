<?php namespace Modules\Course\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Course;
use Modules\Course\Repositories\CourseRepository;
use Modules\Course\Repositories\BusinessRepository;
use Modules\Course\Repositories\CategoryRepository;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;
use Storage;

class CourseController extends Controller {

	private $repository;
	private $business;
private $category;


	function __construct(CourseRepository $repository, BusinessRepository $business, CategoryRepository $category) {
		$this->repository = $repository;
		$this->business = $business;
$this->category = $category;

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = $this->repository->scopeQuery(function($q){
			return $q->orderBy('id','desc');
		})->paginate(500);
		return view('course::admin.courses.index', compact('courses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$businesses = $this->business->all()->lists('name','id');
$categories = $this->category->all()->lists('name_full','id');

		return view('course::admin.courses.create', compact('businesses', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$course = $this->repository->create($request->all());
		return redirect(route('course.admin.modules.create',['course_id'=>$course->id]))->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course = $this->repository->find($id);
		return view('course::admin.courses.show', compact('course'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = $this->repository->find($id);
		$businesses = $this->business->all()->lists('name','id');
$categories = $this->category->all()->lists('name_full','id');

		return view('course::admin.courses.edit', compact('course', 'businesses', 'categories'));
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
		$old_path = $old->path;
		$this->repository->update($request->all(),$id);
		$new_path = $this->repository->find($id)->path;
		if($old_path!=$new_path){
			@Storage::drive('courses')->move($old_path, $new_path);
		}
		return redirect(route('course.admin.courses.index'))->with('success', Lang::get('message.success.update'));
	}

	public function delete($id){
		$this->repository->delete($id);
		return redirect(route('course.admin.courses.index'))->with('success', Lang::get('message.success.delete'));

	}

}