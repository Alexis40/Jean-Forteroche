<?php

class View {
    public function render($path, $param){
        $content = $this->renderContent($path, $param);
        extract($param);
        ob_start();
        require('view/template.php');

        return ob_get_clean();
    }

    public function renderContent($path, $param){
        extract($param);
        ob_start();
        require($path);

        return ob_get_clean();
    }
}