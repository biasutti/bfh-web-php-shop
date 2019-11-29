<?php


class User {

    public $uid;

    private $email;
    private $firstname;
    private $lastname;
    private $birthdate;
    private $passwordHash;
    private $address;
    private $bill_address;

    public $isAdmin;

    function __construct($email, $password, $firstname, $lastname, $birthdate, $FK_address_Id = null, $FK_bill_address_Id = null, $isAdmin = false)
    {
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthdate = $birthdate;
        $this->address = 1;
        //$this->address = Address::getAddressById($FK_address_Id);
        $this->bill_address = 1;
        //$this->bill_address = Address::getAddressById($FK_bill_address_Id);
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->isAdmin = $isAdmin;
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

    public function saveUser() {
        $res = DB::doQuery("INSERT INTO users (email, firstname, lastname, password, birthdate, FK_address_Id, FK_bill_address_Id, isAdmin) " .
            "VALUES('$this->email', '$this->firstname', '$this->lastname', '$this->passwordHash', '$this->birthdate', '1', '1', '$this->isAdmin')");
        if($res) {
            return new SuccessMessage(1);
        } else {
            echo "ERROR";
        }
    }

    /**
     * @return false|string
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }
}