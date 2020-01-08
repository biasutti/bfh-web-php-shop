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
        $order_date = date("Y-m-d H:m:s");
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

    static public function renderAllOrders(){
      $orders = array();
      $res = DB::doQuery("SELECT * FROM orders");
      if($res){
        while ($o = $res->fetch_array()) {
            $order['id'] = $o['Id_order'];
            $user = User::getUserByUid($o['FK_user_Id']);
            $order['uid'] = $o['FK_user_Id'];
            $order['userLastname'] = $user->getLastname();
            $order['userFirstname'] = $user->getFirstname();
            $order['date'] = $o['order_date'];
            $order['Prod'] = Order::getOrderProdNameByOrderId($o['Id_order']);
            $orders[] = $order;
        }
      }
      return $orders;
    }

    public static function getOrderProdNameByOrderId($id){
      $ordersProduct = array();
      $queryOrderProd = DB::doQuery("SELECT * FROM orders_products WHERE FK_order_Id = $id ");
      if($queryOrderProd){
        while ($op = $queryOrderProd->fetch_array()) {
            $ordered['prod'] = Product::getProductById($op['FK_product_Id'])->name_de;
            $ordered['quantity'] = $op['quantity'];
            $ordersProduct[] = $ordered;
        }
      }
      return $ordersProduct;
    }

}
