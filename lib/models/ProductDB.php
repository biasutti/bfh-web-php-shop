<?php


class ProductDB {
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

    /*public function __construct($Id_prod, $name_de,$name_fr, $FK_type_Id, $FK_brand_Id, $price, $imgSrc, $alcPercent, $energy)
    {
        $this->Id_prod = $Id_prod;
        $this->name_de = $name_de;
        $this->name_fr = $name_fr;
        $this->FK_type_Id = $FK_type_Id;
        $this->FK_brand_Id = $FK_brand_Id;
        $this->price = $price;
        $this->imgSrc = "./img/products/".$imgSrc;
        $this->alcPercent = $alcPercent;
        $this->energy = $energy . " kcal";
    }*/

    static public function getAllProductsRender() {
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

}
