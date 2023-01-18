<?php

class User extends database{

    function register($nom,$email,$pass){
        $sql = "INSERT INTO `user`(`nom`, `email`, `pass`) VALUES (:nom,:email,:pass)";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        if($stmt->execute()){
            return true;
        }
    }

    function login($email,$pass){
        $sql = "SELECT `id_u`, `nom`, `email`, `pass` FROM `user` where email=:email and pass=:pass";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
        if($stmt->rowCount()==1){
            $res=$stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id']=$res['id_u'];
            $_SESSION['nom']=$res['nom'];
            $_SESSION['email']=$res['email'];
            return true;
        }
        else{
            return false;
        }
    }
    
}