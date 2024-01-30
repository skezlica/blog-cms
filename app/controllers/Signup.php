<?php

class Signup extends Controller {

    protected $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository;
    }

    public function index(){
        $data = [];
        
        if(!isset($_SESSION['user'])){    
            $this->view('signup', $data);
        } else {
            redirect('home');
        }
    }

    public function signUp(){
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {        
            $_POST['email'] = esc($_POST['email']);
            $_POST['password'] = esc($_POST['password']);
            if(!$this->userRepository->insertUser($_POST)) {
                $errors = $this->userRepository->errors;
            } else {
                redirect('signin');
            }
        }
        $this->view('signup', ['errors' => $errors]);
    }
}
