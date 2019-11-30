<?php

function get_param($name, $default)
{
    if (isset($_GET[$name]))
        return urldecode($_GET[$name]);
    else
        return $default;
}

function get_cookieValue($name, $default)
{
    if (isset($_COOKIE[$name]))
        return $_COOKIE[$name];
    else
        setcookie($name, $default);
        return $default;
}

// Adds a GET parameter to the url. The url is passed by reference.
function add_param(&$url, $name, $value)
{
    $sep = strpos($url, '?') !== false ? '&' : '?';
    $url .= $sep . $name . "=" . urlencode($value);
    return $url;
}

// remove the parameter of the url for product filter
function removeFilterParam($name){
  $url = get_pagePath('products');
  if($name === "TypeOfBeer"){
    if(get_param("Brand","") !== ""){
        add_param($url,"Brand",get_param("Brand",""));
    }
  }else if($name === "Brand"){
    if(get_param("TypeOfBeer","") !== ""){
        add_param($url,"TypeOfBeer",get_param("TypeOfBeer",""));
    }
  }
  return $url;
}

function get_pagePath($name)
{
    $url = "";
    add_param($url, 'id', $name);
    return $url;
}

//renders the link to use for the filter with the brands
function renderProductFilterBrand($value){
    $url = get_pagePath('products');
    add_param($url,"Brand" , $value);
    if(get_param("TypeOfBeer","") !== ""){
        add_param($url,"TypeOfBeer",get_param("TypeOfBeer",""));
    }
    return $url;
}

//renders the link to use for the filter with the type of beers
function renderProductFilterType($value){
    $url = get_pagePath('products');
    if(get_param("Brand","") !== ""){
        add_param($url,"Brand",get_param("Brand",""));
    }
    add_param($url,"TypeOfBeer" , $value);
    return $url;
}

// Renders the page content for a certain page ID.
function render_content($pageId)
{
    echo t('content') . " $pageId";
}

// Renders the navigation for the passed language and page ID.
function render_generic_navigation($pages)
{
    $urlBase = $_SERVER['PHP_SELF'];
    foreach ($pages as $page) {
        $url = $urlBase;
        $url .= get_pagePath($page->getBezeichnung());

        $class = "";
        if ($page->isOnlyMobile()) {
            $class = 'navigation-mobile';
        }

        if($page->isProtected()) {
            if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
                echo "<li class=\"$class\"><a href=\"$url\">" . t($page->getBezeichnung()) . "</a></li>";
            }
        } else {
            echo "<li class=\"$class\"><a href=\"$url\">" . t($page->getBezeichnung()) . "</a></li>";
        }

    }
}

//create a link with a page object
function render_basicLink($page){
  $urlBase = $_SERVER['PHP_SELF'];
    $url = $urlBase;
    $url .= get_pagePath($page->getBezeichnung());

    if($page->isProtected()) {
        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
            echo "<a href=\"$url\">" . t($page->getBezeichnung()) . "</a>";
        }
    } else {
        echo "<a href=\"$url\">" . t($page->getBezeichnung()) . "</a>";
    }
}


// Renders the language navigation.
function render_languages($language, $pageId)
{
    $languages = array('de', 'fr');
    $urlBase = $_SERVER['PHP_SELF'];
    foreach ($languages as $lang) {
        $url = $urlBase;
        add_param($url, 'lang', $lang);
        add_param($url, 'id', $pageId);
        $class = $language == $lang ? 'active' : 'inactive';
        echo "<a class=\"$class\" href=\"" . $url . "\">" . strtoupper($lang) . "</a> ";
    }
}

function loadEnv($customFile = null)
{
    global $_ENV;
    if (is_null($customFile)) {
        $file = file("../.env");
    } else {
        $file = file($customFile);
    }

    foreach ($file as $line) {
        list($key, $val) = explode('=', $line);
        $val = trim(preg_replace('/\s+/', ' ', $val));
        $_ENV[$key] = $val;
    }
}

// The translation function.
function t($key)
{
    global $messages;
    if (isset($messages[$key])) {
        return $messages[$key];
    } else {
        return "[$key]";
    }
}

function loadLang() {
    $language = "de";
    if (isset($_GET["lang"])) {
        $language = $_GET["lang"];
        setcookie('lang', $language);
    }
    else {
        $language = get_cookieValue('lang', 'de');
    }
    return $language;
}

function clear($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
}

function validLenght($value, $lenght = 50) {
    return strlen($value < $lenght);
}

function validDate($value) {
    $form_date = new DateTime($value);
    $current_date = new DateTime();
    return $form_date < $current_date;
}


$_ENV;
loadEnv();
$language = loadLang();
$pageId = get_param('id', 'home');

$messages = array();
$file = file("messages/messages_$language.txt");
foreach ($file as $line) {
    list($key, $val) = explode('=', $line);
    //remove newline which is read in the file
    $val = str_replace("\n", "", $val);
    $messages[$key] = $val;
}
