<?php
require_once("lib/db-helper.php");

if (!isset($_SESSION['uid'])) {
    echo "<p>Sie müssen eingeloggt sein</p>";
} else {
    ?>
    <form id="account" name="account" method="post">
        <label for="firstname"><?php echo t('vorname') ?></label>
        <input type="text" name="firstname" />
        <label for="lastname"><?php echo t('nachname') ?></label>
        <input type="text" name="lastname" />
    </form>
    <?php
}

