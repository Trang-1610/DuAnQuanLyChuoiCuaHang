<?php
include_once("controller/cCuaHang.php");
$pp = new mcuahang();
if(isset($_POST["btnthem"]))
{
    $ten = $_POST["ten"];
    $diachi = $_POST["diachi"];
    $tinhtrang = $_POST["tinhtrang"];
    $filename_new = rand(111, 999) . "_" . basename($_FILES["hinhanh"]["name"]);
    $target_path = "img/cuahang/" . $filename_new;

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
                $sql="insert into cuahang(TenCuaHang , DiaChi, TinhTrang, HinhAnh) values ('$ten',  '$diachi' , '$tinhtrang', '$filename_new')";

                if ($pp->them($sql)) {
                    echo "<script>
                    window.onload = function() {
                        alert('Cửa hàng thành công!');
                        setTimeout(function() {
                            window.location.href = 'index.php?page=quanly/quanlycuahang/';
                        }, 500);
                    }
                    </script>";
                } else {
                    echo "<script>
                    window.onload = function() {
                        alert('Thêm cửa hàng thất bại!');
                        
                    }
                    </script>";
                }
            } else {
                echo "<script>
                window.onload = function() {
                    alert('Upload ảnh thất bại!');
                }
                </script>";
            }
        } else {
            echo "<script>
                window.onload = function() {
                    alert('Chỉ được phép tải lên tệp ảnh (jpeg, png, jpg, gif)!');
                }
                </script>";
        }
}
?>