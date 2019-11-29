<?php
require_once("lib/db-helper.php");

if (!isset($_SESSION['uid'])) {
    echo "<p>".t('accNeeded')."</p><br><p>";
    render_basicLink(new Page("login"));
    echo "</p>";
} else {

    // Form validation
    $errArray = array(); // An array holding the form errArray
    // Validate form
    if (count($_POST) > 0) {
        // Validate email
        if (!isset($_POST['user']['email']) || !filter_var($_POST['user']['email'], FILTER_VALIDATE_EMAIL)) {
            $errArray['email'] = t('FormEmailError');
        }
        // Validate firstname
        if (!isset($_POST['user']['firstname']) || $_POST['user']['firstname'] == '') {
            $errArray['firstname'] = t('FormFirstNameError');
        }
        //validate lastname
        if (!isset($_POST['user']['lastname']) || $_POST['user']['lastname'] == '') {
            $errArray['lastname'] = t('FormLastNameError');
        }
        //validate street
        if (!isset($_POST['user']['street']) || $_POST['user']['street'] == '') {
            $errArray['street'] = t('FormStreetError');
        }
        //validate street
        if (!isset($_POST['user']['city']) || $_POST['user']['city'] == '') {
            $errArray['city'] = t('FormCityError');
        }
    }

    $errFirstName = isset($errArray['firstname']) ? $errArray['firstname'] : '';
    $errLastName = isset($errArray['lastname']) ? $errArray['lastname'] : '';
    $errEmail = isset($errArray['email']) ? $errArray['email'] :'';
    $errStreet = isset($errArray['street']) ? $errArray['street'] :'';
    $errCity = isset($errArray['city']) ? $errArray['city'] :'';

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
                        <input type="email" name="user[email]" required>
                        <mark><?php echo $errEmail;?></mark>
                    </div>
                    <div class="flex-item-2 flex-size-1 form-row">
                        <label for="password"><?php echo t('password') ?></label>
                        <input type="hidden" name="user[password]" readonly />
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
                        <label for="firstname"><?php echo t('firstName') ?></label>
                        <input type="text" name="user[firstname]" required/>
                        <mark><?php echo $errFirstName;?></mark>
                    </div>
                    <div class="flex-item-2 flex-size-1 form-row">
                        <label for="lastname"><?php echo t('lastName') ?></label>
                        <input type="text" name="user[lastname]" required/>
                        <mark><?php echo $errLastName;?></mark>
                    </div>
                    <div class="flex-item-3 flex-size-1 form-row">
                        <label for="street"><?php echo t('street') ?></label>
                        <input type="text" name="user[street]" required/>
                        <mark><?php echo $errStreet;?></mark>
                    </div>
                    <div class="flex-item-4 flex-size-1 form-row">
                        <label for="city"><?php echo t('city') ?></label>
                        <input type="text" name="user[city]" required/>
                        <mark><?php echo $errCity;?></mark>
                    </div>
                    <div class="flex-item-5 flex-size-1 form-row-button">
                        <button class="ui-button ui-corner-all" type="submit"><?php echo t('save'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
}
