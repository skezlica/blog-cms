<?php

class ManageUsers extends Controller {
    public function index(){
        $data = [];

        $user = new User;
        $joins = [
            'roles' => 'users.role_id = roles.id'
        ];
        $selectColumns = [
            'roles' => ['role_name']
        ];
        $data['users'] = $user->joinTables($joins, $selectColumns, 'users.id');
        
        $role = new Role;
        $data['roles'] = $role->findAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User;
            $user_id = $_POST['user_id'];
            $role_id = $_POST['role_id'];
            $columns['role_id'] = $role_id;
            
            if ($_SESSION['user']->role_id == Role::ROLES['admin'] && $user->validateSetUser($_POST)) {
                $user->update($user_id, $columns);
                redirect('manageUsers');
            }

            $data['errors'] = $user->errors;
        }

        if ($_SESSION['user']->role_id == Role::ROLES['admin']) {
            $this->view('manageUsers', $data);
        } else {
            redirect('dashboard');
        }
    }

    public function deleteUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {
            $user = new User;
            $user_id = $_POST['user_id'];

            $existingUser = $user->first(['id' => $user_id]);

            if ($existingUser && $_SESSION['user']->role_id == Role::ROLES['admin']) {
                $user->delete($user_id);
                redirect('manageUsers');
            }
        }
        redirect('manageUsers');
    }    
}