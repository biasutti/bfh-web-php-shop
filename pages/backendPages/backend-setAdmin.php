  <div class="flex-item-1 flex-size-1 displNone">
    <?php
    if (count($_POST) > 0 && isset($_POST['changeAdmin'])) {
      User::toggleAdminById($_POST['changeAdmin']);
      echo "<mark>Toggled admin sucessfully!</mark>";
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
          <th>cahnge Admin</th>
          <?php
          foreach(User::getAllUsers() as $u){
            echo "<tr><td>".$u->uid."</td>
            <td>".$u->getFirstname()."</td>".
            "<td>".$u->getLastname()."</td>".
            "<td>".$u->getBirthdate()."</td>".
            "<td>".$u->isAdmin()."</td>";
            if($u->isAdmin()){
              echo "<td><button type='submit' name='changeAdmin' value='$u->uid'>unset Admin</button></td>";
            }else{
              echo "<td><button type='submit' name='changeAdmin' value='$u->uid'>set Admin</button></td>";
            }


            echo "</tr>";
          }
            ?>
        </tr>
      </table>
    </form>
  </div>
