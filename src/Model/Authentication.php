<?php

namespace p2p\Model;


class Authentication
{
    private $login;
    private $tranKey;
    private $seed;
    private $additional;

    public function __construct($login, $tranKey, $additional = null)
    {
        $this->login = $login;
        $this->seed = date('c');// timestamp para la semilla
        $this->tranKey = sha1($this->seed . $tranKey, false);
        $this->additional = ($additional) ? $additional : null;
    }
    
    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    
    public function getTranKey()
    {
        return $this->tranKey;
    }

    public function setTranKey($tranKey)
    {
        $this->tranKey = $tranKey;
    }
    
    public function getAdditional()
    {
        return $this->additional;
    }

    public function setAdditional($additional)
    {
        $this->additional = $additional;
    }

}