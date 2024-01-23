<?php

class Comment extends Model {

    protected $table = 'comments';
    protected $allowedColumns = [
        'comment',
    ];

}