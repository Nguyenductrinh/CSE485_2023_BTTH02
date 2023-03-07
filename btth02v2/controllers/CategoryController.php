<?php
include("services/CategoryService.php");
class CategoryController
{
    // Hàm xử lý hành động index
    public function index()
    {   
        $categoryService = new CategoryService();
        $categorys = $categoryService->getAllCategory();
        include("views/category/list_category.php");
        //http://localhost:3000/btth02v2/index.php?controller=category&action=index
    }

    public function add()
    {
        //http://localhost:3000/index.php?controller=category&action=add
        if (isset($_POST['them'])) {

            $tentloai = $_POST['tentloai'];
            $categoryService = new categoryService();
            $result = $categoryService->add($tentloai);
            if ($result) {
                header("Location: index.php?controller=category&action=index");
            } else {
                include("views/category/add_category.php");
            }
        } else {
            include("views/category/add_category.php");
        }
    }



    public function delete()
    {

    }
}