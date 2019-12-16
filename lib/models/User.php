<?php


class User
{

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
        $this->address = Address::getAddressById($FK_address_Id);
        $this->bill_address = $FK_bill_address_Id;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }

    public static function getUserByEMail($email)
    {
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

    public static function getUserByUid($uid)
    {
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

    public static function getAllUsers()
    {
        $users = array();
        $res = DB::doQuery("SELECT * FROM users");
        if ($res) {
            while ($u = $res->fetch_array(MYSQLI_ASSOC)) {
                $user = new User($u['email'], $u['password'], $u['firstname'], $u['lastname'], $u['birthdate'], $u['FK_address_Id'], $u['FK_bill_address_Id'], $u['isAdmin']);
                $user->uid = $u['Id_user'];
                $users[] = $user;
            }
        }
        return $users;
    }

    public static function toggleAdminById($id)
    {
        if (User::getUserByUid($id)->isAdmin()) {
            DB::doQuery("UPDATE users SET isAdmin = 0 WHERE Id_user = $id");
        } else {
            DB::doQuery("UPDATE users SET isAdmin = 1 WHERE Id_user = $id");
        }
    }

    public static function userExistsByEMail($email)
    {
        $email = (string)$email;
        $res = DB::doQuery("SELECT * FROM users WHERE email = '$email'");
        if ($res) {
            return $res->num_rows > 0;
        }
    }

    public function createUser()
    {
        $password = password_hash($this->password, PASSWORD_DEFAULT);
        $fk_address = $this->address->Id_address;
        $res = DB::doQuery("INSERT INTO users (email, firstname, lastname, password, birthdate, FK_address_Id, isAdmin) " .
            "VALUES('$this->email', '$this->firstname', '$this->lastname', '$password', '$this->birthdate', '$fk_address', '$this->isAdmin')");
        if ($res) {
            return new SuccessMessage(1);
        } else {
            return new ErrorMessage(13); // TODO: Check DB error
        }
    }

    public function updateUser()
    {
        $uid = (int)$this->uid;
        $res = DB::doQuery("UPDATE users SET " .
            "email = '" . $this->email . "'," .
            "firstname = '" . $this->firstname . "'," .
            "lastname = '" . $this->lastname . "'," .
            "birthdate = '" . $this->birthdate . "'," .
            "FK_address_Id = '" . $this->address->saveAddress() . "'" .
            "WHERE Id_user = '" . $uid . "';");

        if ($res) {
            return new SuccessMessage(1);
        } else {
            return new ErrorMessage(13); // TODO: Check DB error
        }
    }

    public function addAddress($address)
    {
        $res = DB::doQuery();
    }

    /**
     * @return false|string
     */
    public function getPasswordHash()
    {
        return $this->password;
    }

    public function getFirstname()
    {
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

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return null
     */
    public function getBillAddress()
    {
        return $this->bill_address;
    }

    /**
     * @param Address|null $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }


}
