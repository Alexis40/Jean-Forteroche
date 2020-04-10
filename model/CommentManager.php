<?php
class CommentManager extends Model{

    public function getAllComments(){
        $sql = ('SELECT * FROM comments ORDER BY report DESC');
        $allCommentsList = [];
        $statement = $this->executeQuery($sql);
        while($rs = $statement->fetch()){
            $comment = new Comment($rs);
            $allCommentsList[]= $comment;
        }
        return $allCommentsList;
    }

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
        $sql = ('INSERT INTO comments(idChapter, commentContent, author, dateOfPublication)VALUES(?,?,?, NOW())');
        $args = array($comment->getIdChapter(), $comment->getCommentContent(), $comment->getAuthor());
        return $this->prepareQuery($sql, $args);
    }

    /*SUPPRESSION COMPLÈTE D'UN COMMENTAIRE*/
    public function deleteComment($idDeleteComment){
        $sql = ('DELETE FROM comments WHERE id=?');
        $args = array($idDeleteComment);
        return $this->prepareQuery($sql, $args);
   }

   /*CHANGEMENT DU STATUT DU REPORT*/
   public function modifyReport($idModifyReport){
       $sql = ('UPDATE comments SET report=0 WHERE id=?');
       $args = array($idModifyReport);
       return $this->prepareQuery($sql, $args);
   }
}




