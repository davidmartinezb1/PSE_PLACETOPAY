<?php

namespace p2p\Model;

class TransactionInformation
{
    private $transactionID;
    private $sessionID;
    private $reference;
    private $requestDate;
    private $bankProcessDate;
    private $onTest;
    private $returnCode;
    private $trazabilityCode;
    private $transactionCycle;
    private $transactionState;
    private $responseCode;
    private $responseReasonCode;
    private $responseReasonText;
    private $complet = false;

    
    public function load($attributes)
    {
        if ($this->validateAttributes($attributes)) {
            $this->transactionID = $attributes['transactionID'];
            $this->sessionID = $attributes['sessionID'];
            $this->reference = $attributes['reference'];
            $this->requestDate = $attributes['requestDate'];
            $this->bankProcessDate = $attributes['bankProcessDate'];
            $this->onTest = $attributes['onTest'];
            $this->returnCode = $attributes['returnCode'];
            $this->trazabilityCode = $attributes['trazabilityCode'];
            $this->transactionCycle = $attributes['transactionCycle'];
            $this->transactionState = $attributes['transactionState'];
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

    public function getReference()
    {
        return $this->reference;
    }
    
    public function getRequestDate()
    {
        return $this->requestDate;
    }
    
    public function getBankProcessDate()
    {
        return $this->bankProcessDate;
    }
    
    public function getOnTest()
    {
        return $this->onTest;
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
    
    public function getTransactionState()
    {
        return $this->transactionState;
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