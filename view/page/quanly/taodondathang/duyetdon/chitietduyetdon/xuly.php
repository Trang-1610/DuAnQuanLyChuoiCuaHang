<?php
    include_once("controller/cDuyetDon.php");

    // Kiểm tra xem action và id có được truyền qua request hay không
    if (isset($_POST['action']) && isset($_POST['id'])) {
        $action = $_POST['action'];  // Duyệt hoặc từ chối
        $id = $_POST['id'];          // Mã đơn

        $p = new cDuyetDon(); 

        // Kiểm tra action để cập nhật trạng thái
        if ($action == 'duyet') {
            // Cập nhật trạng thái thành "Đã duyệt" (có giá trị 2)
            $trangthai = 2;
            $result = $p->updateTrangThai($id, $trangthai);  // Gọi phương thức updateTrangThai từ controller CDeXuat
            if ($result) {
                echo "<script>
                        alert ('Duyệt đơn thành công!');
                        window.location.href = 'index.php?page=quanly/taodondathang/duyetdon';
                    </script>";
            } else {
                echo "<script>
                        alert ('Có lỗi xảy ra khi duyệt đơn!');
                    </script>";
            }
        } elseif ($action == 'tuchoi') {
            // Cập nhật trạng thái thành "Từ chối" (có giá trị 3)
            $trangthai = 3;
            $result = $p->updateTrangThai($id, $trangthai);  // Gọi phương thức updateTrangThai từ controller C
            if ($result) {
                echo "<script>
                        alert ('Từ chối đơn thành công!');
                        window.location.href = 'index.php?page=quanly/taodondathang/duyetdon';
                    </script>";
            } else {
                echo "<script>
                        alert ('Có lỗi xảy ra khi từ chối đơn!');
                    </script>";
            }
        } else {
            echo "<script>
                    alert ('Action không hợp lệ!');
                </script>";
            
        }
    }
?>
