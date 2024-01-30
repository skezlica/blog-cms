<?php

class CategoryRepository {
    protected $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category;
    }

    public function getAllCategories() {
        return $this->categoryModel->findAll();
    }
}
