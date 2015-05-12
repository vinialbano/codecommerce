<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoriesController extends Controller {

    private $categories;

	public function __construct(Category $categories){
        $this->categories = $categories;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = $this->categories->all();
        return view('categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
     * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();
        $this->categories->fill($input)->save();
        return redirect()->route('categories.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Category  $category
	 * @return Response
	 */
	public function show(Category $category)
	{
		dd($category);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Category  $category
	 * @return Response
	 */
	public function edit(Category $category)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Category  $category
	 * @return Response
	 */
	public function update(Category $category)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Category  $category
	 * @return Response
	 */
	public function destroy(Category $category)
	{
		//
	}

}
