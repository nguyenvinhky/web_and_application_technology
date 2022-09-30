<?php
class MATHANG{  
    private $id;
    private $tenmathang;
    private $mota;
    private $giagoc;
    private $giaban;
    private $hinhanh;
    private $danhmuc_id;    
    private $luotxem;    
    private $luotmua;    

    // //lấy giá trị
    // public function getID(){
    //     return $this->id;
    // }

    // //gán lại giá trị
    // public function setID($value){
    //     $this->id = $value;
    // }

    // public function getTenmathang(){
    //     return $this->tenmathang;
    // }

    // public function setTenmathang($value){
    //     $this->tenmathang = $value;
    // }

    // public function getMota(){
    //     return $this->mota;
    // }

    // public function setMota($value){
    //     $this->mota = $value;
    // }

    // public function getGiagoc(){
    //     return $this->giagoc;
    // }

    // public function setGiagoc($value){
    //     $this->giagoc = $value;
    // }

    // public function getGiaban(){
    //     return $this->giaban;
    // }

    // public function setGiaban($value){
    //     $this->giaban = $value;
    // }

    // public function getHinhanh(){
    //     return $this->hinhanh;
    // }

    // public function setHinhanh($value){
    //     $this->hinhanh = $value;
    // }

    // public function getGiaban(){
    //     return $this->giaban;
    // }

    // public function setGiaban($value){
    //     $this->giaban = $value;
    // }

    // public function getGiaban(){
    //     return $this->giaban;
    // }

    // public function setGiaban($value){
    //     $this->giaban = $value;
    // }

    // Lấy danh sách
    public function laymathang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mathang";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Thêm mới
    public function themdanhmuc($tendm){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO danhmuc(tendanhmuc) VALUES(:tendanhmuc)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tendanhmuc", $tendm);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoadanhmuc($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM danhmuc WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suadanhmuc($id, $tendm){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE danhmuc SET tendanhmuc=:tendanhmuc WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tendanhmuc", $tendm);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy danh mục theo id
    public function laymathangtheodanhmuc($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mathang WHERE danhmuc_id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy danh mục theo id
    public function updateluotxem($id, $luotclick){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mathang SET luotxem=:luotxem WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":luotxem", $luotclick);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Sắp xếp mặt hàng theo lượt xem
    public function sapxeptheoluotxem(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mathang ORDER BY luotxem DESC LIMIT 4";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

}
?>
