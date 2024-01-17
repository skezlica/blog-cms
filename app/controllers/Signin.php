<?php

class Signin {
    use Controller;

    public function index(){
        $this->view('signin');
    }
}