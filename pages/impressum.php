<?php
if(isset($_GET["lang"])){
  if($_GET["lang"]=="de"){
    include("./pages/impressum_de.php");
  }elseif($_GET["lang"]=="fr"){
    include("./pages/impressum_fr.php");
  }
}else{
  if($_COOKIE["lang"]=="de"){
    include("./pages/impressum_de.php");
  }elseif($_COOKIE["lang"]=="fr"){
    include("./pages/impressum_fr.php");
  }
}
