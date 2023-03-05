<?php
include("configs/DBConnection.php");
include("models/Article.php");
class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM baiviet";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'],$row['ma_tloai'],$row['tomtat'],$row['noidung'],$row['ma_tgia'],$row['ngayviet'],$row['hinhanh']);
            array_push($articles,$article);
        }
        // Mảng (danh sách) các đối tượng Article Model


        return $articles;
    }
    public function add( $tieude=null, $ten_bhat=null, $ma_tloai=null, $tomtat=null, $noidung=null , $ma_tgia=null, $hinhanh=null){
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
    
        // B2. Truy vấn
        $sql = "INSERT INTO baiviet( tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh)
                VALUES ( :tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, NOW(), :hinhanh)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tieude', $tieude);
        $stmt->bindParam(':ten_bhat', $ten_bhat);
        $stmt->bindParam(':ma_tloai', $ma_tloai);
        $stmt->bindParam(':tomtat', $tomtat);
        $stmt->bindParam(':noidung', $noidung);
        $stmt->bindParam(':ma_tgia', $ma_tgia);
        $stmt->bindParam(':hinhanh', $hinhanh);
    
        $stmt->execute();
    
        // B4. Xử lý kết quả
        if($stmt->rowCount() > 0){
            return true; // Thêm bài viết thành công
        }else{
            return false; // Thêm bài viết thất bại
        }
    
    
    }
    public function delete($id){
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
    
        // B2. Truy vấn
        $sql = "DELETE FROM baiviet WHERE ma_bviet = :id";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
        // B4. Xử lý kết quả
        if($stmt->rowCount() > 0){
            return true; // Xóa bài viết thành công
        }else{
            return false; // Xóa bài viết thất bại
        }
    }
}