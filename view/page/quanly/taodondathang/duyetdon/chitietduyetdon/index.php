<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fa;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #AA0000;
        font-size: 28px;
        font-weight: bold;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 15px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #AA0000;
        color: white;
        font-size: 16px;
    }

    td {
        font-size: 14px;
        color: #555;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .status-text, .status-update, .status {
        padding: 5px 10px;
        border-radius: 3px;
        font-weight: bold;
    }

    .status-text {
        background-color: #2196F3;
        color: white;
    }

    .status-update {
        background-color: #4CAF50;
        color: white;
    }

    .status {
        background-color: #f44336;
        color: white;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        text-align: center;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-success {
        background-color: #4CAF50;
        color: white;
    }

    .btn-success:hover {
        background-color: #45a049;
    }

    .btn-danger {
        background-color: #f44336;
        color: white;
    }

    .btn-danger:hover {
        background-color: #e53935;
    }

    .btn-container {
        text-align: center;
        margin-top: 30px;
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .btn-container form {
        display: inline-block;
    }

    .back-btn-container {
        text-align: center;
        margin-top: 30px;
    }

    .back-btn-container a {
        color: inherit;
        text-decoration: none;
        padding: 10px 20px;
        background-color: #007bff;
        border-radius: 5px;
        color: white;
        font-size: 16px;
    }

    .back-btn-container a:hover {
        background-color: #0056b3;
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
            if ($trangthai == 1) {
                // Form Duyệt
                echo '<div class="btn-container">';
                echo '<form method="POST" action="" onsubmit="return confirmDuyet(this);">';
                echo '<input type="hidden" name="action" value="duyet">';
                echo '<input type="hidden" name="id" value="' . htmlspecialchars($chitiet) . '">';
                echo '<button type="submit" class="btn btn-success">Duyệt</button>';
                echo '</form>';

                // Form Từ chối
                echo '<form method="POST" action="" onsubmit="return confirmTuChoi(this);">';
                echo '<input type="hidden" name="action" value="tuchoi">';
                echo '<input type="hidden" name="id" value="' . htmlspecialchars($chitiet) . '">';
                echo '<button type="submit" class="btn btn-danger">Từ chối</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "<h2>Không tìm thấy chi tiết đơn hàng!</h2>";
        }
        // Hiển thị nút Quay lại
        echo '<div class="back-btn-container">';
        echo '<a href="index.php?page=quanly/taodondathang/duyetdon">Quay lại</a>';
        echo '</div>';
      } else {
          echo "<h2>Không thể truy xuất dữ liệu từ cơ sở dữ liệu.</h2>";
      }
    ?>
  </div>

  <!-- JavaScript để xác nhận khi nhấn nút Duyệt hoặc Từ chối -->
  <script>
      function confirmDuyet(form) {
          const isConfirmed = confirm("Bạn có chắc chắn muốn duyệt đơn này không?");
          if (isConfirmed) {
              form.submit();
          } else {
              return false; // Hủy việc gửi form
          }
      }

      function confirmTuChoi(form) {
          const isConfirmed = confirm("Bạn có chắc chắn muốn từ chối đơn này không?");
          if (isConfirmed) {
              form.submit();
          } else {
              return false; // Hủy việc gửi form
          }
      }
  </script>
</body>
