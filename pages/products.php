<div class="flex-item-1">
  <div class="flex-container">
    <div class="flex-item-1 flex-size-1">
      <ul class="sideNav navigation">
      <?php
        echo "<li class=\"sideTitle\">Filter</li>";
        //sql request to fill array
        $typesOf = array("Blonde","Amber","Dunkel");
        foreach ($typesOf as $types ) {
          echo "<li>". $types ."</li>";
        }
      ?>
      </ul>
    </div>
    <div class="flex-item-2 flex-size-1">
      <ul class="sideNav navigation">
      <?php
        echo "<li class=\"sideTitle\">Brand</li>";
        //sql request to fill array
        $typesOf = array("Feldschlöschen","Heineken","Aare Bier");
        foreach ($typesOf as $types ) {
          echo "<li>". $types ."</li>";
        }
      ?>
      </ul>
    </div>
 </div>
</div>
<div class="flex-item-2 flex-size-5">
  <div class="flex-container flex-wrap" >
    <?php
    //sql request get all products or some
    $productsDB = array("Blonde","Amber","Dunkel", "t" , "b" , "c", "test");
    //order is set when filtered need to be in DB!
    $order = 1;
    foreach($productsDB as $prod){
      echo "<div class=\"products\" style=\"order:".$order.";\"><p>".$prod."</p></div>";
      $order++;
    }

    ?>
  </div>
</div>
