<?php

class Post extends database{


    function getPosts(){
        $sql = "SELECT p.`id_p`, p.`image`, p.`content`,p.date_ajout , p.`likes`, u.nom ,u.email  FROM `post` p inner join user u on u.id_u=p.id_user order by id_p desc";
        $stmt=$this->openConnection()->query($sql);
        $data=$stmt->fetchAll();
        return $data;
    }
    function add_post($id,$status,$image){
        $sql = "INSERT INTO `post`(`image`, `content`, `likes`,`id_user`) VALUES (:image,:status,:likes,:id_user)";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':status', $status);
        $likes=0;
        $stmt->bindParam(':likes', $likes);
        $stmt->bindParam(':id_user',$id);
        if($stmt->execute()){
            return true;
        }
    }

    function addlike($id){
        $sql = "UPDATE `post` SET `likes`=likes+1 WHERE id_p=:id_p";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':id_p', $id);
        if($stmt->execute()){
            return true;
        }
    }
}