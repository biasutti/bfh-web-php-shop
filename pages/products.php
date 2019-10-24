<?php
require_once("lib/db-helper.php");
?>
<script src="js/prod.js"></script>
<div class="flex-item-1 side-navigation-background">
    <div class="flex-container-column">
        <div class="flex-item-1">
            <ul class="side-navigation">
                <li class="filterMenu">TypeOf</li>
                <?php
                foreach (getAllTypesOfBeer() as $types) {
                    echo "<li>" . $types->name . "</li>";
                }
                ?>
            </ul>
        </div>
        <div class="flex-item-2">
            <ul class="side-navigation">
                <li class="filterMenu">Brand</li>
                <?php
                foreach (getAllBrands() as $brand) {
                    echo "<li>" . $brand->name. "</li>";
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
            echo '<div class="products" style="order:'.$order.';"><ul class="prodList">'.
            '<li><img class="prodImg" height="140px" src="'.$prod->imgSrc.'" alt="product image"></li>'.
            '<li><b>'.$prod->name.'</b></li>'.
            '<li>'.$prod->price.' CHF</li>'.
            '<li><button type="button" class="buy" name="'.$prod->pid.'">'.t('productBuy').'</button></li>'.
            "</ul></div>";
            $order++;
            //prodDetails div
            //print_r($prod);
            echo '<div class="productDetail flex-size-1" style="order:'.$order.';""><ul class="prodList">'.
            '<img class="closeImg" height="30px" src="./img/ui/close.png" alt="product image">'.
            '<li><img class="prodImg" height="140px" src="'.$prod->imgSrc.'" alt="product image"></li>'.
            '<li><b>'.$prod->name.'</b></li>'.
            '<li>'.$prod->type.'</li>'.
            '<li>'.$prod->brandId.'</li>'.
            '<li>'.$prod->alcPercent.'</li>'.
            '<li>'.$prod->energy.'</li>'.
            '<li>'.$prod->price.' CHF</li>'.
            '<li><button type="button" onclick="">'.t('productBuy').'</button></li>'.
            '</ul></div>';
            $order++;
        }
        ?>
    </div>
</div>
