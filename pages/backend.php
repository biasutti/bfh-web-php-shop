<?php
  include("./lib/db-helper.php");
  $products = getAllProducts();
  $typesOfBeers = getAllTypesOfBeer();
  $brands = getAllBrands();



  // Form validation
  $errArray = array(); // An array holding the form errArray
  // Validate form
  if (count($_POST) > 0) {
      // Validate email
      if (!isset($_POST['beerName'])|| $_POST['beerName'] == '') {
          $errArray['beerName'] = t('FormBeerName');
      }
      if (!isset($_POST['price'])|| $_POST['price'] == '') {
          $errArray['price'] = t('FormPrice');
      }
      if (!isset($_POST['imgSrc'])|| $_POST['imgSrc'] == '') {
          $errArray['imgSrc'] = t('FormImgSrc');
      }
      if (!isset($_POST['alcPercent'])|| $_POST['alcPercent'] == '') {
          $errArray['alcPercent'] = t('FormAlcPercent');
      }
      if (!isset($_POST['energy'])|| $_POST['energy'] == '') {
          $errArray['energy'] = t('FormEnergy');
      }

  }

  if (count($_POST) > 0 && count($errArray) == 0) {

    addBeer($_POST['beerName'],$_POST['typeOfBeer'],$_POST['brand'],$_POST['price'],$_POST['imgSrc'],$_POST['alcPercent'],$_POST['energy']);
    echo "<pre>";
    print_r(getAllProducts());
    echo "</pre>";

  }

    $errBeerName = isset($errArray['beerName']) ? $errArray['beerName'] : '';
    $errPrice = isset($errArray['price']) ? $errArray['price'] : '';
    $errImgSrc = isset($errArray['imgSrc']) ? $errArray['imgSrc'] : '';
    $errAlcPercent = isset($errArray['alcPercent']) ? $errArray['alcPercent'] : '';
    $errEnergy = isset($errArray['energy']) ? $errArray['energy'] : '';



  ?>

  <div class="content flex-item flex-size-1">
      <form class="flex-size-1 flex-container" id="backend" method="post">
        <div class="flex-item-1 flex-size-1 form-row">
          <label for="name"><?php echo t('beerName') ?></label>
          <input type="text" name="beerName" size="15" required>
          <mark><?php echo $errBeerName;?></mark>
        </div>
        <div class="flex-item-2 flex-size-1 form-row">
          <label for="type"><?php echo t('typeOfBeer') ?></label>
          <select name="typeOfBeer">
            <?php
            foreach ($typesOfBeers as $type) {
              echo '<option value="'.$type->tid.'">'.$type->name.'</option>';
            }
            ?>
          </select>
        </div>
        <div class="flex-item-3 flex-size-1 form-row">
          <label for="brand"><?php echo t('brand') ?></label>
          <select name="brand">
            <?php
            foreach ($brands as $brand) {
              echo '<option value="'.$brand->bid.'">'.$brand->name.'</option>';
            }
            ?>
          </select>
        </div>
        <div class="flex-item-4 flex-size-1 form-row">
          <label for="price"><?php echo t('beerPrice') ?></label>
          <input type="number"  name="price" style="width: 5em;"required>
          <mark><?php echo $errPrice;?></mark>
        </div>
        <div class="flex-item-5 flex-size-1 form-row">
          <label for="imgSrc"><?php echo t('imgSrc') ?></label>
          <input type="text"  name="imgSrc" required>
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
          <input type="submit" value="<?php echo t('submit')?>"/>
        </div>
      </form>
  </div>
