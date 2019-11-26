  <div class="flex-item-1 flex-size-1 displNone">
    <?php
    if (count($_POST) > 0 && isset($_POST['rmProdId'])) {
      //Brand::removeBrandById($_POST['rmBrandId']);
      Product::removeBeer($_POST['rmProdId']);
      echo "<mark>Removed sucessfully!</mark>";
    }
     ?>
    <form class="flex-size-1 flex-container" method="Post">
      <table class="backendTable">
        <tr>
          <th>Id</th>
          <th>name DE</th>
          <th>name FR</th>
          <th>type</th>
          <th>brand</th>
          <th>remove</th>
          <?php
            foreach(Product::getAllProducts() as $prod){
              echo "<tr><td>".$prod->Id_prod."</td>
              <td>".$prod->name_de."</td>".
              "<td>".$prod->name_fr."</td>".
              "<td>".Type::getTypeById($prod->FK_type_Id)->name."</td>".
              "<td>".Brand::getBrandById($prod->FK_brand_Id)->name."</td>".
              "<td><button type='submit' name='rmProdId' value='$prod->Id_prod' src='./img/ui/close.png'>".
              "<img src='./img/ui/close.png' width=20px/></button></td></tr>";
            }
            ?>
        </tr>
      </table>
    </form>
  </div>
