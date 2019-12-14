<?php


class Address
{
    public $Id_address;
    private $street;
    private $town;
    private $zip;
    private $country;

    public function __construct($street = null, $town = null, $zip = null, $country = "CH")
    {
        $this->street = $street;
        $this->town = $town;
        $this->zip = $zip;
        $this->country = $country;
    }

    public static function getAddressById($id) {
        $res = DB::doQuery("SELECT * FROM address WHERE address_id = $id");
        if ($res) {
            echo "addressn found";
            if ($a = $res->fetch_array()) {
                $address = new Address($a['street'], $a['zip'], $a['town'], $a['country']);
                $address->Id_address = $a['Id_address'];
                return $address;
            }
        } else {
            echo "NO addressn found";
            $dummy = new Address();
            $dummy->Id_address = 0;
            return $dummy;
        }
        return null;
    }

    public function saveAddress() {
        $select_query = "SELECT * FROM address WHERE street = '$this->street' AND zip = '$this->zip' AND town = '$this->town', AND country = '$this->country'";
        $select_res = DB::doQuery($select_query);
        if($select_res) {
            if ($select_address = $select_res->fetch_array()) {
                return $select_address['Id_address'];
            }
        } else {
            $insert_query = "INSERT INTO address (street, town, zip, country) VALUES('$this->street', '$this->town', '$this->zip', '$this->country')";
            $insert_res = DB::doQuery($insert_query);
            if ($insert_address = $insert_res->fetch_array()) {
                return $insert_address['Id_address'];
            }
        }
        return null;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @param mixed $town
     */
    public function setTown($town)
    {
        $this->town = $town;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

}