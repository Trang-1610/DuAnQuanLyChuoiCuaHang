<?php
include_once("controller/cloainguyenlieu.php");
$cloainguyenlieu = new cloainguyenlieu();




    // Nếu không có từ khóa tìm kiếm, lấy tất cả loại món ăn
    $table = $cloainguyenlieu->getallloainguyenlieu();

?>

<body>
    <div class="container qlnl">
        <h1 class="text-center py-3">QUẢN LÝ LOẠI NGUYÊN LIỆU</h1>
        <div class="text-center mb-3">
            <a href="index.php?page=quanly/quanlynguyenlieu/quanlyloainguyenlieu/themloainguyenlieu" class="btn btn-primary">Thêm Loại
                Nguyên Liệu</a>
        </div>

        

        <!-- Bảng hiển thị các loại món ăn -->
        <table class="table">
            <thead>
                <tr>
                    <th>Mã Loại Nguyên Liệu</th>
                    <th>Tên Loại Nguyên Liệu</th>
                    <!-- <th>Tình Trạng</th> -->
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($table->num_rows > 0): ?>
                <?php while ($row = $table->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['MaLoaiNguyenLieu']; ?></td>
                    <td><?php echo $row['TenLoaiNguyenLieu']; ?></td>
                    <td>
                        <a
                            href="index.php?page=quanly/quanlynguyenlieu/quanlyloainguyenlieu/sualoainguyenlieu&maloai=<?php echo $row['MaLoaiNguyenLieu']; ?>">
                            <i class="fas fa-edit edit-icon"></i> Sửa
                        </a>
                        
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Không có loại nguyên liệu nào phù hợp</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>