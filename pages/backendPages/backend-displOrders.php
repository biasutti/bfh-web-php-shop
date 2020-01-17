  <div class="flex-item-1 flex-size-1 displNone">
    <form class="flex-size-1 flex-container" method="Post">
      <table class="backendTable">
        <tr>
          <th>Order Id</th>
          <th>User Id</th>
          <th>User Last Name</th>
          <th>User First Name</th>
          <th>Order date</th>
          <th>Products ordered</th>
        </tr>
          <?php
            foreach(Order::getAllOrders() as $order){
              echo "<tr><td>".$order['id']."</td>".
              "<td>".$order['uid']."</td>".
              "<td>".$order['userLastname']."</td>".
              "<td>".$order['userFirstname']."</td>".
              "<td>".$order['date']."</td>";
              echo "<td><table class=\"backendTable\"><tr><th>Product Name</th><th>Quantity</th></tr>";
              foreach ($order['Prod'] as $prod){
                echo "<tr>".
                "<td>".$prod['prod']."</td>".
                "<td>".$prod['quantity']."</td>".
                "</tr>";
              }
              echo "</table></td>";
            }
            ?>
        </tr>
      </table>
    </form>
  </div>
