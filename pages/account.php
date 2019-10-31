<?php
require_once("lib/db-helper.php");

if (!isset($_SESSION['uid'])) {
    echo "<p>".t('accNeeded')."</p>";
} else {
    ?>
    <div class="content flex-item flex-size-1">
        <form class="flex-size-1 flex-container" id="account" name="account" method="post">
            <div class="flex-half flex-item-1">
                <div class="flex-container-column">
                    <div class="flex-item-1 flex-size-1">
                        <h2><?php echo t('logindata') ?></h2>
                    </div>
                    <div class="flex-item-1 flex-size-1">
                        <label for="email"><?php echo t('email') ?></label>
                        <input type="email" name="email" />
                    </div>
                    <div class="flex-item-2 flex-size-1">
                        <label for="password"><?php echo t('password') ?></label>
                        <input type="password" name="password" />
                    </div>
                </div>
            </div>
            <div class="flex-half flex-item-2">
                <div class="flex-container-column">
                    <div class="flex-item-1 flex-size-1">
                        <h2><?php echo t('userdata') ?></h2>
                    </div>
                    <div class="flex-item-1 flex-size-1">
                        <label for="firstname"><?php echo t('firstname') ?></label>
                        <input type="text" name="firstname" />
                    </div>
                    <div class="flex-item-2 flex-size-1">
                        <label for="lastname"><?php echo t('lastname') ?></label>
                        <input type="text" name="lastname" />
                    </div>
                    <div class="flex-item-3 flex-size-1">
                        <label for="street"><?php echo t('street') ?></label>
                        <input type="text" name="street" />
                    </div>
                    <div class="flex-item-4 flex-size-1">
                        <label for="city"><?php echo t('city') ?></label>
                        <input type="text" name="city" />
                    </div>
                    <div class="flex-item-5 flex-size-1">
                        <button type="submit"><?php echo t('save'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
}
