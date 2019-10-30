<?php
// Returns a certain GET parameter or $default if the parameter
// does not exist.

function get_param($name, $default)
{
    if (isset($_GET[$name]))
        return urldecode($_GET[$name]);
    else
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
  $url = get_localizedPagePath('products');
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

function get_localizedPagePath($name)
{
    global $language;
    $url = "";
    add_param($url, 'lang', $language);
    add_param($url, 'id', $name);
    return $url;
}

//renders the link to use for the filter with the brands
function renderProductFilterBrand($value){
    $url = get_localizedPagePath('products');
    add_param($url,"Brand" , $value);
    if(get_param("TypeOfBeer","") !== ""){
        add_param($url,"TypeOfBeer",get_param("TypeOfBeer",""));
    }
    return $url;
}

//renders the link to use for the filter with the type of beers
function renderProductFilterType($value){
    $url = get_localizedPagePath('products');
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
function render_generic_navigation($navs)
{
    $urlBase = $_SERVER['PHP_SELF'];
    foreach ($navs as $nav) {
        $url = $urlBase;
        $url .= get_localizedPagePath($nav);
        $class = "";
        if ($nav == 'login') {
            $class = 'navigation-mobile';
        }
        echo "<li class=\"$class\"><a href=\"$url\">" . t($nav) . "</a></li>";
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
        $val = str_replace("\n", "", $val);
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

$_ENV;
loadEnv();

// Set langauage and page ID as global variables.
$language = get_param('lang', 'de');
$pageId = get_param('id', 'home');

$messages = array();
$file = file("messages/messages_$language.txt");
foreach ($file as $line) {
    list($key, $val) = explode('=', $line);
    //remove newline which is read in the file
    $val = str_replace("\n", "", $val);
    $messages[$key] = $val;
}
