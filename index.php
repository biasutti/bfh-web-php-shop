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
    <main>
        <p><?php echo "Hello World" ?></p>
    </main>
    <?php
    include "includes/footer.php";
    ?>
    </body>
</html>
