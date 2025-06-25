<?php

class Legals extends BaseMethods
{

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    private $_id_legals;

    public function id_legals()
    {
        return $this->_id_legals;
    }

    public function setId_legals($value)
    {
        $this->_id_legals = $this->integer($value);
    }

    private $_denomination;

    public function denomination()
    {
        return $this->_denomination;
    }

    public function setDenomination($value)
    {
        $this->_denomination = $this->string($value);
    }

    private $_publication_manager;

    public function publication_manager()
    {
        return $this->_publication_manager;
    }

    public function setPublication_manager($value)
    {
        $this->_publication_manager = $this->string($value);
    }

    private $_ceo;

    public function ceo()
    {
        return $this->_ceo;
    }

    public function setCeo($value)
    {
        $this->_ceo = $this->string($value);
    }

    private $_ceo_role;

    public function ceo_role()
    {
        return $this->_ceo_role;
    }

    public function setCeo_role($value)
    {
        $this->_ceo_role = $this->string($value);
    }

    private $_company_type;

    public function company_type()
    {
        return $this->_company_type;
    }

    public function setCompany_type($value)
    {
        $this->_company_type = $this->string($value);
    }

    private $_rcs;

    public function rcs()
    {
        return $this->_rcs;
    }

    public function setRcs($value)
    {
        $this->_rcs = $this->string($value);
    }

    private $_siret;

    public function siret()
    {
        return $this->_siret;
    }

    public function setSiret($value)
    {
        $this->_siret = $this->string($value);
    }

    private $_address;

    public function address()
    {
        return $this->_address;
    }

    public function setAddress($value)
    {
        $this->_address = $this->string($value);
    }

    private $_zipcode;

    public function zipcode()
    {
        return $this->_zipcode;
    }

    public function setZipcode($value)
    {
        $this->_zipcode = $this->string($value);
    }

    private $_city;

    public function city()
    {
        return $this->_city;
    }

    public function setCity($value)
    {
        $this->_city = $this->string($value);
    }

    private $_email_manager;

    public function email_manager()
    {
        return $this->_email_manager;
    }

    public function setEmail_manager($value)
    {
        $this->_email_manager = $this->mailAddress($value);
    }

    private $_phone_manager;

    public function phone_manager()
    {
        return $this->_phone_manager;
    }

    public function setPhone_manager($value)
    {
        $this->_phone_manager = $this->string($value);
    }

}
