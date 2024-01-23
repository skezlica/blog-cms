<?php

class Dashboard extends Controller {
    public function index(){
        $data = [];

        $post = new Post;
        $data['posts'] = $post->joinAll();

        $category = new Category;
        $data['categories'] = $category->findAll();

        $comment = new Comment;
        $data['comment'] = $comment->findAll();

        show($data['comment']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['title'] = esc($_POST['title']);
            $_POST['content'] = esc($_POST['content']);
            
            $_POST['user_id'] = $_SESSION['user']->id;

            if ($post->validatePost($_POST)) {
                $post->insert($_POST);
                redirect('dashboard');
            }

            $data['errors'] = $post->errors;
        }
        
        if (!empty($_SESSION['user'])) {
            $this->view('dashboard', $data);
        } else {
            redirect('signin');
        }
    }
}
