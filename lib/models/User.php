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

    public static function getUserByEMail($email) {
        $res = DB::doQuery("SELECT * FROM users WHERE email = $email");
        if ($res) {
            if ($user = $res->fetch_object(get_class())) {
                return $user;
            }
        }
        return null;
    }

    public static function saveUser($user) {

    }
}