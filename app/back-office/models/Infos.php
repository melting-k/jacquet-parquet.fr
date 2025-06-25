<?php

class Infos extends BaseMethods
{

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    private $_id_infos;

    public function id_infos()
    {
        return $this->_id_infos;
    }

    public function setId_infos($value)
    {
        $this->_id_infos = $this->integer($value);
    }

    private $_client_name;

    public function client_name()
    {
        return $this->_client_name;
    }

    public function setClient_name($value)
    {
        $this->_client_name = $this->string($value);
    }

    private $_site_domain;

    public function site_domain()
    {
        return $this->_site_domain;
    }

    public function setSite_domain($value)
    {
        $this->_site_domain = $this->string($value);
    }

    private $_site_url;

    public function site_url()
    {
        return $this->_site_url;
    }

    public function setSite_url($value)
    {
        $this->_site_url = $this->valid_url($value);
    }

    private $_site_email;

    public function site_email()
    {
        return $this->_site_email;
    }

    public function setSite_email($value)
    {
        $this->_site_email = $this->mailAddress($value);
    }

    private $_social_links;

    public function social_links()
    {
        return $this->_social_links;
    }

    public function setSocial_links($value)
    {
        $this->_social_links = $this->array_or_string($value);
    }

    private $_adresses;

    public function adresses()
    {
        return $this->_adresses;
    }

    public function setAdresses($value)
    {
        $this->_adresses = $this->array_or_string($value);
    }

    private $_opening_hours;

    public function opening_hours()
    {
        return $this->_opening_hours;
    }

    public function setOpening_hours($value)
    {
        $this->_opening_hours = $this->array_or_string($value);
    }

    private $_phone_number;

    public function phone_number()
    {
        return $this->_phone_number;
    }

    public function setPhone_number($value)
    {
        $this->_phone_number = $this->string($value);
    }

}
