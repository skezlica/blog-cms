<?php

class ManageUsers extends Controller {
    
    protected $userRepository, $roleRepository;

    public function __construct() {
        $this->userRepository = new UserRepository;
        $this->roleRepository = new RoleRepository;
    }

    public function index(){
        $data = [];
        $data['users'] = $this->userRepository->getAllUsers();
        $data['roles'] = $this->roleRepository->getAllRoles();

        if ($_SESSION['user']->role_id == Role::ROLES['admin']) {
            $this->view('manageUsers', $data);
        } else {
            redirect('dashboard');
        }
    }

    public function updateUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_POST['user_id'];
            $role_id = $_POST['role_id'];
            $columns['role_id'] = $role_id;
            
            if ($_SESSION['user']->role_id == Role::ROLES['admin']) {
                $this->userRepository->updateUser($user_id, $columns);
                redirect('manageUsers');
            }
        }
    }

    public function deleteUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];

            $existingUser = $this->userRepository->getUserById($user_id);

            if ($existingUser && $_SESSION['user']->role_id == Role::ROLES['admin']) {
                $this->userRepository->deleteUser($user_id);
                redirect('manageUsers');
            }
        }
        redirect('manageUsers');
    }    
}