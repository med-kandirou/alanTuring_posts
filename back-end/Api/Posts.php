<?php
    header("Access-Control-Allow-Origin: *");
    header("content-type: Application/json");
    
class Posts extends Controller{
    private $post;

    function __construct()
    {
        $this->post=$this->model('Post');
    }

    function add_post(){
        $image=$_POST['nom'];
        $status=$_POST['email'];
        if($this->post->add_post($status,$image)){
            echo json_encode('ajouter');
        }
    }

} 