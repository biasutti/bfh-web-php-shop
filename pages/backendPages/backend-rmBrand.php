  <div class="flex-item-1 flex-size-1 displNone">
    <?php
    if (count($_POST) > 0 && isset($_POST['rmBrandId'])) {
      Brand::removeBrandById($_POST['rmBrandId']);
      echo "<mark>Removed sucessfully!</mark>";
    }
     ?>
    <form class="flex-size-1 flex-container" method="Post">
      <table class="backendTable">
        <tr>
          <th>Id</th>
          <th>name</th>
          <th>remove</th>
          <?php
            foreach(Brand::renderBrands() as $brand){
              echo "<tr><td>".$brand->Id_brand."</td>
              <td>".$brand->name."</td><td>";
              if(Brand::isBrandLinked($brand->Id_brand)){
                echo "Linked";
              }else{
                echo "<button type='submit' name='rmBrandId' value='$brand->Id_brand' src='./img/ui/close.png'>".
                "<img src='./img/ui/close.png' width=20px/></button>";
              }
              "<td></tr>";
            }
            ?>
        </tr>
      </table>
    </form>
  </div>
