<?php
require_once "./lib/models/Brand.php";

class BrandGenerator
{
    function __construct()
    {
    }

    public $brands;

    public function generate()
    {
      $this->brands = array();
      array_push($this->brands, new Brand(1,"Feldschlöschen"));
      array_push($this->brands, new Brand(2,"Heineken"));
      return $this->brands;
    }

    public function getBrandNameById($id){
      foreach ($this->brands as $brand) {
        if($brand->bid == $id){
          return $brand->name;
        }
      }
    }



}
