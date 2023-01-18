<?php

class test extends Controller{
    public function index(){
        echo $_SESSION['id'];
    }

} 