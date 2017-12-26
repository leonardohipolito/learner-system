<?php namespace Modules\Course\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Tag;
use Modules\Course\Repositories\TagRepository;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class TagController extends Controller {

	private $repository;
	

	function __construct(TagRepository $repository) {
		$this->repository = $repository;
		
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = $this->repository->paginate();
		return view('course::admin.tags.index', compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('course::admin.tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->repository->create($request->all());
		return redirect(route('course.admin.tags.index'))->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tag = $this->repository->find($id);
		return view('course::admin.tags.show', compact('tag'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tag = $this->repository->find($id);
		
		return view('course::admin.tags.edit', compact('tag'));
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
		return redirect(route('course.admin.tags.index'))->with('success', Lang::get('message.success.update'));
	}

	public function delete($id){
		$this->repository->delete($id);
		return redirect(route('course.admin.tags.index'))->with('success', Lang::get('message.success.delete'));

	}

}