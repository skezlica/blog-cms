<?php

class UserRepository {
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
        $this->userModel->insert($data);
    }

    public function getUserById($user_id) {
        return $this->userModel->first(['id' => $user_id]);
    }

    public function deleteUser($user_id) {
        $this->userModel->delete($user_id);
    }

    public function updateUser($user_id, $data) {
        $this->userModel->update($user_id, $data);
    }
}