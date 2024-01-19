<?php

class Signup extends Controller {
    public function index(){
        $data = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User;
        
            $_POST['email'] = esc($_POST['email']);
            $_POST['password'] = esc($_POST['password']);

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