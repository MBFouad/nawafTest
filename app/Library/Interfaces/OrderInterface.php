<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 5/11/2019
 * Time: 2:06 AM
 */

namespace App\Library\Interfaces;


interface orderInterface
{

    //getter total_cart
    public function getTotalCart();

    //setter total_cart
    public function setTotalCart(float $total_cart);

    //getter shipping_cost
    public function getShippingCost();

    //setter shipping_cost
    public function setShippingCost(float $shipping_cost);

    //getter customer_id
    public function getCustomerId();

    //setter customer_id
    public function setCustomerId(int $customer_id);

    //getter cart_content
    public function getCartContent();
    //setter cart_content
    public function setCartContent($cart_content);
}