<?php


class Product {
    public $pid;
    public $name;
    public $type;
    public $brand;
    public $price;
    //image source, reference from products folder : ./img/products/
    public $imgSrc;

    public function __construct($pid, $name, $type, $brand, $price, $imgSrc)
    {
        $this->pid = $pid;
        $this->name = $name;
        $this->type = $type;
        $this->brand = $brand;
        $this->price = $price;
        $this->imgSrc = "./img/products/".$imgSrc;
    }

}
