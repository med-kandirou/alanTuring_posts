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
        $id=$_POST['id'];
        $image=$_POST['image'];
        $status=$_POST['status'];
        if($this->post->add_post($id,$status,$image)){
            echo json_encode('ajouter');
        }
    }

    function addlike(){
        $id=$_POST['id'];
        if($this->post->addlike($id)){
            echo json_encode('ajouter');
        }
    }

} 