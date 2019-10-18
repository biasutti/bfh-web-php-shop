<?php
require_once "./lib/models/Product.php";

class ProductsGenerator
{
    function __construct()
    {
    }

    public function generate()
    {
        $products = array();
        array_push($products, new Product("1", "Blonde", "5"));
        array_push($products, new Product("2", "Amber", "10"));
        array_push($products, new Product("3", "Dunkel", "5.5"));
        array_push($products, new Product("4", "123Test", "2"));
        array_push($products, new Product("5", "BlaBla", "1"));
        return $products;
    }
}