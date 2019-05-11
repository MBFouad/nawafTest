<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 5/11/2019
 * Time: 1:36 AM
 */

namespace App\Library\Interfaces;


interface CartItemInterface
{
    //getter product_id
    public function getProductId();

    //setter product_id
    public function setProductId(int $product_id);

    //getter product_name
    public function getProductName();

    //setter product_name
    public function setProductName($product_name);

    //getter product_price
    public function getProductPrice();

    //setter product_name
    public function setProductPrice(float $product_price);

    //getter category_id
    public function getCategoryId();

    //setter category_id
    public function setCategoryId(int $category_id);
}