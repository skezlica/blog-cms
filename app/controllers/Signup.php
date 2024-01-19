<?php

class Signup extends Controller {
    public function index(){
        $data = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User;
        
            if($user->validateSignup($_POST)) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->insert($_POST);
                redirect('signin');
            }
            
            $data['errors'] = $user->errors;
        }

        $this->view('signup', $data);
    }
}