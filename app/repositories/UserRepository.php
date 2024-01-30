<?php

class UserRepository extends Validator {
    protected $userModel;

    public function __construct() {
        $this->userModel = new User;
    }

    public function getAllUsers() {
        $joins = [
            'roles' => 'users.role_id = roles.id'
        ];
        $selectColumns = [
            'roles' => ['role_name']
        ];
        return $this->userModel->joinTables($joins, $selectColumns, 'users.id');
    }

    public function insertUser($data) {
        if($this->userModel->validateSignup($data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->userModel->insert($data);
        }
    }

    public function getUserById($user_id) {
        return $this->userModel->first(['id' => $user_id]);
    }

    public function getUserByEmail($user_email) {
        return $this->userModel->first(['email' => $user_email]);
    }

    public function deleteUser($user_id) {
        $this->userModel->delete($user_id);
    }

    public function updateUser($user_id, $data) {
        $this->userModel->update($user_id, $data);
    }
}