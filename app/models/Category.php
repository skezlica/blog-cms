<?php

class Category extends Model {

    protected $table = 'categories';
    protected $allowedColumns = [
        'category_name',
    ];

}