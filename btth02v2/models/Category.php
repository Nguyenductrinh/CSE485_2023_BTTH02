<?php
class Category{
    // Thuộc tính
   
    private $ma_tloai;
    
    private $ten_tloai;
    
    // Hàm tạo
    public function __construct($ma_tloai = null,$ten_tloai = null){
        
        $this->ma_tloai = $ma_tloai;
        $this->ten_tloai = $ten_tloai;
    }
    
    // Setter/Getter
    
    public function setMaTloai($ma_tloai){
        $this->ma_tloai = $ma_tloai;
    }
    
    public function getMaTloai(){
        return $this->ma_tloai;
    }
    
    public function setTenTloai($ten_tloai){
        $this->ten_tloai = $ten_tloai;
    }
    
    public function getTenTloai(){
        return $this->ten_tloai;
    }

}
?>