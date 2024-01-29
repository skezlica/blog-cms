<?php

class PostRepository extends Validator {
    protected $postModel;

    public function __construct() {
        $this->postModel = new Post;
    }

    public function getAllPosts() {
        $joins = [
            'users' => 'posts.user_id = users.id',
            'categories' => 'posts.category_id = categories.id'
        ];
        $selectColumns = [
            'users' => ['email'],
            'categories' => ['category_name']
        ];
        return $this->postModel->joinTables($joins, $selectColumns, 'posts.id');
    }

    public function insertPost($data) {
        $this->postModel->insert($data);
    }

    public function getPostById($post_id) {
        return $this->postModel->first(['id' => $post_id]);
    }

    public function deletePost($post_id) {
        $this->postModel->delete($post_id);
    }

    public function updatePost($post_id, $data) {
        $this->postModel->update($post_id, $data);
    }
}