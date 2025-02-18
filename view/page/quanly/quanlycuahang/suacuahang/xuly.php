<?php
include_once("controller/cCuaHang.php");
$pp = new MCuaHang();

if (isset($_POST["btnsua"])) {  
    $ten = $_POST["ten"];
    $diachi = $_POST["diachi"];
    $tinhtrang = $_POST["tinhtrang"];

    if (isset($_FILES["hinhanh"]["name"]) && $_FILES["hinhanh"]["name"] != "") {
        // Danh sách loại tệp ảnh được phép
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        $allowed_extensions = ['jpeg', 'png', 'jpg', 'gif'];

        // Lấy thông tin loại tệp và phần mở rộng
        $file_type = $_FILES["hinhanh"]["type"];
        $file_extension = strtolower(pathinfo($_FILES["hinhanh"]["name"], PATHINFO_EXTENSION));

        // Kiểm tra loại tệp và phần mở rộng
        if (in_array($file_type, $allowed_types) && in_array($file_extension, $allowed_extensions)) {
            $filename_new = rand(111, 999) . "_" . basename($_FILES["hinhanh"]["name"]);
            $target_path = "img/cuahang/" . $filename_new;

            // Di chuyển tệp ảnh đã tải lên vào thư mục đích
            if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_path)) {
                $sql = "UPDATE cuahang SET TenCuaHang = '$ten', DiaChi = '$diachi', TinhTrang = '$tinhtrang', HinhAnh = '$filename_new' WHERE MaCuaHang = '$id'";
                if ($pp->sua($sql)) {
                    
                    echo "<script>
                    window.onload = function() {
                        alert('Cập nhật cửa hàng thành công!');
                        setTimeout(function() {
                            window.location.href = 'index.php?page=quanly/quanlycuahang/';
                        }, 500);
                    }
                    </script>";
                } else {
                    echo "<script>alert('Cập nhật cửa hàng thất bại!');</script>";
                }
            } else {
                echo "<script>
                        alert('Upload ảnh thất bại!');
                        window.location.href = '".$_SERVER['REQUEST_URI']."';
                    </script>";
            }
        } else {
            echo "<script>
                    window.onload = function() {
                        alert('Chỉ được phép tải lên tệp ảnh (jpeg, png, jpg, gif)!');
                        window.location.href = '".$_SERVER['REQUEST_URI']."';
                    }
                </script>";
        }
    } else {
        // Không thay đổi ảnh nếu không có ảnh mới tải lên
        $sql = "UPDATE cuahang SET TenCuaHang = '$ten', DiaChi = '$diachi', TinhTrang = '$tinhtrang' WHERE MaCuaHang = '$id'";
        if ($pp->sua($sql)) {
            echo "<script>
                window.onload = function() {
                    alert('Cập nhật cửa hàng thành công!');
                    setTimeout(function() {
                        window.location.href = 'index.php?page=quanly/quanlycuahang/';
                    }, 500);
                }
                </script>";
        } else {
            echo "<script>alert('Cập nhật cửa hàng thất bại!');</script>";
        }
    }
}
?>

