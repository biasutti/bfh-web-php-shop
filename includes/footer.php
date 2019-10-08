<footer>
    <ul class="navigation-footer">
        <li class="">
            <?php
            if($_ACTIVE_PAGE != Pages::Contact) {
                echo "<a href=\"./contact.php\">Kontakt</a>";
            } else {
                echo "Kontakt";
            }
            ?>
        </li>
        <li class="">
            <?php
            if($_ACTIVE_PAGE != Pages::Impressum) {
                echo "<a href=\"./impressum.php\">Impressum</a>";
            } else {
                echo "Impressum";
            }
            ?>
        </li>
    </ul>
</footer>