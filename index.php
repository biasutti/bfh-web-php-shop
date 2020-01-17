<?php
require_once("./autoloader.php");
require_once("./lib/helper.php");
require_once("./lib/globals.php");
session_start();

if(isset($_GET['login'])) {
    $message = new SuccessMessage(2);
}
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
    <header class="">
        <div class="header-content">
            <div class="flex-container">
                <div class="header-logo flex-item flex-size-2">
                    <a href="<?php echo get_pagePath('home') ?>"><img src="./img/logo.png" alt="Drinkshop Logo"/></a>
                </div>
                <div class="flex-item flex-size-1">
                    <ul class="header-navigation flex-container-reverse">
                        <li>
                            <a href="#" id="burger"><img alt="Toggle mobile navigation" src="./img/burger.svg"/></a>
                        </li>
                        <li class="">
                            <?php
                            if ( isset( $_SESSION['uid'] ) ) {
                                echo "<a href='" . get_pagePath('logout') . "'>Logout</a>";
                            } else {
                                echo "<a href='" . get_pagePath('login') . "'>Login</a>";
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
            $pages_navigation = array(
                    new Page('home'),
                    new Page('products'),
                    new Page('account', true),
                    new Page('orders', false),
                    new Page('login', false, true, true),
                    new Page('logout', true, false, true),
                    new Page('register', false, true),
                    new Page('backend', true, false, false, true),
                    new Page('checkout', true)
            );
            render_generic_navigation($pages_navigation);
            ?>
        </ul>
    </nav>
    <main class="flex-container-column-reverse">
        <div class="content-container flex-item flex-size-1 flex-container">
            <?php
            $fn = "pages/$pageId.php";
            if(is_file($fn)) {
                include($fn);
            } else {
                echo "<h2>Not yet implemented.... coming soon... sorry!</h2>";
            }
            ?>
        </div>
        <?php
        if(isset($message)) {
            echo $message->render();
        }
        ?>
    </main>
    <?php
    if(!isset($_COOKIE['eucookie']))
    { ?>
    <div class="my-cookie-container">
        <div class="my-cookie-law flex-container">
            <div class="flex-item-1 flex-size-4">
                By browsing our site you agree to our use of cookies. You will only see this message once. <a href="#" id="more">Find out more</a>
            </div>
            <div class="flex-item-2 flex-size-1">
                <button class="flex-item-2"><?php echo t('acceptCookie'); ?></button>
            </div>
        </div>
    </div>
    <?php } ?>
    <footer>
        <ul class="navigation-footer flex-container">
            <?php
            $pages_footer = array(
                    new Page('contact'),
                    new Page('impressum')
            );
            render_generic_navigation($pages_footer);
            ?>
        </ul>
    </footer>
</body>
</html>
