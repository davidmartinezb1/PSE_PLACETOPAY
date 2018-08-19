<?php

namespace p2p\Model;

class PSETransactionResponse
{
    private $transactionID;
    private $sessionID;
    private $returnCode;
    private $trazabilityCode;
    private $transactionCycle;
    private $bankCurrency;
    private $bankFactor;
    private $bankURL;
    private $responseCode;
    private $responseReasonCode;
    private $responseReasonText;
    private $complet = false;

    public function load($attributes)
    {
        if ($this->validateAttributes($attributes)) {
            $this->transactionID = $attributes['transactionID'];
            $this->sessionID = $attributes['sessionID'];
            $this->returnCode = $attributes['returnCode'];
            $this->trazabilityCode = $attributes['trazabilityCode'];
            $this->transactionCycle = $attributes['transactionCycle'];
            $this->bankCurrency = $attributes['bankCurrency'];
            $this->bankFactor = $attributes['bankFactor'];
            $this->bankURL = $attributes['bankURL'];
            $this->responseCode = $attributes['responseCode'];
            $this->responseReasonCode = $attributes['responseReasonCode'];
            $this->responseReasonText = $attributes['responseReasonText'];
            $this->complet = true;
        }
    }

    public function validateAttributes($attributes)
    {
        $valid = true;

        if(is_array($attributes)){

            foreach ($attributes as $key => $value) {

                if (!isset($value)){
                    $valid = false;
                }

            }

        } else {
            $valid = false;
        }

        return $valid;
    }

    public function isComplet()
    {
        return $this->complet;
    }

    public function getTransactionID()
    {
        return $this->transactionID;
    }

    public function getSessionID()
    {
        return $this->sessionID;
    }

    public function getReturnCode()
    {
        return $this->returnCode;
    }

    public function getTrazabilityCode()
    {
        return $this->trazabilityCode;
    }

    public function getTransactionCycle()
    {
        return $this->transactionCycle;
    }

    public function getBankCurrency()
    {
        return $this->bankCurrency;
    }

    public function getBankFactor()
    {
        return $this->bankFactor;
    }

    public function getBankURL()
    {
        return $this->bankURL;
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }

    public function getResponseReasonCode()
    {
        return $this->responseReasonCode;
    }

    public function getResponseReasonText()
    {
        return $this->responseReasonText;
    }


}