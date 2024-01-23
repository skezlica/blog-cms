<?php

class Comment extends Model {

    protected $table = 'comments';
    protected $allowedColumns = [
        'comment',
        'user_id',
        'post_id',
    ];

    public function validateComment($data) {
        $this->errors = [];

        if(empty($data['comment'])) {
            $this->errors['comment'] = 'Comment is required';
        }

        if(empty($this->errors)) {
            return true;
        }
        return false;
    }
}