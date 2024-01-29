<?php

class CommentRepository {
    protected $commentModel;

    public function __construct() {
        $this->commentModel = new Comment;
    }

    public function getAllComments() {
        $joins = [
            'users' => 'comments.user_id = users.id'
        ];
        $selectColumns = [
            'users' => ['email']
        ];
        return $this->commentModel->joinTables($joins, $selectColumns, 'comments.id');
    } 

    public function insertComment($data) {
        $this->commentModel->insert($data);
    }

    public function getCommentById($comment_id) {
        return $this->commentModel->first(['id' => $comment_id]);
    }

    public function deleteComment($comment_id) {
        $this->commentModel->delete($comment_id);
    }

    public function updateComment($comment_id, $data) {
        $this->commentModel->update($comment_id, $data);
    }
}
