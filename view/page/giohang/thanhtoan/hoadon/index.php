<?php
include_once("controller/cHoaDon.php");
$cChiTietHoaDon = new CHoaDon();

// Lấy các chi tiết hóa đơn mới được thêm vào trong 24 giờ qua
$dsChiTietHoaDon = $cChiTietHoaDon->getAllDonHang();

// Mảng để nhóm các món ăn theo mã đơn
$donHangGrouped = [];

if ($dsChiTietHoaDon && $dsChiTietHoaDon->num_rows > 0) {
    while ($row = $dsChiTietHoaDon->fetch_assoc()) {
        $donHangGrouped[$row['Madon']]['mamonan'][] = $row['Mamonan'];
        $donHangGrouped[$row['Madon']]['tenmonan'][] = $row['TenMonAn'];
        $donHangGrouped[$row['Madon']]['soluong'][] = $row['Soluong'];
        $donHangGrouped[$row['Madon']]['tenkhachhang'] = $row['TenKhachHang'];
        $donHangGrouped[$row['Madon']]['giotao'] = $row['GioTaoDon'];
        $donHangGrouped[$row['Madon']]['tongtien'] = $row['TongTien']; // Thêm dòng này
        
    }
    
}
?>

<body>
    <div class="container qlnl">
        <h1 class="text-center py-3">DANH SÁCH HÓA ĐƠN</h1>

        <!-- Bảng hiển thị chi tiết hóa đơn -->
        <table class="table">
        <thead>
    <tr>
        <th>Mã Đơn</th>
        <th>Tên Khách Hàng</th>
        <th>Tên Món Ăn</th>
        <th>Số Lượng</th>
        <th>Tổng Tiền</th> <!-- Thêm cột Tổng Tiền -->
        <th>Ngày Tạo</th>
       
    </tr>
</thead>
<tbody>
    <?php if (!empty($donHangGrouped)): ?>
        <?php foreach ($donHangGrouped as $madon => $details): ?>
            <tr>
                <td><?php echo $madon; ?></td>
                <td><?php echo $details['tenkhachhang']; ?></td>
                <td>
                    <?php echo implode(", ", $details['tenmonan']); ?>
                </td>
                <td>
                    <?php echo implode(", ", $details['soluong']); ?>
                </td>
                <td><?php echo number_format($details['tongtien'], 0, ',', '.'); ?> VND</td> <!-- Hiển thị Tổng Tiền -->

                <td><?php echo $details['giotao']; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" class="text-center">Không có chi tiết hóa đơn nào</td>
        </tr>
    <?php endif; ?>
</tbody>

        </table>
    </div>
</body>