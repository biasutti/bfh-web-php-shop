<?php
require_once("autoloader.php");
require_once("./lib/helper.php");

if(!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = new Cart();
}
$cart = $_SESSION['cart'];

// Add item on post
if (isset($_POST['item'])) {
    $item = $_POST['item'];
    $cart->addItem($item['id'], $item['num']);
}

if (isset($_POST['prodId'])) {
    $cart->removeAllItems($_POST['prodId']);
}

?>
    <h3><?php echo t('checkout'); ?></h3>
<?php
// Render cart explicitly to enhence it
if ($cart->isEmpty()) {
    echo "<div class=\"cart empty\">" . t("emptyCart") . "</div>";
} else {
    ?>
    <div class="cart">
        <div class="table-container" role="table">
            <div class="flex-table header" role="rowgroup">
                <div class="flex-row" role="columnheader"><?php echo t("productNumber"); ?></div>
                <div class="flex-row" role="columnheader"><?php echo t("article"); ?></div>
                <div class="flex-row" role="columnheader"><?php echo t("quantity"); ?></div>
                <div class="flex-row" role="columnheader"><?php echo t("price"); ?></div>
                <div class="flex-row" role="columnheader">Total</div>
                <div class="flex-row" role="columnheader"></div>
            </div>
            <?php
            $total = 0;
            foreach ($cart->getItems() as $item => $num) {
                $product = Product::getProductById($item);
                if ($product == null) continue;
                $price = $product->price;
                $total += $price * $num;
                ?>
                <div class="flex-table row" role="rowgroup">
                    <div class="flex-row first" role="cell"><span><?php echo $product->Id_prod; ?></span></div>
                    <div class="flex-row" role="cell"><span><?php echo $product->getName(); ?></span></div>
                    <div class="flex-row" role="cell">
                        <!--<input type="text" value="<?php echo $num; ?>" />--><?php echo $num; ?></div>
                    <div class="flex-row" role="cell"><span><?php echo $price; ?></span></div>
                    <div class="flex-row" role="cell"><span><?php echo sprintf('%0.2f', ($price * $num)); ?></span>
                    </div>
                    <div class="flex-row" role="cell">
                        <button class="cart-remove" name="<?php echo $product->Id_prod; ?>"><?php echo t("remove"); ?></button>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="flex-table row" role="rowgroup">
                <div class="flex-row" role="cell"></div>
                <div class="flex-row" role="cell"></div>
                <div class="flex-row" role="cell"><span class="hidden"><?php echo t('totalpreis'); ?></span></div>
                <div class="flex-row cart-total" role="cell"><?php echo sprintf('%0.2f', $total); ?> CHF</div>
                <div class="flex-row" role="cell">
                    <form method="post" action="index.php?id=complete">
                        <input type="hidden" name="cart" value="true">
                        <button type="submit"><?php echo t("buy"); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}
