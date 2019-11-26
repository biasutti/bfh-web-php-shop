<?php



  // Form validation
  $errArray = array(); // An array holding the form errArray
  // Validate form
  if (count($_POST) > 0 && isset($_POST['addBeerButton'])) {
      // Validate email
      if (!isset($_POST['beerName'])|| $_POST['beerName'] == '') {
          $errArray['beerName'] = t('FormBeerName');
      }
      if (!isset($_POST['beerNameFR'])|| $_POST['beerNameFR'] == '') {
          $errArray['beerNameFR'] = t('FormBeerNameFR');
      }
      if (!isset($_POST['price'])|| $_POST['price'] == '' || $_POST['price']<=0 ) {
          $errArray['price'] = t('FormPrice');
      }
      if (!isset($_POST['imgSrc'])|| $_POST['imgSrc'] == '') {
          $errArray['imgSrc'] = t('FormImgSrc');
      }
      if (!isset($_POST['alcPercent'])|| $_POST['alcPercent'] == '' || $_POST['alcPercent']<=0) {
          $errArray['alcPercent'] = t('FormAlcPercent');
      }
      if (!isset($_POST['energy'])|| $_POST['energy'] == '' || $_POST['energy']<=0) {
          $errArray['energy'] = t('FormEnergy');
      }

  }

  if (count($_POST) > 0 && count($errArray) == 0 && isset($_POST['addBeerButton'])) {
      /*Product::insertBeer($_POST['beerName'],$_POST['beerNameFR'],$_POST['typeOfBeer'],$_POST['brand'],
      $_POST['price'],$_POST['imgSrc'],$_POST['alcPercent'],$_POST['energy']); */
      echo "<pre>";
      print_r($_POST);
      //print_r(Product::getAllProducts());
      echo "</pre>";


  }

    $errBeerName = isset($errArray['beerName']) ? $errArray['beerName'] : '';
    $errBeerNameFR = isset($errArray['beerNameFR']) ? $errArray['beerNameFR'] : '';
    $errPrice = isset($errArray['price']) ? $errArray['price'] : '';
    $errImgSrc = isset($errArray['imgSrc']) ? $errArray['imgSrc'] : '';
    $errAlcPercent = isset($errArray['alcPercent']) ? $errArray['alcPercent'] : '';
    $errEnergy = isset($errArray['energy']) ? $errArray['energy'] : '';



  ?>
      <form class="flex-size-1 flex-container displNone" method="post">
        <div class="flex-item-1 flex-size-1 form-row">
          <label for="name"><?php echo t('beerName') ?></label>
          <input type="text" name="beerName" size="15" required>
          <mark><?php echo $errBeerName;?></mark>
        </div>
        <div class="flex-item-1 flex-size-1 form-row">
          <label for="name"><?php echo t('beerNameFR') ?></label>
          <input type="text" name="beerNameFR" size="15" required>
          <mark><?php echo $errBeerNameFR;?></mark>
        </div>
        <div class="flex-item-2 flex-size-1 form-row">
          <label for="type"><?php echo t('typeOfBeer') ?></label>
          <select name="typeOfBeer">
            <?php
            foreach (Type::renderTypes() as $type) {
              echo '<option value="'.$type->Id_type.'">'.$type->name.'</option>';
            }
            ?>
          </select>
        </div>
        <div class="flex-item-3 flex-size-1 form-row">
          <label for="brand"><?php echo t('brand') ?></label>
          <select name="brand">
            <?php
            foreach (Brand::renderBrands() as $brand) {
              echo '<option value="'.$brand->Id_brand.'">'.$brand->name.'</option>';
            }
            ?>
          </select>
        </div>
        <div class="flex-item-4 flex-size-1 form-row">
          <label for="price"><?php echo t('beerPrice') ?></label>
          <input type="number" step="0.01" name="price" style="width: 5em;"required>
          <mark><?php echo $errPrice;?></mark>
        </div>
        <div class="flex-item-5 flex-size-1 form-row">
          <label for="imgSrc"><?php echo t('imgSrc') ?></label>
          <!-- <input type="text"  name="imgSrc" required> -->
          <input type="file" name="imgSrc" accept="image/x-png">
          <mark><?php echo $errImgSrc;?></mark>
        </div>
        <div class="flex-item-6 flex-size-1 form-row">
          <label for="alcPercent"><?php echo t('alcPercent') ?></label>
          <input type="number"  name="alcPercent" style="width: 5em;" required>
          <mark><?php echo $errAlcPercent;?></mark>
        </div>
        <div class="flex-item-7 flex-size-1 form-row">
          <label for="energy"><?php echo t('energy') ?></label>
          <input type="number" name="energy" style="width: 5em;" required>
          <mark><?php echo $errEnergy;?></mark>
        </div>
        <div class="flex-item-7 flex-size-1 form-row">
          <p></p>
          <input name="addBeerButton" type="submit" value="<?php echo t('addBeer')?>"/>
        </div>
      </form>
