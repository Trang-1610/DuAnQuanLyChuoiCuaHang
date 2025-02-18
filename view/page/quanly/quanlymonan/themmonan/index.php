<?php
include_once("controller/cMonAn.php");
$p = new CMonAN();
include_once("view/page/quanly/quanlymonan/themmonan/xuly.php");
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
.container.qlnl {
    max-width: 1000px;
    margin: 0 auto; /* Căn giữa ngang */
}

/* Căn giữa tiêu đề */
h1 {
    text-align: center;
    font-weight: bold;
    margin-bottom: 20px;
}
</style>
<body>

    <div class="container ">
        <form action="" method="post" enctype="multipart/form-data"> 
            <h1 class="d-flex justify-content-center py-3 font-weight-bold">THÊM MÓN ĂN</h1>
           
            <div class="form-group row py-2">
                <label for="" class="col-sm-2 col-form-label">Tên Món Ăn</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="" placeholder="Nhập tên món ăn" name= "tenMA" require>
                </div>
            </div>
           
            <div class="form-group row py-2">
                            <label for="" class="col-sm-2 col-form-label">Loại Món Ăn</label>
                            <div class="col-sm-5">
                                <select id="loai-nguyen-lieu" class="form-control" name="loaiMA" require>
                                <option value="">-- Chọn loại món ăn --</option> <!-- Tùy chọn mặc định -->
                                    <?php
                                    include("controller/cLoaiMonAn.php");
                                        $controller = new CLoaiMonAn();
                                        $dsLoaiMonAn = $controller->getAllLoaiMonAn();
                                        if ($dsLoaiMonAn) {
                                            while ($loai = $dsLoaiMonAn->fetch_assoc()) {
                                                // Kiểm tra xem loại món ăn này có phải là loại món ăn hiện tại không
                                               // $selected = (isset($monan['MaLoaiMonAn']) && $monan['MaLoaiMonAn'] == $loai['MaLoaiMonAn']) ? 'selected' : '';
                                                echo "<option value='{$loai['MaLoaiMonAn']}' {$selected}>{$loai['TenLoaiMonAn']}</option>";
                                            }
                                        }
                                    ?>
          
                                </select>
                                
                            </div>
                        </div>

           
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-2 col-form-label">Giá Món Ăn</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="" placeholder="Nhập giá món ăn" name= "giaMA" require>
                            </div>
                        </div>
            <div class="form-group row py-2">
                        <label for="" class="col-sm-2 col-form-label">Mô tả</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" id="" name= "moTa" require>.....</textarea>
                        </div>
            </div>
            <div class="form-group row py-2">
    <label for="" class="col-sm-2 col-form-label">Nguyên liệu</label>
    <div class="col-sm-10">
        <div class="d-flex flex-wrap">
            <?php
            include("controller/cNguyenLieu.php");
            $controller = new CNguyenLieu();
            $dsNL = $controller->getallnguyenlieu();
            if ($dsNL) {
                while ($loai = $dsNL->fetch_assoc()) {
                    echo "
                    <div class='form-check' style='width: 25%; margin-left: 25%'>
                        <input class='form-check-input' type='checkbox' name='nguyen_lieu[]' id='nl_{$loai['MaNguyenLieu']}' value='{$loai['MaNguyenLieu']}'>
                        <label class='form-check-label' for='nl_{$loai['MaNguyenLieu']}'>
                            {$loai['TenNguyenLieu']}
                        </label>
                        <input type='number' name='so_luong[{$loai['MaNguyenLieu']}]' id='so_luong_{$loai['MaNguyenLieu']}' class='form-control' min='1' style='width: 100px; margin-top: 5px;' disabled>
                    </div>
                ";
                }
            } else {
                echo "<p>Không có nguyên liệu nào.</p>";
            }
            ?>
        </div>
    </div>
