<?php


class Page
{
    private $bezeichnung;
    private $mobile;
    private $login;
    private $logout;
    private $admin;

    function __construct($bezeichnung, $onlyLogin = false, $onlyLogout = false, $onlyMobile = false, $onlyAdmin = false)
    {
        $this->bezeichnung = $bezeichnung;
        $this->login = $onlyLogin;
        $this->logout = $onlyLogout;
        $this->mobile = $onlyMobile;
        $this->admin = $onlyAdmin;
    }

    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }

    public function isLogin()
    {
        return $this->login;
    }

    /**
     * @return bool
     */
    public function isMobile()
    {
        return $this->mobile;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * @return bool
     */
    public function isLogout()
    {
        return $this->logout;
    }

    public function renderNavigationEntry($class, $url) {
        echo "<li class=\"$class\"><a href=\"$url\">" . t($this->getBezeichnung()) . "</a></li>";
    }


}