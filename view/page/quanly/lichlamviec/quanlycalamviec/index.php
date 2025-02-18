<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "haoquangptud1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
$conn->set_charset("utf8");

// Lấy tham số từ URL
$maChucVu = isset($_GET['machucvu']) ? $_GET['machucvu'] : 3;
$maCuaHang = isset($_GET['cuahang']) ? $_GET['cuahang'] : 1;
$thu = isset($_GET['thu']) ? $_GET['thu'] : 'Thứ hai';

// Lấy tên chức vụ
$sql_chucvu = "SELECT TenChucVu FROM chucvu WHERE MaChucVu = ?";
$stmt_chucvu = $conn->prepare($sql_chucvu);
$stmt_chucvu->bind_param("i", $maChucVu);
$stmt_chucvu->execute();
$result_chucvu = $stmt_chucvu->get_result();
$row_chucvu = $result_chucvu->fetch_assoc();
$tenChucVu = $row_chucvu['TenChucVu'];

// Lấy danh sách ca làm việc
$sql = "SELECT c.MaLichLamViec, c.MaNhanVien, nv.HoTen, l.ThGBatdau, l.ThGKetthuc, li.TenLich 
        FROM calamviec c 
        INNER JOIN lichlamviec l ON c.MaLichLamViec = l.Calamviec
        INNER JOIN lich li ON l.NgayLamViec = li.MaLich
        INNER JOIN nhanvien nv ON c.MaNhanVien = nv.MaNV
        WHERE nv.MaChucVu = ? AND nv.MaCuaHang = ? AND li.TenLich = ?
        ORDER BY l.ThGBatdau";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $maChucVu, $maCuaHang, $thu);
$stmt->execute();
$result = $stmt->get_result();
?>

<body>
    <div style="text-align: center; margin-top: 40px;">
        <b style="font-size: 30px;">QUẢN LÝ CA LÀM VIỆC - <?php echo mb_strtoupper($tenChucVu, 'UTF-8'); ?></b>
        <p>Cửa hàng: <?php echo htmlspecialchars($maCuaHang); ?></p>
        <p><?php echo htmlspecialchars($thu); ?></p>
        <a href="index.php?page=quanly/lichlamviec">Trở về Lịch làm việc</a>
    </div>
    
    <style>
        table {
          margin: auto;
          text-align: center;
          max-width: 1000px;
          margin-bottom: 30px;
          margin-top: 30px;
          border: 3px solid #bab7b7;
        }
        footer {
            margin-top: 100px;
        }
        .cell {
          border: 1px solid rgb(229, 224, 224);
          box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
          padding: 8px;
          text-align: center;
        }
        .btn {
            margin: 0 5px;
        }
    </style>
    
    <div>
        <table class="table table-light">
            <tr>
                <th class="cell">STT</th>
                <th class="cell">Mã nhân viên</th>
                <th class="cell">Tên nhân viên</th>
                <th class="cell">Giờ bắt đầu</th>
                <th class="cell">Giờ kết thúc</th>
                <th class="cell">Thao tác</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                $stt = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='cell'>" . $stt . "</td>";
                    echo "<td class='cell'>" . $row['MaNhanVien'] . "</td>";
                    echo "<td class='cell'>" . $row['HoTen'] . "</td>";
                    echo "<td class='cell'>" . date('H:i', strtotime($row['ThGBatdau'])) . "</td>";
                    echo "<td class='cell'>" . date('H:i', strtotime($row['ThGKetthuc'])) . "</td>";
                    echo "<td class='cell'>";
                    echo "<button class='btn btn-primary mr-2' onclick=\"window.location.href='index.php?page=quanly/lichlamviec/quanlycalamviec/suacalamviec&id=" . $row['MaNhanVien'] . "&malich=" . $row['MaLichLamViec'] . "'\"><i class='fas fa-user-edit'> Sửa</i></button>";
                    echo "<button class='btn btn-danger' onclick='xoaNhanVien(\"" . $row['MaNhanVien'] . "\", \"" . $row['MaLichLamViec'] . "\")'><i class='fas fa-user-times'> Xóa</i></button>";
                    echo "</td>";
                    echo "</tr>";
                    $stt++;
                }
            }
            ?>
        </table>
        <button type="button" class="btn btn-info" style="display: block; margin: 0 auto;" 
                onclick="window.location.href='index.php?page=quanly/lichlamviec/quanlycalamviec/themcalamviec&machucvu=<?php echo $maChucVu; ?>&cuahang=<?php echo $maCuaHang; ?>&thu=<?php echo urlencode($thu); ?>'">
            <i class="fas fa-address-card"> Thêm</i>
        </button>
    </div>

    <script>
    function xoaNhanVien(maNV, maLich) {
        if (confirm('Bạn có chắc chắn muốn xóa nhân viên này khỏi ca làm việc?')) {
            fetch('view/page/quanly/lichlamviec/quanlycalamviec/xoa_calamviec.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'manv=' + maNV + '&malich=' + maLich
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Xóa thành công!');
                    location.reload();
                } else {
                    alert('Có lỗi xảy ra: ' + data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra khi xóa nhân viên');
            });
        }
    }
    </script>
</body>

<?php
$stmt_chucvu->close();
$stmt->close();
$conn->close();
?>
