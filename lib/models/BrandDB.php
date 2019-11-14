<?php


class BrandDB {
  public $Id_brand;
  public $name;

  static public function renderBrands() {
    $brands = array();
    $res = DB::doQuery("SELECT * FROM brands");
    if ($res) {
      while ($brand = $res->fetch_object(get_class())) {
        //$prod->imgSrc = "./img/products/".$prod->imgSrc;
        $brands[] = $brand;
      }
    }
    return $brands;
  }

  static public function getBrandById($id){
    $id = (int) $id;
    $res = DB::doQuery("SELECT * FROM brands WHERE Id_brand = $id");
    if ($res) {
      if ($brand = $res->fetch_object(get_class())) {
        return $brand;
      }
    }
    return null;
  }
}
