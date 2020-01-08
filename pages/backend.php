<?php
if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) {
    ?>
    <div class="flex-container-column">
        <div class="content flex-item-1 flex-size-1">
            <a href="#" class="onClickBackend"><h2><?php echo t("addTypeOfBeer") ?></h2></a>
            <?php
            include("./pages/backendPages/backend-addType.php");
            ?>
        </div>
        <div class="content flex-item-2 flex-size-1">
            <a href="#" class="onClickBackend"><h2><?php echo t("removeType") ?></h2></a>
            <?php
            include("./pages/backendPages/backend-rmType.php");
            ?>
        </div>
        <div class="content flex-item-3 flex-size-1">
            <a href="#" class="onClickBackend"><h2><?php echo t("addBrand") ?></h2></a>
            <?php
            include("./pages/backendPages/backend-addBrand.php");
            ?>
        </div>
        <div class="content flex-item-4 flex-size-1">
            <a href="#" class="onClickBackend"><h2><?php echo t("removeBrand") ?></h2></a>
            <?php
            include("./pages/backendPages/backend-rmBrand.php");
            ?>
        </div>
        <div class="content flex-item-5 flex-size-1">
            <a href="#" class="onClickBackend"><h2><?php echo t("addBeer") ?></h2></a>

            <?php
            include("./pages/backendPages/backend-addBeer.php");
            ?>
        </div>
        <div class="content flex-item-6 flex-size-1">
            <a href="#" class="onClickBackend"><h2><?php echo t("removeProduct") ?></h2></a>

            <?php
            include("./pages/backendPages/backend-rmProduct.php");
            ?>
        </div>
        <div class="content flex-item-7 flex-size-1">
            <a href="#" class="onClickBackend"><h2><?php echo t("showUsers") ?></h2></a>

            <?php
            include("./pages/backendPages/backend-setAdmin.php");
            ?>
        </div>
        <div class="content flex-item-8 flex-size-1">
            <a href="#" class="onClickBackend"><h2><?php echo t("addresses") ?></h2></a>

            <?php
            include("./pages/backendPages/backend-displAddress.php");
            ?>
        </div>
        <div class="content flex-item-9 flex-size-1">
            <a href="#" class="onClickBackend"><h2><?php echo t("orders") ?></h2></a>

            <?php
            include("./pages/backendPages/backend-displOrders.php");
            ?>
        </div>
    </div>

    </div>
    <?php
} else {
    echo "<p>".t('adminAccNeeded')."</p><br><p>";
    render_basicLink(new Page("login"));
    echo "</p>";
}