</div>

            
            <div class="form-group row py-2">
                <label for="" class="col-sm-2 col-form-label">TÌnh trạng</label>
                <div class="col-sm-5">
                <select name="tinhTrang" id="" class="form-control" name= "tinhTrang" require>
                    <option value="">--Tình trạng</option>
                    <!-- <option value="Còn hàng">Còn hàng</option>
                    <option value="Hết hàng">Hết hàng</option> -->
                    <?php
                include_once("controller/cMonAn.php");
                $controller = new cMonAn();
                $dsMonAn = $controller->getAllMonAN();  // Fetch the list of dishes (MonAn)

                // Create an array to track already displayed Tinhtrang
                $displayedTinhTrang = [];

                if ($dsMonAn) {
                    while ($monAn = $dsMonAn->fetch_assoc()) {
                        // If the Tinhtrang has already been displayed, skip it
                        if (in_array($monAn['Tinhtrang'], $displayedTinhTrang)) {
                            continue;
                        }

                        // Add Tinhtrang to the array of displayed values
                        $displayedTinhTrang[] = $monAn['Tinhtrang'];

                        // Check if the current Tinhtrang should be selected
                        $selected = (isset($_REQUEST['tinhTrang']) && $_REQUEST['tinhTrang'] == $monAn['Tinhtrang']) ? 'selected' : '';
                        echo "<option value='{$monAn['Tinhtrang']}' {$selected}>{$monAn['Tinhtrang']}</option>";
                    }
                } else {
                    echo "<option value=''>Không có dữ liệu món ăn</option>";
                }
            ?>
                   </select>
                </div>
            </div>
           
            <div class="form-group row py-2">
                <label for="" class="col-sm-2 col-form-label" >Hình ảnh</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="" name= "hinhanh" require>
                </div>
            </div>
            
            <div class="form-actions py-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                            <a href="index.php?page=quanly/quanlymonan" class="btn btn-secondary">
                                Quay lại
                            </a>
               
                   <button class="btn btn-secondary"><i class="fas fa-times"></i> Hủy</button>


                   <button class="btn btn-success" onclick="showConfirm()" name="btnthem"><i class="far fa-save"></i> Lưu</button>
             
            </div>
        </div>
        </form>
    </body>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listener for checkboxes
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="nguyen_lieu[]"]');
        
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const quantityInput = document.getElementById('so_luong_' + this.value);
                if (this.checked) {
                    quantityInput.disabled = false;  // Enable the quantity input when checked
                } else {
                    quantityInput.disabled = true;  // Disable the quantity input when unchecked
                }
            });
        });
    });
