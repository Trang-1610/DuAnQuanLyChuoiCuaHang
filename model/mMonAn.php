<?php
include_once("ketnoi.php");
class mMonAn{
    // public function selectallmonan(){
    //     $p= new clsKetNoi();
    //     $conn=$p->moKetNoi();
    //     $str="select * from monan ";
    //     $ketqua = mysqli_query($conn,$str);
    //     $p->dongKetNoi($conn);
    //     return $ketqua;
    // }

    public function select1monan($Mamonan){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from monan where MaMonAn = $Mamonan";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }

//    Trang
public function SelectAllMonAn() {
    $p = new clsKetNoi();
    $con = $p->moKetNoi();
    
    if ($con) {
        $str = "SELECT * FROM monan";
        $tblMonAN = $con->query($str);
        $p->dongKetNoi($con);
        return $tblMonAN;
    } else {
        return false;  
    }
} 

public function SelectAllMonAnTT() {
    $p = new clsKetNoi();
    $con = $p->moKetNoi();
    
    if ($con) {
        $str = "SELECT * FROM monan where Tinhtrang='Có'";
        $tblMonAN = $con->query($str);
        $p->dongKetNoi($con);
        return $tblMonAN;
    } else {
        return false;  
    }
} 

// Lấy một món ăn theo id
public function SelectMaMonAn($id) {
$p = new clsKetNoi();
$con = $p->moKetNoi();

if ($con) {
    $str = "SELECT * FROM monan WHERE MaMonAn = ?";
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

// // Cập nhật món ăn
// public function updateMonAn($maMonAn, $tenMonAn, $maLoaiMonAn, $giaBan, $moTa, $tinhTrang, $hinhAnh) {
//     $p = new clsKetNoi();
//     $con = $p->moKetNoi();

//     if ($con) {
//         $str = "UPDATE monan SET 
//                 Tenmonan = ?, 
//                 MaLoaiMonAn = ?, 
//                 Giaban = ?, 
//                 Mota = ?, 
//                 Tinhtrang = ?, 
//                 Hinhanh = ? 
//                 WHERE MaMonAn = ?";
    
//         $stmt = $con->prepare($str);
//         $stmt->bind_param("sssssssi", $tenMonAn, $maLoaiMonAn, $giaBan, $moTa, $tinhTrang, $hinhAnh, $maMonAn);
//         $result = $stmt->execute();
//         $p->dongKetNoi($con);
//         return $result;
//     } else {
//         return false; 
//     }
// }

public function SelectAllSPbyMonAn($id){
    $p= new clsKetNoi();
    $con= $p->moKetNoi();
    if($con){
        $str = "select * from monan where MaLoaiMonAn='$id'";
        $tblSP= $con->query($str);
        $p->dongKetNoi($con);
        return $tblSP;
    }
    else{
        return false; // không thể kết nối đến csdl
    }
}
public function SelectAllSPbyName($monan){
    $p= new clsKetNoi();
    $con= $p->moKetNoi();
    if($con){
        $str = "select * from monan where Tenmonan like N'%$monan%'";
        $tblSP= $con->query($str);
        $p->dongKetNoi($con);
        return $tblSP;
    }
    else{
        return false; // không thể kết nối đến csdl
    }
}
// Lấy danh sách món ăn theo loại (JOIN với bảng loaimonan)
public function SelectMonAnByLoai($loaiMonAnId) {
    $p = new clsKetNoi();
    $con = $p->moKetNoi();

    if ($con) {
        $str = "SELECT *
                FROM monan 
                JOIN loaimonan ON monan.MaLoaiMonAn = loaimonan.MaLoaiMonAn 
                WHERE monan.MaLoaiMonAn = ?"; // JOIN để kết hợp dữ liệu
        $stmt = $con->prepare($str);
        $stmt->bind_param("i", $loaiMonAnId); // `i` là kiểu integer
        $stmt->execute();
        $result = $stmt->get_result();
        $p->dongKetNoi($con);
        return $result;
    } else {
        return false;
    }
}
public function SelectMonAnByLoaiTT($loaiMonAnId) {
    $p = new clsKetNoi();
    $con = $p->moKetNoi();

    if ($con) {
        $str = "SELECT *
                FROM monan 
                JOIN loaimonan ON monan.MaLoaiMonAn = loaimonan.MaLoaiMonAn 
                WHERE monan.MaLoaiMonAn = ? AND monan.Tinhtrang='Có'"; // JOIN để kết hợp dữ liệu
        $stmt = $con->prepare($str);
        $stmt->bind_param("i", $loaiMonAnId); // `i` là kiểu integer
        $stmt->execute();
        $result = $stmt->get_result();
        $p->dongKetNoi($con);
        return $result;
    } else {
        return false;
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
            // Lấy insert_id của món ăn vừa thêm
            $insertId = $con->insert_id;
            $p->dongKetNoi($con);
            return $insertId;  // Trả về ID của món ăn vừa thêm
        } else {
            $p->dongKetNoi($con);
            return false;  // Nếu có lỗi, trả về false
        }
    } else {
        return false;  // Nếu không thể kết nối đến CSDL, trả về false
    }
}
   


}


?>