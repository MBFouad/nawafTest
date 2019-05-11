<?php

namespace App\Http\Controllers;

use App\Library\Core\Cart;
use App\Library\Data\CartItem;
use App\Library\Data\Coupon;
use App\Library\Data\Order;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    /**
     * Home Page Route
     * @param Request $request
     */
    public function index(Request $request)
    {
        $coupon = new Coupon();
        /**
         * example to change in coupon
         * $coupon->setAmount(55);
         * $coupon->setIncludedCategories(4);
         **/
        $order = new Order();

        /**
         * example to change in order
         * $pencilCase = new CartItem(); // init pencil case product for cart
         * $pencilCase->pencilCase();
         *  $order->setCartContent($pencilCase);
         **/
        $cart = new Cart($order, $coupon);
        return view('welcome', compact('cart'));
    }
}
