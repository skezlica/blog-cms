<?php

class Validator extends Model{
    public function validateSignup($data) {
        $this->errors = [];

        if(empty($data['email'])) {
            $this->errors['email'] = 'Email is required';
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Email is not valid';
        }

        if(empty($data['password'])) {
            $this->errors['password'] = 'Password is required';
        } else if (strlen($data['password']) < 6) {
            $this->errors['password'] = 'Password must be 6 characters or longer';
        }

        if(empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function validateSetUser($data) {
        $this->errors = [];

        if(empty($data['user_id'])) {
            $this->errors['user_id'] = 'User is required';
        }

        if(empty($data['role_id'])) {
            $this->errors['role_id'] = 'Role is required';
        }

        if(empty($this->errors)) {
            return true;
        }
        return false;
    }

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