<?php


class Brand {
  public $Id_brand;
  public $name;

  static public function renderBrands() {
    $brands = array();
    $res = DB::doQuery("SELECT * FROM brands");
    if ($res) {
      while ($brand = $res->fetch_object(get_class())) {
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

  static public function insertBrand($name){
    DB::doQuery("INSERT INTO brands (name) VALUES ('$name') ");
  }

  static public function removeBrandById($id){
    DB::doQuery("DELETE FROM brands WHERE brands.Id_brand = $id ");
  }

  static public function isBrandLinked($id){
    $res = DB::doQuery("SELECT * FROM brands RIGHT JOIN products ON brands.Id_brand = products.FK_brand_Id WHERE brands.Id_brand = $id ");
    //return false if no rows affected on the selcet
    return $res->num_rows != 0;
  }

}
