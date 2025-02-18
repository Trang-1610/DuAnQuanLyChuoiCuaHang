<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "haoquangptud1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Kết nối thất bại: " . $conn->connect_error]));
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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $manv = $_POST['manv'];

    $sql_check_nv = "SELECT * FROM nhanvien WHERE MaNV = ? AND MaChucVu = ? AND MaCuaHang = ? AND TrangThai = 1";
    $stmt_check = $conn->prepare($sql_check_nv);
    $stmt_check->bind_param("iii", $manv, $maChucVu, $maCuaHang);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        $sql_get_malich = "SELECT MaLich FROM lich WHERE TenLich = ?";
        $stmt_malich = $conn->prepare($sql_get_malich);
        $stmt_malich->bind_param("s", $thu);
        $stmt_malich->execute();
        $result_malich = $stmt_malich->get_result();

        if ($result_malich->num_rows > 0) {
            $row_malich = $result_malich->fetch_assoc();
            $malich = $row_malich['MaLich'];

            $sql_lich = "SELECT Calamviec FROM lichlamviec WHERE NgayLamViec = ?";
            $stmt_lich = $conn->prepare($sql_lich);
            $stmt_lich->bind_param("i", $malich);
            $stmt_lich->execute();
            $result_lich = $stmt_lich->get_result();

            if ($result_lich->num_rows > 0) {
                $row_lich = $result_lich->fetch_assoc();
                $maLichLamViec = $row_lich['Calamviec'];

                $sql_check_ca = "SELECT * FROM calamviec WHERE MaNhanVien = ? AND MaLichLamViec = ?";
                $stmt_check_ca = $conn->prepare($sql_check_ca);
                $stmt_check_ca->bind_param("ii", $manv, $maLichLamViec);
                $stmt_check_ca->execute();
                $result_check_ca = $stmt_check_ca->get_result();

                if ($result_check_ca->num_rows === 0) {
                    $sql_insert = "INSERT INTO calamviec (MaLichLamViec, MaNhanVien) VALUES (?, ?)";
                    $stmt_insert = $conn->prepare($sql_insert);
                    $stmt_insert->bind_param("ii", $maLichLamViec, $manv);

                    if ($stmt_insert->execute()) {
                        header("Location: index.php?page=quanly/lichlamviec/quanlycalamviec&machucvu=$maChucVu&cuahang=$maCuaHang&thu=" . urlencode($thu));
                        exit;
                    } else {
                        die(json_encode(["status" => "error", "message" => $conn->error]));
                    }
                    $stmt_insert->close();
                } else {
                    die(json_encode(["status" => "error", "message" => "Nhân viên đã được phân công vào ca làm việc này"]));
                }
                $stmt_check_ca->close();
            } else {
                die(json_encode(["status" => "error", "message" => "Không tìm thấy ca làm việc cho thứ này"]));
            }
            $stmt_lich->close();
        } else {
            die(json_encode(["status" => "error", "message" => "Không tìm thấy thứ này trong lịch"]));
        }
        $stmt_malich->close();
    } else {
        die(json_encode(["status" => "error", "message" => "Không tìm thấy nhân viên hoặc chức vụ không đúng"]));
    }
    $stmt_check->close();
    exit;
}

// Lấy danh sách nhân viên khả dụng
$sql_get_malich = "SELECT MaLich FROM lich WHERE TenLich = ?";
$stmt_malich = $conn->prepare($sql_get_malich);
$stmt_malich->bind_param("s", $thu);
$stmt_malich->execute();
$result_malich = $stmt_malich->get_result();
$excludedNhanVien = [];
if ($result_malich->num_rows > 0) {
    $row_malich = $result_malich->fetch_assoc();
    $malich = $row_malich['MaLich'];

    $sql_lich = "SELECT Calamviec FROM lichlamviec WHERE NgayLamViec = ?";
    $stmt_lich = $conn->prepare($sql_lich);
    $stmt_lich->bind_param("i", $malich);
    $stmt_lich->execute();
    $result_lich = $stmt_lich->get_result();

    if ($result_lich->num_rows > 0) {
        $row_lich = $result_lich->fetch_assoc();
        $maLichLamViec = $row_lich['Calamviec'];

        $sql_excluded_nv = "SELECT MaNhanVien FROM calamviec WHERE MaLichLamViec = ?";
        $stmt_excluded_nv = $conn->prepare($sql_excluded_nv);
        $stmt_excluded_nv->bind_param("i", $maLichLamViec);
        $stmt_excluded_nv->execute();
        $result_excluded_nv = $stmt_excluded_nv->get_result();

        while ($row_excluded_nv = $result_excluded_nv->fetch_assoc()) {
            $excludedNhanVien[] = $row_excluded_nv['MaNhanVien'];
        }
        $stmt_excluded_nv->close();
    }
    $stmt_lich->close();
}
$stmt_malich->close();

$excludedNhanVienList = implode(",", $excludedNhanVien);
$sql = "SELECT MaNV, HoTen FROM nhanvien WHERE TrangThai = 1 AND MaChucVu = ? AND MaCuaHang = ?";
if (!empty($excludedNhanVien)) {
    $sql .= " AND MaNV NOT IN ($excludedNhanVienList)";
}
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $maChucVu, $maCuaHang);
$stmt->execute();
$result = $stmt->get_result();
?>

<body>
    <div style="text-align: center; margin-top: 40px;">
        <b style="font-size: 30px;">THÊM <?php echo mb_strtoupper($tenChucVu, 'UTF-8'); ?> VÀO CA LÀM VIỆC</b>
        <p>Cửa hàng: <?php echo htmlspecialchars($maCuaHang); ?></p>
        <p><?php echo htmlspecialchars($thu); ?></p>
    </div>

    <div class="container mt-3">
        <form id="themNhanVienForm" method="POST">
            <div class="form-group">
                <label for="nhanvien">Chọn <?php echo $tenChucVu; ?>:</label>
                <select class="form-control" id="nhanvien" name="manv" required>
                    <option selected disabled>Chọn <?php echo $tenChucVu; ?></option>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['MaNV'] . "'>" . $row['HoTen'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="button-group text-center mt-4">
                <button type="submit" class="btn btn-primary" id="themButton" disabled>Thêm</button>
                <button type="button" class="btn btn-secondary" 
                        onclick="window.location.href='index.php?page=quanly/lichlamviec/quanlycalamviec&machucvu=<?php echo $maChucVu; ?>&cuahang=<?php echo $maCuaHang; ?>&thu=<?php echo urlencode($thu); ?>'">
                    Hủy
                </button>
            </div>
        </form>
    </div>

    <script>
    document.getElementById('nhanvien').addEventListener('change', function() {
        var themButton = document.getElementById('themButton');
        if (this.value) {
            themButton.disabled = false;
        } else {
            themButton.disabled = true;
        }
    });
    </script>
</body>
