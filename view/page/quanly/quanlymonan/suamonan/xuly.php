<?php
include_once("controller/cMonAn.php");
$pp = new MMonAN();

if (isset($_POST["btsua"])) {  
    $tenma = $_POST["tenMA"];
    $loaima = $_POST["loaiMA"];
    $giama = $_POST["giaMA"];
    $mota = $_POST["moTa"];
    $nguyenlieu = $_POST['nguyen_lieu'] ?? []; // Nguyên liệu được chọn
    $tinhtrang = $_POST["tinhTrang"];
    $id = $_GET['id']; // ID món ăn cần sửa

    // Kiểm tra xem có tải ảnh lên không
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
            $target_path = "img/monan/" . $filename_new;

            // Di chuyển tệp ảnh đã tải lên vào thư mục đích
            if (!move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_path)) {
                echo "<script>
                    alert('Upload ảnh thất bại!');
                    window.location.href = '".$_SERVER['REQUEST_URI']."';
                </script>";
                exit;
            }
        } else {
            echo "<script>
                window.onload = function() {
                    alert('Chỉ được phép tải lên tệp ảnh (jpeg, png, jpg, gif)!');
                    window.location.href = '".$_SERVER['REQUEST_URI']."';
                }
                </script>";
            exit;
        }
    }

    // Câu lệnh cập nhật món ăn
    $hinhanh_sql = isset($filename_new) ? ", Hinhanh = '$filename_new'" : ""; // Chỉ thêm phần ảnh nếu có ảnh mới
    $sql = "UPDATE monan 
            SET MaLoaiMonAn = '$loaima', Tenmonan = '$tenma', Giaban = '$giama', Mota = '$mota', Tinhtrang = '$tinhtrang' $hinhanh_sql
            WHERE MaMonAn = '$id'";

    // Thực hiện cập nhật món ăn
    if ($pp->sua($sql)) {
        // Xử lý cập nhật nguyên liệu liên quan
        foreach ($nguyenlieu as $maNguyenLieu) {
            $khoiluong = $_POST['so_luong'][$maNguyenLieu] ?? 0; // Lấy số lượng từ form
            if ($khoiluong > 0) {
                // Nếu đã tồn tại nguyên liệu, cập nhật số lượng
                $sqlUpdateNguyenLieu = "INSERT INTO soluongnguyenlieu (MaMonAn, MaNguyenLieu, KhoiLuong)
                                        VALUES ('$id', '$maNguyenLieu', '$khoiluong')
                                        ON DUPLICATE KEY UPDATE KhoiLuong = '$khoiluong'";
                $pp->sua($sqlUpdateNguyenLieu);
            }
        }

        // Thông báo và chuyển hướng
        echo "<script>
        window.onload = function() {
            alert('Cập nhật món ăn và nguyên liệu thành công!');
            setTimeout(function() {
                window.location.href = 'index.php?page=quanly/quanlymonan/';
            }, 500);
        }
        </script>";
    } else {
        echo "<script>alert('Cập nhật món ăn thất bại!');</script>";
    }
}
?>



<script>
document.addEventListener('DOMContentLoaded', function () {
    // Add event listener for checkboxes
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="nguyen_lieu[]"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const quantityInput = document.getElementById('so_luong_' + this.value);
            quantityInput.disabled = !this.checked; // Enable or disable based on checkbox status
        });
    });
});
</script>
