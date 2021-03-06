<?php


class Type
{
    public $Id_type;
    public $name;

    static public function getAllTypes()
    {
        $types = array();
        $res = DB::doQuery("SELECT * FROM types");
        if ($res) {
            while ($type = $res->fetch_object(get_class())) {
                //$prod->imgSrc = "./img/products/".$prod->imgSrc;
                $types[] = $type;
            }
        }
        return $types;
    }

    static public function getTypeById($id)
    {
        $id = (int)$id;
        $res = DB::doQuery("SELECT * FROM types WHERE Id_type = $id");
        if ($res) {
            if ($type = $res->fetch_object(get_class())) {
                return $type;
            }
        }
        return null;
    }

    static public function insertType($name)
    {
        DB::doQuery("INSERT INTO types (name) VALUES ('$name') ");
    }

    static public function removeTypeById($id)
    {
        DB::doQuery("DELETE FROM types WHERE types.Id_type = $id ");
    }

    static public function isTypeLinked($id)
    {
        $res = DB::doQuery("SELECT * FROM types RIGHT JOIN products ON types.Id_type = products.FK_type_Id WHERE types.Id_type = $id");
        //return false if no rows affected on the selcet
        return $res->num_rows != 0;
    }

}
