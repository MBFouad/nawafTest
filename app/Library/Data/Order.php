<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 5/10/2019
 * Time: 11:35 PM
 */

namespace App\Library\Data;


use App\Library\Interfaces\OrderInterface;

class Order implements OrderInterface
{
    private $total_cart;
    private $shipping_cost;
    private $customer_id;
    private $cart_content;

    public function __construct()
    {
        $this->total_cart = 175;
        $this->shipping_cost = 50;
        $this->customer_id = 101;

        $book = new CartItem(); // init book product for cart
        $book->book(); // get book
        $pen = new CartItem(); // init pen product for cart
        $pen->pen(); // get pen
        $bag = new CartItem(); // init bag product for cart
        $bag->bag(); // get bag
        $notebook = new CartItem(); // init notebook product for cart
        $notebook->notebook(); // get notebook
        $pencilCase = new CartItem(); // init pencil case product for cart
        $pencilCase->pencilCase(); // get pencil case

        //set cart items
        $this->cart_content = [$book, $pen, $bag, $notebook, $pencilCase];
    }

    //getter total_cart
    public function getTotalCart()
    {
        return $this->total_cart;
    }

    //setter total_cart
    public function setTotalCart(float $total_cart)
    {
        return $this->total_cart = $total_cart;
    }

    //getter shipping_cost
    public function getShippingCost()
    {
        return $this->shipping_cost;
    }

    //setter shipping_cost
    public function setShippingCost(float $shipping_cost)
    {
        return $this->shipping_cost = $shipping_cost;
    }

    //getter customer_id
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    //setter customer_id
    public function setCustomerId(int $customer_id)
    {
        return $this->customer_id = $customer_id;
    }

    //getter cart_content
    public function getCartContent()
    {
        return $this->cart_content;
    }

    //setter cart_content
    public function setCartContent($cart_content)
    {
        if ($cart_content instanceof CartItem) {
            return $this->cart_content = [$cart_content];

        } elseif (is_array($cart_content)) {
            $cart_content = array_filter($cart_content, function ($var) {
                return $var instanceof  CartItem;
            });
            return $this->cart_content = $cart_content;

        }
    }


}