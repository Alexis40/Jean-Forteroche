<?php

class Member extends AbstractEntity{

    private $_id;
    private $_alias;
    private $_password;
    private $_registrationDate;

    //ATTRIBUT ID
    public function getId(){
        return $this->_id;
    }
    public function setId($id){
        $this->_id = $id;
    }

    //ATTRIBUT ALIAS
    public function getAlias(){
        return $this->_alias;
    }
    public function setAlias($alias){
        $this->_alias = $alias;
    }

    //ATTRIBUT PASSWORD
    public function getPassword(){
        return $this->_password;
    }
    public function setPassword($password){
        $this->_password = $password;
    }

    //ATTRIBUT REGISTRATIONDATE
    public function getRegistrationDate(){
        return $this->_registrationDate;
    }
    public function setRegistrationDate($registrationDate){
        $this->_registrationDate = $registrationDate;
    }
}