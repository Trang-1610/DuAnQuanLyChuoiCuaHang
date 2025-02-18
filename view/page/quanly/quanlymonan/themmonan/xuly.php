<?php
include_once("controller/cMonAn.php");
$pp = new MMonAN();
//include_once("controller/cNguyenLieu.php");

if (isset($_POST["btnthem"])) {
    $tenma = $_POST["tenMA"];
    $loaima = $_POST["loaiMA"];
    $giama = $_POST["giaMA"];
    $mota = $_POST["moTa"];
    $nguyenlieu = $_POST['nguyen_lieu']; // Mảng nguyên liệu
    $tinhtrang = $_POST["tinhTrang"];
    $filename_new = rand(111, 999) . "_" . basename($_FILES["hinhanh"]["name"]);
    $target_path = "img/monan/" . $filename_new;

        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        $allowed_extensions = ['jpeg', 'png', 'jpg', 'gif'];
    // Handle file upload
    $file_type = $_FILES["hinhanh"]["type"];
    $file_extension = strtolower(pathinfo($_FILES["hinhanh"]["name"], PATHINFO_EXTENSION));

    if (in_array($file_type, $allowed_types) && in_array($file_extension, $allowed_extensions)) {
        $filename_new = rand(111, 999) . "_" . basename($_FILES["hinhanh"]["name"]);
        $target_path = "img/monan/" . $filename_new;
        if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_path)) {
            // Insert into monan table
            $sql = "INSERT INTO monan(MaLoaiMonAn, Tenmonan, Giaban, Mota, Tinhtrang, Hinhanh) 
                    VALUES ('$loaima', '$tenma', '$giama', '$mota', '$tinhtrang', '$filename_new')";
            $maMonAnMoi = $pp->them($sql); // Now this will return the MaMonAn (insert ID)

            if ($maMonAnMoi) {
                foreach ($nguyenlieu as $maNguyenLieu) {
                    $khoiluong = isset($_POST['so_luong'][$maNguyenLieu]) ? $_POST['so_luong'][$maNguyenLieu] : 0;
                    if ($khoiluong == 0) {
                        continue; 
                    }
                    $sqlNguyenLieu = "INSERT INTO soluongnguyenlieu(MaMonAn, MaNguyenLieu, KhoiLuong) 
                                    VALUES ('$maMonAnMoi', '$maNguyenLieu', '$khoiluong')";
                    $pp->them($sqlNguyenLieu);
                }

                echo "<script>
                    window.onload = function() {
                        alert('Thêm món ăn và nguyên liệu thành công!');
                        setTimeout(function() {
                            window.location.href = 'index.php?page=quanly/quanlymonan/';
                        }, 500);
                    }
                    </script>";
            } else {
                // Error inserting food item
                echo "<script>
                    window.onload = function() {
                        alert('Thêm món ăn thất bại!');
                        setTimeout(function() {
                            window.location.href = 'index.php?page=quanly/quanlymonan/';
                        }, 500);
                    }
                    </script>";
            }
        } else {
            // Error uploading image
            echo "<script>
                window.onload = function() {
                    alert('Upload ảnh thất bại!');
                   
                }
                </script>";
        }
    }else {
        echo "<script>
                window.onload = function() {
                    alert('Chỉ được phép tải lên tệp ảnh (jpeg, png, jpg, gif)!');
                }
                </script>";
       
    }
}
?>
