<?php

class RoleRepository {
    protected $roleModel;

    public function __construct() {
        $this->roleModel = new Role;
    }

    public function getAllRoles() {
        return $this->roleModel->findAll();
    }
}