<?php

  // Form validation
  $errArray = array(); // An array holding the form errArray
  // Validate form
  if (count($_POST) > 0) {
      // Validate email
      if (!isset($_POST['typeName'])|| $_POST['typeName'] == '') {
          $errArray['typeName'] = t('FormTypeName');
      }

  }

  if (count($_POST) > 0 && count($errArray) == 0) {

    addType($_POST['typeName']);
    echo "<pre>";
    print_r(getAllTypesOfBeer());
    echo "</pre>";

  }

    $errTypeName = isset($errArray['typeName']) ? $errArray['typeName'] : '';



  ?>
      <form class="flex-size-1 flex-container" id="backend" method="post">
        <div class="flex-item-1 flex-size-1 form-row">
          <label for="typeName"><?php echo t('typeName') ?></label>
          <input type="text" name="typeName" size="15" required>
          <mark><?php echo $errTypeName;?></mark>
        </div>
        <div class="flex-item-2 flex-size-1 form-row">
          <p></p>
          <input type="submit" value="<?php echo t('submit')?>"/>
        </div>
      </form>
