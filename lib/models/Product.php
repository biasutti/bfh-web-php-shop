<?php


class Product {
    public $pid;
    public $name;
    public $type;
    public $brandId;
    public $price;
    //image source, reference from products folder : ./img/products/
    public $imgSrc;
    public $alcPercent;
    public $energy;

    public function __construct($pid, $name, $type, $brandId, $price, $imgSrc, $alcPercent,$energy)
    {
        $this->pid = $pid;
        $this->name = $name;
        $this->type = $type;
        $this->brandId = $brandId;
        $this->price = $price;
        $this->imgSrc = "./img/products/".$imgSrc;
        $this->alcPercent = $alcPercent;
        $this->energy = $energy . " kcal";
    }

}
