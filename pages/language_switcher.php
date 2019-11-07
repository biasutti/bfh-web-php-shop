<?php
$lang = "de";
if( isset( $_GET["lang"] ) ) {
    $lang = $_GET["lang"];
    setcookie('lang', $lang);
}