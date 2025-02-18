<?php
include_once("controller/cCuaHang.php");
$p = new CCuaHang();
include_once("view/page/quanly/quanlycuahang/themcuahang/xuly.php");
?>
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f9f9f9;
    color: #333;
    margin: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

/* Nhãn và ô nhập liệu */
.form-group {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
    text-align: right;
    padding-right: 15px;
}

.form-control {
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 10px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

/* Hiệu ứng hover và focus */
.form-control:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.3);
}

/* Nút radio và select */
input[type="radio"] {
    margin-right: 5px;
}

select.form-control {
    cursor: pointer;
}

/* Trạng thái lỗi */
.is-invalid {
    border-color: #dc3545;
}

.error-message {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 5px;
}

button {
    padding: 10px 10px;
    font-size: 1rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

button.btn-primary:hover {
    background-color: #0056b3;
}

button.btn-secondary:hover {
    background-color: #5a6268;
}

button.btn-success:hover {
    background-color: #218838;
}

button a {
    text-decoration: none;
    color: inherit;
}

button a:hover {
    text-decoration: underline;
}

/* Khoảng cách và căn chỉnh */
.form-actions {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 20px;
}

.row {
    margin: 0;
    padding: 0;
}

.col-sm-2 {
    flex: 0 0 25%;
    max-width: 25%;
}

.col-sm-5 {
    flex: 0 0 75%;
    max-width: 75%;
}
</style>
<body>
        <div class="container qlnl">
            <h1 class="d-flex justify-content-center py-3 font-weight-bold">THÊM CỬA HÀNG</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class=" row">
                    <div class="suanl-left col-9     ">
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-2 col-form-label">Tên Cửa Hàng</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="" placeholder="Cửa hàng 1" name="ten" require>
                            </div>
                        </div>
            
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-2 col-form-label">Địa Chỉ</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="" placeholder="12 Nguyễn Văn Bảo" name="diachi" require>
                            </div>
                        </div>
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-2 col-form-label">Tình trạng</label>
                            <div class="col-sm-5">
                            <select id="loai-nguyen-lieu" class="form-control" name="tinhtrang">
                                <option value="">--Tình trạng--</option>
                                <?php
                                // Lấy danh sách tình trạng cửa hàng từ controller
                                $controller = new cCuahang();
                                $dsCuahang = $controller->getAllCuaHang();  

                        // Mảng lưu trữ các giá trị tình trạng đã được hiển thị
                        $displayedValues = [];

                        if ($dsCuahang) {
                            // Duyệt qua danh sách cửa hàng
                            while ($CuaHang = $dsCuahang->fetch_assoc()) {
                                // Lấy giá trị tình trạng, loại bỏ khoảng trắng và chuẩn hóa chữ thường
                                $currentTinhTrang = trim(strtolower($CuaHang['TinhTrang']));

                                // Nếu tình trạng đã được hiển thị, bỏ qua
                                if (in_array($currentTinhTrang, $displayedValues)) {
                                    continue;
                                }

                                // Thêm tình trạng vào mảng để tránh trùng lặp
                                $displayedValues[] = $currentTinhTrang;

                                // Hiển thị tình trạng với chữ cái đầu viết hoa
                                $displayText = ucfirst($currentTinhTrang);

                                // Kiểm tra xem tình trạng này có được chọn không
                                $selected = (isset($_REQUEST['tinhtrang']) && strtolower(trim($_REQUEST['tinhtrang'])) == $currentTinhTrang) ? 'selected' : '';
                                echo "<option value='{$currentTinhTrang}' {$selected}>{$displayText}</option>";
                            }
                        } else {
                            echo "<option value=''>Không có dữ liệu cửa hàng</option>";
                        }
                        ?>
                    </select>

                                
                            </div>
                        </div>
                    
                    
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-2 col-form-label">Hình ảnh</label>
                            <div class="col-sm-5">
                                <input type="file" name="hinhanh" class="form-control" id=""  require>
                            </div>
                        </div>
                    
                       
                        <div class="form-actions py-3">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <a href="index.php?page=quanly/quanlycuahang" class="btn btn-secondary">
                                Quay lại
                            </a> 
                            <button class="btn btn-secondary"><i class="fas fa-times"></i> Hủy</button>
            
                            <button class="btn btn-success" onclick="showConfirm()" name="btnthem"><i class="far fa-save"></i> Lưu</button>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>

    </body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Hàm để hiển thị thông báo lỗi
    function showError(inputElement, message) {
        const errorElement = document.createElement('small');
        errorElement.classList.add('text-danger');
        errorElement.textContent = message;

        // Nếu đã có thông báo lỗi, không thêm nữa
        if (inputElement.nextElementSibling && inputElement.nextElementSibling.classList.contains('text-danger')) {
            inputElement.nextElementSibling.textContent = message;
        } else {
            inputElement.parentNode.appendChild(errorElement);
        }

        inputElement.classList.add('is-invalid');  // Thêm lớp lỗi cho input
    }

    // Hàm để xóa thông báo lỗi
    function removeError(inputElement) {
        if (inputElement.nextElementSibling && inputElement.nextElementSibling.classList.contains('text-danger')) {
            inputElement.nextElementSibling.remove();
        }
        inputElement.classList.remove('is-invalid');
    }

    // Kiểm tra tên cửa hàng
    const ten = document.querySelector('input[name="ten"]');
    ten.addEventListener('blur', function () {
        if (!ten.value.trim()) {
            showError(ten, "Tên cửa hàng không được rỗng.");
        } else {
            removeError(ten);
        }
    });

    // Kiểm tra địa chỉ
    const diachi = document.querySelector('input[name="diachi"]');
    diachi.addEventListener('blur', function () {
        if (!diachi.value.trim()) {
            showError(diachi, "Địa chỉ không được rỗng.");
        } else {
            removeError(diachi);
        }
    });

    // Kiểm tra tình trạng
    const tinhtrang = document.querySelector('select[name="tinhtrang"]');
    tinhtrang.addEventListener('blur', function () {
        if (!tinhtrang.value) {
            showError(tinhtrang, "Tình trạng không được rỗng.");
        } else {
            removeError(tinhtrang);
        }
    });

    // Kiểm tra hình ảnh
    const hinhanh = document.querySelector('input[name="hinhanh"]');
    hinhanh.addEventListener('blur', function () {
        if (!hinhanh.files.length) {
            showError(hinhanh, "Hình ảnh không được rỗng.");
        } else {
            removeError(hinhanh);
        }
    });

    // Add validation before form submission
    document.querySelector('form').addEventListener('submit', function (e) {
        let isValid = true;

        // Kiểm tra lại Tên cửa hàng
        if (!ten.value.trim()) {
            showError(ten, "Tên cửa hàng không được rỗng.");
            isValid = false;
        } else {
            removeError(ten);
        }

        // Kiểm tra lại Địa chỉ
        if (!diachi.value.trim()) {
            showError(diachi, "Địa chỉ không được rỗng.");
            isValid = false;
        } else {
            removeError(diachi);
        }

        // Kiểm tra lại Tình trạng
        if (!tinhtrang.value) {
            showError(tinhtrang, "Tình trạng không được rỗng.");
            isValid = false;
        } else {
            removeError(tinhtrang);
        }

        // Kiểm tra lại Hình ảnh
        if (!hinhanh.files.length) {
            showError(hinhanh, "Hình ảnh không được rỗng.");
            isValid = false;
        } else {
            removeError(hinhanh);
        }

        // Ngừng gửi form nếu có lỗi
        if (!isValid) {
            alert('Thêm cửa hàng thất bại. Vui lòng nhập đầy đủ!');
            e.preventDefault();
        }
    });
});
</script>
