<?php

  // Form validation
  $errArray = array(); // An array holding the form errArray
  // Validate form
  if (count($_POST) > 0 && isset($_POST['addTypeButton'])) {
      // Validate email
      if (!isset($_POST['typeName'])|| $_POST['typeName'] == '') {
          $errArray['typeName'] = t('FormTypeName');
      }

  }

  if (count($_POST) > 0 && count($errArray) == 0 && isset($_POST['addTypeButton'])) {
    //insert sql implement
    Type::insertType($_POST['typeName']);
    echo "Category added sucessfully !";
    /*foreach (Type::renderTypes() as $ty) {

      echo "id: ". $ty->Id_type ." name: " .$ty->name."<br>";
    }*/
  }

    $errTypeName = isset($errArray['typeName']) ? $errArray['typeName'] : '';



  ?>
      <form class="flex-size-1 flex-container displNone" method="post">
        <div class="flex-item-1 flex-size-1 form-row">
          <label for="typeName"><?php echo t('typeName') ?></label>
          <input type="text" name="typeName" size="15" required>
          <mark><?php echo $errTypeName;?></mark>
        </div>
        <div class="flex-item-2 flex-size-1 form-row">
          <p></p>
          <input name="addTypeButton" type="submit" value="<?php echo t('addTypeOfBeer')?>"/>
        </div>
      </form>
