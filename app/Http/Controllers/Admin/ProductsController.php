<?php namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Category;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    private $productModel;
    private $tagModel;

    public function __construct(Product $products, Tag $tags) {
        $this->productModel = $products;
        $this->tagModel = $tags;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
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
    public function create(Category $category) {
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
    public function store(ProductRequest $request) {
        $tagIds = $this->getTagIds($request);
        $input = $request->except('tags');
        $product = $this->productModel->create($input);
        $product->tags()->sync($tagIds);

        return redirect()->route('products.index');

    }

    /**
     * @param \CodeCommerce\Http\Requests\ProductRequest $request
     *
     * @return array
     */
    protected function getTagIds(ProductRequest $request) {
        $tags = array_unique(array_map(function ($str) {
            //For every tag in the array
            //Remove white spaces and set to lowercase with first char upper
            return ucwords(strtolower(preg_replace('/\s+/', ' ', trim($str))));
        },
            explode(',', $request->input('tags'))));

        $tagIds = [];
        foreach ($tags as $tag) {
            //Retrieves the existing Tag with the current name or creates a new one
            array_push($tagIds, $this->tagModel->firstOrCreate(['name' => $tag])->id);
        }

        return $tagIds;
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     *
     * @return Response
     */
    public function show(Product $product) {
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
    public function edit(Category $category, Product $product) {
        $categories = $category->lists('name', 'id');

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest $request
     * @param  Product        $product
     *
     * @return Response
     */
    public function update(ProductRequest $request, Product $product) {
        $tagIds = $this->getTagIds($request);

        $product->update($request->except('tags'));
        $product->tags()->sync($tagIds);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     *
     * @return Response
     */
    public function destroy(Product $product) {
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
    public function showImages(Product $product) {
        return view('products.images', compact('product'));
    }

    public function createImage(Product $product) {
        return view('products.createImage', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, Product $product) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $product->images()->create(['product_id' => $product->id, 'extension' => $extension]);

        Storage::disk('s3')->put('image' . $image->id . '.' . $extension, File::get($file));

        return redirect()->route('products.images', compact('product'));
    }

    public function destroyImage(Product $product, ProductImage $image) {
        if (Storage::disk('s3')->exists('image' . $image->id . '.' . $image->extension)) {
            Storage::disk('s3')->delete('image' . $image->id . '.' . $image->extension);
        }
        $image->delete();

        return redirect()->route('products.images', compact('product'));

    }
}
