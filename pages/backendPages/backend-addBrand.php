<?php

  // Form validation
  $errArray = array(); // An array holding the form errArray
  // Validate form
  if (count($_POST) > 0 && isset($_POST['addBrandButton'])) {
      // Validate email
      if (!isset($_POST['brandName'])|| $_POST['brandName'] == '') {
          $errArray['brandName'] = t('FormBrandName');
      }

  }

  if (count($_POST) > 0 && count($errArray) == 0 && isset($_POST['addBrandButton'])) {
    //insert sql implement
    //Type::insertType($_POST['typeName']);
    Brand::insertBrand($_POST['brandName']);
    echo "Brand \"".$_POST['brandName']."\" added sucessfully !";
  }

    $errBrandName = isset($errArray['brandName']) ? $errArray['brandName'] : '';



  ?>
      <form class="flex-size-1 flex-container displNone" method="post">
        <div class="flex-item-1 flex-size-1 form-row">
          <label for="brandName"><?php echo t('brandName') ?></label>
          <input type="text" name="brandName" size="15" required>
          <mark><?php echo $errBrandName;?></mark>
        </div>
        <div class="flex-item-2 flex-size-1 form-row">
          <p></p>
          <input name="addBrandButton" type="submit" value="<?php echo t('addBrand')?>"/>
        </div>
      </form>
