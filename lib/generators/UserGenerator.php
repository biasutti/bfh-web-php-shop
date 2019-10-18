<?php
require_once "./lib/models/User.php";

class UserGenerator
{
    function __construct()
    {
    }

    public function generate()
    {
        return new User("1", "test@webshop.ch", "1234");
    }

}