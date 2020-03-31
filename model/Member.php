<?php

class Member extends AbstractEntity{

    private $_id;
    private $_pseudo;
    private $_pass;
    private $_registrationDate;
    private $_type;

    //ATTRIBUT ID
    public function getId(){
        return $this->_id;
    }
    public function setId($id){
        $this->_id = $id;
    }

    //ATTRIBUT PSEUDO
    public function getPseudo(){
        return $this->_pseudo;
    }
    public function setPseudo($pseudo){
        $this->_pseudo = $pseudo;
    }

    //ATTRIBUT PASSWORD
    public function getPass(){
        return $this->_pass;
    }
    public function setPass($pass){
        $this->_pass = $pass;
    }

    //ATTRIBUT REGISTRATIONDATE
    public function getRegistrationDate(){
        return $this->_registrationDate;
    }
    public function setRegistrationDate($registrationDate){
        $this->_registrationDate = $registrationDate;
    }

    //ATTRIBUT TYPE
    public function getType(){
        return $this->_type;
    }
    public function setType($type){
        $this->_type = $type;
    }
}