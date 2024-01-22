<?php

class Post extends Model {

    protected $table = 'posts';
    protected $allowedColumns = [
        'title',
        'content',
        'user_id',
        'category_id',
    ];

    public function validatePost($data) {
        $this->errors = [];

        if(empty($data['title'])) {
            $this->errors['title'] = 'Title is required';
        }

        if(empty($data['content'])) {
            $this->errors['content'] = 'Content is required';
        }

        if(empty($data['category_id']) || $data['category_id'] == 0) {
            $this->errors['category_id'] = 'Category is required';
        }

        if(empty($this->errors)) {
            return true;
        }
        return false;
    }
}