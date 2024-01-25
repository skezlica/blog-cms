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

    public function deletePost() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_id'])) {
            $post = new Post;
            $post_id = $_POST['post_id'];

            $existingPost = $post->first(['id' => $post_id]);
            if ($existingPost && ($existingPost->user_id == $_SESSION['user']->id || $_SESSION['user']->role_id == 2)) {
                $post->delete($post_id);
                redirect('dashboard');
            }
        }
        redirect('dashboard');
    }

    public function deleteComment() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment_id'])) {
            $comment = new Comment;
            $comment_id = $_POST['comment_id'];

            $existingComment = $comment->first(['id' => $comment_id]);
            if ($existingComment && ($existingComment->user_id == $_SESSION['user']->id || $_SESSION['user']->role_id == 2)) {
                $comment->delete($comment_id);
                redirect('dashboard');
            }
        }
        redirect('dashboard');
    }
}
