<?php

if (!isset($_SESSION['uid'])) {
    echo "<p>" . t('accNeeded') . "</p><p>";
    render_basicLink(new Page("login"));
    echo "</p>";
} else {

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = new Cart();
    }
    $cart = $_SESSION['cart'];

    // Add item on post
    if (isset($_POST['item'])) {
        $item = $_POST['item'];
        $cart->addItem($item['id'], $item['num']);
    }
    ?>

    <div class="content flex-item-1 flex-size-1">
        <h4><?php echo t('checkout'); ?></h4>
        <?php
        // Render cart explicitly to enhence it
        if ($cart->isEmpty()) {
            echo "<div class=\"cart empty\">[Empty Cart]</div>";
        } else {
            ?>
            <div class="cart">
                <div class="table-container" role="table">
                    <div class="flex-table header" role="rowgroup">
                        <div class="flex-row "role="columnheader"><?php echo t("article"); ?></div>
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
                            <div class="flex-row first" role="cell"><span><?php echo $product->getName(); ?></span></div>
                            <div class="flex-row" role="cell"><!--<input type="text" value="<?php echo $num; ?>" />--><?php echo $num; ?></div>
                            <div class="flex-row" role="cell"><span><?php echo $price; ?></span></div>
                            <div class="flex-row" role="cell"><span><?php echo sprintf('%0.2f',($price * $num)); ?></span></div>
                            <div class="flex-row" role="cell"><button><?php echo t("remove"); ?></button></div>
                        </div>
                    <?php
                }
                ?>
                    <div class="flex-table row" role="rowgroup">
                        <div class="flex-row" role="cell"></div>
                        <div class="flex-row" role="cell"></div>
                        <div class="flex-row" role="cell"><span class="hidden"><?php echo t('totalpreis'); ?></span></div>
                        <div class="flex-row cart-total" role="cell"><?php echo sprintf('%0.2f',$total); ?> CHF</div>
                        <div class="flex-row" role="cell">
                            <form method="post" action="index.php?id=complete">
                                <input type="hidden" name="cart" value="true">
                                <button type="submit"><button><?php echo t("buy"); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}