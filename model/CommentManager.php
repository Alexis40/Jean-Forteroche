<?php
class CommentManager extends Model{

    /*Permet de récupérer les commentaires*/
    public function getComments($id){
        $sql = ('SELECT * FROM comments WHERE idChapter = ?');
        $commentList = [];
        $statement = $this->prepareQuery($sql, $id);
        while($rs = $statement->fetch()){
            $comment = new Comment($rs);
            $commentList[] = $comment;
        }
        return $commentList;
    }
}




