<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 5/11/2019
 * Time: 2:12 AM
 */

namespace App\Library\Core;


use App\Library\Data\CartItem;
use App\Library\Data\Coupon;
use App\Library\Data\Order;
use App\Library\Interfaces\OrderInterface;

class Cart
{
    private $order;
    private $coupon;
    private $total = 0;
    private $discount = 0;
    private $shipping = 0;

    public function __construct(Order $order, Coupon $coupon)
    {
        $this->order = $order;
        $this->coupon = $coupon;
        $this->handleCoupon();
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getCoupon()
    {
        return $this->coupon;
    }
    public function getTotal()
    {
        return $this->total;
    }


    public function getDiscount()
    {
        return $this->discount;
    }

    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * get discount by coupon
     *
     **/
    private function handleCoupon()
    {
        // check is coupon end date is valid
        if ($this->checkDate() && $this->checkMinimumAmount()) {

            $discountedProduct = $this->getDiscountProduct(); // get discounted product throw coupon

            if (count($discountedProduct)) { // check count of discount product
                $this->discount = $this->getDiscountAmount($discountedProduct);
            }

            // get shipping price for order
            $this->shipping = $this->getShippingAmount();
        }
        // get total price for order
        $this->total = $this->getProductsPrice();
    }

    /**
     * check end date of coupon
     * return bool
     **/
    private function checkDate()
    {
        return (strtotime('now') <= $this->coupon->getEndDate());

    }

    /**
     * check coupon minimum amount is valid
     * return bool
     **/
    private function checkMinimumAmount()
    {
        return ($this->order->getTotalCart() >= $this->coupon->getMinimumAmount());

    }

    /**
     * get product which include discount in order
     * return [] of CartItem $discountedProduct
     **/
    private function getDiscountProduct()
    {
        $discountedProduct = [];
        foreach ($this->order->getCartContent() as $cartItem) {
            //$cartItem is  instanceof CartItem

            /**
             * check if product category in include categories throw coupon
             * or  product id in include products throw coupon
             * and product id not in exclude products throw coupon
             **/
            if (
                (in_array($cartItem->getCategoryId(), $this->coupon->getIncludedCategories())
                    || in_array($cartItem->getProductId(), $this->coupon->getIncludedProducts()))
                && !in_array($cartItem->getProductId(), $this->coupon->getExcludedProducts())
            ) {
                $discountedProduct[] = $cartItem;
            }
        }
        return $discountedProduct;

    }

    /**
     * get discount amount
     * return float $discount
     **/
    private function getDiscountAmount($discountedProduct)
    {
        $discount = 0;
        // summation price of discounted products
        $totalProductsAmount = $this->getProductsPrice($discountedProduct);

        //process discount
        if ($this->coupon->getType() == 'percentage') {
            $discount = $totalProductsAmount * $this->coupon->getAmount() / 100;
        } elseif ($this->coupon->getType() == 'static') {
            $discount = $this->coupon->getAmount();
        }
        return $discount;
    }

    /**
     * get summation price of  products
     * return float $totalProductsAmount
     **/
    private function getProductsPrice($products = null)
    {
        $totalProductsAmount = 0;
        if (!$products) {
            $products = $this->order->getCartContent();
        }
        // summation price of discounted products
        foreach ($products as $cartItem) {
            $totalProductsAmount += $cartItem->getProductPrice();
        }
        return $totalProductsAmount;
    }

    /**
     * get shipping price of  products
     * return float $shipping
     **/
    private function getShippingAmount()
    {
        $shipping = 0;
        if (!$this->coupon->getFreeShipping()) {
            $shipping = $this->order->getShippingCost();
        }
        return $shipping;

    }
}