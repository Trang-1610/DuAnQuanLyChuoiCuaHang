<style>
  .status-text {
    color: blue;
  }

  .status-update {
    color: green;
  }

  .status {
    color: red;
  }
</style>

<?php
include_once("controller/cDeXuat.php");

// Lấy mã đề xuất từ request
$chitiet = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

// Gọi controller để lấy dữ liệu chi tiết
$p = new CDeXuat();
$tblDX = $p->getChiTietDX($chitiet);
include_once("view/page/quanly/quanlyduyetdexuatmonan/chitietdexuatmonan/xuly.php");

// Hiển thị dữ liệu
if ($tblDX && $tblDX->num_rows > 0) {
    echo '<h2 style="text-align: center; padding-top: 15px; padding-bottom: 20px;">Chi tiết đề xuất món ăn</h2>';
    echo '<div style="display: flex; justify-content: center; align-items: center;">';
    echo "<table style='width: 60%;'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th style='padding: 10px; border: 1px solid #ddd;'>Thông tin</th>";
    echo "<th style='padding: 10px; border: 1px solid #ddd;'>Chi tiết</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    $trangThai = null; // Biến để lưu trạng thái
    while ($r = $tblDX->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd; width: 25%'>Mã đề xuất</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . htmlspecialchars($r["MaDeXuat"]) . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>Tên món ăn</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . htmlspecialchars($r["TenMonAn"]) . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>Loại món ăn</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . htmlspecialchars($r["TenLoaiMonAn"]) . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>Mô tả</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . htmlspecialchars($r["MoTa"]) . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>Nguyên liệu</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . htmlspecialchars($r["NguyenLieu"]) . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>Giá đề xuất</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . number_format($r["GiaDeXuat"], 0, '.', ',') . " VND</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>Người đề xuất</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . htmlspecialchars($r["NguoiDeXuat"]) . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>Trạng thái</td>";
        echo "<td>" . 
                (($r['TrangThai'] == 1) ? '<span class="status-text">Đang chờ duyệt</span>' : 
                (($r['TrangThai'] == 2) ? '<span class="status-update">Đã duyệt</span>' : '<span class="status">Đã từ chối</span>')) . 
            "</td>";
        echo "</tr>";

        // Ghi lại trạng thái để kiểm tra bên ngoài vòng lặp
        $trangThai = $r['TrangThai'];
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";

    // Hiển thị nút Quay lại
    echo '<div style="text-align: center; margin-top: 20px; display: flex; justify-content: center; gap: 10px;">';
    echo '<button class="btn btn-primary" style="color: white; border: none; border-radius: 5px; cursor: pointer;"><a href="index.php?page=quanly/quanlyduyetdexuatmonan" style="color: inherit; text-decoration: none;">Quay lại</a></button>';

    // Hiển thị nút Duyệt và Từ chối nếu trạng thái là 1
    if ($trangThai == 1) {
        // Form Duyệt
        echo '<form method="POST" action="" style="display: inline-block; onsubmit="return confirmDuyet(this);">';
        echo '<input type="hidden" name="action" value="duyet">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($chitiet) . '">';
        echo '<button type="submit" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Duyệt</button>';
        echo '</form>';

        // Form Từ chối
        echo '<form method="POST" action="" style="display: inline-block; onsubmit="return confirmTuChoi(this);">';
        echo '<input type="hidden" name="action" value="tuchoi">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($chitiet) . '">';
        echo '<button type="submit" style="background-color: #f44336; color: white; border: none; border-radius: 5px; cursor: pointer;">Từ chối</button>';
        echo '</form>';
    }
    echo '</div>';
} else {
    echo "<h2>Không tìm thấy chi tiết đề xuất!</h2>";
}
?>

<script>
    function confirmDuyet(form) {
        const isConfirmed = confirm("Bạn có chắc chắn muốn duyệt đề xuất này không?");
        if (isConfirmed) {
            form.submit();
        } else {
            return false; // Hủy việc gửi form
        }
    }

    function confirmTuChoi(form) {
        const isConfirmed = confirm("Bạn có chắc chắn muốn từ chối đề xuất này không?");
        if (isConfirmed) {
            form.submit();
        } else {
            return false; // Hủy việc gửi form
        }
    }
</script>