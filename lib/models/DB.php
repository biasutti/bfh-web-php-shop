<?php
require_once("./lib/helper.php");

class DB extends mysqli{

    const HOST		= "localhost";
    const DB_NAME	= "drinkshopdb";

    static private $instance;

    public function __construct() {
        global $_ENV;
        $db_user = $_ENV['DB_USER'];
        echo $db_user;

        parent::__construct(
            self::HOST, $db_user, "wasd",self::DB_NAME);
    }


    static public function getInstance() {
        if ( !self::$instance ) {
            @self::$instance = new DB();
            if(self::$instance->connect_errno > 0){
                die("Unable to connect to database [".
                    self::$instance->connect_error."]");
            }
        }
        return self::$instance;
    }

    static public function doQuery($sql) {
        // May do some exception handling right here
        return self::getInstance()->query($sql);
    }
}
