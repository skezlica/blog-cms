<?php

class Signin extends Controller {

    protected $userRepository;
    public function __construct() {
        $this->userRepository = new UserRepository;
    }
    public function index(){
        $data = [];
        
        if(!isset($_SESSION['user'])){    
            $data['errors'] = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
            $this->view('signin', $data);
            unset($_SESSION['errors']);
        } else {
            redirect('home');
        }
    }

    public function signIn(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['email'] = esc($_POST['email']);
            $_POST['password'] = esc($_POST['password']);
            $user_email = $_POST['email'];
            $row = $this->userRepository->getUserByEmail($user_email);
            if($row){
                if(password_verify($_POST['password'], $row->password)) {
                    $_SESSION['user'] = $row;
                    redirect('home');
                }
            }
            $_SESSION['errors'] = ['email' => 'Wrong username or password'];
            redirect('signin');
        }
    }    
}