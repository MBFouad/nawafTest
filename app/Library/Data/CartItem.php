<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 5/11/2019
 * Time: 1:35 AM
 */

namespace App\Library\Data;


use App\Library\Interfaces\CartItemInterface;

class CartItem implements CartItemInterface
{
    private $product_id;
    private $product_name;
    private $product_price;
    private $category_id;

    //getter product_id
    public function getProductId()
    {
        return $this->product_id;
    }

    //setter product_id
    public function setProductId(int $product_id)
    {
        return $this->product_id = $product_id;
    }

    //getter product_name
    public function getProductName()
    {
        return $this->product_name;
    }

    //setter product_name
    public function setProductName($product_name)
    {
        return $this->product_name = $product_name;
    }

    //getter product_price
    public function getProductPrice()
    {
        return $this->product_price;
    }

    //setter product_name
    public function setProductPrice(float $product_price)
    {
        return $this->product_price = $product_price;
    }

    //getter category_id
    public function getCategoryId()
    {
        return $this->category_id;
    }

    //setter category_id
    public function setCategoryId(int $category_id)
    {
        return $this->category_id = $category_id;
    }

    //init cart item for testing
    public  function book()
    {
        $this->setProductId(1);
        $this->setProductName('Book');
        $this->setProductPrice(5);
        $this->setCategoryId(10);

        return $this;

    }

    public  function pen()
    {
        $this->setProductId(2);
        $this->setProductName('Pen');
        $this->setProductPrice(1);
        $this->setCategoryId(20);

        return $this;

    }

    public  function bag()
    {
        $this->setProductId(3);
        $this->setProductName('Bag');
        $this->setProductPrice(120);
        $this->setCategoryId(30);

        return $this;

    }

    public  function notebook()
    {
        $this->setProductId(4);
        $this->setProductName('Notebook');
        $this->setProductPrice(35);
        $this->setCategoryId(40);

        return $this;

    }

    public  function pencilCase()
    {
        $this->setProductId(5);
        $this->setProductName('Pencil Case');
        $this->setProductPrice(14);
        $this->setCategoryId(50);

        return $this;

    }
}