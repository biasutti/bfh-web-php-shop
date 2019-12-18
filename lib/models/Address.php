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

    public static function getAddressById($id)
    {
        $res = DB::doQuery("SELECT * FROM address WHERE Id_address = $id");
        if ($res->num_rows > 0) {
            if ($a = $res->fetch_array()) {
                $address = new Address($a['street'], $a['town'], $a['zip'], $a['country']);
                $address->Id_address = $a['Id_address'];
                return $address;
            }
        } else {
            $dummy = new Address();
            $dummy->Id_address = 0;
            return $dummy;
        }
        return null;
    }

    public static function getAddressByProperies($street, $zip, $town, $country)
    {
        $select_query = "SELECT * FROM address WHERE street = '$street' AND zip = '$zip' AND town = '$town' AND country = '$country'";
        $select_res = DB::doQuery($select_query);
        if ($select_res->num_rows > 0) {
            if ($select_address = $select_res->fetch_array()) {
                return $select_address['Id_address'];
            }
        }
        return 0;
    }

    public function saveAddress()
    {
        $address_id = self::getAddressByProperies($this->street, $this->zip, $this->town, $this->country);
        if($address_id == 0) {
            $insert_query = "INSERT INTO address (street, town, zip, country) VALUES('$this->street', '$this->town', '$this->zip', '$this->country')";
            $insert_res = DB::doQuery($insert_query);
            if ($insert_res) {
               return self::getAddressByProperies($this->street, $this->zip, $this->town, $this->country);
            }
        }
        return $address_id;
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

    /**
     * @return null
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @return null
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return null
     */
    public function getTown()
    {
        return $this->town;
    }

}