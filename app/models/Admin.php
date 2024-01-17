<?php

class Admin {
    use Model;

    protected $table = 'admins';
    protected $allowedColumns = [
        'username',
        'password',
    ];
}