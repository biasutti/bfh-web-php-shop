<?php


class Page
{
    private $bezeichnung;
    private $onlyMobile;
    private $protected;

    function __construct($bezeichnung, $protected = false, $onlyMobile = false)
    {
        $this->bezeichnung = $bezeichnung;
        $this->onlyMobile = $onlyMobile;
        $this->protected = $protected;
    }

    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }

    public function isProtected()
    {
        return $this->protected;
    }

    /**
     * @return bool
     */
    public function isOnlyMobile()
    {
        return $this->onlyMobile;
    }


}