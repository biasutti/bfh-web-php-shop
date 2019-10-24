<?php
require_once "./lib/models/Product.php";
require_once "./lib/generators/BrandGenerator.php";
require_once "./lib/generators/TypeGenerator.php";

class ProductsGenerator
{
    function __construct()
    {
    }

    public function generate()
    {
        //create two generator objects
        $brands = new BrandGenerator();
        $brands->generate();

        $typesOfBeer = new TypeGenerator();
        $typesOfBeer->generate();

        $products = array();

        array_push($products, new Product(1, "Original", $typesOfBeer->getTypeNameById(1), $brands->getBrandNameById(2), "1.20","FeldOriginal.png","5%","41 kcal"));
        array_push($products, new Product(2, "Hopfenperle", $typesOfBeer->getTypeNameById(2), $brands->getBrandNameById(1), "2","hofpenperle.png","6%","40 kcal"));
        array_push($products, new Product(3, "Braufrisch", $typesOfBeer->getTypeNameById(1), $brands->getBrandNameById(1), "1.70","braufrisch.png","2%","500 kcal"));
        array_push($products, new Product(4, "Ice", $typesOfBeer->getTypeNameById(1), $brands->getBrandNameById(1), "2.50","ice.png","7%","25 kcal"));
        array_push($products, new Product(5, "Dunkel", $typesOfBeer->getTypeNameById(3), $brands->getBrandNameById(1), "3.50","dunkel.png","4.5%","44 kcal"));
        array_push($products, new Product(6, "Pale Ale", $typesOfBeer->getTypeNameById(4), $brands->getBrandNameById(1), "2.60","paleale.png","5.2%","40 kcal"));
        /*array_push($products, new Product("3", "Dunkel", "5.5"));
        array_push($products, new Product("4", "123Test", "2"));
        array_push($products, new Product("5", "BlaBla", "1"));*/
        return $products;
    }
}
