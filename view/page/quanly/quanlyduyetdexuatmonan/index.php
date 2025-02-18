<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    color: #333;
  }

  .container {
    max-width: 1000px;
    margin: 20px auto;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    padding: 20px;
  }

  .qlnl-header {
    display: flex;
    justify-content: flex-end;
    padding: 10px 0;
  }
  .qlnl-search {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
}
/* Select dropdown */
.qlnl-search select {
    padding: 8px 12px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f8f9fa;
    color: #333;
    outline: none;
    transition: all 0.3s ease;
}

  .qlnl-search select {
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ddd;
    margin-right: 10px;
    transition: border-color 0.3s;
  }

  .qlnl-search select:focus {
    /* border-color: #007bff; */
    outline: none;
  }

/* Nút lọc */
.qlnl-search button {
    padding: 8px 12px;
    color: white;
    font-size: 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

  .qlnl-search button:hover {
    transform: scale(1.05);
  }

  button {
    border: none;
    border-radius: 10px;
    cursor: pointer;
    background-color: #FF9900;
    color: white;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  table, th, td {
    border: 1px solid #ddd;
  }

  th, td {
    padding: 12px;
    text-align: center;
  }

  th {
    background-color: #f8f9fa;
    font-weight: bold;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
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

  .clickable-row {
    cursor: pointer;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .container {
      padding: 15px;
    }

    h2 {
      font-size: 20px;
    }

    table th, table td {
      font-size: 14px;
      padding: 8px;
    }
  }
</style>

<body>
  <div class="container qlnl">
    <h2 class="d-flex justify-content-center py-3" style='color: #333;'>DANH SÁCH ĐỀ XUẤT MÓN ĂN</h2>
    <div class="qlnl-header justify-content-end py-2"> 
      <!-- Form tìm kiếm -->
      <form action="index.php" method="get" name="frmSearch">
    <input type="hidden" name="page" value="quanly/quanlyduyetdexuatmonan">
    <div class="qlnl-search">
        <!-- Bộ lọc trạng thái -->
        <select name="statusFilter" style="margin-right: 10px;">
            <option value="" <?php echo !isset($_GET['statusFilter']) || $_GET['statusFilter'] === '' ? 'selected' : ''; ?>>Tất cả trạng thái</option>
            <option value="1" <?php echo isset($_GET['statusFilter']) && $_GET['statusFilter'] == 1 ? 'selected' : ''; ?>>Đang chờ duyệt</option>
            <option value="2" <?php echo isset($_GET['statusFilter']) && $_GET['statusFilter'] == 2 ? 'selected' : ''; ?>>Đã duyệt</option>
            <option value="3" <?php echo isset($_GET['statusFilter']) && $_GET['statusFilter'] == 3 ? 'selected' : ''; ?>>Đã từ chối</option>
        </select>
        <button name="btnFilter" type="submit" class="" style="background-color: #FF9900;"> <i class="fas fa-filter"></i></button>
    </div>
</form>

    </div>

    <?php
    include("controller/cDeXuat.php");
    $p = new CDeXuat();

    // Lấy giá trị trạng thái từ form
    $statusFilter = isset($_GET['statusFilter']) && $_GET['statusFilter'] !== '' ? $_GET['statusFilter'] : null;

    // Gọi hàm lấy danh sách đề xuất với trạng thái được lọc
    $tblDX = $p->getDanhSachDeXuat($statusFilter);

    if ($tblDX && $tblDX->num_rows > 0) {
        echo '<table class="table table-bordered">';
        echo "
          <thead class='thead-dark'>
            <tr>
              <th>Số thứ tự</th>
              <th>Tên món ăn</th>
              <th>Người đề xuất</th>
              <th>Trạng thái</th>
            </tr>
          </thead>
          <tbody>
        ";

        while ($r = $tblDX->fetch_assoc()) {
            $statusClass = $r['TrangThai'] == 1 ? 'status-waiting' : ($r['TrangThai'] == 2 ? 'status-approved' : 'status-rejected');
            $statusText = $r['TrangThai'] == 1 ? 'Đang chờ duyệt' : ($r['TrangThai'] == 2 ? 'Đã duyệt' : 'Đã từ chối');
            $link = "index.php?page=quanly/quanlyduyetdexuatmonan/chitietdexuatmonan&id={$r['MaDeXuat']}";

            echo "
              <tr class='clickable-row' data-href='{$link}'>
                  <td>{$r['MaDeXuat']}</td>
                  <td>{$r['TenMonAn']}</td>
                  <td>{$r['NguoiDeXuat']}</td>
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
      <div class="col-md-4" style="padding-top: 20px;">
        <button class="">
          <a href="index.php?page=quanly" style="text-decoration: none; color: inherit;">Quay lại</a>
        </button>
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

