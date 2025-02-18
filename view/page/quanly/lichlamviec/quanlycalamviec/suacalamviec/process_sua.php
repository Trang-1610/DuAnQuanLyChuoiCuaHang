<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "haoquangptud1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
$conn->set_charset("utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $manv_cu = $_POST['manv_cu'];
    $manv_moi = $_POST['manv_moi'];
    $malich = $_POST['malich'];
    $id_cua_hang = $_POST['id_cua_hang'];
    
    $sql_check = "SELECT nv1.MaChucVu as ChucVuCu, nv2.MaChucVu as ChucVuMoi 
                  FROM nhanvien nv1, nhanvien nv2 
                  WHERE nv1.MaNV = ? AND nv2.MaNV = ? 
                  AND nv2.TrangThai = 1 
                  AND nv2.MaCuaHang = ?";
    
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("iii", $manv_cu, $manv_moi, $id_cua_hang);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    $row_check = $result_check->fetch_assoc();
    
    if (!$row_check) {
        echo "error: Không tìm thấy thông tin nhân viên";
        $stmt_check->close();
        $conn->close();
        exit;
    }
    
    if ($row_check['ChucVuCu'] != $row_check['ChucVuMoi']) {
        echo "error: Nhân viên thay thế phải cùng chức vụ";
        $stmt_check->close();
        $conn->close();
        exit;
    }
    
    $sql_check_exist = "SELECT * FROM calamviec 
                       WHERE MaNhanVien = ? AND MaLichLamViec = ?";
    $stmt_check_exist = $conn->prepare($sql_check_exist);
    $stmt_check_exist->bind_param("ii", $manv_moi, $malich);
    $stmt_check_exist->execute();
    $result_check_exist = $stmt_check_exist->get_result();
    
    if ($result_check_exist->num_rows > 0) {
        echo "error: Nhân viên này đã được phân công vào ca làm việc này";
        $stmt_check_exist->close();
        $stmt_check->close();
        $conn->close();
        exit;
    }
    
    $sql_update = "UPDATE calamviec 
                  SET MaNhanVien = ? 
                  WHERE MaNhanVien = ? AND MaLichLamViec = ?";
    
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("iii", $manv_moi, $manv_cu, $malich);
    
    if ($stmt_update->execute()) {
        echo "success";
    } else {
        echo "error: " . $conn->error;
    }
    
    $stmt_update->close();
    $stmt_check_exist->close();
    $stmt_check->close();
}

$conn->close();
?>
