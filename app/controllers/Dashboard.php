<?php

class Dashboard extends Controller {
    public function index(){
        $data = [];

        $post = new Post;
        $data['posts'] = $post->joinAll();

        $comment = new Comment;
        $data['comments'] = $comment->joinCommentsUsers();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['comment'] = esc($_POST['comment']);
            
            $_POST['user_id'] = $_SESSION['user']->id;

            if ($comment->validateComment($_POST)) {
                $comment->insert($_POST);
                redirect('dashboard');
            }

            $data['errors'] = $comment->errors;
        }
        
        if (!empty($_SESSION['user'])) {
            $this->view('dashboard', $data);
        } else {
            redirect('signin');
        }
    }
}
