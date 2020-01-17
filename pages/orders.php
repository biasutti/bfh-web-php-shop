<?php

if (!isset($_SESSION['uid'])) {
    echo "<p>" . t('accNeeded') . "</p><br><p>";
    render_basicLink(new Page("login"));
    echo "</p>";
} else {
    ?>

    <div class="content flex-container">
        <div class="flex-item-1 flex-size-1">
            <table>
                <tr>
                    <th>Order Id</th>
                    <th>Order date</th>
                    <th>Products ordered</th>
                </tr>
                <?php
                foreach (Order::getAllOrdersByUserId($_SESSION['uid']) as $order) {
                    echo "<tr><td>" . $order['id'] . "</td>" .
                        "<td>" . $order['date'] . "</td>";
                    echo "<td><table><tr><th>Product Name</th><th>Quantity</th></tr>";
                    foreach ($order['Prod'] as $prod) {
                        echo "<tr>" .
                            "<td>" . $prod['prod'] . "</td>" .
                            "<td>" . $prod['quantity'] . "</td>" .
                            "</tr>";
                    }
                    echo "</table></td>";
                }
                ?>
                </tr>
            </table>
        </div>
    </div>

    <?php
}