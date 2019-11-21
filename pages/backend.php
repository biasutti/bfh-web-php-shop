<?php
  require_once("./lib/db-helper.php");
?>
<div class="flex-container-column">
  <div class="content flex-item-1 flex-size-1">
    <a href="#" class="onClickBackend"><h2><?php echo t("addTypeOfBeer")?></h2></a>
    <?php
      include("./pages/backendPages/backend-addType.php");
    ?>
  </div>
  <div class="content flex-item-1 flex-size-1">
    <a href="#" class="onClickBackend"><h2>Remove Type</h2></a>
    <?php
      include("./pages/backendPages/backend-rmType.php");
    ?>
  </div>
  <div class="content flex-item-1 flex-size-1">
    <a href="#" class="onClickBackend"><h2><?php echo t("addBrand")?></h2></a>
    <?php
      include("./pages/backendPages/backend-addBrand.php");
    ?>
  </div>
  <div class="content flex-item-1 flex-size-1">
    <a href="#" class="onClickBackend"><h2>Remove Brand</h2></a>
    <?php
      include("./pages/backendPages/backend-rmBrand.php");
    ?>
  </div>
  <div class="content flex-item-2 flex-size-1">
    <a href="#" class="onClickBackend"><h2><?php echo t("addBeer")?></h2></a>

    <?php
      include("./pages/backendPages/backend-addBeer.php");
    ?>
  </div>
</div>
