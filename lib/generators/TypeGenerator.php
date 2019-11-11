<?php
require_once "./lib/models/Type.php";

class TypeGenerator
{
    private $typesArray;
    private $id;
    function __construct()
    {
      $this->typesArray = array();
      $this->generate();
    }


    public function generate()
    {
      array_push($this->typesArray, new Type(1,"Lager"));
      array_push($this->typesArray, new Type(2,"Amber"));
      array_push($this->typesArray, new Type(3,"Dark Lager"));
      array_push($this->typesArray, new Type(4,"Triple Hopped"));
      $this->id = 5;
    }

    public function getTypeNameById($id){
      foreach ($this->typesArray as $typeBeer) {
        if($typeBeer->tid == $id){
          return $typeBeer->name;
        }
      }
    }

    public function addType($name){
      array_push($this->typesArray, new Type($this->id,$name));
      $this->id ++;
    }

    public function getTypeOfBeersArray(){
      return $this->typesArray;
    }



}
