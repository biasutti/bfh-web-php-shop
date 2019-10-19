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
        array_push($products, new Product(1, "Original", "Lager", "Feldschlöschen", "1.20","FeldOriginal.png"));
        array_push($products, new Product(2, "Hopfenperle", "Amber", "Feldschlöschen", "2","hofpenperle.png"));
        array_push($products, new Product(3, "Braufrisch", "Lager", "Feldschlöschen", "1.70","braufrisch.png"));
        array_push($products, new Product(4, "Ice", "Lager", "Feldschlöschen", "2.50","ice.png"));
        array_push($products, new Product(5, "Dunkel", "Dark Lager", "Feldschlöschen", "3.50","dunkel.png"));
        array_push($products, new Product(6, "Pale Ale", "Triple Hopped", "Feldschlöschen", "2.60","paleale.png"));
        /*array_push($products, new Product("3", "Dunkel", "5.5"));
        array_push($products, new Product("4", "123Test", "2"));
        array_push($products, new Product("5", "BlaBla", "1"));*/
        return $products;
    }
}
