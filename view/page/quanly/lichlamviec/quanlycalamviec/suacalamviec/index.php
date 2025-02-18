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

$maNV = isset($_GET['id']) ? $_GET['id'] : '';
$maLich = isset($_GET['malich']) ? $_GET['malich'] : '';

$sql_current = "SELECT nv.*, l.NgayLamViec, li.TenLich, cv.TenChucVu, nv.MaCuaHang as id_cua_hang
                FROM nhanvien nv 
                INNER JOIN calamviec c ON nv.MaNV = c.MaNhanVien
                INNER JOIN lichlamviec l ON c.MaLichLamViec = l.Calamviec
                INNER JOIN lich li ON l.NgayLamViec = li.MaLich
                INNER JOIN chucvu cv ON nv.MaChucVu = cv.MaChucVu
                WHERE nv.MaNV = ? AND c.MaLichLamViec = ?";
$stmt_current = $conn->prepare($sql_current);
$stmt_current->bind_param("ii", $maNV, $maLich);
$stmt_current->execute();
$result_current = $stmt_current->get_result();
$current_nv = $result_current->fetch_assoc();

if (!$current_nv) {
    die("Không tìm thấy thông tin nhân viên");
}

$sql_available = "SELECT nv.* 
                 FROM nhanvien nv 
                 WHERE nv.MaChucVu = ? 
                 AND nv.TrangThai = 1 
                 AND nv.MaNV != ?
                 AND nv.MaNV NOT IN (
                     SELECT c.MaNhanVien 
                     FROM calamviec c 
                     INNER JOIN lichlamviec l ON c.MaLichLamViec = l.Calamviec
                     WHERE l.NgayLamViec = ?
                 )
                 AND nv.MaCuaHang = ?";
$stmt_available = $conn->prepare($sql_available);
$stmt_available->bind_param("iiii", $current_nv['MaChucVu'], $maNV, $current_nv['NgayLamViec'], $current_nv['id_cua_hang']);
$stmt_available->execute();
$result_available = $stmt_available->get_result();
?>

<body>
    <div style="text-align: center; margin-top: 40px;">
        <b style="font-size: 30px;">SỬA CA LÀM VIỆC</b>
        <p><?php echo htmlspecialchars($current_nv['TenLich']); ?></p>
    </div>
    <style>
       .form-container {
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-container {
            text-align: center;
            margin-top: 30px;
        }
        .btn {
            margin: 0 10px;
        }
        #message {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            display: none;
        }
    </style>

    <div class="form-container">
        <div class="form-group">
            <label>Nhân viên hiện tại:</label>
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($current_nv['HoTen']); ?>" readonly>
        </div>

<form id="suaNhanVienForm">
    <div class="form-group">
        <label for="nhanvien_moi">Chọn <?php echo $current_nv['TenChucVu']; ?> thay thế:</label>
        <select class="form-control" id="nhanvien_moi" name="manv_moi" required>
            <option selected disabled>Chọn nhân viên thay thế</option>
            <?php
            if ($result_available->num_rows > 0) {
                while($row = $result_available->fetch_assoc()) {
                    echo "<option value='" . $row['MaNV'] . "'>" . $row['HoTen'] . "</option>";
                }
            }
            ?>
        </select>
    </div>

    <input type="hidden" name="manv_cu" value="<?php echo $maNV; ?>">
    <input type="hidden" name="malich" value="<?php echo $maLich; ?>">
    <input type="hidden" name="id_cua_hang" value="<?php echo $current_nv['id_cua_hang']; ?>">
    
    <div class="btn-container">
        <button type="submit" class="btn btn-primary" id="updateButton" disabled>Cập nhật</button>
        <button type="button" class="btn btn-secondary" 
                onclick="window.location.href='index.php?page=quanly/lichlamviec/quanlycalamviec&machucvu=<?php echo $current_nv['MaChucVu']; ?>&thu=<?php echo urlencode($current_nv['TenLich']); ?>'">
            Hủy
        </button>
    </div>
</form>

<script>
document.getElementById('nhanvien_moi').addEventListener('change', function() {
    var updateButton = document.getElementById('updateButton');
    if (this.value) {
        updateButton.disabled = false;
    } else {
        updateButton.disabled = true;
    }
});
</script>
        
        <div id="message" class="alert"></div>
    </div>

    <script>
    document.getElementById('suaNhanVienForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('view/page/quanly/lichlamviec/quanlycalamviec/suacalamviec/process_sua.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            const messageDiv = document.getElementById('message');
            messageDiv.style.display = 'block';
            
            if (data === 'success') {
                messageDiv.className = 'alert alert-success';
                messageDiv.textContent = 'Cập nhật thành công!';
                setTimeout(() => {
window.location.href='index.php?page=quanly/lichlamviec/quanlycalamviec&machucvu=<?php echo $current_nv['MaChucVu']; ?>&thu=<?php echo urlencode($current_nv['TenLich']); ?>&id_cua_hang=<?php echo $current_nv['id_cua_hang']; ?>';
                }, 1500);
            } else {
                messageDiv.className = 'alert alert-danger';
                messageDiv.textContent = 'Có lỗi xảy ra: ' + data;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            const messageDiv = document.getElementById('message');
            messageDiv.style.display = 'block';
            messageDiv.className = 'alert alert-danger';
            messageDiv.textContent = 'Có lỗi xảy ra khi gửi yêu cầu';
        });
    });
    </script>
</body>

<?php
$stmt_current->close();
$stmt_available->close();
$conn->close();
?>
