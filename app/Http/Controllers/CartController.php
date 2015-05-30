<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    private $cart;

    public function __construct(Cart $cart) {
        $this->cart = $cart;
    }

    public function index() {

        if ( ! Session::has('cart')) {
            Session::set('cart', $this->cart);
        }

        return view('store.cart', ['cart' => Session::get('cart')]);
    }

    public function add(Product $product, $quantity) {
        $cart = $this->getCart();
        $cart->addItem($product, $quantity);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    public function update(Product $product, $quantity, Request $request) {
        if ($request->ajax()) {
            $cart = $this->getCart();
            if ($cart->setQuantity($product, $quantity)) {
                Session::set('cart', $cart);

                return response()->json(array(
                    'success' => true,
                    'price'   => number_format($product->price * $quantity, 2, ',', '.'),
                    'total'   => number_format($cart->getTotal(), 2, ',', '.')
                ));
            }

            return response()->json(array('success' => false));
        }

        return response()->json(array('success' => false));

    }

    public function destroy($id) {
        $cart = $this->getCart();
        $cart->removeItem($id);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    /**
     * @return \CodeCommerce\Cart
     */
    protected function getCart() {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }

        return $cart;
    }

}
