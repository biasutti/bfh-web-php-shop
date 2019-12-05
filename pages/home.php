<div class="content flex-item flex-size-1">
<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    ?>
    <p>Willkommen, <?php echo $user->getFirstname(); ?></p>
    <?php
} else {

    ?>
    <p><?php echo "Hello World Home</p>";
        echo "<p>Take a look at our Products: ";
        render_basicLink(new Page("products"));

        $db = DB::getInstance();
        $db->query('SET NAMES utf8');
        /*foreach ($db->query("SELECT * FROM products;") as $product) {
            echo "<p>" . $product["name_de"] . "</p>";
        }*/

        ?>
    </p>

    <?php
}
?>
</div>
