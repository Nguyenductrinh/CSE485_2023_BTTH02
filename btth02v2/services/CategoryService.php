<?php
require_once 'Category.php';

class CategoriesService {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=music_library;charset=utf8', 'root', '');
    }

    public function getAllCategories() {
        $stmt = $this->pdo->prepare('SELECT * FROM categories');
        $stmt->execute();
        $categories = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $category = new Category($row['id'], $row['name']);
            $categories[] = $category;
        }

        return $categories;
    }

    public function addCategory($category) {
        $stmt = $this->pdo->prepare('INSERT INTO categories (name) VALUES (?)');
        $stmt->execute([$category->getName()]);
    }

    public function updateCategory($category) {
        $stmt = $this->pdo->prepare('UPDATE categories SET name = ? WHERE id = ?');
        $stmt->execute([$category->getName(), $category->getId()]);
    }

    public function deleteCategory($id) {
        $stmt = $this->pdo->prepare('DELETE FROM categories WHERE id = ?');
        $stmt->execute([$id]);
    }
}
