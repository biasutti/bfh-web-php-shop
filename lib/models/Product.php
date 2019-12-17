<?php


class Product {
    public $Id_prod;
    public $name_de;
    public $name_fr;
    public $FK_type_Id;
    public $FK_brand_Id;
    public $price;
    //image source, reference from products folder : ./img/products/
    public $imgSrc;
    public $alcPercent;
    public $energy;


    static public function getAllProducts() {
      $products = array();
      $res = DB::doQuery("SELECT * FROM products");
      if ($res) {
        while ($prod = $res->fetch_object(get_class())) {
          //$prod->imgSrc = "./img/products/".$prod->imgSrc;
          $products[] = $prod;
        }
      }
      return $products;
    }

    static public function getProductById($id){
      $id = (int) $id;
      $res = DB::doQuery("SELECT * FROM products WHERE Id_prod = $id");
      if ($res) {
        if ($prod = $res->fetch_object(get_class())) {
          return $prod;
        }
      }
      return null;
    }

    public function getName() {
        global $language;
        if($language == "fr") return $this->name_fr;
        return $this->name_de;
     }

     static public function insertBeer($name,$nameFR,$typeId,$brandId,$price,$img,$alc,$energy){
       DB::doQuery("INSERT INTO products (name_de, name_fr, FK_type_Id, FK_brand_Id, price, imgSrc, alcPercent, energy)
       VALUES ('$name' , '$nameFR','$typeId','$brandId','$price','$img','$alc','$energy')");
     }

     public static function removeBeer($id){
       DB::doQuery("DELETE FROM products WHERE products.Id_prod = $id ");
     }
}
