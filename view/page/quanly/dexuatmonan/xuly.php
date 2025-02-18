<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("model/mDeXuat.php");
    $obj = new MDeXuat();

    if (isset($_POST["btnSubmit"])) {
        // Lấy dữ liệu từ form
        $tenmon = $_POST['tenmon'];
        $loaiMA = $_POST['loaiMA'];
        $mota = $_POST['mota'];
        $nguyenlieu = $_POST['nguyenlieu'];
        $giadexuat = $_POST['giadexuat'];
        $trangthai = 1;

        // Kiểm tra session để lấy MaNV
        $maNV = isset($_SESSION['dangnhap']['MaNV']) ? $_SESSION['dangnhap']['MaNV'] : null;

        if ($maNV) {
            // Câu truy vấn SQL với các placeholder
            $sql = "INSERT INTO monandexuat (MaDeXuat, MaNV, MaLoaiMonAn, TenMonAn, MoTa, NguyenLieu, GiaDeXuat, TrangThai) 
                    VALUES ('', '$maNV', '$loaiMA', '$tenmon', '$mota', '$nguyenlieu', '$giadexuat', '$trangthai')";
            
            // Gọi hàm addDX để thực thi
            if ($obj->addDX($sql)) {
                echo "<script>
                        alert('Đề xuất món ăn đã được gửi thành công!');
                        
                    </script>";
            } else {
                echo "<script>alert('Gửi đề xuất thất bại. Vui lòng thử lại sau!');</script>";
            }
        } else {
            // Nếu session không hợp lệ
            echo "<script>
                    alert('Bạn cần đăng nhập để thực hiện chức năng này!');
                    window.location.href='index.php?page=dangnhap.php';
                </script>";
        }
    }
?>
