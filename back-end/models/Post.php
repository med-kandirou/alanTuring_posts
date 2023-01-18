<?php

class Post extends database{

    function add_post($status,$image){
        $sql = "INSERT INTO `post`(`image`, `content`, `likes`) VALUES (:image,:status,:likes)";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':status', $status);
        $likes=0;
        $stmt->bindParam(':likes', $likes);
        if($stmt->execute()){
            return true;
        }
    }

    
    
}