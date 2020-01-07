  <div class="flex-item-1 flex-size-1 displNone">
    <form class="flex-size-1 flex-container" method="Post">
      <table class="backendTable">
        <tr>
          <th>Id</th>
          <th>street</th>
          <th>town</th>
          <th>zip</th>
          <th>country</th>
        </tr>
          <?php
            foreach(Address::renderBackendAddresses() as $addr){
              echo "<tr><td>".$addr->Id_address."</td>".
              "<td>".$addr->getStreet()."</td>".
              "<td>".$addr->getTown()."</td>".
              "<td>".$addr->getZip()."</td>".
              "<td>".$addr->getCountry()."</td>";
            }
            ?>
        </tr>
      </table>
    </form>
  </div>
