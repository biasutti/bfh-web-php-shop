<div class="flex-item-1 side-navigation-background">
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
                    foreach (Type::getAllTypes() as $types) {
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
                    foreach (Brand::renderBrands() as $brand) {
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
<?php
//echo "<pre>";
//echo ProductTest::getProductById(56)->name_de;
//print_r(ProductTest::getProductsTest());
//echo Brand::getBrandById(1)->name;
//print_r(BrandDB::renderBrands());
//echo TypeDB::getTypeById(2)->name;
//echo "</pre>";
?>
<div class="flex-item-2 flex-size-5">
    <div class="flex-container flex-wrap" id="productContainer">
        <?php
        $order = 1;
        foreach (Product::getAllProducts() as $prod) {
            //check filter with the dbhelper.php filterbeer() function.
            if (filterBeers(Type::getTypeById($prod->FK_type_Id)->name, Brand::getBrandById($prod->FK_brand_Id)->name)) {
                echo '<div class="products" style="order:' . $order . ';"><ul class="prodList">' .
                    '<li><img class="prodImg" height="140px" src="./img/products/' . $prod->imgSrc . '" alt="product image"></li>' .
                    '<li><b>' . $prod->getName() . '</b></li>' .
                    '<li>' . $prod->price . ' CHF</li>' .
                    '<li><button type="button" class="buy" name="' . $prod->Id_prod . '">' . t('productBuy') . '</button></li>' .
                    "</ul></div>";
                $order++;
                echo '<div class="productDetail flex-size-1" style="order:' . $order . ';""><ul class="prodList">' .
                    '<img class="closeImg" height="30px" src="./img/ui/close.png" alt="product image">' .
                    '<li><img class="prodImg" height="140px" src="./img/products/' . $prod->imgSrc . '" alt="product image"></li>' .
                    '<li><b>' . $prod->getName() . '</b></li>' .
                    '<li>' . Type::getTypeById($prod->FK_type_Id)->name . '</li>' .
                    '<li>' . Brand::getBrandById($prod->FK_brand_Id)->name . '</li>' .
                    '<li>' . $prod->alcPercent . '%</li>' .
                    '<li>' . $prod->energy . ' kcal</li>' .
                    '<li>' . $prod->price . ' CHF</li>' .
                    '<li><button type="button" class="buy" name="' . $prod->Id_prod . '">' . t('productBuy') . '</button></li>' .
                    '</ul></div>';
                $order++;
            }
        }
        ?>
    </div>
</div>
<div class="flex-item-3 side-navigation-background <?php echo isset($_SESSION["cart"]) ? "" : "displNone"; ?>">
    <div class="flex-container-column">
        <div class="flex-item-1">
            <div class="cartPreview">
              <?php if(isset($_SESSION["cart"])){
                // Get cart from session
                $cart = $_SESSION["cart"];

                echo "<table><tr><th>".t('articleName')."</th><th>".t('articleNum')."</th></tr>";
                //echo $cart->renderPreview();
                $total = 0;
                foreach ($cart->getItems() as $item => $num) {
                    $product = Product::getProductById($item);
                    if ($product == null) continue;
                    $price = $product->price;
                    $total += $price * $num;
                    echo "<tr><td>{$product->getName()}</td><td>$num</td></tr>";
                }
                echo "<tr><th>Total</th><th>".sprintf('%0.2f',$total)." CHF</th></tr>";
                echo "</table>";
                echo '<a href="./?id=checkout"><button name="tmp">'.t('gotoCheckout').'</button></a>';
              } ?>
            </div>
        </div>
    </div>
</div>
