<?php

class Signin extends Controller {

    public function index(){
        $data = [];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User;
            
            $_POST['email'] = esc($_POST['email']);
            $_POST['password'] = esc($_POST['password']);

            $arr['email'] = $_POST['email'];
            $row = $user->first($arr);
            if($row){
                if(password_verify($_POST['password'], $row->password)) {
                    $_SESSION['user'] = $row;
                    redirect('home');
                }
            }
            
            $user->errors['email'] = 'Wrong username or password';
            $data['errors'] = $user->errors;
        }
        
        if(!isset($_SESSION['user'])){    
            $this->view('signin', $data);
        } else {
            redirect('home');
        }
    }
}