<?php

if (isset($_SESSION['uid'])) {
    echo "<p>" . t("allReadyLogged") . "</p>";
} else {

    if (!empty($_POST)) {

        $errorFields = array();
        $clean_formdata = array();

        foreach ($_POST['register'] as $property => $value) {
            $clean_formdata[$property] = clear($value);
        }

        if (User::userExistsByEMail($clean_formdata['email'])) {
            $message = new ErrorMessage(12); // E-Mail Addresse wird bereits verwendet
        } else {
            if (!isset($clean_formdata['email']) || !filter_var($clean_formdata['email'], FILTER_VALIDATE_EMAIL)) {
                $errorFields['email'] = true;
            }

            if (!isset($clean_formdata['password']) || $clean_formdata['password'] != $clean_formdata['passwordretype']) {
                $errorFields['password'] = true;
            }

            if (!isset($clean_formdata['firstname']) || !validLenght($clean_formdata['firstname'])) {
                $errorFields['firstname'] = true;
            }

            if (!isset($clean_formdata['lastname']) || !validLenght($clean_formdata['lastname'])) {
                $errorFields['lastname'] = true;
            }

            if (!isset($clean_formdata['birthdate']) || !validDate($clean_formdata['birthdate'])) {
                $errorFields['birthdate'] = true;
            }

            if (!isset($clean_formdata['street']) || !validLenght($clean_formdata['street'])) {
                $errorFields['street'] = true;
            }

            if (!isset($clean_formdata['plz']) || !validLenght($clean_formdata['plz'])) {
                $errorFields['plz'] = true;
            }

            if (!isset($clean_formdata['city']) || !validLenght($clean_formdata['city'])) {
                $errorFields['city'] = true;
            }


            if (empty($errorFields)) {
                $address = new Address($clean_formdata['street'], $clean_formdata['city'], $clean_formdata['plz']);
                $address_id = $address->saveAddress();
                $user = new User($clean_formdata['email'], $clean_formdata['password'], $clean_formdata['firstname'], $clean_formdata['lastname'], $clean_formdata['birthdate'], $address_id);
                $message = $user->createUser();
                $_POST = array();
                unset($clean_formdata);
            } else {
                $message = new ErrorMessage(11); // Bitte ueberpruefen Sie Ihres Eingaben.
            }
        }
    }


}

if (empty($_POST) || !empty($errorFields)) {
    ?>
    <div class="content flex-item flex-size-1">
        <form class="flex-size-1 flex-container" id="register" name="register" method="post">
            <div class="flex-half flex-item-1">
                <div class="flex-container-column">
                    <div class="flex-item-1 flex-size-1">
                        <h3><?php echo t('logindata') ?></h3>
                    </div>
                    <div class="flex-item-1 flex-size-1 form-row">
                        <label for="register[email]"><?php echo t('email') ?>*</label>
                        <input type="text" name="register[email]"
                               value="<?php if (isset($clean_formdata['email'])) echo $clean_formdata['email'] ?>"
                               max="50"
                               required/>
                        <?php
                        if (isset($errorFields['email'])) {
                            echo "<mark>" . t('FormEmailError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-2 flex-size-1 form-row">
                        <label for="password"><?php echo t('password') ?>*</label>
                        <input type="password" name="register[password]" required/>
                        <?php
                        if (isset($errorFields['password'])) {
                            echo "<mark>" . t('FormPasswordError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-3 flex-size-1 form-row">
                        <label for="passwordretype"><?php echo t('password_retype') ?>*</label>
                        <input type="password" name="register[passwordretype]" required/>
                    </div>
                </div>
            </div>
            <div class="flex-half flex-item-2">
                <div class="flex-container-column">
                    <div class="flex-item-1 flex-size-1">
                        <h3><?php echo t('userdata') ?></h3>
                    </div>
                    <div class="flex-item-1 flex-size-1 form-row">
                        <label for="register[firstname]"><?php echo t('firstName') ?>*</label>
                        <input type="text" name="register[firstname]"
                               value="<?php if (isset($clean_formdata['firstname'])) echo $clean_formdata['firstname'] ?>"
                               max="50"
                               required
                        />
                        <?php
                        if (isset($errorFields['firstname'])) {
                            echo "<mark>" . t('FormFirstnameError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-2 flex-size-1 form-row">
                        <label for="register[lastname]"><?php echo t('lastName') ?>*</label>
                        <input type="text" name="register[lastname]"
                               value="<?php if (isset($clean_formdata['lastname'])) echo $clean_formdata['lastname'] ?>"
                               max="50"
                               required/>
                        <?php
                        if (isset($errorFields['lastname'])) {
                            echo "<mark>" . t('FormLastnameError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-3 flex-size-1 form-row">
                        <label for="birthdate"><?php echo t('birthdate') ?>*</label>
                        <input type="date" name="register[birthdate]" id="register-date"
                               value="<?php if (isset($clean_formdata['birthdate'])) echo $clean_formdata['birthdate'] ?>"
                               required/>
                        <?php
                        if (isset($errorFields['birthdate'])) {
                            echo "<mark>" . t('FormBirtdateError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-4 flex-size-1 form-row">
                        <h3><?php echo t('address') ?></h3>
                    </div>
                    <div class="flex-item-5 flex-size-1 form-row">
                        <label for="register[street]"><?php echo t('street') ?>*</label>
                        <input type="text" name="register[street]"
                               value="<?php if (isset($clean_formdata['street'])) echo $clean_formdata['street'] ?>"
                               required/>
                    </div>
                    <div class="flex-item-6 flex-size-1 form-row">
                        <label for="register[plz]"><?php echo t('plz') ?>*</label>
                        <input type="text" name="register[plz]"
                               value="<?php if (isset($clean_formdata['plz'])) echo $clean_formdata['plz'] ?>"
                               required/>
                    </div>
                    <div class="flex-item-7 flex-size-1 form-row">
                        <label for="register[city]"><?php echo t('city') ?>*</label>
                        <input type="text" name="register[city]"
                               value="<?php if (isset($clean_formdata['city'])) echo $clean_formdata['city'] ?>"
                               required/>
                    </div>
                    <div class="flex-item-8 flex-size-1 form-row-button">
                        <button class="ui-button ui-corner-all"
                                type="submit"><?php echo t('register'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
}
