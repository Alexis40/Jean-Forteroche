<?php

class MembersManager extends Model{
    //récuperation d'un membre de la table members
    public function getMemberByPseudo($pseudo){
        $sql = ('SELECT * FROM members WHERE pseudo=?');
        $args = array($pseudo);
        $statement = $this->prepareQuery($sql, $args);
        $rs = $statement->fetch();
        $member = new Member($rs);
        return $member;
    }

    public function getMemberFromLoginPass($pseudo, $password){
        $sql = ('SELECT * FROM members WHERE pseudo = ? AND pass= ? ');
        $args = array($pseudo, $password);
        $statement = $this->prepareQuery($sql, $args);
        $rs = $statement->fetch();
        if($rs != null){
            return new Member($rs);
        }
        return null;
    }

    public function addMember($newMember){
        $sql = ('INSERT INTO members(pseudo, pass, registrationDate) value (?, ?, CURRENT_TIMESTAMP())');
        $args = array($newMember->getPseudo(), $newMember->getPass());
        return $this->prepareQuery($sql, $args);
    }
}