</script>
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

    // Kiểm tra tên món ăn
    const tenMA = document.querySelector('input[name="tenMA"]');
    tenMA.addEventListener('blur', function() {
        if (!tenMA.value.trim()) {
            showError(tenMA, "Tên món ăn không được rỗng.");
        } else {
            removeError(tenMA);
        }
    });

    // Kiểm tra Loại món ăn
    const loaiMA = document.querySelector('select[name="loaiMA"]');
    loaiMA.addEventListener('blur', function() {
        if (!loaiMA.value) {
            showError(loaiMA, "Loại món ăn không được rỗng.");
        } else {
            removeError(loaiMA);
        }
    });

    // Kiểm tra Giá món ăn
    const giaMA = document.querySelector('input[name="giaMA"]');
    giaMA.addEventListener('blur', function() {
        if (!giaMA.value.trim() || giaMA.value < 0) {
            showError(giaMA, "Giá món ăn không được rỗng và không được âm.");
        } else {
            removeError(giaMA);
        }
    });

    // Kiểm tra Nguyên liệu (chọn ít nhất 1)
    const nguyenLieuCheckboxes = document.querySelectorAll('input[name="nguyen_lieu[]"]');
    function validateNguyenLieu() {
        const isChecked = Array.from(nguyenLieuCheckboxes).some(checkbox => checkbox.checked);
        const errorElement = document.querySelector('.error-nguyen-lieu');
        
        if (!isChecked) {
    // Check if the error element is not already displayed
    const errorElement = document.querySelector('.error-nguyen-lieu');
    
        if (!errorElement) {
            // Create new error message
            const errorMessage = document.createElement('small');
            errorMessage.classList.add('text-danger', 'error-nguyen-lieu');
            errorMessage.textContent = 'Bạn phải chọn ít nhất một nguyên liệu.';

            // Select the parent div of the checkbox group
            const checkboxGroup = document.querySelector('.form-check');

            // Append the error message right after the checkbox group
            checkboxGroup.parentNode.appendChild(errorMessage);
        }
        } else {
            // If any checkbox is selected, remove the error message
            const errorElement = document.querySelector('.error-nguyen-lieu');
            if (errorElement) {
                errorElement.remove();
            }
        }

    }

    // Kiểm tra số lượng nguyên liệu, chỉ kiểm tra nếu checkbox tương ứng được chọn
    const soLuongInputs = document.querySelectorAll('input[name^="so_luong"]');
    soLuongInputs.forEach(function(input) {
        input.addEventListener('blur', function() {
            const correspondingCheckbox = document.querySelector(`input[name="nguyen_lieu[]"][value="${input.name.replace('so_luong[', '').replace(']', '')}"]`);
            if (correspondingCheckbox.checked) {
                const quantity = input.value;
                if (quantity < 1 || !quantity.trim()) {
                    showError(input, "Số lượng phải lớn hơn 0 và không được rỗng.");
                } else {
                    removeError(input);
                }
            }
        });
    });

    // Kiểm tra Tình trạng
    const tinhTrang = document.querySelector('select[name="tinhTrang"]');
    tinhTrang.addEventListener('blur', function() {
        if (!tinhTrang.value) {
            showError(tinhTrang, "Tình trạng không được rỗng.");
        } else {
            removeError(tinhTrang);
        }
    });

    // Kiểm tra Hình ảnh
    const hinhanh = document.querySelector('input[name="hinhanh"]');
    hinhanh.addEventListener('chane', function() {
        if (!hinhanh.files.length) {
            showError(hinhanh, "Hình ảnh không được rỗng.");
        } else {
            removeError(hinhanh);
        }
    });

    // Kiểm tra trước khi gửi form
    document.querySelector('form').addEventListener('submit', function (e) {
        let isValid = true;

        // Kiểm tra lại Tên món ăn
        if (!tenMA.value.trim()) {
            showError(tenMA, "Tên món ăn không được rỗng.");
            isValid = false;
        } else {
            removeError(tenMA);
        }

        // Kiểm tra lại Loại món ăn
        if (!loaiMA.value) {
            showError(loaiMA, "Loại món ăn không được rỗng.");
            isValid = false;
        } else {
            removeError(loaiMA);
        }

        // Kiểm tra lại Giá món ăn
        if (!giaMA.value.trim() || giaMA.value < 0) {
            showError(giaMA, "Giá món ăn không được rỗng và không được âm.");
            isValid = false;
        } else {
            removeError(giaMA);
        }

        // Kiểm tra lại Nguyên liệu (ít nhất 1)
        validateNguyenLieu();
        const errorElement = document.querySelector('.error-nguyen-lieu');
        if (errorElement) {
            isValid = false;
        }

        // Kiểm tra lại số lượng (chỉ kiểm tra nếu checkbox tương ứng được chọn)
        soLuongInputs.forEach(function(input) {
            const correspondingCheckbox = document.querySelector(`input[name="nguyen_lieu[]"][value="${input.name.replace('so_luong[', '').replace(']', '')}"]`);
            if (correspondingCheckbox.checked) {
                const quantity = input.value;
                if (quantity < 1 || !quantity.trim()) {
                    showError(input, "Số lượng phải lớn hơn 0 và không được rỗng.");
                    isValid = false;
                } else {
                    removeError(input);
                }
            }
        });

        // Kiểm tra lại Tình trạng
        if (!tinhTrang.value) {
            showError(tinhTrang, "Tình trạng không được rỗng.");
            isValid = false;
        } else {
            removeError(tinhTrang);
        }

        // Kiểm tra lại Hình ảnh
        if (!hinhanh.files.length) {
            showError(hinhanh, "Hình ảnh không được rỗng.");
            isValid = false;
        } else {
            removeError(hinhanh);
        }

        if (!isValid) {
        
            alert('Thêm món ăn thất bại. Vui lòng nhập đầy đủ!');
            e.preventDefault();  // Ngừng gửi form nếu có lỗi
            
          
        }
    });
});
</script>




