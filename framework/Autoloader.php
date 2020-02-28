<?php

class Autoloader{

    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($className){
        if(file_exists('controller/' . $className . '.php')){
            require_once 'controller/' . $className . '.php';
        } elseif(file_exists('model/' . $className . '.php')){
            require_once 'model/' . $className . '.php';
        } elseif(file_exists('view/' . $className . '.php')){
            require_once 'view/' . $className . '.php';
        } else {
            echo 'Le fichier demander n\'existe pas';
        }         
    }
}