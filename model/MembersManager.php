<?php

class MembersManager extends Model{
    //récuperation d'un membre de la table members
    public function getMember($memberId){
        $sql = ('SELECT * FROM members WHERE id=?');
        $args = array($memberId);
        $statement = $this->prepareQuery($sql, $args);
        $rs = $statement->fetch();
        $member = new Member($rs);
        return $member;
    }

    public function getMemberFromLoginPass($alias, $password){
        $sql = ('SELECT * FROM `members` WHERE `alias` = ? AND `password`= ? ');
        $args = array($alias, $password);
        $statement = $this->prepareQuery($sql, $args);
        $rs = $statement->fetch();
        if($rs != null){
            return new Member($rs);
        }
        return null;
    }
}