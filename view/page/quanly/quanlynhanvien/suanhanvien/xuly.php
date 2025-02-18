<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("model/mNhanVien.php");
$obj = new MNhanVien();
//$p = $obj->SelectMaNV($id);

if (isset($_POST["btnSua"])) {
    // Lấy dữ liệu từ form
   // $id = $_POST["id"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $chucvu = $_POST["chucvu"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $trangthai = $_POST["trangthai"];
    $macuahang = $_POST["cuahang"]; 

    // Kiểm tra dữ liệu đầu vào
    if (empty($name) || empty($chucvu) || empty($email) || empty($phone) || empty($address) || !isset($gender) || empty($trangthai) || empty($macuahang)) {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin bắt buộc!'); window.history.back();</script>";
        exit();
    }

    // Chuyển đổi trạng thái từ chuỗi sang số
    if ($trangthai == 'Đang làm việc') {
        $trangthai = 1;
    } elseif ($trangthai == 'Thử việc') {
        $trangthai = 2;
    } else {
        $trangthai = 0;
    }

    // Chuẩn bị câu SQL với Prepared Statement
    $sql = "UPDATE nhanvien 
            SET HoTen = '$name', MaChucVu = '$chucvu', GioiTinh = '$gender', DiaChi = '$address', SDT = '$phone', Email = '$email', TrangThai = '$trangthai', MaCuaHang = '$macuahang' 
            WHERE MaNV = '$id'";
    if ($obj->suaNV($sql)) {
        echo "<script>
                alert('Cập nhật nhân viên thành công!');  
                window.location.href = 'index.php?page=quanly/quanlynhanvien';            
            </script>";
    } else {
        echo "<script>alert('Cập nhật nhân viên thất bại. Vui lòng thử lại sau!');</script>";
    }   

}
?>
