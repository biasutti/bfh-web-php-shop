<?php
  require_once("./lib/db-helper.php");
?>
<div class="flex-container-column">
  <div class="content flex-item-1 flex-size-1">
    <h2>Add Beer</h2>
    <?php
      include("./pages/backendPages/backend-addBeer.php");
    ?>
  </div>
  <div class="content flex-item-2 flex-size-1">
    <h2>Add Type Of Beer</h2>
    <?php
      include("./pages/backendPages/backend-addType.php");
    ?>
  </div>
</div>
