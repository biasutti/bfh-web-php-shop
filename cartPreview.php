<?php
require_once("autoloader.php");
require_once("./lib/helper.php");

session_start();

if (!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = new Cart();
}

// Get cart from session
$cart = $_SESSION["cart"];

// Add item on post
if (isset($_POST["prodId"])) {
  $cart->addItem($_POST["prodId"], 1);
  //echo "<tr><td>".$_POST["prodId"]."</td><td>tada</td></tr>";
}

echo "<table><tr><th>".t('articleName')."</th><th>".t('articleNum')."</th></tr>";
//echo $cart->renderPreview();
$total = 0;
foreach ($cart->getItems() as $item => $num) {
    $product = Product::getProductById($item);
    if ($product == null) continue;
    $price = $product->price;
    $total += $price * $num;
    echo "<tr><td>{$product->getName()}</td><td>$num</td></tr>";
}
echo "<tr><th>Total</th><th>".sprintf('%0.2f',$total)." CHF</th></tr>";
echo "<table>";
echo '<a href="./?id=checkout"><button name="tmp">'.t('gotoCheckout').'</button></a>';
