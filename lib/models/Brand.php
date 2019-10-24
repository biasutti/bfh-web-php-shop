<?php


class Brand {
    public $bid;
    public $name;

    public function __construct($bid, $name)
    {
        $this->bid = $bid;
        $this->name = $name;
    }

}
