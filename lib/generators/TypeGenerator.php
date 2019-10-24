<?php
require_once "./lib/models/Type.php";

class TypeGenerator
{
    function __construct()
    {
    }

    public $typesOfBeer;

    public function generate()
    {
      $this->typesOfBeer = array();
      array_push($this->typesOfBeer, new Type(1,"Lager"));
      array_push($this->typesOfBeer, new Type(2,"Amber"));
      array_push($this->typesOfBeer, new Type(3,"Dark Lager"));
      array_push($this->typesOfBeer, new Type(4,"Triple Hopped"));
      return $this->typesOfBeer;
    }

    public function getTypeNameById($id){
      foreach ($this->typesOfBeer as $typeBeer) {
        if($typeBeer->tid == $id){
          return $typeBeer->name;
        }
      }
    }



}
