<?php
class Article{
    // Thuộc tính
    private $ma_bviet;
    private $tieude;
    private $ten_bhat;
    private $ma_tloai;
    private $tomtat;
    private $noidung;
    private $ma_tgia;
    private $ngayviet;
    private $hinhanh;
    
    // Hàm tạo
    public function __construct($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh){
        $this->ma_bviet = $ma_bviet;
        $this->tieude = $tieude;
        $this->ten_bhat = $ten_bhat;
        $this->ma_tloai = $ma_tloai;
        $this->tomtat = $tomtat;
        $this->noidung = $noidung;
        $this->ma_tgia = $ma_tgia;
        $this->ngayviet = $ngayviet;
        $this->hinhanh = $hinhanh;
    }
    
    // Setter/Getter
    public function setMaBviet($ma_bviet){
        $this->ma_bviet = $ma_bviet;
    }
    
    public function getMaBviet(){
        return $this->ma_bviet;
    }
    
    public function setTieude($tieude){
        $this->tieude = $tieude;
    }
    
    public function getTieude(){
        return $this->tieude;
    }
    
    public function setTenBhat($ten_bhat){
        $this->ten_bhat = $ten_bhat;
    }
    
    public function getTenBhat(){
        return $this->ten_bhat;
    }
    
    public function setMaTloai($ma_tloai){
        $this->ma_tloai = $ma_tloai;
    }
    
    public function getMaTloai(){
        return $this->ma_tloai;
    }
    
    public function setTomtat($tomtat){
        $this->tomtat = $tomtat;
    }
    
    public function getTomtat(){
        return $this->tomtat;
    }
    
    public function setNoidung($noidung){
        $this->noidung = $noidung;
    }
    
    public function getNoidung(){
        return $this->noidung;
    }
    
    public function setMaTgia($ma_tgia){
        $this->ma_tgia = $ma_tgia;
    }
    
    public function getMaTgia(){
        return $this->ma_tgia;
    }
    
    public function setNgayviet($ngayviet){
        $this->ngayviet = $ngayviet;
    }
    
    public function getNgayviet(){
        return $this->ngayviet;
    }
    
    public function setHinhanh($hinhanh){
        $this->hinhanh = $hinhanh;
    }
    
    public function getHinhanh(){
        return $this->hinhanh;
    }
}
?>