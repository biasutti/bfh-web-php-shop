<?php


class Address
{
    public $Id_address;
    private $street;
    private $town;
    private $zip;
    private $country;

    public static function getAddressById($id) {
        $res = DB::doQuery("SELECT * FROM address WHERE address_id = $id");
        if ($res) {
            if ($address = $res->fetch_object(get_class())) {
                return $address;
            }
        }
        return null;
    }


}