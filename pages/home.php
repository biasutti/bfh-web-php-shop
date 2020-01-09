<div class="content flex-item flex-size-1">
    <?php
    if (isset($_SESSION['uid'])) {
        $user = User::getUserByUid($_SESSION['uid']);
        ?>
        <p>Willkommen, <?php echo $user->getFirstname(); ?></p>
        <?php
    } else {

        ?>
        <p><?php echo t("homeText")."</p>";
            render_basicLink(new Page("products"));
            $db = DB::getInstance();
            $db->query('SET NAMES utf8');
            ?>

        <?php
    }
    ?>
</div>
