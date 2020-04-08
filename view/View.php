<?php

class View {
    public function render($path, $param){
        if(!empty($_SESSION)){
            $member=unserialize($_SESSION['member']);
        }
        $content = $this->renderContent($path, $param);
        extract($param);
        ob_start();
        require('view/template.php');

        return ob_get_clean();
    }

    public function renderAdmin($path, $param){
        if(!empty($_SESSION)){
            $member=unserialize($_SESSION['member']);
        }
        $content = $this->renderContent($path, $param);
        extract($param);
        ob_start();
        require('view/adminTemplate.php');

        return ob_get_clean();
    }

    public function renderContent($path, $param){
        extract($param);
        ob_start();
        require($path);

        return ob_get_clean();
    }
}