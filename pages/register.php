<?php
require_once("lib/db-helper.php");

if (isset($_SESSION['uid'])) {
    echo "<p>" . t("allReadyLogged") . "</p>";
} else {

    if (!empty($_POST)) {

        $formdata = $_POST['register'];

        $login_password = $_POST['password'];
        $login_retype_password = $_POST['passwordretype'];

        if($login_password != $login_retype_password) {
            $error = new ErrorMessage(11);
        }

    }

    if(empty($_POST) || isset($error)) {

        ?>
        <div class="content flex-item flex-size-1">
            <form class="flex-size-1 flex-container" id="register" name="register" method="post">
                <div class="flex-half flex-item-1">
                    <div class="flex-container-column">
                        <div class="flex-item-1 flex-size-1">
                            <h2><?php echo t('logindata') ?></h2>
                        </div>
                        <div class="flex-item-1 flex-size-1 form-row">
                            <label for="register[email]"><?php echo t('email') ?>*</label>
                            <input type="text" name="register[email]" value="<?php if(isset($formdata['email'])) echo $formdata['email'] ?>" required/>
                        </div>
                        <div class="flex-item-2 flex-size-1 form-row">
                            <label for="password"><?php echo t('password') ?>*</label>
                            <input type="password" name="password" required/>
                        </div>
                        <div class="flex-item-3 flex-size-1 form-row">
                            <label for="passwordretype"><?php echo t('password_retype') ?>*</label>
                            <input type="password" name="passwordretype" required/>
                        </div>
                    </div>
                </div>
                <div class="flex-half flex-item-2">
                    <div class="flex-container-column">
                        <div class="flex-item-1 flex-size-1">
                            <h2><?php echo t('userdata') ?></h2>
                        </div>
                        <div class="flex-item-1 flex-size-1 form-row">
                            <label for="register[firstname]"><?php echo t('firstName') ?>*</label>
                            <input type="text" name="register[firstname]" required/>
                        </div>
                        <div class="flex-item-2 flex-size-1 form-row">
                            <label for="register[lastname]"><?php echo t('lastName') ?>*</label>
                            <input type="text" name="register[lastname]" required/>
                        </div>
                        <div class="flex-item-3 flex-size-1 form-row">
                            <h3><?php echo t('address') ?></h3>
                        </div>
                        <div class="flex-item-4 flex-size-1 form-row">
                            <label for="register[street]"><?php echo t('street') ?></label>
                            <input type="text" name="register[street]"/>
                        </div>
                        <div class="flex-item-5 flex-size-1 form-row">
                            <label for="register[plz]"><?php echo t('plz') ?></label>
                            <input type="text" name="register[plz]"/>
                        </div>
                        <div class="flex-item-6 flex-size-1 form-row">
                            <label for="register[city]"><?php echo t('city') ?></label>
                            <input type="text" name="register[city]"/>
                        </div>
                        <div class="flex-item-7 flex-size-1 form-row-button">
                            <button class="ui-button ui-corner-all" type="submit"><?php echo t('register'); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
    }
}
