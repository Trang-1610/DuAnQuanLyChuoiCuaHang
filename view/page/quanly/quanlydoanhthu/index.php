<?php
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "haoquangptud1");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Khởi tạo biến
$maCuaHang = isset($_POST['cua_hang']) ? $_POST['cua_hang'] : '';
$nam = isset($_POST['nam']) ? $_POST['nam'] : '';
$thang = isset($_POST['thang']) ? $_POST['thang'] : '';
$labels = [];
$data = [];

// Xử lý dữ liệu
if ($maCuaHang === 'all') {
    // Tất cả cửa hàng: Tổng doanh thu của từng cửa hàng
    $query = "SELECT cuahang.TenCuaHang, SUM(donhang.TongTien) AS TongDoanhThu 
              FROM donhang 
              JOIN cuahang ON donhang.MaCuaHang = cuahang.MaCuaHang
              GROUP BY cuahang.MaCuaHang
              ORDER BY cuahang.TenCuaHang";
    $title = "Tổng doanh thu của tất cả cửa hàng";
} elseif ($maCuaHang) {
    if ($nam && $thang) {
        // Doanh thu từng ngày trong tháng đã chọn
        $query = "SELECT DAY(GioTaoDon) AS Ngay, SUM(TongTien) AS TongDoanhThu 
                  FROM donhang 
                  WHERE MaCuaHang = '$maCuaHang' AND YEAR(GioTaoDon) = '$nam' AND MONTH(GioTaoDon) = '$thang'
                  GROUP BY Ngay
                  ORDER BY Ngay";
        $title = "Doanh thu theo ngày trong tháng $thang năm $nam của cửa hàng";
    } elseif ($nam) {
        // Doanh thu từng tháng trong năm đã chọn
        $query = "SELECT MONTH(GioTaoDon) AS Thang, SUM(TongTien) AS TongDoanhThu 
                  FROM donhang 
                  WHERE MaCuaHang = '$maCuaHang' AND YEAR(GioTaoDon) = '$nam'
                  GROUP BY Thang
                  ORDER BY Thang";
        $title = "Doanh thu theo tháng trong năm $nam của cửa hàng";
    } else {
        // Doanh thu từng năm của cửa hàng
        $query = "SELECT YEAR(GioTaoDon) AS Nam, SUM(TongTien) AS TongDoanhThu 
                  FROM donhang 
                  WHERE MaCuaHang = '$maCuaHang'
                  GROUP BY Nam
                  ORDER BY Nam";
        $title = "Doanh thu theo năm của cửa hàng";
    }
} else {
    $title = "Vui lòng chọn cửa hàng để xem thông tin.";
}

if (!empty($query)) {
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = $row[array_keys($row)[0]]; // Tên cột đầu tiên (TenCuaHang/Nam/Thang/Ngay)
        $data[] = $row['TongDoanhThu'];
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý doanh thu</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
         body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h1, h2 {
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        select {
            padding: 10px;
            font-size: 16px;
            margin: 10px 5px;
        }
        canvas {
            max-width: 1500px; /* Chiều rộng của biểu đồ */
            width: 80%; /* Điều chỉnh chiều rộng */
            max-height: 400px; /* Chiều cao của biểu đồ */
            margin: 20px auto; /* Căn giữa và tạo khoảng cách trên dưới */
            display: block;
            padding-left: 20px; /* Tạo khoảng cách bên trái */
            padding-right: 20px; /* Tạo khoảng cách bên phải */
        }
        select {
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <br><br><br><br>
    <h1>QUẢN LÝ DOANH THU</h1>
    <form method="POST" action="">
        <select name="cua_hang" onchange="this.form.submit()">
            <option value="">Chọn cửa hàng</option>
            <option value="all" <?php echo $maCuaHang === 'all' ? 'selected' : ''; ?>>Tất cả cửa hàng</option>
            <?php
            // Lấy danh sách cửa hàng
            $query = "SELECT * FROM cuahang";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $selected = $maCuaHang == $row['MaCuaHang'] ? 'selected' : '';
                echo "<option value='{$row['MaCuaHang']}' $selected>{$row['TenCuaHang']}</option>";
            }
            ?>
        </select>

        <select name="nam" onchange="this.form.submit()">
            <option value="">Chọn năm</option>
            <?php
            // Lấy danh sách năm
            if ($maCuaHang && $maCuaHang !== 'all') {
                $query = "SELECT DISTINCT YEAR(GioTaoDon) AS Nam 
                          FROM donhang 
                          WHERE MaCuaHang = '$maCuaHang'
                          ORDER BY Nam DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = $nam == $row['Nam'] ? 'selected' : '';
                    echo "<option value='{$row['Nam']}' $selected>{$row['Nam']}</option>";
                }
            }
            ?>
        </select>

        <select name="thang" onchange="this.form.submit()">
            <option value="">Chọn tháng</option>
            <?php
            // Lấy danh sách tháng
            if ($maCuaHang && $nam && $maCuaHang !== 'all') {
                $query = "SELECT DISTINCT MONTH(GioTaoDon) AS Thang 
                          FROM donhang 
                          WHERE MaCuaHang = '$maCuaHang' AND YEAR(GioTaoDon) = '$nam'
                          ORDER BY Thang";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = $thang == $row['Thang'] ? 'selected' : '';
                    echo "<option value='{$row['Thang']}' $selected>{$row['Thang']}</option>";
                }
            }
            ?>
        </select>
    </form>

    <?php if (!empty($data)): ?>
        <h2><?php echo $title; ?></h2>
        <canvas id="doanhThuChart" width="400" height="200"></canvas>
        <script>
            const ctx = document.getElementById('doanhThuChart').getContext('2d');
            const doanhThuChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($labels); ?>, // Tên cửa hàng/Năm/Tháng/Ngày
                    datasets: [{
                        label: 'Doanh thu (VNĐ)',
                        data: <?php echo json_encode($data); ?>, // Doanh thu tương ứng
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return new Intl.NumberFormat('vi-VN').format(value) + ' VNĐ'; // Định dạng tiền tệ
                                }
                            }
                        }
                    }
                }
            });
        </script>
    <?php endif; ?>
</body>
</html>
