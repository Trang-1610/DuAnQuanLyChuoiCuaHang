<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.container.qlnl {
    width: 90%;
    max-width: 1400px;
    margin: 20px auto;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px;
}

button {
    border: none;
    border-radius: 10px;
    cursor: pointer;
    background-color: #FF9900;
    color: white;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

button a {
    text-decoration: none;
    color: white;
}

.qlnl-search input {
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    width: 300px;
    margin-right: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

thead {
    background-color: #FF9900;
    color: black;
    font-size: 16px;
    text-align: left;
}

thead th {
    padding: 10px;
    position: sticky;
    top: 0;
    z-index: 10;
}

tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
}

tbody tr:nth-child(even) {
    background-color: #ffffff;
}

tbody td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.status-working {
    color: green;
    font-weight: bold;
}

.status-probation {
    color: blue;
    font-weight: bold;
}

.status-left {
    color: red;
    font-weight: bold;
}

td a {
    color: #FF9900;
    text-decoration: none;
    font-size: 18px;
}

td a:hover {
    color: #FF7700;
}
</style>

<?php
    error_reporting();
?>

<body>
    <div class="container qlnl ">
        <h2 class="d-flex justify-content-center font-weight-bold style='color: #333;'">QUẢN LÝ NHÂN VIÊN</h2>
        <div style= "display: flex; justify-content: center;align-items: center;">
        <button style="background-color: #FF9900;border-radius: 10px;"><a href="index.php?page=quanly/quanlynhanvien/themnhanvien" class="d-flex justify-content-center" style="color: white;">Thêm nhân viên</a></button>      
        </div>
        <div class="qlnl-header justify-content-end">
            <!-- Form tìm kiếm -->
            <form action="" method="post" name="frmSearch">
                <div class="qlnl-search" style="display: flex;">
                    <input name="txtTK" placeholder="Tìm theo tên nhân viên..." type="text" 
                        value="<?php echo isset($_POST['txtTK']) ? $_POST['txtTK'] : ''; ?>" />
                    <button name="btnTK" type="submit" style="background: #FF9900; color: white;">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div style ="overflow: auto; height: 500px;">
        <?php
            include("controller/cNhanVien.php");
            $p = new CNhanVien();
            
            // Kiểm tra nếu có tìm kiếm theo tên nhân viên
            if (isset($_POST['btnTK']) && !empty($_POST['txtTK'])) {
                $tblNV = $p->getAllNVbyName($_POST['txtTK']);
            } else {
                $tblNV = $p->getAllNV();
            }
            // Kiểm tra và hiển thị kết quả           
            if ($tblNV && $tblNV->num_rows > 0) {
                echo '<table>';
                echo "
                    <thead style ='display: fixed; position: sticky; top: 0; z-index: 2'>
                        <tr>
                            <th>Mã nhân viên</th>
                            <th>Họ và tên</th>
                            <th>Giới tính</th>
                            <th>Chức vụ</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th>Cửa hàng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                ";
                while ($r = $tblNV->fetch_assoc()) {                   
                    $statusClass = $r['TrangThai'] == 1 
                        ? 'status-working' 
                        : ($r['TrangThai'] == 2 
                            ? 'status-probation' 
                            : 'status-left');
                
                    $statusText = $r['TrangThai'] == 1 
                        ? 'Đang làm việc' 
                        : ($r['TrangThai'] == 2 
                            ? 'Thử việc' 
                            : 'Nghỉ việc');               
                    echo "
                    <tr>
                        <td>{$r['MaNV']}</td>
                        <td>{$r['HoTen']}</td>
                        <td>" . (($r['GioiTinh'] == 1) ? 'Nam' : 'Nữ') . "</td>
                        <td>{$r['TenChucVu']}</td>
                        <td>{$r['DiaChi']}</td>
                        <td>{$r['SDT']}</td>
                        <td>{$r['Email']}</td>
                        <td><span class='{$statusClass}'>{$statusText}</span></td>
                        <td>{$r['TenCuaHang']}</td>
                        <td><a href='index.php?page=quanly/quanlynhanvien/suanhanvien&id={$r['MaNV']}'><i class='fas fa-edit'></i></a></td>
                    </tr>";
                }              
                echo '</table>';
            } else {
                echo "<p>Không có nhân viên nào.</p>";
            }
        ?>
        </div>
        <div class="col-md-4" style="padding-top: 20px;">
            <button>
                <a href="index.php?page=quanly" style="text-decoration: none; color: inherit;">Quay lại</a>
            </button>
        </div>
    </div>
</body>
