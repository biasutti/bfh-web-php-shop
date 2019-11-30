  <div class="flex-item-1 flex-size-1 displNone">
    <?php
    if (count($_POST) > 0 && isset($_POST['rmTypeId'])) {
      Type::removeTypeById($_POST['rmTypeId']);
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
            foreach(Type::getAllTypes() as $type){
              echo "<tr><td>".$type->Id_type."</td>
              <td>".$type->name."</td><td>";
              if(Type::isTypeLinked($type->Id_type)){
                echo "Linked";
              }else{
                echo "<button type='submit' name='rmTypeId' value='$type->Id_type' src='./img/ui/close.png'>".
                "<img src='./img/ui/close.png' width=20px/></button>";
              }
              echo "</td></tr>";
            }
            ?>
        </tr>
      </table>
    </form>
  </div>
