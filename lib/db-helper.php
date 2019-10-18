<?php
require_once "./lib/generators/ProductsGenerator.php";
require_once "./lib/generators/UserGenerator.php";

$_MOCK_SWITCH = true;

$_PRODUCTS_GENERATOR = new ProductsGenerator();
$_USER_GENERATOR = new UserGenerator();

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
        $products = $_PRODUCTS_GENERATOR->generate();
        return $products;
    } else {
        // TODO: Implement DB getProducts
    }
}
