<?php
require_once 'CategoriesService.php';

class CategoriesController {
    private $service;

    public function __construct() {
        $this->service = new CategoriesService();
    }

    public function index() {
        $categories = $this->service->getAllCategories();
        require 'index.php';
    }

    public function addCategory() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $category = new Category(null, $name);
            $this->service->addCategory($category);
        }

        header('Location: index.php');
        exit();
    }

    public function editCategory() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $category = new Category($id, $name);
            $this->service->updateCategory($category);
        }

        header('Location: index.php');
        exit();
    }

    public function deleteCategory() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $this->service->deleteCategory($id);
        }

        header('Location: index.php');
        exit();
    }
}
