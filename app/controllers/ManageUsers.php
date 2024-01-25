<?php

class ManageUsers extends Controller {
    public function index(){
        $data = [];

        $user = new User;
        $data['users'] = $user->joinUsersRoles();

        $role = new Role;
        $data['roles'] = $role->findAll();

        if ($_SESSION['user']->role_id == 2) {
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

            if ($existingUser && $_SESSION['user']->role_id == 2) {
                $user->delete($user_id);
                redirect('manageUsers');
            }
        }
        redirect('manageUsers');
    }

    public function setUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'], $_POST['role_id'])) {
            $user = new User;
            $user_id = $_POST['user_id'];
            $role_id = $_POST['role_id'];
            $data['role_id'] = $role_id;
            $existingUser = $user->first(['id' => $user_id]);

            if ($existingUser && $_SESSION['user']->role_id == 2) {
                $user->update($user_id, $data);
                redirect('manageUsers');
            }
            redirect('manageUsers');
        }
    }
    
}