<?php
include "./includes/enum/pages.php"
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include "./includes/head.php";
        include "./includes/globals.php";

        // Additional page related globals
        $_ACTIVE_PAGE = Pages::Homepage;

        echo "<title>$_SHOP_NAME - Homepage</title>"
        ?>

    </head>
    <body>
    <?php
    include "includes/header.php";
    include "includes/navigation.php";
    ?>
    <main class="">
        <div class="sidenav w3-col s3">
            <div class="sidenav-container">
                <p>Sidenavigation</p>
            </div>
        </div>
        <div class="content w3-col s9">
            <p><?php echo "Hello World" ?> Jenkins do stuff!!!</p>
        </div>
    </main>
    <?php
    include "includes/footer.php";
    ?>
    </body>
</html>
