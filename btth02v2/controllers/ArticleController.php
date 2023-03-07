<?php
include("services/articleService.php");
class ArticleController
{
    // Hàm xử lý hành động index
    public function index()
    {
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        include("views/article/article.php");
        //http://localhost:3000/index.php?controller=article&action=idex
    }

    public function add()
    {
        //http://localhost:3000/index.php?controller=article&action=add
        if (isset($_POST['them'])) {
            $tieude = $_POST['tieude'];
            $ten_bhat = $_POST['tenbaihat'];
            $ma_tloai = $_POST['theloai'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];
            $ma_tgia = $_POST['tacgia'];
            $hinhanh = $_POST['hinhanh'];

            $articleService = new ArticleService();
            $result = $articleService->add($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $hinhanh);
            if ($result) {
                // Thêm bài viết thành công, chuyển hướng về trang danh sách bài viết
                header("Location: index.php?controller=article&action=index");
            } else {
                // Thêm bài viết thất bại, hiển thị thông báo lỗi
                $error = "Thêm bài viết thất bại";
                include("views/article/add_article.php");
            }
        } else {
            include("views/article/add_article.php");
        }
    }


    public function list()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/list_article.php");
    }
    public function delete()
    {
        //http://localhost:3000/index.php?controller=article&action=delete&id=1
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $articleService = new ArticleService();
            $result = $articleService->delete($id);
            if ($result) {
                // Xóa bài viết thành công, chuyển hướng về trang danh sách bài viết
                header("Location: index.php?controller=article&action=index");
            } else {
                // Xóa bài viết thất bại, hiển thị thông báo lỗi
                $error = "Xóa bài viết thất bại";
                include("views/article/article.php");
            }
        } else {
            // Không có ID, hiển thị thông báo lỗi
            $error = "Không có ID để xóa";
            include("views/article/article.php");
        }
    }
}