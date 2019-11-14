<?php

class Products
{
    private $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    function addProduct($product) {
        $this->products[$product->pid] = $product;
    }

    function getProduct($pid) {
        return $this->products[$pid];
    }

}