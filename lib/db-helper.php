<?php
    require_once "./lib/models/User.php";

    $_MOCK_SWITCH = true;

    function getUserByEMail($email) {
        global $_MOCK_SWITCH;
        if($_MOCK_SWITCH) {
            return new User("1", "test@webshop.ch", "1234");
        } else {
            // TODO: Implement DB getUser by EMail and store UID
        }
    }


    function checkPassword($uid, $password) {
        global $_MOCK_SWITCH;
        if($_MOCK_SWITCH) {
            return true;
        } else {
            // TODO: Implement DB checkPassword
        }
    }
