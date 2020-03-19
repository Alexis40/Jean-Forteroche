<?php
class CommentManager extends Model{

    /*Permet de récupérer les commentaires*/
    public function getComments($id){
        $sql = ('SELECT * FROM comments WHERE idChapter = ?');
        $commentList = [];
        $args = array($id);
        $statement = $this->prepareQuery($sql, $args);
        while($rs = $statement->fetch()){
            $comment = new Comment($rs);
            $commentList[] = $comment;
        }
        return $commentList;
    }

    /*Permet d'insérer un commentaire dans la base*/
    public function postComment($comment){
        $args = array($comment->getIdChapter(), $comment->getContent(), $comment->getAuthor());
        $sql = ('INSERT INTO comments(idChapter, content, author, dateOfPublication)VALUES(?,?,?, NOW())');
        return $this->prepareQuery($sql, $args);
    }
}




