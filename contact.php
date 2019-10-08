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
    $_ACTIVE_PAGE = Pages::Contact;

    echo "<title>$_SHOP_NAME - $_ACTIVE_PAGE</title>"
    ?>

</head>
<body>
<?php
include "includes/header.php";
include "includes/navigation.php";
?>
<main class="flex-container">
    <div class="flex-item-2 flex-size-5">
        <p><?php echo "TODO: Implement contactform" ?> </p>
    </div>
</main>
<?php
include "includes/footer.php";
?>
</body>
</html>
