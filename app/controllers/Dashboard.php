<?php

class Dashboard extends Controller {

    protected $postRepository, $commentRepository, $categoryRepository;
    
    public function __construct() {
        $this->postRepository = new PostRepository;
        $this->commentRepository = new CommentRepository;
        $this->categoryRepository = new CategoryRepository;
    }

    public function index() {
        $data = [];
        $data['posts'] = $this->postRepository->getAllPosts();
        $data['comments'] = $this->commentRepository->getAllComments();
        $data['categories'] = $this->categoryRepository->getAllCategories();
        
        if (!empty($_SESSION['user'])) {
            $this->view('dashboard', $data);
        } else {
            redirect('signin');
        }
    }

    public function insertComment() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['comment'] = esc($_POST['comment']);
            $_POST['user_id'] = $_SESSION['user']->id;
            $this->commentRepository->insertComment($_POST);
            redirect('dashboard');
        }
    }

    public function deletePost() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_id'])) {
            $post_id = $_POST['post_id'];
            $post = $this->postRepository->getPostById($post_id);

            if ($post && ($post->user_id == $_SESSION['user']->id || $_SESSION['user']->role_id == Role::ROLES['admin'])) {
                $this->postRepository->deletePost($post_id);
                redirect('dashboard');
            }
        }
        redirect('dashboard');
    }

    public function deleteComment() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment_id'])) {
            $commentId = $_POST['comment_id'];
            $comment = $this->commentRepository->getCommentById($commentId);

            if ($comment && ($comment->user_id == $_SESSION['user']->id || $_SESSION['user']->role_id == Role::ROLES['admin'])) {
                $this->commentRepository->deleteComment($commentId);
                redirect('dashboard');
            }
        }
        redirect('dashboard');
    }

    public function updatePost() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $postId = $_POST['post_id'];
            $data['title'] = esc($_POST['title']);
            $data['content'] = esc($_POST['content']);
            $this->postRepository->updatePost($postId, $data);
            redirect('dashboard');
        }
    }

    public function updateComment() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $commentId = $_POST['comment_id'];
            $data['comment'] = esc($_POST['comment']);
            $this->commentRepository->updateComment($commentId, $data);
            redirect('dashboard');
        }
    }
}