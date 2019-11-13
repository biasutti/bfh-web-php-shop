<?php
require_once "./lib/models/Product.php";
require_once "./lib/models/Products.php";
require_once "./lib/generators/BrandGenerator.php";
require_once "./lib/generators/TypeGenerator.php";

class ProductsGenerator
{
    private $id;
    private $allProducts;

    function __construct()
    {
      $this->allProducts = new Products();
      $this->generate(); 
    }

    public function generate()
    {
        //create two generator objects
        $brands = new BrandGenerator();
        $brands->generate();

        $typesOfBeer = new TypeGenerator();
        $typesOfBeer->generate();

        $this->allProducts->addProduct(new Product(1, "Original", $typesOfBeer->getTypeNameById(1), $brands->getBrandNameById(1), "1.20","FeldOriginal.png","5%","41"));
        $this->allProducts->addProduct(new Product(2, "Hopfenperle", $typesOfBeer->getTypeNameById(2), $brands->getBrandNameById(1), "2","hofpenperle.png","6%","40"));
        $this->allProducts->addProduct(new Product(3, "Braufrisch", $typesOfBeer->getTypeNameById(1), $brands->getBrandNameById(1), "1.70","braufrisch.png","2%","500"));
        $this->allProducts->addProduct(new Product(4, "Ice", $typesOfBeer->getTypeNameById(1), $brands->getBrandNameById(1), "2.50","ice.png","7%","25"));
        $this->allProducts->addProduct(new Product(5, "Dunkel", $typesOfBeer->getTypeNameById(3), $brands->getBrandNameById(1), "3.50","dunkel.png","4.5%","44"));
        $this->allProducts->addProduct(new Product(6, "Pale Ale", $typesOfBeer->getTypeNameById(4), $brands->getBrandNameById(1), "2.60","paleale.png","5.2%","40"));
        $this->allProducts->addProduct(new Product(7, "Original", $typesOfBeer->getTypeNameById(1), $brands->getBrandNameById(2), "2.60","heinOriginal.png","5.2%","40"));
        /*array_push($products, new Product("3", "Dunkel", "5.5"));
        array_push($products, new Product("4", "123Test", "2"));
        array_push($products, new Product("5", "BlaBla", "1"));*/
        $this->id = 8;
        return $this->allProducts;
    }

    public function addBeer($name, $type, $brandId, $price, $imgSrc, $alcPercent,$energy){
        $brands = new BrandGenerator();
        $brands->generate();

        $typesOfBeer = new TypeGenerator();
        $typesOfBeer->generate();

        $this->allProducts->addProduct(new Product($this->id, $name, $typesOfBeer->getTypeNameById($type), $brands->getBrandNameById($brandId), $price,$imgSrc,$alcPercent,$energy));
        $this->id ++;
    }

    public function getProducts() {
      return $this->allProducts;
    }

}
