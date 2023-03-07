<?php
include("configs/DBConnection.php");
include("models/Category.php");
class CategoryService{
    public function getAllCategory(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM theloai";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $categorys= [];
        while($row = $stmt->fetch()){
            $category = new Category($row['ma_tloai'], $row['ten_tloai']);
            array_push($categorys,$category);
        }
        // Mảng (danh sách) các đối tượng Article Model

        return $categorys;
    }

    public function add($ten_tloai){
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
    
        // B2. Truy vấn
        $sql = "INSERT INTO theloai(ten_tloai)
                VALUES (:ten_tloai)";
    
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':ten_tloai', $ten_tloai);
    
        $stmt->execute();
    
        // B4. Xử lý kết quả
        if($stmt->rowCount() > 0){
            return true; // Thêm  thành công
        }else{
            return false; // Thêm  thất bại
        }
    
    
    }
    public function delete($id){
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
    
        // B2. Truy vấn
        $sql = "DELETE FROM theloai WHERE ma_tloai = :id";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
        // B4. Xử lý kết quả
        if($stmt->rowCount() > 0){
            return true; // Xóa  thành công
        }else{
            return false; // Xóa  thất bại
        }
    }
}