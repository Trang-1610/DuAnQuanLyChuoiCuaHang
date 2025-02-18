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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['manv']) && isset($_POST['malich'])) {
    $manv = $_POST['manv'];
    $malich = $_POST['malich'];
    
    // Kiểm tra
    $sql_check = "SELECT * FROM calamviec WHERE MaNhanVien = ? AND MaLichLamViec = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ii", $manv, $malich);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    
    if ($result_check->num_rows > 0) {
        // Xóa
        $sql_delete = "DELETE FROM calamviec WHERE MaNhanVien = ? AND MaLichLamViec = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("ii", $manv, $malich);
        
        if ($stmt_delete->execute()) {
            echo "success";
        } else {
            echo "error: " . $conn->error;
        }
        $stmt_delete->close();
    } else {
        echo "error: Không tìm thấy ca làm việc của nhân viên này";
    }
    $stmt_check->close();
} else {
    echo "error: Thiếu thông tin cần thiết";
}

$conn->close();
?>
