  <div class="flex-item-1 flex-size-1">
    <?php
    if (count($_POST) > 0 && isset($_POST['changeAdmin'])) {
      //Type::removeTypeById($_POST['rmTypeId']);
      echo "<mark>Removed sucessfully!</mark>";
    }
     ?>
    <form class="flex-size-1 flex-container" method="Post">
      <table class="backendTable">
        <tr>
          <th>Id</th>
          <th>firstname</th>
          <th>lastname</th>
          <th>birthdate</th>
          <th>isAdmin</th>
          <th>change Admin Flag</th>
          <?php
          foreach(User::getAllUsers() as $u){            
            echo "<tr><td>".$u->uid."</td>
            <td>".$u->getFirstname()."</td>".
            "<td>".$u->getLastname()."</td>".
            "<td>".$u->getBirthdate()."</td>".
            "<td>".$u->isAdmin()."</td>";
            echo "<td><button type='submit' name='changeAdmin' value='$u->uid'><img src='./img/ui/close.png' width=20px/></button></td>";

            echo "</tr>";
          }
            /*foreach(Type::getAllTypes() as $type){
              echo "<tr><td>".$type->Id_type."</td>
              <td>".$type->name."</td><td>";
              if(Type::isTypeLinked($type->Id_type)){
                echo "Linked";
              }else{
                echo "<button type='submit' name='rmTypeId' value='$type->Id_type' src='./img/ui/close.png'>".
                "<img src='./img/ui/close.png' width=20px/></button>";
              }
              echo "</td></tr>";
            }*/

            ?>
        </tr>
      </table>
    </form>
  </div>
