<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 5/10/2019
 * Time: 11:35 PM
 */

namespace App\Library\Data;


use App\Library\Interfaces\CouponInterface;

class Coupon implements CouponInterface
{

    private $type;
    private $amount;
    private $end_date;
    private $minimum_amount;
    private $free_shipping;
    private $included_categories;
    private $excluded_categories;
    private $included_products;
    private $excluded_products;

    public function __construct()
    {
        //set default values for coupon
        $this->type = 'percentage';
        $this->amount = 20;
        $this->end_date = strtotime("+1 day");
        $this->minimum_amount = 100;
        $this->free_shipping = false;
        $this->included_categories = [10, 20];
        $this->excluded_categories = [50];
        $this->included_products = [3];
        $this->excluded_products = [4, 1];
    }

    // getter type
    public function getType()
    {
        return $this->type;
    }

    // setter type
    public function setType($type)
    {
        if (in_array($type, ['percentage', 'static'])) {
            $this->type = $type;
        }
    }

    // getter amount
    public function getAmount()
    {
        return $this->amount;
    }

    // setter amount
    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    // getter end_date
    public function getEndDate()
    {
        return $this->end_date;
    }

    // setter end_date
    public function setEndDate($end_date)
    {
        if ($end_date)
            $this->end_date = $end_date;
    }

    // getter minimum_amount
    public function getMinimumAmount()
    {
        return $this->minimum_amount;
    }

    // setter minimum_amount
    public function setMinimumAmount(int $minimum_amount)
    {
        $this->minimum_amount = $minimum_amount;
    }

    // getter free_shipping
    public function getFreeShipping()
    {
        return $this->free_shipping;
    }

    // setter free_shipping
    public function setFreeShipping(bool $free_shipping)
    {
        $this->free_shipping = $free_shipping;
    }

    // getter included_categories
    public function getIncludedCategories()
    {
        return $this->included_categories;
    }

    // setter included_categories
    public function setIncludedCategories($included_categories)
    {
        if (is_numeric($included_categories)) {
            $this->included_categories = [$included_categories];
        } elseif (is_array($included_categories)) {
            $included_categories = array_filter($included_categories, 'is_numeric');
            $this->included_categories = $included_categories;
        }

    }

    // getter excluded_categories
    public function getExcludedCategories()
    {
        return $this->excluded_categories;
    }

    // setter included_categories
    public function setExcludedCategories($excluded_categories)
    {
        if (is_numeric($excluded_categories)) {
            $this->excluded_categories = [$excluded_categories];
        } elseif (is_array($excluded_categories)) {
            $excluded_categories = array_filter($excluded_categories, 'is_numeric');
            $this->excluded_categories = $excluded_categories;
        }

    }

    // getter included_products
    public function getIncludedProducts()
    {
        return $this->included_products;
    }

    // setter included_products
    public function setIncludedProducts($included_products)
    {
        if (is_numeric($included_products)) {
            $this->included_products = [$included_products];
        } elseif (is_array($included_products)) {
            $included_products = array_filter($included_products, 'is_numeric');
            $this->included_products = $included_products;
        }

    }

    // getter excluded_products
    public function getExcludedProducts()
    {
        return $this->excluded_products;
    }

    // setter excluded_products
    public function setExcludedProducts($excluded_products)
    {
        if (is_numeric($excluded_products)) {
            $this->excluded_products = [$excluded_products];
        } elseif (is_array($excluded_products)) {
            $excluded_products = array_filter($excluded_products, 'is_numeric');
            $this->excluded_products = $excluded_products;
        }

    }


}