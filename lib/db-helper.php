<?php

require_once("autoloader.php");

$_MOCK_SWITCH = true;

function filterBeers($type, $brand)
{
    global $_MOCK_SWITCH;
    global $_TYPE_GENERATOR;

    if ($_MOCK_SWITCH) {
        if (get_param("TypeOfBeer", "") === "" && get_param("Brand", "") === "")
            return true;

        if (get_param("TypeOfBeer", "") == $type && get_param("Brand", "") == $brand)
            return true;

        if (get_param("TypeOfBeer", "") == $type && get_param("Brand", "") === "")
            return true;

        if (get_param("TypeOfBeer", "") === "" && get_param("Brand", "") == $brand)
            return true;
    } else {
        // TODO: Implement DB filter
    }

}
