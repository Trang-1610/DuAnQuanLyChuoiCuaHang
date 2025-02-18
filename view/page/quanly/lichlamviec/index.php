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

// Kiểm tra xem nhân viên đã đăng nhập chưa
if (!isset($_SESSION["dangnhap"]) || !$_SESSION["dangnhap"]) {
    die("Bạn cần đăng nhập để xem lịch làm việc.");
}

// Lấy mã cửa hàng của nhân viên từ phiên làm việc
$maCuaHang = $_SESSION["dangnhap"]['MaCuaHang'];

// Lấy danh sách cửa hàng cho nhân viên đã đăng nhập
$sql_cuahang = "SELECT MaCuaHang, TenCuaHang FROM cuahang WHERE MaCuaHang = ? ORDER BY MaCuaHang";
$stmt = $conn->prepare($sql_cuahang);
$stmt->bind_param("i", $maCuaHang);
$stmt->execute();
$result_cuahang = $stmt->get_result();
$dsCuaHang = [];
while ($row = $result_cuahang->fetch_assoc()) {
    $dsCuaHang[] = $row;
}

// Lấy danh sách ngày trong tuần
$sql_thu = "SELECT TenLich FROM lich ORDER BY MaLich";
$result_thu = $conn->query($sql_thu);
$thuTrongTuan = [];
while ($row = $result_thu->fetch_assoc()) {
    $thuTrongTuan[] = $row['TenLich'];
}

function getNhanVienTheoThuVaCuaHang($conn, $thu, $maChucVu, $maCuaHang) {
    $sql = "SELECT DISTINCT nv.HoTen 
            FROM calamviec c 
            INNER JOIN lichlamviec l ON c.MaLichLamViec = l.Calamviec
            INNER JOIN lich li ON l.NgayLamViec = li.MaLich
            INNER JOIN nhanvien nv ON c.MaNhanVien = nv.MaNV
            WHERE li.TenLich = ? AND nv.MaChucVu = ? AND nv.MaCuaHang = ?
            ORDER BY nv.HoTen";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $thu, $maChucVu, $maCuaHang);
    $stmt->execute();
    $result = $stmt->get_result();

    $nhanvien = [];
    while ($row = $result->fetch_assoc()) {
        $nhanvien[] = $row['HoTen'];
    }
    return $nhanvien;
}

function getMaxNhanVienTheoCuaHang($conn, $maChucVu, $maCuaHang) {
    $sql = "SELECT li.TenLich, COUNT(DISTINCT c.MaNhanVien) as count
            FROM calamviec c 
            INNER JOIN lichlamviec l ON c.MaLichLamViec = l.Calamviec
            INNER JOIN lich li ON l.NgayLamViec = li.MaLich
            INNER JOIN nhanvien nv ON c.MaNhanVien = nv.MaNV
            WHERE nv.MaChucVu = ? AND nv.MaCuaHang = ?
            GROUP BY li.TenLich
            ORDER BY count DESC
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $maChucVu, $maCuaHang);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return max(3, $row['count']);
    }
    return 3;
}
?>

<body>
    <div style="text-align: center; margin-top: 40px;">
        <b style="font-size: 30px;">LỊCH LÀM VIỆC</b>
        <br><br>
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
    </style>

    <?php foreach ($dsCuaHang as $cuaHang): ?>
        <div>
            <h2 style="text-align: center;"><?php echo $cuaHang['TenCuaHang']; ?></h2>
            <table class="table table-light">
                <tr>
                    <th class="cell"></th>
                    <?php foreach ($thuTrongTuan as $thu): ?>
                        <th class="cell"><?php echo $thu; ?></th>
                    <?php endforeach; ?>
                </tr>

                <!-- Nhân viên -->
                <?php 
                $maxRowsNhanVien = getMaxNhanVienTheoCuaHang($conn, 3, $cuaHang['MaCuaHang']);
                ?>
                <tr>
                    <td rowspan="<?php echo $maxRowsNhanVien + 1; ?>" class="cell">Nhân viên</td>
                    <?php foreach ($thuTrongTuan as $thu): ?>
                        <td class="cell">
                            <?php 
                            $dsNhanVien = getNhanVienTheoThuVaCuaHang($conn, $thu, 3, $cuaHang['MaCuaHang']);
                            echo !empty($dsNhanVien) ? $dsNhanVien[0] : ''; 
                            ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
                <?php for ($i = 1; $i < $maxRowsNhanVien; $i++): ?>
                <tr>
                    <?php foreach ($thuTrongTuan as $thu): ?>
                        <td class="cell">
                            <?php 
                            $dsNhanVien = getNhanVienTheoThuVaCuaHang($conn, $thu, 3, $cuaHang['MaCuaHang']);
                            echo isset($dsNhanVien[$i]) ? $dsNhanVien[$i] : ''; 
                            ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
                <?php endfor; ?>
                <tr>
                    <?php foreach ($thuTrongTuan as $thu): ?>
                        <td class="cell">
                            <a href="index.php?page=quanly/lichlamviec/quanlycalamviec&machucvu=3&cuahang=<?php echo $cuaHang['MaCuaHang']; ?>&thu=<?php echo urlencode($thu); ?>">
                                <i class="fas fa-edit"> Thao tác</i>
                            </a>
                        </td>
                    <?php endforeach; ?>
                </tr>

                <!-- Đầu bếp -->
                <?php 
                $maxRowsDauBep = getMaxNhanVienTheoCuaHang($conn, 4, $cuaHang['MaCuaHang']);
                ?>
                <tr>
                    <td rowspan="<?php echo $maxRowsDauBep + 1; ?>" class="cell">Đầu bếp</td>
                    <?php foreach ($thuTrongTuan as $thu): ?>
                        <td class="cell">
                            <?php 
                            $dsDauBep = getNhanVienTheoThuVaCuaHang($conn, $thu, 4, $cuaHang['MaCuaHang']);
                            echo !empty($dsDauBep) ? $dsDauBep[0] : ''; 
                            ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
                <?php for ($i = 1; $i < $maxRowsDauBep; $i++): ?>
                <tr>
                    <?php foreach ($thuTrongTuan as $thu): ?>
                        <td class="cell">
                            <?php 
                            $dsDauBep = getNhanVienTheoThuVaCuaHang($conn, $thu, 4, $cuaHang['MaCuaHang']);
                            echo isset($dsDauBep[$i]) ? $dsDauBep[$i] : ''; 
                            ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
                <?php endfor; ?>
                <tr>
                    <?php foreach ($thuTrongTuan as $thu): ?>
                        <td class="cell">
                            <a href="index.php?page=quanly/lichlamviec/quanlycalamviec&machucvu=4&cuahang=<?php echo $cuaHang['MaCuaHang']; ?>&thu=<?php echo urlencode($thu); ?>">
                                <i class="fas fa-edit"> Thao tác</i>
                            </a>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>
    <?php endforeach; ?>
</body>

<?php
$conn->close();
?>
