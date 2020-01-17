<div class="content flex-item-1 flex-size-1">
    <?php
    if (!isset($_SESSION['uid'])) {
        echo "<p>" . t('accNeeded') . " ";
        render_basicLink(new Page("login"));
        echo "</p>";
    } else {

        ?>
        <h3><?php echo t('orders'); ?></h3>
        <?php

        $orders = Order::getAllOrdersByUserId($_SESSION['uid']);

        if(sizeof($orders) == 0) {
            echo "<div class='empty'>" . t('noOrders') . "</div>";
        } else {
            ?>

        <div class="orders">
            <div class="table-container" role="table">
                <div class="flex-table header" role="rowgroup">
                    <div class="flex-row "role="columnheader"><?php echo t("orderNumber"); ?></div>
                    <div class="flex-row" role="columnheader"><?php echo t("orderDate"); ?></div>
                    <div class="flex-row" role="columnheader"><?php echo t("products"); ?></div>
                </div>
                <?php

                foreach ($orders as $order) {
                    ?>
                    <div class="flex-table row" role="rowgroup">
                        <div class="flex-row first" role="cell"><span><?php echo $order['id']; ?></span></div>
                        <div class="flex-row" role="cell"><span><?php echo $order['date']; ?></span></div>
                        <div class="flex-row" role="cell">
                            <?php
                            foreach ($order['Prod'] as $prod) {
                                echo "<p>" . $prod['prod'] . ": " . $prod['quantity'] . "</p>";
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
            <?php
        }
    }
    ?>
</div>
<?php
