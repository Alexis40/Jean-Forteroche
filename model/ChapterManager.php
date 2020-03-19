<?php

class ChapterManager extends Model{

    /*Permet de récuperer les données par chapitre pour affichage sur la page Home, ne selectionne que les 3 derniers chapitres et les tries 
    par ordre decroisssant du chapitreNumber.*/
    public function getChapters(){
        $sql = ('SELECT * FROM chapter ORDER BY chapterNumber DESC LIMIT 3');
        $chaptersList = [];
        $statement = $this->executeQuery($sql);
        while($rs = $statement->fetch()){
            $chapter = new Chapter($rs);
            $chaptersList[]= $chapter;
        }
        return $chaptersList;
    }

    public function getAllChapters(){
        $sql = ('SELECT * FROM chapter ORDER BY chapterNumber');
        $allChaptersList = [];
        $statement = $this->executeQuery($sql);
        while($rs = $statement->fetch()){
            $chapter = new Chapter($rs);
            $allChaptersList[]= $chapter;
        }
        return $allChaptersList;
    }

    /*Permet de récuperer un chapitre donc on connais l'id*/
    public function getChapter($id){
        $sql = ('SELECT * FROM chapter WHERE id = ?');
        $args = array($id);
        $statement = $this->prepareQuery($sql, $args);
        $rs = $statement->fetch();
        if($rs!=null){
            $chapter = new Chapter($rs);
            return $chapter;
        }
        return null;
    }
    /*Permet de récuperer le chapitre qui à le dernier id dans la table.*/
    public function getLastIdChapter(){
        $sql = ('SELECT MAX(id) AS max_id FROM chapter');
        $statement = $this->executeQuery($sql);
        $rs = $statement->fetch();

        return $rs['max_id'];
    }
}