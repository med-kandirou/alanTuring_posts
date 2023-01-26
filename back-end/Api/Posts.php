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
        $image=$_FILES['image'];
        $status=$_POST['status'];
        if($this->post->add_post($id,$status,$image['name'])){
            move_uploaded_file($_FILES['image']['tmp_name'], '../../front-end/src/assets/images/'.$_FILES['image']['name']);
            echo json_encode('ajouter');
        }
    }

    function addlike(){
        $id=$_POST['id'];
        if($this->post->addlike($id)){
            echo json_encode('ajouter');
        }
    }

    function getcomment(){
        $id=$_POST['id'];
        $data=$this->post->getcomment($id);
        echo json_encode($data);    
    }

    function addcomment(){
        $id_p=$_POST['id_p'];
        $id_u=$_POST['id_u'];
        $comment=$_POST['comment'];
        if($this->post->addcomment($id_p,$id_u,$comment)){
            echo json_encode('ajouter');
        }
    }
} 