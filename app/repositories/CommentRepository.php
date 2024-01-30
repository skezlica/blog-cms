<?php

class CommentRepository extends Validator {
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
        $validator = new Validator;
        if($this->commentModel->validateComment($data)) {
            $this->commentModel->insert($data);
        } else {
            $validator->errors = $this->commentModel->errors;
            $this->errors = $validator->errors;
        }
    }

    public function getCommentById($comment_id) {
        return $this->commentModel->first(['id' => $comment_id]);
    }

    public function deleteComment($comment_id) {
        $this->commentModel->delete($comment_id);
    }

    public function updateComment($comment_id, $data) {
        if($this->commentModel->validateComment($data)) {
            $this->commentModel->update($comment_id, $data);
        }
    }
}
