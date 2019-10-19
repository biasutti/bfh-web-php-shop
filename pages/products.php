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
        $order = 1;
        foreach (getAllProducts() as $prod) {
            echo '<div class="products" style="order:'.$order.';\"><ul class="prodList">'.
            '<li><img class="prodImg" height="140px" src="'.$prod->imgSrc.'" alt="product image"></li>'.
            '<li><b>'.$prod->name.'</b></li>'.
            '<li>'.$prod->type.'</li>'.
            '<li>'.$prod->brand.'</li>'.
            '<li>'.$prod->price.' CHF</li>'.
            '<li><button type="button" onclick="">'.t('productBuy').'</button></li>'.
            "</ul></div>";

            $order++;
        }
        ?>
    </div>
</div>
