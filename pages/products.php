<?php
require_once("lib/db-helper.php");
?>
<div class="flex-item-1 side-navigation-background">
    <div class="flex-container-column">
        <div class="flex-item-1">
            <ul class="side-navigation">
                <li>Filter</li>
                <?php
                //sql request to fill array
                $typesOf = array("Blonde", "Amber", "Dunkel");
                foreach ($typesOf as $types) {
                    echo "<li>" . $types . "</li>";
                }
                ?>
            </ul>
        </div>
        <div class="flex-item-2">
            <ul class="side-navigation">
                <li>Brand</li>
                <?php
                //sql request to fill array
                $typesOf = array("Feldschlöschen", "Heineken", "Aare Bier");
                foreach ($typesOf as $types) {
                    echo "<li>" . $types . "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="flex-item-2 flex-size-5">
    <div class="flex-container flex-wrap">
        <?php
        foreach (getAllProducts() as $prod) {
            echo "<div class=\"products\"><p>" . $prod->name . "</p></div>";
        }
        ?>
    </div>
</div>
