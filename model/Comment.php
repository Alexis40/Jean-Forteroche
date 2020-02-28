<?php

class Comment extends AbstractEntity{

    private $_id;
    private $_idChapter;
    private $_content;
    private $_dateOfPublication;

    //ATTRIBUT ID
    public function getId(){
        return $this->_id;
    }
    public function setId($id){
        $this->_id = $id;
    }

    //ATTRIBUT IDCHAPTER
    public function getIdChapter(){
        return $this->_idChapter;
    }
    public function setIdChapter($idChapter){
        $this->_idChapter = $idChapter;
    }

    //ATTRIBUT CONTENT
    public function getContent(){
        return $this->_content;
    }
    public function setContent($content){
        $this->_content = $content;
    }

    //ATTRIBUT DATEOFPUBLICATION
    public function getDateOfPublication(){
        return $this->_dateOfPublication;
    }
    public function setDateOfPublication($dateOfPublication){
        $this->_dateOfPublication = $dateOfPublication;
    }
}