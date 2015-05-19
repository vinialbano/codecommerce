<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Category;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $products = $this->productModel->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category $category
     *
     * @return Response
     */
    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('products.create', compact('categories'));
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
     * @param Category $category
     * @param  Product $product
     *
     * @return Response
     */
    public function edit(Category $category, Product $product)
    {
        $categories = $category->lists('name', 'id');

        return view('products.edit', compact('product', 'categories'));
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
        $product->update($request->all());

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
        $product->delete();

        return redirect()->route('products.index');
    }

    /**
     * Shows the product's associated images
     *
     * @param Product $product
     *
     * @return \Illuminate\View\View
     */
    public function showImages(Product $product)
    {
        return view('products.images', compact('product'));
    }

    public function createImage(Product $product)
    {
        return view('products.createImage', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, Product $product)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $product->images()->create(['product_id' => $product->id, 'extension' => $extension]);

        Storage::disk('public_local')->put('image' . $image->id . '.' . $extension, File::get($file));

        return redirect()->route('products.images', compact('product'));
    }

    public function destroyImage(Product $product, ProductImage $image)
    {
        if (file_exists(public_path() . '/uploads/' . $image->id . '.' . $image->extension))
        {
            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
        }
        $image->delete();

        return redirect()->route('products.images', compact('product'));

    }
}
