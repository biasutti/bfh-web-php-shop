<nav class="">
    <ul>
        <li class="w3-col s1 w3-center">
            <?php
                if($_ACTIVE_PAGE != Pages::Homepage) {
                    echo "<a href=\"./index.php\">Home</a>";
                } else {
                    echo "Home";
                }
            ?>
        </li>
        <li class="w3-col s1 w3-center">
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