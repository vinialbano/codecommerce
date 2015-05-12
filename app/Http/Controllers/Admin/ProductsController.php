<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;

class ProductsController extends Controller {

    private $productModel;

    public function __construct(Product $products)
    {
        $this->productModel = $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->productModel->all();

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
     * @param ProductRequest $request
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        //dd($request->all());
        $input = $request->all();
        $this->productModel->fill($input)->save();

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     *
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
     *
     * @return Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest $request
     * @param  Product $product
     *
     * @return Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->productModel->find($product->id)->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     *
     * @return Response
     */
    public function destroy(Product $product)
    {
        $this->productModel->find($product->id)->delete();
        return redirect()->route('products.index');
    }

}
