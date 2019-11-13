<?php
require_once("lib/db-helper.php");
?>
<!--<div class="flex-item flex-size-1 flex-container">-->
    <div class="flex-item-1 flex-size-1 side-navigation-background">
        <div class="flex-container-column">
            <div class="flex-item-1">
                <a href="#" id="dropDownArrow"><img alt="drop down arrow button" src="./img/ui/arrow-left.png"/></a>
            </div>
            <div class="flex-item-2">
                <ul class="side-navigation">
                    <li class="filterMenu">TypeOf</li>
                    <?php
                    //filter settings type of beers
                    if (get_param("TypeOfBeer", "") === "") {
                        foreach (getAllTypesOfBeer() as $types) {
                            echo '<a href="' . renderProductFilterType($types->name) . '" class="typeFilter" value="' . $types->name . '"><li>' . $types->name . "</li></a>";
                        }
                    } else {
                        echo '<a href="' . removeFilterParam("TypeOfBeer") . '" class="typeFilter" ><li>' . get_param("TypeOfBeer", "") . "</li></a>";
                    }
                    ?>
                </ul>
            </div>
            <div class="flex-item-3">
                <ul class="side-navigation">
                    <li class="filterMenu">Brand</li>
                    <?php
                    //filter settings brand
                    if (get_param("Brand", "") === "") {
                        foreach (getAllBrands() as $brand) {
                            echo '<a href="' . renderProductFilterBrand($brand->name) . '" class="brandFilter"><li>' . $brand->name . "</li></a>";
                        }
                    } else {
                        echo '<a href="' . removeFilterParam("Brand") . '" class="brandFilter"><li>' . get_param("Brand", "") . "</li></a>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="flex-item-2 flex-size-5">
        <div class="flex-container flex-wrap" id="productContainer">
            <?php
            $order = 1;
            foreach (getAllProducts() as $prod) {
                //check filter with the dbhelper.php filterbeer() function.
                if (filterBeers($prod->type, $prod->brandId)) {
                    echo '<div class="products" style="order:' . $order . ';"><ul class="prodList">' .
                        '<li><img class="prodImg" height="140px" src="' . $prod->imgSrc . '" alt="product image"></li>' .
                        '<li><b>' . $prod->name . '</b></li>' .
                        '<li>' . $prod->price . ' CHF</li>' .
                        '<li><button type="button" class="buy" name="' . $prod->pid . '">' . t('productBuy') . '</button></li>' .
                        "</ul></div>";
                    $order++;

                    echo '<div class="productDetail flex-size-1" style="order:' . $order . ';""><ul class="prodList">' .
                        '<img class="closeImg" height="30px" src="./img/ui/close.png" alt="product image">' .
                        '<li><img class="prodImg" height="140px" src="' . $prod->imgSrc . '" alt="product image"></li>' .
                        '<li><b>' . $prod->name . '</b></li>' .
                        '<li>' . $prod->type . '</li>' .
                        '<li>' . $prod->brandId . '</li>' .
                        '<li>' . $prod->alcPercent . '</li>' .
                        '<li>' . $prod->energy . '</li>' .
                        '<li>' . $prod->price . ' CHF</li>' .
                        '<li><button type="button" onclick="">' . t('productBuy') . '</button></li>' .
                        '</ul></div>';
                    $order++;
                }
            }
            ?>
        </div>
    </div>
<!--</div>-->