<?php
include_once("controller/cBan.php");
$pp = new MBan();

// Đặt thời gian sống cho cookie (1 tuần)
$cookie_lifetime = 60 * 60 * 24 * 7; // 7 days

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnDatBan'])) {
        // Lưu thông tin đặt bàn vào $_SESSION
        $_SESSION['form_data'][$id] = [
            'ten' => $_POST['ten'],
            'dienthoai' => $_POST['dienthoai'],
            'gio' => $_POST['gio']
        ];
        
        // Lưu thông tin vào cookie để giữ lại qua các phiên đăng nhập
        setcookie('form_data', serialize($_SESSION['form_data']), time() + $cookie_lifetime, '/');
        
        // Cập nhật trạng thái bàn sang "Bận" nếu bàn còn "Trống"
        $sqlUpdate = "UPDATE ban SET Tinhtrang = 'Bận' WHERE Maban = '$id' AND Tinhtrang = 'Trống'";
        
        // Thực hiện câu lệnh SQL để cập nhật trạng thái bàn
        if ($pp->sua($sqlUpdate)) {
            $_SESSION['success'] = "Đặt bàn thành công!";
            echo '<script>alert("Đặt bàn thành công!"); window.location.href="index.php?page=quanly/quanlydatban&id=' . $id . '";</script>';
        } else {
            $_SESSION['error'] = "Đặt bàn thất bại hoặc bàn đã được đặt trước.";
        }
    }

    // Khi nhấn "Hủy"
    if (isset($_POST['btnHuy'])) {
        unset($_SESSION['form_data'][$id]);
        
        // Cập nhật trạng thái bàn sang "Trống" nếu bàn còn "Bận"
        $sqlUpdate = "UPDATE ban SET Tinhtrang = 'Trống' WHERE Maban = '$id' AND Tinhtrang = 'Bận'";
        
        // Thực hiện câu lệnh SQL để cập nhật trạng thái bàn
        if ($pp->sua($sqlUpdate)) {
            $_SESSION['success'] = "Hủy bàn thành công!";
        } else {
            $_SESSION['error'] = "Hủy bàn thất bại hoặc bàn chưa được đặt.";
        }
        
        // Hủy cookie khi hủy đặt bàn
        setcookie('form_data', '', time() - 3600, '/');
    }

    // Kiểm tra nếu nhấn "btnH"
    if (isset($_POST['btnH'])) {
        unset($_SESSION['form_data'][$id]);
    }

    // Reload trang để hiển thị cập nhật mới
    header("Location: index.php?page=quanly/quanlydatban&id=" . $id);
    exit();
}

// Kiểm tra cookie nếu có, và phục hồi dữ liệu vào $_SESSION
if (isset($_COOKIE['form_data'])) {
    $_SESSION['form_data'] = unserialize($_COOKIE['form_data']);
}
?>
