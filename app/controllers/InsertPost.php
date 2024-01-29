<?php

class InsertPost extends Controller {

    protected $postRepository, $categoryRepository;

    public function __construct() {
        $this->postRepository = new PostRepository;
        $this->categoryRepository = new CategoryRepository;
    }

    public function index(){
        $data = [];
        $data['categories'] = $this->categoryRepository->getAllCategories();
        
        if (!empty($_SESSION['user'])) {
            $this->view('insertPost', $data);
        } else {
            redirect('signin');
        }
    }

    public function insertPost(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['title'] = esc($_POST['title']);
            $_POST['content'] = esc($_POST['content']);
            $_POST['user_id'] = $_SESSION['user']->id;
            if($this->postRepository->validatePost($_POST)) {
                $this->postRepository->insertPost($_POST);
            }
            redirect('dashboard');
        }
    }
}
