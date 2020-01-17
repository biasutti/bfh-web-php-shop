<div class="content flex-container">
<?php
if (!isset($_SESSION['uid'])) {
    echo "<p>" . t('accNeeded') . "</p><p>";
    render_basicLink(new Page("login"));
    echo "</p>";
} else if(!isset($_SESSION['cart'])) {
    echo "<p>" . t('emptyCart') . " ";
    render_basicLink(new Page("products"));
    echo "</p>";
} else {
    $cart = $_SESSION['cart'];
    $order = new Order($_SESSION['uid'], $cart->getItems());
    if($o = $order->insertOrder()) {
        unset($_SESSION['cart']);
        ?>
        <p><?php echo t('checkoutMessage') . t('orderNumber') . ": " . $o->getOrderNumber(); ?> </p>
        <?php
    };
}
?>
</div>
<?php
