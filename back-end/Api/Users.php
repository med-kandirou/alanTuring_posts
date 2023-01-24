<?php
    header("Access-Control-Allow-Origin: *");
    header("content-type: Application/json");
    
class Users extends Controller{
    private $user;

    function __construct()
    {
        $this->user=$this->model('User');
    }

    function login()
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $feedback=$this->user->login($email,$pass);
        echo json_encode($feedback);
    }

    function register(){
        $nom=$_POST['nom'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        if($this->user->register($nom,$email,$pass)){
            echo json_encode('ajouter');
        }
    }
} 