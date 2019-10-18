<?php
require_once("lib/helper.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="./img/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="./css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="./css/flex.css" />
    <link rel="stylesheet" type="text/css" href="./css/main.css" />
    <?php
    include "./lib/globals.php";

    // Additional page related globals
    $_ACTIVE_PAGE = t($pageId);

    echo "<title>$_SHOP_NAME - $_ACTIVE_PAGE</title>"
    ?>
</head>
<body>
    <header class="">
        <div class="header-content">
            <div class="flex-container">
                <div class="header-logo flex-item flex-size-2">
                    <a href="<?php echo get_localizedPagePath('home') ?>"><img src="./img/logo.png" alt="Drinkshop Logo"/></a>
                </div>
                <div class="flex-item flex-size-1">
                    <ul class="header-navigation flex-container-reverse">
                        <li class="">
                            <?php
                            if ( isset( $_SESSION['uid'] ) ) {
                                echo "<a href=" . get_localizedPagePath('logout') . ">Logout</a>";
                            } else {
                                echo "<a href=" . get_localizedPagePath('login') .">Login</a>";
                            }
                            ?>

                        </li>
                        <li>
                            <?php render_languages($language, $pageId); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <nav>
        <ul class="navigation flex-container">
            <?php
            render_generic_navigation(array('home', 'products', 'login'));
            ?>
        </ul>
    </nav>
    <main class="flex-container">
        <?php
        $fn = "pages/$pageId.php";
        if(is_file($fn)) {
            include($fn);
        } else {
            echo "<h2>Not yet implemented.... coming soon... sorry!</h2>";
        }
        ?>
    </main>
    <footer>
        <ul class="navigation-footer flex-container">
            <?php
                render_generic_navigation(array('contact', 'impressum'));
            ?>
        </ul>
    </footer>
</body>
</html>
