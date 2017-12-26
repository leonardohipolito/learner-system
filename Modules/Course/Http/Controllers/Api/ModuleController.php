<?php namespace Modules\Course\Http\Controllers\Api;

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
		$modules = $this->repository->paginate();
		return response()->json($modules);
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
		$module = $this->repository->find($id);
		return response()->json($module);
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