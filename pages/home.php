<?php
require_once("./lib/helper.php");
?>
<div class="content flex-item flex-size-1">
    <p><?php echo "Hello World Home</p>";
    echo "<p>Take a look at our Products: ";
    render_basicLink(new Page("products"));
    ?>
    </p>
</div>
