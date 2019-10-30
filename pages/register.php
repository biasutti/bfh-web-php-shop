<?php
require_once("lib/db-helper.php");

if (isset($_SESSION['uid'])) {
    echo "<p>".t("allReadyLogged")."</p>";
} else {
    ?>
    <form id="register" name="register" method="post">
        <label for="firstname"><?php echo t('firstName') ?></label>
        <input type="text" name="firstname" />
        <label for="lastname"><?php echo t('lastName') ?></label>
        <input type="text" name="lastname" />
    </form>
    <?php
}
