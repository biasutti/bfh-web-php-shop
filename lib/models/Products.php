<?php


class Products
{
    private $products = [];

    function getAllProducts() {
        return $this->products;
    }

    function addProduct($product) {
        $this->products[$product->pid] = $product;
    }

    function getProduct($pid) {
        echo $pid;
    }
}