<?php

namespace p2p\Model;

use p2p\Model\Person;

class PSETransactionRequest
{
    private $bankCode;
    private $bankInterface;
    private $returnURL;
    private $reference;
    private $description;
    private $language;
    private $currency;
    private $totalAmount;
    private $taxAmount;
    private $devolutionBase;
    private $tipAmount;
    private $payer;
    private $buyer;
    private $shipping;
    private $ipAddress;
    private $userAgent;
    private $additionalData;
    private $complet = false;

    
    public function load($attributes)
    {
        
        if (is_array($attributes) && $this->validateAttributes($attributes)) {
            $this->bankCode = $attributes['bankCode'];
            $this->bankInterface = $attributes['bankInterface'];
            $this->returnURL = $attributes['returnURL'];
            $this->reference = $attributes['reference'];
            $this->description = $attributes['description'];
            $this->language = $attributes['language'];
            $this->currency = $attributes['currency'];
            $this->totalAmount = $attributes['totalAmount'];
            $this->taxAmount = $attributes['taxAmount'];
            $this->devolutionBase = $attributes['devolutionBase'];
            $this->tipAmount = $attributes['tipAmount'];
            $this->payer = $attributes['payer'];
            $this->buyer = $attributes['buyer'];
            $this->shipping = $attributes['shipping'];
            $this->additionalData = $attributes['additionalData'];
            $this->ipAddress = $attributes['ipAddress'];
            $this->userAgent = $attributes['userAgent'];
            $this->complet = true;
        }

    }

    public function validateAttributes($attributes)
    {
        $valid = true;

        $personas = array("payer", "buyer", "shipping");

        foreach ($attributes as $key => $value) {
            
            if (!isset($value)){

                if ($key != 'additionalData') {
                    $valid = false;  
                }

            }

            if (in_array($key,$personas)){

                if (!$this->validate($value)) {
                    $valid = false;
                }
            }
        }

        return $valid;
    }
    
    public function validate($data)
    {
        $valid = true;

        if (!($data instanceof Person)) {

            $valid = false;

        }

        return $valid;
    }

    public function isComplet()
    {
        return $this->complet;
    }

    
    public function getBankCode()
    {
        return $this->bankCode;
    }

    
    public function getBankInterface()
    {
        return $this->bankInterface;
    }

    
    public function getReturnURL()
    {
        return $this->returnURL;
    }

    
    public function getReference()
    {
        return $this->reference;
    }

    
    public function getDescription()
    {
        return $this->description;
    }

    
    public function getLanguage()
    {
        return $this->language;
    }

    
    public function getCurrency()
    {
        return $this->currency;
    }

    
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    
    public function getDevolutionBase()
    {
        return $this->devolutionBase;
    }

    
    public function getTipAmount()
    {
        return $this->tipAmount;
    }

    
    public function getPayer()
    {
        return $this->payer;
    }

    
    public function getBuyer()
    {
        return $this->buyer;
    }

    
    public function getShipping()
    {
        return $this->shipping;
    }

    
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    
    public function getAdditionalData()
    {
        return $this->additionalData;
    }

    
    public function setBankCode($bankCode)
    {
        $this->bankCode = $bankCode;
    }

    
    public function setBankInterface($bankInterface)
    {
        $this->bankInterface = $bankInterface;
    }

    
    public function setReturnURL($returnURL)
    {
        $this->returnURL = $returnURL;
    }

    
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }

    
    public function setTaxAmount($taxAmount)
    {
        $this->taxAmount = $taxAmount;
    }

    
    public function setDevolutionBase($devolutionBase)
    {
        $this->devolutionBase = $devolutionBase;
    }

    
    public function setTipAmount($tipAmount)
    {
        $this->tipAmount = $tipAmount;
    }

    
    public function setPayer($payer)
    {
        $this->payer = $payer;
    }

    
    public function setBuyer($buyer)
    {
        $this->buyer = $buyer;
    }

    
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
    }

    
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    
    public function setAdditionalData($additionalData)
    {
        $this->additionalData = $additionalData;
    }


}