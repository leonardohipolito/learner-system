<?php namespace Modules\Course\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Course;
use Modules\Course\Repositories\CourseRepository;
use Modules\Course\Repositories\BusinessRepository;
use Modules\Course\Repositories\CategoryRepository;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

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
		$courses = $this->repository->paginate();
		return response()->json($courses);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->repository->create($request->all());
		return response()->json(['success'=>Lang::get('message.success.create')]);
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
		return response()->json($course);
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
		return response()->json(['success'=>Lang::get('message.success.update')]);
	}

	public function delete($id)
	{
		$this->repository->delete($id);
		return response()->json(['success'=>Lang::get('message.success.delete')]);
	}

}