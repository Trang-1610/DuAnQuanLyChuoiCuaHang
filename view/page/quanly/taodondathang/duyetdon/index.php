<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fa;
        color: #333;
    }

    h2 {
        margin: 0;
        padding-top: 20px;
        padding-bottom: 20px;
        font-size: 24px;
        color: #AA0000;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #AA0000;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .clickable-row:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    .status-waiting {
        color: blue;
        font-weight: bold;
    }

    .status-approved {
        color: green;
        font-weight: bold;
    }

    .status-rejected {
        color: red;
        font-weight: bold;
    }

    .qlnl-header {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 15px;
    }

    .qlnl-search input {
        padding: 5px;
        width: 300px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-right: 10px;
    }

    .qlnl-search button {
        padding: 6px 12px;
        border: none;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary {
        padding: 10px 20px;
        color: white;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary a {
        color: inherit;
        text-decoration: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .py-3 {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .font-weight-bold {
        font-weight: bold;
    }
    
</style>

<body>
  <div class="container qlnl">
    <h2 class="font-weight-bold py-3">DANH SÁCH ĐƠN</h2>
    
    <div class="qlnl-header">
      <!-- Form tìm kiếm -->
      <!-- <form action="" method="post" name="frmSearch">
        <div class="qlnl-search">
          <input name="txtTK" placeholder="Tìm kiếm theo tên..." type="text" 
                 value=" " />
          <button name="btnTK" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form> -->
    </div>

    <?php
      include("controller/cDuyetDon.php");
      $p = new cDuyetDon();

      // Lấy danh sách đề xuất
      $tblDD = $p->getAllDon();

      if ($tblDD && $tblDD->num_rows > 0) {
        echo '<table>';
        echo "
          <thead>
            <tr>
              <th>Mã Đơn</th>
              <th>Giờ tạo đơn</th>
              <th>Tổng tiền</th>
              <th>Phương thức thanh toán</th>
              <th>Ghi chú</th>
              <th>Tên khách hàng</th>
              <th>Số điện thoại</th>
              <th>Địa chỉ</th>
              <th>Mã nhân viên</th>
              <th>Mã cửa hàng</th>
              <th>Tình trạng</th>
            </tr>
          </thead>
          <tbody>";
          while ($r = $tblDD->fetch_assoc()) {
              $statusClass = $r['TinhTrang'] == 1 ? 'status-waiting' : ($r['TinhTrang'] == 2 ? 'status-approved' : 'status-rejected');
              $statusText = $r['TinhTrang'] == 1 ? 'Đang chờ duyệt' : ($r['TinhTrang'] == 2 ? 'Đã duyệt' : 'Đã từ chối');
              $link = "index.php?page=quanly/taodondathang/duyetdon/chitietduyetdon&id={$r['MaDon']}";

              echo "
                  <tr class='clickable-row' data-href='{$link}'>
                      <td>{$r['MaDon']}</td>
                      <td>{$r['GioTaoDon']}</td>
                      <td>{$r['TongTien']}</td>
                      <td>{$r['PhuongThucThanhToan']}</td>
                      <td>{$r['GhiChu']}</td>
                      <td>{$r['TenKhachHang']}</td>
                      <td>{$r['SoDienThoai']}</td>
                      <td>{$r['DiaChi']}</td>
                      <td>{$r['MaNhanVien']}</td>
                      <td>{$r['MaCuaHang']}</td>
                      <td class='{$statusClass}'>{$statusText}</td>
                  </tr>
              ";
          }
          echo "</tbody></table>";
      } else {
          echo "<p>Không có đề xuất nào.</p>";
      }
    ?>

    <form action="">
      <div class="text-center mt-4">
        <button class="btn btn-primary"><a href="index.php?page=quanly/taodondathang" class="text-white">Quay lại</a></button>
      </div>
    </form>
  </div>
</body>

<script>
    // JavaScript để làm hàng trở thành liên kết
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('.clickable-row');
        rows.forEach(row => {
            row.addEventListener('click', function () {
                window.location.href = this.dataset.href;
            });
        });
    });
</script>
