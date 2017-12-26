<?php namespace Modules\Course\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\File;
use Modules\Course\Repositories\FileRepository;
use Modules\Course\Repositories\ModuleRepository;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class FileController extends Controller {

	private $repository;
	private $module;


	function __construct(FileRepository $repository, ModuleRepository $module) {
		$this->repository = $repository;
		$this->module = $module;

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$files = $this->repository->paginate();
		return response()->json($files);
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
		$file = $this->repository->find($id);
		return response()->json($file);
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