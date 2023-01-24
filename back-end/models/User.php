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
        $feedback=[
            'isTrue'=>false
        ];
        $sql = "SELECT `id_u`, `nom`, `email`, `pass` FROM `user` where email=:email and pass=:pass";
        $stmt=$this->openConnection()->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
        if($stmt->rowCount()==1){
            $res=$stmt->fetch();
            $feedback=[
                'isTrue'=>true,
                'id'=>$res['id_u'],
                'nom'=>$res['nom'],
                'email'=>$res['email'],
            ];
            return $feedback;
        }
        else{
            return $feedback;
        }
    }
    
}