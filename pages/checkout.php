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
                        <div class="flex-row "role="columnheader">Article</div>
                        <div class="flex-row" role="columnheader">Quantity</div>
                        <div class="flex-row" role="columnheader">Price</div>
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
                            <div class="flex-row" role="cell"><span><?php echo ($price * $num); ?></span></div>
                            <div class="flex-row" role="cell"><button>Remove</button></div>
                        </div>
                    <?php
                }
                ?>
                    <div class="flex-table row" role="rowgroup">
                        <div class="flex-row" role="cell"></div>
                        <div class="flex-row" role="cell"></div>
                        <div class="flex-row" role="cell"></div>
                        <div class="flex-row cart-total" role="cell"><?php echo $total; ?> CHF</div>
                        <div class="flex-row" role="cell"><button>Kaufen</button></div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}