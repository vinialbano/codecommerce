<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    private $categoryModel;
    private $productModel;

    public function __construct(Category $category, Product $product) {
        $this->categoryModel = $category;
        $this->productModel  = $product;
    }

    public function index() {

        $featuredProducts = $this->productModel->featured()->get();
        $recommendedProducts = $this->productModel->recommended()->get();
        $categories = $this->categoryModel->all();

        return view('store.index', compact('categories', 'featuredProducts', 'recommendedProducts'));
    }

}
