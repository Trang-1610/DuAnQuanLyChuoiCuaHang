<?php
include_once("ketnoi.php");
class mcuahang{
    // public function selectallcuahang(){
    //     $p= new clsKetNoi();
    //     $conn=$p->moKetNoi();
    //     $str="select * from cuahang ";
    //     $ketqua = mysqli_query($conn,$str);
    //     $p->dongKetNoi($conn);
    //     return $ketqua;
    // }

    public function select1cuahang($MaCuaHang){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from cuahang where MaCuaHang = $MaCuaHang";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
// TRANG
public function SelectAllCuaHang() {
    $p = new clsKetNoi();
    $con = $p->moKetNoi();
    
    if ($con) {
        $str = "SELECT * FROM cuahang";
        $tblCuaHang = $con->query($str);
        $p->dongKetNoi($con);
        return $tblCuaHang;
    } else {
        return false; 
    }
} 

// Lấy một món ăn theo id
public function SelectMaCuaHang($id) {
$p = new clsKetNoi();
$con = $p->moKetNoi();

if ($con) {
    $str = "SELECT * FROM cuahang WHERE MaCuaHang = ?";
    $stmt = $con->prepare($str);
    $stmt->bind_param("i", $id); // Sử dụng prepared statement để bảo vệ khỏi SQL Injection
    $stmt->execute();
    $result = $stmt->get_result();
    $p->dongKetNoi($con);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc(); // Trả về 1 dòng kết quả
    } else {
        return false; // Không tìm thấy món ăn với id đó
    }
} else {
    return false; // Không thể kết nối đến CSDL
}
}

public function SelectAllSPbyName($cuahang){
    $p= new clsKetNoi();
    $con= $p->moKetNoi();
    if($con){
        $str = "select * from cuahang where TenCuaHang like N'%$cuahang%'";
        $tblSP= $con->query($str);
        $p->dongKetNoi($con);
        return $tblSP;
    }
    else{
        return false; // không thể kết nối đến csdl
    }
}

// Phương thức thực thi câu truy vấn UPDATE (sua)
public function sua($sql) {
    $p = new clsKetNoi();
    $con = $p->moKetNoi();
    
    if ($con) {
        if ($con->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        $p->dongKetNoi($con);
    } else {
        return false;
    }
}
public function them($sql) {
    $p = new clsKetNoi();
    $con = $p->moKetNoi();
    
    if ($con) {
        if ($con->query($sql) === TRUE) {
            // Đóng kết nối sau khi thực hiện truy vấn thành công
            $p->dongKetNoi($con);
            return true;
        } else {
            // Đóng kết nối sau khi truy vấn không thành công
            $p->dongKetNoi($con);
            return false;
        }
    } else {
        return false;
    }
}
   
   


}


?>