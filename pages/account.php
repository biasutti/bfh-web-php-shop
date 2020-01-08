<?php

if (!isset($_SESSION['uid'])) {
    echo "<p>" . t('accNeeded') . "</p><br><p>";
    render_basicLink(new Page("login"));
    echo "</p>";
} else {
    $user = User::getUserByUid($_SESSION['uid']);

    if (!empty($_POST)) {
        $clean_formdata = array();
        $errorFields = array();

        foreach ($_POST['account'] as $property => $value) {
            $clean_formdata[$property] = clear($value);
        }

        if (isset($clean_formdata['email']) && filter_var($clean_formdata['email'], FILTER_VALIDATE_EMAIL)) {
            $user->setEmail($clean_formdata['email']);
        } else {
            $errorFields['email'] = t('FormEmailError');
        }

        if (isset($clean_formdata['firstname']) && validLenght($clean_formdata['firstname'])) {
            $user->setFirstname($clean_formdata['firstname']);
        } else {
            $errorFields['firstname'] = t('FormFirstNameError');
        }

        if (isset($clean_formdata['lastname']) && validLenght($clean_formdata['lastname'])) {
            $user->setLastname($clean_formdata['lastname']);
        } else {
            $errorFields['lastname'] = t('FormLastNameError');
        }

        if (isset($clean_formdata['birthdate']) && validDate($clean_formdata['birthdate'])) {
            $user->setBirthdate($clean_formdata['birthdate']);
        } else {
            $errorFields['birthdate'] = t('FormBirthdateError');
        }

        if (isset($clean_formdata['street']) && validLenght(($clean_formdata['street']))) {
            $user->getAddress()->setStreet($clean_formdata['street']);
        } else {
            $errorFields['street'] = t('FormStreetError');
        }

        if (isset($clean_formdata['zipcode']) && validLenght(($clean_formdata['zipcode']))) {
            $user->getAddress()->setZip($clean_formdata['zipcode']);
        } else {
            $errorFields['zipcode'] = t('FormZipCodeError');
        }

        if (isset($clean_formdata['town']) && validLenght(($clean_formdata['town']))) {
            $user->getAddress()->setTown($clean_formdata['town']);
        } else {
            $errorFields['town'] = t('FormTownError');
        }

        if (empty($errorFields)) {
            $message = $user->updateUser();
            $_SESSION['user'] = $user;
            $_POST = array();
            unset($clean_formdata);
        } else {
            $message = new ErrorMessage(11); // Bitte ueberpruefen Sie Ihres Eingaben.
        }


    }
    ?>
    <div class="content flex-item flex-size-1">
        <form class="flex-size-1 flex-container" id="account" name="account" method="post">
            <div class="flex-half flex-item-1">
                <div class="flex-container-column">
                    <div class="flex-item-1 flex-size-1">
                        <h2><?php echo t('logindata') ?></h2>
                    </div>
                    <div class="flex-item-1 flex-size-1 form-row">
                        <label for="email">Email</label>
                        <input type="email" name="account[email]"
                               value="<?php echo $user->getEmail() ?>"
                               required>
                        <?php
                        if (isset($errorFields['email'])) {
                            echo "<mark>" . t('FormEmailError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-2 flex-size-1 form-row">
                        <label for="password"><?php echo t('password') ?></label>
                        <input type="hidden" name="account[password]" readonly/>
                        <a href="<?php echo get_pagePath('changePassword'); ?>"><?php echo t('changePassword'); ?></a>
                    </div>
                </div>
            </div>
            <div class="flex-half flex-item-2">
                <div class="flex-container-column">
                    <div class="flex-item-1 flex-size-1">
                        <h2><?php echo t('userdata') ?></h2>
                    </div>
                    <div class="flex-item-1 flex-size-1 form-row">
                        <label for="firstname"><?php echo t('firstName') ?>*</label>
                        <input type="text" name="account[firstname]"
                               value="<?php echo $user->getFirstname() ?>"
                               required/>
                        <?php
                        if (isset($errorFields['firstname'])) {
                            echo "<mark>" . t('FormFirstnameError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-2 flex-size-1 form-row">
                        <label for="lastname"><?php echo t('lastName') ?>*</label>
                        <input type="text" name="account[lastname]"
                               value="<?php echo $user->getLastname() ?>"
                               required/>
                        <?php
                        if (isset($errorFields['lastname'])) {
                            echo "<mark>" . t('FormLastnameError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-3 flex-size-1 form-row">
                        <label for="birthdate"><?php echo t('birthdate') ?>*</label>
                        <input type="date" name="account[birthdate]" id="register-date"
                               value="<?php echo $user->getBirthdate() ?>"
                               required/>
                        <?php
                        if (isset($errorFields['birthdate'])) {
                            echo "<mark>" . t('FormBirthdateError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-4 flex-size-1 form-row">
                        <h3><?php echo t('address') ?></h3>
                    </div>
                    <div class="flex-item-5 flex-size-1 form-row">
                        <label for="street"> <?php echo t('street') ?>*</label>
                        <input type="text" name="account[street]"
                               maxlength="100"
                               value="<?php echo $user->getAddress()->getStreet(); ?>"/>
                        <?php
                        if (isset($errorFields['street'])) {
                            echo "<mark>" . t('FormStreetError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-6 flex-size-1 form-row">
                        <label for="zipcode"> <?php echo t('zipcode') ?>*</label>
                        <input type="text" name="account[zipcode]"
                               maxlength="11"
                               value="<?php echo $user->getAddress()->getZip(); ?>"/>
                        <?php
                        if (isset($errorFields['zipcode'])) {
                            echo "<mark>" . t('FormZipcodeError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-7 flex-size-1 form-row">
                        <label for="town"> <?php echo t('town') ?>*</label>
                        <input type="text" name="account[town]"
                               maxlength="50"
                               value="<?php echo $user->getAddress()->getTown(); ?>"/>
                        <?php
                        if (isset($errorFields['town'])) {
                            echo "<mark>" . t('FormTownError') . "</mark>";
                        }
                        ?>
                    </div>
                    <div class="flex-item-8 flex-size-1 form-row-button">
                        <button class="ui-button ui-corner-all" type="submit"><?php echo t('save'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
}
