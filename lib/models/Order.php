<?php


class Order
{
    private $order_number;
    private $uid;
    private $products = [];

    public function __construct($uid, $products)
    {
        $this->uid = $uid;
        $this->products = $products;
    }

    public function getOrderByUserId()
    {

    }

    public function insertOrder()
    {
        $order_date = now();
        echo $order_date;
        $res = DB::doQuery("INSERT INTO orders (FK_user_Id, order_date) VALUES ('$this->uid', '$order_date') ");
        if ($res) {
            $this->order_number = DB::getInstance()->insert_id;
            foreach ($this->products as $item => $num) {
                $res_product = DB::doQuery("INSERT INTO orders_products (FK_order_Id, FK_product_Id, quantity) VALUES ('$this->order_number', '$item', '$num')");
                if(!$res_product) return false;
            }
            return true;
        }
    }

}