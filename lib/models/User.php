<?php


class User {
    public $uid;
    public $email;
    public $passwordHash;
    public $isAdmin;

    function __construct($uid, $email, $password)
    {
        $this->uid = $uid;
        $this->email = $email;
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->isAdmin = true;
    }
}