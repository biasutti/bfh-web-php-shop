<?php
$lang = "de";
if( isset( $_GET["lang"] ) ) {
    $lang = $_GET["lang"];
    $page = $_GET["id"];
    setcookie('lang', $lang, time() + 60 * 60 * 24 * 30, '/');
    header("Location: " . get_localizedPagePath($page));
}