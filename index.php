<?php
require_once("./lib/helper.php");
require_once("./lib/globals.php");
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

    <link rel="stylesheet" type="text/css" href="./css/jquery-ui.css" />

    <?php
        if($_STAGE == "DEV") {
            ?>
            <script src="./js/jquery-3.4.1.js"></script>
            <script src="./js/jquery-ui-1.12.1.js"></script>
            <?php
        } else {
            ?>
            <script src="./js/min/jquery-3.4.1.min.js"></script>
            <script src="./js/min/jquery-ui-1.12.1.min.js"></script>
            <?php
        }

    ?>
    <script src="./js/prod.js"></script>

    <?php
    // Additional page related globals
    $_ACTIVE_PAGE = t($pageId);

    echo "<title>$_SHOP_NAME - $_ACTIVE_PAGE</title>"
    ?>
</head>
<body>
    <?php
    if(!isset($_COOKIE['eucookie']))
    { ?>
        <p id="eucookielaw" >
            <p>By browsing our site you agree to our use of cookies. You will only see this message once.</p>
            <a href="#" id="more">Find out more</a>
        </p>
    <?php } ?>
    <header class="">
        <div class="header-content">
            <div class="flex-container">
                <div class="header-logo flex-item flex-size-2">
                    <a href="<?php echo get_localizedPagePath('home') ?>"><img src="./img/logo.png" alt="Drinkshop Logo"/></a>
                </div>
                <div class="flex-item flex-size-1">
                    <ul class="header-navigation flex-container-reverse">
                        <li>
                            <a href="#" id="burger""><img src="./img/burger.svg"/></a>
                        </li>
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
            render_generic_navigation(array('home', 'products', 'account', 'login'));
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
