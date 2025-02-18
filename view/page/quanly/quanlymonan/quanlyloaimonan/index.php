<?php
include_once("controller/cloaimonan.php");
$cLoaiMonAn = new CLoaiMonAn();

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    if (isset($_GET['maloai'])) {
        $maloai = $_GET['maloai'];
        $result = $cLoaiMonAn->deleteLoaiMonAn($maloai);
        if ($result) {
            echo "<script>alert('Xóa loại món ăn thành công!'); window.location.href='index.php?page=quanly/quanlymonan/quanlyloaimonan';</script>";
        } else {
            echo "<script>alert('Xóa loại món ăn thất bại!'); window.location.href='index.php?page=quanly/quanlymonan/quanlyloaimonan';</script>";
        }
    }
}

if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) {
    // Nếu có từ khóa tìm kiếm, gọi hàm searchLoaiMonAn
    $searchTerm = $_REQUEST['search'];
    $dsLoaiMonAn = $cLoaiMonAn->searchLoaiMonAn($searchTerm); // Lấy kết quả tìm kiếm
} else {
    // Nếu không có từ khóa tìm kiếm, lấy tất cả loại món ăn
    $dsLoaiMonAn = $cLoaiMonAn->getAllLMA();
}
?>

<body>
    <div class="container qlnl">
        <h1 class="text-center py-3">QUẢN LÝ LOẠI MÓN ĂN</h1>
        <div class="text-center mb-3">
            <a href="index.php?page=quanly/quanlymonan/quanlyloaimonan/themloaimonan" class="btn btn-primary">Thêm Loại
                Món Ăn</a>
        </div>

        <!-- Form tìm kiếm -->
        <div class="mb-3">
            <form action="index.php" method="get" class="form-inline">
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..."
                        value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" />
                    <input type="hidden" name="page" value="quanly/quanlymonan/quanlyloaimonan" />
                    <button type="submit" class="btn btn-outline-secondary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>

        </div>

        <!-- Bảng hiển thị các loại món ăn -->
        <table class="table">
            <thead>
                <tr>
                    <th>Mã Loại Món Ăn</th>
                    <th>Tên Loại Món Ăn</th>
                    <th>Tình Trạng</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($dsLoaiMonAn->num_rows > 0): ?>
                <?php while ($row = $dsLoaiMonAn->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['MaLoaiMonAn']; ?></td>
                    <td><?php echo $row['TenLoaiMonAn']; ?></td>
                    <td><?php echo $row['TinhTrangMonAn'] == 1 ? 'Có' : 'Chưa sẵn sàng'; ?></td>
                    <td>
                        <a
                            href="index.php?page=quanly/quanlymonan/quanlyloaimonan/sualoaimonan&maloai=<?php echo $row['MaLoaiMonAn']; ?>">
                            <i class="fas fa-edit edit-icon"></i> Sửa
                        </a>
                        <a href="index.php?page=quanly/quanlymonan/quanlyloaimonan&action=delete&maloai=<?php echo $row['MaLoaiMonAn']; ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa loại món ăn này không?');">
                            <i class="fas fa-trash delete-icon"></i> Xóa
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Không có loại món ăn nào phù hợp</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>