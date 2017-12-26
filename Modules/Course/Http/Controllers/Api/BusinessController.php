<?php namespace Modules\Course\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Business;
use Modules\Course\Repositories\BusinessRepository;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class BusinessController extends Controller {

	private $repository;
	

	function __construct(BusinessRepository $repository, ) {
		$this->repository = $repository;
		
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$businesses = $this->repository->paginate();
		return response()->json($businesses);
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
		$business = $this->repository->find($id);
		return response()->json($business);
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