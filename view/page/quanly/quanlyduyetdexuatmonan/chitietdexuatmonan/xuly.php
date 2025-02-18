<?php
    include_once("controller/cDeXuat.php");

    // Kiểm tra xem action và id có được truyền qua request hay không
    if (isset($_POST['action']) && isset($_POST['id'])) {
        $action = $_POST['action'];  // Duyệt hoặc từ chối
        $id = $_POST['id'];          // Mã đề xuất

        $p = new CDeXuat(); 

        // Kiểm tra action để cập nhật trạng thái
        if ($action == 'duyet') {
            // Cập nhật trạng thái thành "Đã duyệt" (có giá trị 2)
            $trangThai = 2;
            $result = $p->updateTrangThai($id, $trangThai);  // Gọi phương thức updateTrangThai từ controller CDeXuat
            if ($result) {
                echo "<script>
                        alert ('Duyệt đề xuất thành công!');
                        window.location.href = 'index.php?page=quanly/quanlyduyetdexuatmonan';
                    </script>";
            } else {
                echo "<script>
                        alert ('Có lỗi xảy ra khi duyệt đề xuất!');
                    </script>";
            }
        } elseif ($action == 'tuchoi') {
            // Cập nhật trạng thái thành "Từ chối" (có giá trị 3)
            $trangThai = 3;
            $result = $p->updateTrangThai($id, $trangThai);  // Gọi phương thức updateTrangThai từ controller CDeXuat
            if ($result) {
                echo "<script>
                        alert ('Từ chối đề xuất thành công!');
                        window.location.href = 'index.php?page=quanly/quanlyduyetdexuatmonan';
                    </script>";
            } else {
                echo "<script>
                        alert ('Có lỗi xảy ra khi từ chối đề xuất!');
                    </script>";
            }
        } else {
            echo "<script>
                    alert ('Action không hợp lệ!');
                </script>";
            
        }
    }
?>
