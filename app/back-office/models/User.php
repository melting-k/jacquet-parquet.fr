<?php

class User extends BaseMethods
{

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    private $_id_user;

    public function id_user()
    {
        return $this->_id_user;
    }

    public function setId_user($value)
    {
        $this->_id_user = $this->integer($value);
    }

    private $_user_type;

    public function user_type()
    {
        return $this->_user_type;
    }

    public function setUser_type($value)
    {
        $this->_user_type = $this->string($value);
    }

    private $_lastname;

    public function lastname()
    {
        return $this->_lastname;
    }

    public function setLastname($value)
    {
        $this->_lastname = $this->string($value);
    }

    private $_firstname;

    public function firstname()
    {
        return $this->_firstname;
    }

    public function setFirstname($value)
    {
        $this->_firstname = $this->string($value);
    }

    private $_email;

    public function email()
    {
        return $this->_email;
    }

    public function setEmail($value)
    {
        $this->_email = $this->mailAddress($value);
    }

    private $_password;

    public function password()
    {
        return $this->_password;
    }

    public function setPassword($value)
    {
        $this->_password = $this->string($value);
    }

    
    public function hash() {
        $this->setPassword(password_hash($this->_password,PASSWORD_DEFAULT));
    }
}
