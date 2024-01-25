<?php

class User extends Model {

    protected $table = 'users';
    protected $allowedColumns = [
        'email',
        'password',
    ];

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
}