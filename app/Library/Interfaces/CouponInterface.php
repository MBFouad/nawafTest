<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 5/10/2019
 * Time: 11:39 PM
 */

namespace App\Library\Interfaces;


interface  CouponInterface
{
    // getter type
    public function getType();

    // setter type
    public function setType($type);

    // getter amount
    public function getAmount();

    // setter type
    public function setAmount(int $amount);

    // getter end_date
    public function getEndDate();

    // setter end_date
    public function setEndDate($end_date);

    // getter minimum_amount
    public function getMinimumAmount();

    // setter minimum_amount
    public function setMinimumAmount(int $minimum_amount);

    // getter free_shipping
    public function getFreeShipping();

    // setter free_shipping
    public function setFreeShipping(bool $free_shipping);

    // getter included_categories
    public function getIncludedCategories();

    // setter included_categories
    public function setIncludedCategories($included_categories);

    // getter excluded_categories
    public function getExcludedCategories();

    // setter included_categories
    public function setExcludedCategories($excluded_categories);

    // getter included_products
    public function getIncludedProducts();

    // setter included_products
    public function setIncludedProducts($included_products);

    // getter excluded_products
    public function getExcludedProducts();

    // setter excluded_products
    public function setExcludedProducts($excluded_products);
}