<?php


class Page
{
    private $bezeichnung;
    private $protected;

    function __construct($bezeichnung, $protected = false)
    {
        $this->bezeichnung = $bezeichnung;
        $this->protected = $protected;
    }

    public function getBezeichnung() {
        return $this->bezeichnung;
    }

    public function isProtected() {
        return $this->protected;
    }


}