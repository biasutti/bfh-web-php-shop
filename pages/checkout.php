<div class="content flex-item-1 flex-size-1">
    <?php

    if (!isset($_SESSION['uid'])) {
        echo "<p>" . t('accNeeded') . "</p><p>";
        render_basicLink(new Page("login"));
        echo "</p>";
    } else {
        include("checkout-ajax.php");
    }
    ?>
</div>
<?php
