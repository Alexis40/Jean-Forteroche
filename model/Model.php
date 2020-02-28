<?php

abstract class Model{
    //Création d'un attribut pour la connexion à la base de données.
    private $_db;
    //Fonction d'execution d'une requète simple.
    protected function executeQuery($sql){
        $req = $this->getDb()->query($sql);
        return $req;
    }
    //Fonction de création d'une requète préparé. $sql correspond à la requète qui sera ecrit dans chapterManager.
    protected function prepareQuery($sql, $id){
        $req = $this->getDb()->prepare($sql);
        $req->execute(array($id));
        return $req;
    }

    //Definition de la base de données.
    private function getDb(){
        if($this->_db == null){
            $this->_db = new PDO('mysql:host=localhost;dbname=Projet 4_Blog Jean Forteroche;charset=utf8','root','963951');
        }
        return $this->_db;
    }
}