<nav>
    <ul>
        <li>
            <?php
                if($_ACTIVE_PAGE != Pages::Homepage) {
                    echo "<a href=\"./index.php\">Home</a>";
                } else {
                    echo "Home";
                }
            ?>
        </li>
        <li>
            <?php
            if($_ACTIVE_PAGE != Pages::Products) {
                echo "<a href=\"./products.php\">Produkte</a>";
            } else {
                echo "Products";
            }
            ?>
        </li>
    </ul>
</nav>
