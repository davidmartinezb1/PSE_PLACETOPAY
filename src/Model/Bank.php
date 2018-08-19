<?php

namespace p2p\Model;

class Bank
{
    private $bankCode;
    private $bankName;

    public function __construct($bankCode, $bankName)
    {
        $this->bankCode = $bankCode;
        $this->bankName = $bankName;
    }

    
    public function getBankCode()
    {
        return $this->bankCode;
    }

    public function getBankName()
    {
        return $this->bankName;
    }


}