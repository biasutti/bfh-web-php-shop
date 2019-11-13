<?php
/*require_once "./lib/generators/ProductsGenerator.php";
require_once "./lib/generators/UserGenerator.php";
require_once "./lib/generators/BrandGenerator.php";
require_once "./lib/generators/TypeGenerator.php";*/
require_once("autoloader.php");

$_MOCK_SWITCH = true;

$_PRODUCTS_GENERATOR = new ProductsGenerator();
$_USER_GENERATOR = new UserGenerator();
$_BRAND_GENERATOR = new BrandGenerator();
$_TYPE_GENERATOR = new TypeGenerator();

function getUserByEMail($email)
{
    global $_MOCK_SWITCH;
    global $_USER_GENERATOR;
    if ($_MOCK_SWITCH) {
        return $_USER_GENERATOR->generate();
    } else {
        // TODO: Implement DB getUser by EMail and store UID
    }
}

function checkPassword($uid, $password)
{
    global $_MOCK_SWITCH;
    if ($_MOCK_SWITCH) {
        return true;
    } else {
        // TODO: Implement DB checkPassword
    }
}

function getAllProducts()
{
    global $_MOCK_SWITCH;
    global $_PRODUCTS_GENERATOR;

    if ($_MOCK_SWITCH) {
        return $_PRODUCTS_GENERATOR->getProducts()->getAllProducts();
    } else {
        // TODO: Implement DB getProducts
    }
}

function addBeer($name, $type, $brandId, $price, $imgSrc, $alcPercent,$energy){
  global $_MOCK_SWITCH;
  global $_PRODUCTS_GENERATOR;

  if ($_MOCK_SWITCH) {
      return $_PRODUCTS_GENERATOR->addBeer($name, $type, $brandId, $price, $imgSrc, $alcPercent,$energy);
  } else {
      // TODO: Implement DB getProducts
  }
}

function addTypeOfBeers($name){
  global $_MOCK_SWITCH;
  global $_TYPE_GENERATOR;

  if ($_MOCK_SWITCH) {
      return $_TYPE_GENERATOR->addType($name);
  } else {
      // TODO: Implement DB getProducts
  }
}

function getAllBrands()
{
    global $_MOCK_SWITCH;
    global $_BRAND_GENERATOR;

    if ($_MOCK_SWITCH) {
        return $_BRAND_GENERATOR->generate();
    } else {
        // TODO: Implement DB getProducts
    }
}

function getAllTypesOfBeer()
{
    global $_MOCK_SWITCH;
    global $_TYPE_GENERATOR;

    if ($_MOCK_SWITCH) {
        return $_TYPE_GENERATOR->getTypeOfBeersArray();
    } else {
        // TODO: Implement DB getProducts
    }
}

function filterBeers($type, $brand){
  global $_MOCK_SWITCH;
  global $_TYPE_GENERATOR;

  if ($_MOCK_SWITCH) {
    if(get_param("TypeOfBeer","") === "" && get_param("Brand","") === "")
      return true;

    if(get_param("TypeOfBeer","") == $type && get_param("Brand","") == $brand)
        return true;

    if(get_param("TypeOfBeer","") == $type && get_param("Brand","") === "")
      return true;

    if(get_param("TypeOfBeer","") === "" && get_param("Brand","") == $brand)
      return true;
  } else {
      // TODO: Implement DB filter
  }

}
