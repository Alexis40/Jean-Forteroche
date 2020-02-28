<?php

class Chapter extends AbstractEntity{

    private $_id;
    private $_chapterNumber;
    private $_chapterName;
    private $_content;
    private $_dateOfPublication;

//ATTRIBUT $_ID
    public function getId(){
        return $this->_id;
    }
    public function setId($id){
        $this->_id = $id;
    }

//ATTRIBUT $_CHAPTERNUMBER.
    public function getChapterNumber(){
        return $this->_chapterNumber;
    }
    public function setChapterNumber($chapterNumber){
        $this->_chapterNumber = $chapterNumber;
    }

//ATTRIBUT $_CHAPTERNAME.
    public function getChapterName(){
        return $this->_chapterName;
    }
    public function setChapterName($chapterName){
        $this->_chapterName = $chapterName;
    }

//ATTRIBUT $_CONTENT.
    public function getAllContent(){
        return $this->_content;
    }
    public function getShortContent(){
        return substr($this->_content, 0, 500);
    }
    public function setContent($content){
        $this->_content = $content;
    }

//ATTRIBUT $_DATEOFPUBLICATION.
    public function getDateOfPublication(){
        return $this->_dateOfPublication;
    }

    public function getDateOfPublicationDMY(){
        $date = $this->_dateOfPublication;
        return self::toHTML($date);
    }

    public function setDateOfPublication($dateOfPublication){
        $this->_dateOfPublication = $dateOfPublication;
    }
  
}