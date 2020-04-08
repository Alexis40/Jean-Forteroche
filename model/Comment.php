<?php

class Comment extends AbstractEntity{

    private $_id;
    private $_idChapter;
    private $_commentContent;
    private $_dateOfPublication;
    private $_author;
    private $_report;

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
    public function getCommentContent(){
        return $this->_commentContent;
    }
    public function setCommentContent($commentContent){
        $this->_commentContent = $commentContent;
    }

    //ATTRIBUT DATEOFPUBLICATION
    public function getDateOfPublication(){
        return $this->_dateOfPublication;
    }

    public function getDateOfPublicationDMYHIS(){
        $date = $this->_dateOfPublication;
        return self::toHTMLWithHours($date);
    }
    
    public function setDateOfPublication($dateOfPublication){
        $this->_dateOfPublication = $dateOfPublication;
    }

    //ATTRIBUT AUTHOR
    public function getAuthor(){
        return $this->_author;
    }
    public function setAuthor($author){
        $this->_author = $author;
    }

    //ATTRIBUT REPORT
    public function getReport(){
        if($this->_report==1){
            $this->_report = 'Signalé';
        } else {
            $this->_report = '';
        }
        return $this->_report;
    }
    public function setReport($report){
        $this->_report = $report;
    }
}