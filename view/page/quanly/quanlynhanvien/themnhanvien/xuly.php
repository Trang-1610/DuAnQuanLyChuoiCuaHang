<?php

    include_once("model/mNhanVien.php"); 
    $obj = new MNhanVien(); // Tạo đối tượng của lớp MNhanVien

    if (isset($_POST["btnAdd"])) {
        // Lấy dữ liệu từ form
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $machucvu = $_POST["idchucvu"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $trangthai = $_POST["trangthai"];
        $macuahang = $_POST["idcuahang"];
        $password = md5($_POST["password"]);
        
        // Kiểm tra trạng thái
        switch ($trangthai) {
            case 'Đang làm việc':
                $trangthai = 1;
                break;
            case 'Thử việc':
                $trangthai = 2;
                break;
            default:
                $trangthai = 0;
        }

        // Kiểm tra số điện thoại đã tồn tại
        if ($obj->checkPhoneExists($phone)) {
            echo "<script>alert('Số điện thoại đã tồn tại. Vui lòng nhập số khác!');</script>";
        } elseif ($obj->checkEmailExists($email)) {
            echo "<script>alert('Email đã tồn tại. Vui lòng nhập email khác!');</script>";
        } else {
            // Thêm nhân viên
            $maNVmoi = $obj->addNV($name, $gender, $machucvu, $address, $phone, $email, $trangthai, $macuahang);
            if ($maNVmoi) {
                // Thêm tài khoản cho nhân viên
                if ($obj->addTaiKhoan($maNVmoi, $password, $machucvu)) {
                    echo "<script>
                            alert('Thêm nhân viên và tài khoản thành công!');
                            window.location.href = 'index.php?page=quanly/quanlynhanvien';
                        </script>";
                } else {
                    echo "<script>alert('Thêm tài khoản thất bại. Vui lòng thử lại!');</script>";
                }
            } else {
                echo "<script>alert('Thêm nhân viên thất bại. Vui lòng thử lại!');</script>";
            }
        }
    }
?>
