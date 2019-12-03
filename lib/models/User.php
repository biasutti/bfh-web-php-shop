<?php


class User {

    public $uid;

    private $email;
    private $firstname;
    private $lastname;
    private $birthdate;
    private $password;
    private $address;
    private $bill_address;
    private $isAdmin;

    function __construct($email, $password, $firstname, $lastname, $birthdate, $FK_address_Id = null, $FK_bill_address_Id = null, $isAdmin = false)
    {
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthdate = $birthdate;
        $this->address = $FK_address_Id;
        //$this->address = Address::getAddressById($FK_address_Id);
        $this->bill_address = $FK_bill_address_Id;
        //$this->bill_address = Address::getAddressById($FK_bill_address_Id);
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }

    public static function getUserByEMail($email) {
        $email = (string)$email;
        $res = DB::doQuery("SELECT * FROM users WHERE email = '$email'");
        if ($res) {
            if ($res = $res->fetch_array()) {
                $user = new User($res['email'], $res['password'], $res['firstname'], $res['lastname'], $res['birthdate'], $res['FK_address_Id'], $res['FK_bill_address_Id'], $res['isAdmin']);
                $user->uid = $res['Id_user'];
                return $user;
            }
        }
        return null;
    }

    public static function userExistsByEMail($email) {
        $email = (string)$email;
        $res = DB::doQuery("SELECT * FROM users WHERE email = '$email'");
        if($res) {
            return $res->num_rows > 0;
        }
    }

    public static function getUserByUid($uid) {
        $uid = (int)$uid;
        $res = DB::doQuery("SELECT * FROM users WHERE Id_user = '$uid'");
        if ($res) {
            if ($res = $res->fetch_array()) {
                $user = new User($res['email'], $res['password'], $res['firstname'], $res['lastname'], $res['birthdate'], $res['FK_address_Id'], $res['FK_bill_address_Id'], $res['isAdmin']);
                $user->uid = $res['Id_user'];
                return $user;
            }
        }
        return null;
    }

    public function createUser() {
        $password = password_hash($this->password, PASSWORD_DEFAULT);
        $res = DB::doQuery("INSERT INTO users (email, firstname, lastname, password, birthdate, isAdmin) " .
            "VALUES('$this->email', '$this->firstname', '$this->lastname', '$password', '$this->birthdate', '$this->isAdmin')");
        if($res) {
            return new SuccessMessage(1);
        } else {
            echo "ERROR";
        }
    }

    public function addAddress($address) {
        $res = DB::doQuery();
    }

    /**
     * @return false|string
     */
    public function getPasswordHash()
    {
        return $this->password;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->isAdmin;
    }


}