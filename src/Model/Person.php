<?php

namespace p2p\Model;

class Person
{
    private $document;
    private $documentType;
    private $firstName;
    private $lastName;
    private $company;
    private $emailAddress;
    private $city;
    private $province;
    private $phone;
    private $country;
    private $mobile;
    private $complet = false;

    public function load($attributes)
    {

        if ($this->validateAttributes($attributes)) {
            $this->document = $attributes['document'];
            $this->documentType = $attributes['documentType'];
            $this->firstName = $attributes['firstName'];
            $this->lastName = $attributes['lastName'];
            $this->company = $attributes['company'];
            $this->emailAddress = $attributes['emailAddress'];
            $this->city = $attributes['city'];
            $this->province = $attributes['province'];
            $this->phone = $attributes['phone'];
            $this->country = $attributes['country'];
            $this->mobile = $attributes['mobile'];
            $this->complet = true;
        }
    }

    public function validateAttributes($attributes)
    {
        $valid = true;

        if(is_array($attributes)){

            foreach ($attributes as $key => $value) {

                if (!isset($value)){
                    exit('paro11');
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

    public function getDocument()
    {
        return $this->document;
    }

    public function getDocumentType()
    {
        return $this->documentType;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getMobile()
    {
        return $this->mobile;
    }


}