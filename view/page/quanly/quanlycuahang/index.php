<body>
    <div class="container qlnl">
        <h1 class="d-flex justify-content-center py-3 font-weight-bold">QUẢN LÝ CỬA HÀNG</h1>
        <a href="index.php?page=quanly/quanlycuahang/themcuahang" class="d-flex justify-content-center">Thêm cửa hàng</a>
        <div class="qlnl-header justify-content-end py-3">
            <!-- Form tìm kiếm -->
            <form action="" method="post" name="frmSearch">
                <div class="qlnl-search" style="display: flex;">
                    <input name="txtTK" placeholder="Tìm kiếm theo tên..." type="text" 
                        value="<?php echo isset($_POST['txtTK']) ? $_POST['txtTK'] : ''; ?>" />
                    <button name="btnTK" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

       <?php
        include("controller/cCuaHang.php");
        $p = new CCuaHang();
        $dsCuaHang = $p->getAllCuaHang();
        $maCuaHang = isset($_POST['ID']) ? $_POST['ID'] : ''; // Ensure variable is set

    // Kiểm tra nếu có tìm kiếm hoặc lọc theo loại món ăn
    if (isset($_POST['btnTK']) && !empty($_POST['txtTK'])) {
        $tblCuaHang = $p->getAllSPbyName($_POST['txtTK']);
    }else {
        $tblCuaHang = $p->getAllCuaHang(); // Lấy tất cả cửa hàng khi không tìm kiếm hoặc lọc
    }

    // Kiểm tra và hiển thị kết quả
    if ($tblCuaHang && $tblCuaHang->num_rows > 0) {
        echo '<table class="table table-bordered">';
        echo "
            <thead>
                <tr>
                    <th>Mã Cửa Hàng</th>
                    <th>Tên Cửa Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Tình Trạng</th>
                    <th>Hình Ảnh</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
        ";

        while ($r = $tblCuaHang->fetch_assoc()) {
            echo "
            <tr>
                <td>{$r['MaCuaHang']}</td>
                <td>{$r['TenCuaHang']}</td>
                <td>{$r['DiaChi']}</td>
                <td>{$r['TinhTrang']}</td>
                <td><img src='img/cuahang/{$r['HinhAnh']}' width='50px' height='50' alt='Hình ảnh cửa hàng'></td>
                <td><a href='index.php?page=quanly/quanlycuahang/suacuahang&id={$r['MaCuaHang']}'><i class='fas fa-edit edit-icon'></i> Sửa</a></td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "Không có cửa hàng nào.";
    }
?>

    </div>
</body>
