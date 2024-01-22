<?php

class Dashboard extends Controller {
    public function index(){
        $data = [];
        
        $post = new Post;

        $categories = new Category;
        $data['categories'] = $categories->findAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $categories = new Category;

            $_POST['title'] = esc($_POST['title']);
            $_POST['content'] = esc($_POST['content']);
            $_POST['user_id'] = $_SESSION['user']->id;

            if ($post->validatePost($_POST)) {
                $post->insert($_POST);
            }

            $data['posts'] = $post->findAll();
            $data['errors'] = $post->errors;
        }

        show($data['posts']);

        if (!empty($_SESSION['user'])) {
            $this->view('dashboard', $data);
        } else {
            redirect('signin');
        }
    }
}
