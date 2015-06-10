<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Http\Requests;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function place(Order $orderModel) {

        if ( !Session::has('cart')) {
            return false;
        }
        $cart = Session::get('cart');

        if ($cart->getTotal() > 0) {
            $order = $orderModel->create(['user_id' => Auth::user()->id, 'total' => $cart->getTotal()]);

            foreach ($cart->getItems() as $k => $item) {
                $order->items()->create([
                    'product_id' => $k,
                    'price'      => $item['product']->price,
                    'quantity'   => $item['quantity']
                ]);
            }

            $cart->clear();
            event(new CheckoutEvent($order));

            return view('store.checkout', compact('order'));
        }

        return view('store.checkout');
    }

}
