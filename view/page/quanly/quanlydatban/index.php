<style>
   body {
            background-color: #f8f9fa;
        }
        .banner {
            background-color: #ffcc80;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 20px;
        }
        .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
        }
        .search-bar {
            margin-bottom: 20px;
        }
        .table-status {
            text-align: center;
            margin-bottom: 20px;
        }
        .table-status img {
            width: 100px;
            height: 50px;
        }
        .table-status .btn {
            width: 100px;
        }
        .reservation-form {
            border-left: 1px solid #dee2e6;
            padding-left: 20px;
        }
        .reservation-form h4 {
            margin-bottom: 20px;
        }
        .reservation-form .btn {
            width: 100px;
        }
</style>

<body>
    
    <div class="container mt-3">
        <div class="row">
            <!-- Cột bên trái: danh sách bàn -->
            <div class="col-8">
            <br><h2 style="text-align: center;">Danh sách bàn</h2> <br> <hr>
                <div class="row">
                    
                <?php
                include("controller/cBan.php");

                // Lấy giá trị `id` từ URL
                $id = isset($_GET['id']) ? $_GET['id'] : null;

                $p = new CBan();
                include("view/page/quanly/quanlydatban/xuly.php");
                $nguoiDung = $_SESSION["dangnhap"];  // Lấy thông tin người dùng từ session
                $maCuaHang = $nguoiDung['MaCuaHang']; // Lấy mã cửa hàng của nhân viên
                $maCV = $nguoiDung["MaChucVu"];

                 if ($maCV == "1") {  // Nếu là quản lý, lấy tất cả các bàn từ tất cả cửa hàng
                    $tblBan = $p->getAllBan();
                } else {  // Nếu là nhân viên, chỉ lấy bàn của cửa hàng mà nhân viên đó quản lý
                    $tblBan = $p->getMaBan($maCuaHang);
                }


                $selectedBan = null;
              
                
                if (is_array($tblBan) && !empty($tblBan))  {
                    // Nhóm bàn theo cửa hàng
                    $groupedTables = [];
                    // Duyệt qua danh sách bàn và nhóm chúng lại
    foreach ($tblBan as $ban) {
        $maCuaHang = $ban['MaCuaHang'];

        // Nếu chưa tồn tại nhóm cho mã cửa hàng, tạo nhóm mới
        if (!isset($groupedTables[$maCuaHang])) {
            $groupedTables[$maCuaHang] = [];
        }

        // Thêm bàn vào nhóm
        $groupedTables[$maCuaHang][] = $ban;
    }

    // Hiển thị bàn theo từng cửa hàng
    foreach ($groupedTables as $maCuaHang => $bans) {
        echo '<h3>Cửa hàng: ' . htmlspecialchars($bans[0]['TenCuaHang']) . '</h3>';
        echo '<div class="row">';

        foreach ($bans as $ban) {
            $statusClass = ($ban['Tinhtrang'] === 'Trống') ? 'btn-success' : 'btn-danger';
            $statusText = ($ban['Tinhtrang'] === 'Trống') ? 'Trống' : 'Bận';

                        // Hiển thị thông tin bàn
                        echo '
                        <div class="col-4 table-status">
                            <img 
                                alt="Table image" 
                                src="https://nhaxinh.com/wp-content/uploads/2021/11/102417-ban-an-elegance-1m6-mau-tu-nhien.jpg" 
                                width="100" 
                                height="50" 
                            /> <br/>
                            <a href="index.php?page=quanly/quanlydatban&id=' . $ban["Maban"] . '">
                           
                                <button class="btn ' . $statusClass . ' mt-2">
                                    ' . $statusText . '
                                </button>
                            </a>
                        </div>';

                        // Lưu thông tin bàn được chọn
                        if ($ban['Maban'] == $id) {
                            $selectedBan = $ban;
                        }
                    }
                    echo '</div><hr>';
                } 
                
            }else {
                    echo '<p>Không có bàn nào được tìm thấy.</p>';
                }
                ?>

                </div>
            </div>
            <!-- Cột bên phải: form đặt bàn -->
            <div class="col-4 reservation-form">
                <h4>Đặt bàn</h4>
                <?php if ($selectedBan): ?>
                    <p>Bàn Số: <?= htmlspecialchars($selectedBan['TenBan']) ?></p>
                    <p>Trạng Thái: <?= htmlspecialchars($selectedBan['Tinhtrang']) ?></p>
                    <p>Số Ghế: <?= htmlspecialchars($selectedBan['Soghe']) ?></p>
                <?php else: ?>
                    <p>Không tìm thấy thông tin bàn.</p>
                <?php endif; ?>
                
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="name">Họ Tên:</label>
                        <input class="form-control" id="name" type="text" name="ten" 
                            value="<?php echo isset($_SESSION['form_data'][$id]['ten']) ? $_SESSION['form_data'][$id]['ten'] : ''; ?>"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone">SDT:</label>
                        <input class="form-control" id="phone" type="text" name="dienthoai"
                            value="<?php echo isset($_SESSION['form_data'][$id]['dienthoai']) ? $_SESSION['form_data'][$id]['dienthoai'] : ''; ?>" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="gio">Giờ đặt bàn:</label>
                        <input class="form-control" id="gio" type="datetime-local" name="gio" 
                            value="<?php echo isset($_SESSION['form_data'][$id]['gio']) ? $_SESSION['form_data'][$id]['gio'] : ''; ?>"/>
                    </div>
                    <?php
                        // Giả sử `$selectedBan` được lấy từ cơ sở dữ liệu
                        // Đảm bảo `$selectedBan` được khởi tạo trước khi sử dụng
                        $selectedBan = $selectedBan ?? ['Tinhtrang' => null];
                    ?>
                    <form action="" method="post">
                            <button class="btn btn-danger" type="submit" name="btnH" >Hủy</button>
                            
                        <?php if ($selectedBan['Tinhtrang'] == 'Trống'): ?>
                            <!-- If the table is "Trống", show "Đặt bàn" -->
                            <button class="btn btn-success" type="submit" name="btnDatBan">Đặt bàn</button>
                        <?php elseif ($selectedBan['Tinhtrang'] == 'Bận'): ?>
                            <!-- If the table is "Bận", show "Xóa đặt bàn" -->
                            <button class="btn btn-danger" type="submit" name="btnHuy">Xóa đặt</button>
                            <button class="btn btn-success" type="submit" name="btnDatBan">Lưu</button>
                        <?php endif; ?>
                    </form>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Hàm để hiển thị thông báo lỗi
        function showError(inputElement, message) {
            // Kiểm tra nếu đã có thông báo lỗi, không thêm nữa
            if (!inputElement.nextElementSibling || !inputElement.nextElementSibling.classList.contains('text-danger')) {
                const errorElement = document.createElement('small');
                errorElement.classList.add('text-danger');
                errorElement.textContent = message;
                inputElement.parentNode.appendChild(errorElement);
            }
            inputElement.classList.add('is-invalid');  // Thêm lớp lỗi cho input
        }

        // Hàm để xóa thông báo lỗi
        function removeError(inputElement) {
            const errorElement = inputElement.nextElementSibling;
            if (errorElement && errorElement.classList.contains('text-danger')) {
                errorElement.remove();
            }
            inputElement.classList.remove('is-invalid');
        }

        // Kiểm tra số điện thoại khi blur
        const dienthoai = document.querySelector('input[name="dienthoai"]');
        
        dienthoai.addEventListener('blur', function () {
            // Kiểm tra định dạng số điện thoại
            const regex = /^(03|05|07|08|09)\d{8}$/; // Kiểm tra số điện thoại bắt đầu với 03, 05, 07, 08, hoặc 09 và theo sau là 8 chữ số
            if (!regex.test(dienthoai.value.trim())) {
                showError(dienthoai, "Số điện thoại phải bắt đầu từ (03|05|07|08|09) và có 10 chữ số.");
            } else {
                removeError(dienthoai);
            }
        });

        // Add validation before form submission
        const form = document.querySelector('#reservationForm');
        form.addEventListener('submit', function (e) {
            let isValid = true;

            // Kiểm tra lại số điện thoại khi submit
            const dienthoai = document.querySelector('input[name="dienthoai"]');
            const value = dienthoai.value.trim();

            // Kiểm tra định dạng số điện thoại nếu không rỗng
            if (value && !/^(03|05|07|08|09)\d{8}$/.test(value)) {
                showError(dienthoai, "Số điện thoại phải bắt đầu từ (03|05|07|08|09) và có 10 chữ số.");
                isValid = false;
            } else {
                removeError(dienthoai);
            }

            // Ngừng gửi form nếu có lỗi
            if (!isValid) {
                alert('Đặt bàn thất bại. Vui lòng nhập lại!');
                e.preventDefault(); // Ngừng gửi form
            }
        });
    });
</script>



