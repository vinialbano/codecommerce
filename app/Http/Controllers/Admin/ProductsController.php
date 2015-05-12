<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller {

	private $products;

    public function __construct(Product $products){
        $this->products = $products;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = $this->products->all();
        return view('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('products.create');
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
        $this->products->fill($input)->save();
        return redirect()->route('products.index');

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  Product $product
	 * @return Response
	 */
	public function show(Product $product)
	{
		dd($product);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Product $product
	 * @return Response
	 */
	public function edit(Product $product)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Product $product
	 * @return Response
	 */
	public function update(Product $product)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Product $product
	 * @return Response
	 */
	public function destroy(Product $product)
	{
		//
	}

}
