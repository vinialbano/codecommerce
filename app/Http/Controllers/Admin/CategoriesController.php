<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\CategoryRequest;
use CodeCommerce\Http\Controllers\Controller;

class CategoriesController extends Controller {

    private $categoryModel;

	public function __construct(Category $categories){
        $this->categoryModel = $categories;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = $this->categoryModel->all();
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
     * @param CategoryRequest $request
	 * @return Response
	 */
	public function store(CategoryRequest $request)
	{
		$input = $request->all();
        $this->categoryModel->fill($input)->save();
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
        return view('categories.edit', compact('category'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param  Category $category
     *
     * @return Response
     */
	public function update(CategoryRequest $request, Category $category)
	{
		$this->categoryModel->find($category->id)->update($request->all());
        return redirect()->route('categories.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Category  $category
	 * @return Response
	 */
	public function destroy(Category $category)
	{
        $this->categoryModel->find($category->id)->delete();
        return redirect()->route('categories.index');
	}

}
