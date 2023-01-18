<?php

class Post extends database{


    function getPosts(){
        $sql = "SELECT p.`id_p`, p.`image`, p.`content`,p.date_ajout , p.`likes`, u.nom ,u.email  FROM `post` p inner join user u on u.id_u=p.id_user";
        $stmt=$this->openConnection()->query($sql);
        $data=$stmt->fetchAll();
        return $data;
    }
    function add_post($status,$image){
        $sql = "INSERT INTO `post`(`image`, `content`, `likes`,`date_ajout`, `id_user`) VALUES (:image,:status,:likes,:data_ajout,:id_user)";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':status', $status);
        $likes=0;
        $stmt->bindParam(':likes', $likes);
        $data_ajout=date("Y/m/d");
        $stmt->bindParam(':data_ajout',$data_ajout);
        $id=$_SESSION['id'];
        $stmt->bindParam(':id_user',$id);
        if($stmt->execute()){
            return true;
        }
    }
}