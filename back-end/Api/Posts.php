<?php
    header("Access-Control-Allow-Origin: *");
    header("content-type: Application/json");
    
class Posts extends Controller{
    private $post;

    function __construct()
    {
        $this->post=$this->model('Post');
    }
    

    function getPosts(){
        $data=$this->post->getPosts();
        echo json_encode($data);
    }

    function add_post(){
        $image=$_POST['image'];
        $status=$_POST['status'];
        if($this->post->add_post($status,$image)){
            echo json_encode('ajouter');
        }
    }

} 