<?php
require_once("lib/db-helper.php");

	// Create cart on first request
	if (!isset($_SESSION["cart"])) {
		$_SESSION["cart"] = new Cart();
	}

	// Get cart from session
	$cart = $_SESSION["cart"];

	// Add item on post
	if (isset($_POST["item"])) {
		$item = $_POST["item"];
		$cart->addItem($item["id"], $item["num"]);
	}
?>

<div class="flex-item-1 flex-size-1">
    <h4>Your Shopping Cart:</h4>
    <?php
    // Render cart explicitly to enhence it
    if ($cart->isEmpty()) {
        echo "<div class=\"cart empty\">[Empty Cart]</div>";
    } else {
    ?>
    <div class="cart">
        <table>
            <tr>
                <th>Article</th>
                <th>#</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        <?php
        $total = 0;
        foreach ($cart->getItems() as $item => $num) {
            $product = Product::getProductById($item);
            if ($product == null) continue;
            $price = $product->price;
            $total += $price * $num;
            echo "<tr><td>{$product->getName()}</td><td>$num</td><td>{$price}</td><td>".($price*$num)."</td></tr>";
        }
        echo "<tr><td rowspan=\"3\"></td><td>$total</td></tr>";
        ?>
        </table>
    </div>
        <?php
    }
    ?>
</div>
<div class="flex-item-1 flex-size-1">
    <h4>Add an Item:</h4>
    <form action="<?php get_pagePath('checkout') ?>" method="post">
        <label>Article-Id</label><input name="item[id]"><br>
        <label>Number</label><input name="item[num]" value="1"><br>
        <input type="submit" value="Add">
    </form>
</div>
