<style>


thead th {
    background-color: #f4f4f4; /* Màu nền cho header */
    position: sticky; /* Giữ cố định header */
    top: 0; /* Đặt vị trí header ở trên cùng */
    z-index: 2; /* Đảm bảo header nằm trên nội dung */
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9; /* Màu nền cho các dòng chẵn */
}

tbody tr:hover {
    background-color: #f1f1f1; /* Hiệu ứng hover cho dòng */
}

th, td {
    padding: 10px; /* Khoảng cách nội dung trong ô */
    border: 1px solid #ddd; /* Đường viền các ô */
}

/* Đặt chiều cao khung bảng và bật thanh cuộn dọc */
.container table {
    display: block; /* Đặt bảng thành khối để bật cuộn */
    overflow-y: auto; /* Thanh cuộn dọc */
    max-height: 600px; /* Chiều cao tối đa của bảng */
}


</style>
<body>
    <div class="container qlnl">
        <h1 class="d-flex justify-content-center py-3 font-weight-bold">QUẢN LÝ MÓN ĂN</h1>
        <a href="index.php?page=quanly/quanlymonan/themmonan" class="d-flex justify-content-center" >Thêm món ăn</a>
        <a href="index.php?page=quanly/quanlymonan/quanlyloaimonan">
            <button style="background-color: #FFA500">Quản lý loại món ăn</button>
        </a>
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

            <!-- Dropdown chọn loại món ăn -->
            <form action="" method="post">
                <select name="loaiMonAnId" class="qlnl-option" onchange="this.form.submit()">
                    <option value="">Chọn loại món ăn</option>
                    <?php
                    include("controller/cLoaiMonAn.php");
                    $controller = new CLoaiMonAn();
                    $dsLoaiMonAn = $controller->getAllLoaiMonAn();

                    if ($dsLoaiMonAn) {
                        while ($loai = $dsLoaiMonAn->fetch_assoc()) {
                            $selected = isset($_POST['loaiMonAnId']) && $_POST['loaiMonAnId'] == $loai['MaLoaiMonAn'] ? 'selected' : '';
                            echo "<option value='{$loai['MaLoaiMonAn']}' {$selected}>{$loai['TenLoaiMonAn']}</option>";
                        }
                    } else {
                        echo "<option value=''>Không có loại món ăn</option>";
                    }
                    ?>
                </select>
            </form>
        </div>

        <?php
            include("controller/cMonAn.php");
            $p = new cMonAn();
            $maLoaiMonAn = isset($_POST['loaiMonAnId']) ? $_POST['loaiMonAnId'] : ''; // Ensure variable is set

            // Kiểm tra nếu có tìm kiếm hoặc lọc theo loại món ăn
            if (isset($_POST['btnTK']) && !empty($_POST['txtTK'])) {
                $tblMonAn = $p->getAllSPbyName($_POST['txtTK']);
            } elseif ($maLoaiMonAn != '') {
                $tblMonAn = $p->getAllMonanbyLoai($maLoaiMonAn);
            } else {
                $tblMonAn = $p->getAllMonAN();
            }

            // Kiểm tra và hiển thị kết quả
            if ($tblMonAn && $tblMonAn->num_rows > 0) {
                echo '<table>';
                echo "
                    <thead>
                        <tr>
                            <th>Mã Món Ăn</th>
                            <th>Mã loại Món Ăn</th>
                            <th>Tên Món Ăn</th>
                            <th>Giá Món Ăn</th>
                            <th>Mô Tả</th>
                            <th>Tình Trạng</th>
                            <th>Hình Ảnh</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                ";
                while ($r = $tblMonAn->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$r['MaMonAn']}</td>
                        <td>{$r['MaLoaiMonAn']}</td>
                        <td>{$r['Tenmonan']}</td>
                        <td>" . number_format($r['Giaban']) . " VNĐ</td>
                        <td>{$r['Mota']}</td>
                        <td>{$r['Tinhtrang']}</td>
                        <td><img src='img/monan/{$r['Hinhanh']}' width='50px'></td>

                        <td><a href='index.php?page=quanly/quanlymonan/suamonan&id={$r['MaMonAn']}'><i class='fas fa-edit edit-icon'></i></a></td>
                    </tr>";
                }
                echo '</table>';
            } else {
                echo "Không có món ăn nào.";
            }
        ?>
    </div>
</body>
