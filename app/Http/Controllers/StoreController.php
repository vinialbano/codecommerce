<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    private $categoryModel;
    private $productModel;
    private $tagModel;

    public function __construct(Category $category, Product $product, Tag $tag) {
        $this->categoryModel = $category;
        $this->productModel  = $product;
        $this->tagModel      = $tag;
    }

    public function index() {

        $featuredProducts    = $this->productModel->featured()->get();
        $recommendedProducts = $this->productModel->recommended()->get();
        $categories          = $this->categoryModel->all();
        $tags                = $this->tagModel->all();

        return view('store.index', compact('categories', 'tags', 'featuredProducts', 'recommendedProducts'));
    }

    public function category(Category $category) {

        $categories = $this->categoryModel->all();
        $products   = $this->productModel->ofCategory($category->id)->get();
        $tags       = $this->tagModel->ofCategory($category->id)->get();

        return view('store.category', compact('categories', 'category', 'products', 'tags'));
    }

    public function product(Product $product) {

        $categories = $this->categoryModel->all();
        $tags       = $product->tags()->get();

        return view('store.product', compact('categories', 'product', 'tags'));
    }

    public function tag(Tag $tag) {

        $categories = $this->categoryModel->all();
        $products   = $this->productModel->ofTag($tag->id)->get();

        return view('store.tag', compact('categories', 'products', 'tag'));
    }

}
