<style>
    /* Tổng thể body */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #eef2f7;
        margin: 0;
        padding: 0;
    }

    /* Tiêu đề */
    h2 {
        text-align: center;
        color: #333;
        font-size: 32px;
        font-weight: 600;
        margin: 30px 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Bảng */
    table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 20px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    td {
        font-size: 14px;
        color: #555;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f7ff;
        transition: background-color 0.3s ease;
    }

    /* Trạng thái */
    .status-text {
        padding: 6px 12px;
        background-color: #007bff;
        color: white;
        border-radius: 20px;
        font-size: 13px;
        display: inline-block;
        text-align: center;
    }

    .status-update {
        padding: 6px 12px;
        background-color: #28a745;
        color: white;
        border-radius: 20px;
        font-size: 13px;
        display: inline-block;
        text-align: center;
    }

    .status {
        padding: 6px 12px;
        background-color: #dc3545;
        color: white;
        border-radius: 20px;
        font-size: 13px;
        display: inline-block;
        text-align: center;
    }

    /* Các nút bấm */
    .btn-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin: 30px 0;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        text-align: center;
        font-weight: 600;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 10px rgba(0, 91, 187, 0.2);
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
        box-shadow: 0 4px 10px rgba(33, 136, 56, 0.2);
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
        box-shadow: 0 4px 10px rgba(200, 35, 51, 0.2);
    }

    /* Nút Quay lại */
    .back-btn-container {
        text-align: center;
        margin-top: 30px;
    }

    .back-btn-container a {
        padding: 10px 25px;
        background-color: #007bff;
        color: white;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .back-btn-container a:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 10px rgba(0, 91, 187, 0.2);
    }
</style>


<body>
  <div class="container">
    <?php
      include_once("controller/cDuyetDon.php");

      // Lấy mã đề xuất từ request
      $chitiet = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

      // Gọi controller để lấy dữ liệu chi tiết
      $p = new cDuyetDon();
      $tblDD = $p->getChiTietDon($chitiet);
      include_once("view/page/quanly/taodondathang/duyetdon/chitietduyetdon/xuly.php");

      // Hiển thị dữ liệu
      if ($tblDD && is_object($tblDD) && isset($tblDD->num_rows)) {
        if ($tblDD->num_rows > 0) {
            echo '<h2>Chi tiết đơn hàng</h2>';
            echo '<div style="display: flex; justify-content: center; align-items: center;">';
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Thông tin</th>";
            echo "<th>Chi tiết</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            $trangThai = null; // Biến để lưu trạng thái
            while ($r = $tblDD->fetch_assoc()) {
                echo "<tr><td><b>Mã đơn</b></td><td>" . htmlspecialchars($r["MaDon"]) . "</td></tr>";
                echo "<tr><td><b>Giờ tạo đơn</b></td><td>" . htmlspecialchars($r["GioTaoDon"]) . "</td></tr>";
                echo "<tr><td><b>Tổng tiền</b></td><td>" . number_format($r["TongTien"], 0, '.', ',') . " VND</td></tr>";
                echo "<tr><td><b>Phương thức thanh toán</b></td><td>" . htmlspecialchars($r["PhuongThucThanhToan"]) . "</td></tr>";
                echo "<tr><td><b>Ghi chú</b></td><td>" . htmlspecialchars($r["GhiChu"]) . "</td></tr>";
                echo "<tr><td><b>Tên khách hàng</b></td><td>" . htmlspecialchars($r["TenKhachHang"]) . "</td></tr>";
                echo "<tr><td><b>Số điện thoại</b></td><td>" . htmlspecialchars($r["SoDienThoai"]) . "</td></tr>";
                echo "<tr><td><b>Địa chỉ</b></td><td>" . htmlspecialchars($r["DiaChi"]) . "</td></tr>";
                echo "<tr><td><b>Mã nhân viên</b></td><td>" . htmlspecialchars($r["MaNhanVien"]) . "</td></tr>";
                echo "<tr><td><b>Mã cửa hàng</b></td><td>" . htmlspecialchars($r["MaCuaHang"]) . "</td></tr>";
                echo "<tr><td><b>Trạng thái</b></td><td>";
                echo ($r['TinhTrang'] == 1) ? '<span class="status-text">Đang chờ duyệt</span>' : 
                     (($r['TinhTrang'] == 2) ? '<span class="status-update">Đã duyệt</span>' : 
                     '<span class="status">Đã từ chối</span>');
                echo "</td></tr>";

                // Ghi lại trạng thái để kiểm tra bên ngoài vòng lặp
                $trangthai = $r['TinhTrang'];
                // echo $_GET['id'];
                $table1=$p->getChiTietDonmonan($_REQUEST['id']);
                if (!$table1) {
                    // Nếu truy vấn bị lỗi, in ra lỗi SQL
                    echo "Lỗi SQL: " ;
                    exit; // Dừng chương trình để kiểm tra lỗi
                }
        // echo $table1;
                // Nếu truy vấn thành công, xử lý kết quả
                echo "<tr><td><b>Mã món ăn</b></td><td><b>Tên món ăn</b></td><td><b>Số lượng</b></td></tr>";
                while ($r1   = $table1->fetch_assoc()) {

                    echo "<tr>";
                    echo '<td>' . $r1["Mamonan"] . '</td>';
                    echo '<td>' . $r1["Tenmonan"] . '</td>';
                    echo '<td>' . $r1["Soluong"] . '</td>';
                    echo '</tr>';
                }
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";

            // Hiển thị nút Duyệt và Từ chối nếu trạng thái là 1
        } else {
            echo "<h2>Không tìm thấy chi tiết đơn hàng!</h2>";
        }
        // Hiển thị nút Quay lại
        echo '<div class="back-btn-container">';
        echo '<a href="index.php?page=quanly/quanlydonhang">Quay lại</a>';
        echo '</div>';
      } else {
          echo "<h2>Không thể truy xuất dữ liệu từ cơ sở dữ liệu.</h2>";
      }
    ?>
  </div>

</body>
