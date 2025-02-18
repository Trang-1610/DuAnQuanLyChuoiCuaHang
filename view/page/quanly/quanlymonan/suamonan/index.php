<?php
include_once("controller/cMonAn.php");
// Lấy món ăn theo ID
$id = $_GET['id'];
$p = new CMonAN();
include_once("view/page/quanly/quanlymonan/suamonan/xuly.php");
$monan = $p->getMaMonAn($id);

include_once("controller/cSoLuongNguyenLieu.php");
$pp = new CSoLuongNL();
$SLNL = $pp->getByMaMonAn($id);
?>
<style>
    /* CSS để căn giữa nội dung */
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
        <div class="container qlnl">
            <h1 class="d-flex justify-content-center py-3 font-weight-bold">SỬA THÔNG TIN MÓN ĂN</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class=" row">
                    <div class="suanl-left col-9     ">
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-2 col-form-label">Tên Món ăn</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="" name="tenMA" required value="<?=$monan['Tenmonan']?>" />
                                
                            </div>
                        </div>
                    
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-2 col-form-label">Loại Món Ăn</label>
                            <div class="col-sm-8">
                                <select id="loai-nguyen-lieu" class="form-control" name="loaiMA" require>
                                <option value="">-- Chọn loại món ăn --</option> <!-- Tùy chọn mặc định -->
                                    <?php
                                    include("controller/cLoaiMonAn.php");
                                        $controller = new CLoaiMonAn();
                                        $dsLoaiMonAn = $controller->getAllLoaiMonAn();
                                        if ($dsLoaiMonAn) {
                                            while ($loai = $dsLoaiMonAn->fetch_assoc()) {
                                                // Kiểm tra xem loại món ăn này có phải là loại món ăn hiện tại không
                                                $selected = (isset($monan['MaLoaiMonAn']) && $monan['MaLoaiMonAn'] == $loai['MaLoaiMonAn']) ? 'selected' : '';
                                                echo "<option value='{$loai['MaLoaiMonAn']}' {$selected}>{$loai['TenLoaiMonAn']}</option>";
                                            }
                                        }
                                    ?>
          
                                </select>
                                
                            </div>
                        </div>
            
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-2 col-form-label">Giá món ăn</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="" name="giaMA" required value="<?=$monan['Giaban']?>"/>
                            </div>
                        </div>
            
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-2 col-form-label">Mô tả</label>
                            <div class="col-sm-8">
                                <textarea name="moTa" class="form-control" id="" rows="7"><?=$monan['Mota']?></textarea>
                            </div>
                        </div>

                       <!-- Nguyên liệu -->
                    <div class="form-group row py-2">
                        <label for="" class="col-sm-2 col-form-label">Nguyên liệu</label>
                        <div class="col-sm-10">
                            <div class="d-flex flex-wrap">
                            <?php
                                include("controller/cNguyenLieu.php");
                                $controller = new CNguyenLieu();
                                $dsNL = $controller->getAllNguyenLieu();

                                if ($dsNL) {
                                    while ($nl = $dsNL->fetch_assoc()) {
                                        // Kiểm tra nếu nguyên liệu này đã có trong món ăn
                                        $checked = '';
                                        $quantity = '';

                                        if ($SLNL) {
                                            foreach ($SLNL as $item) {
                                                if ($item['MaNguyenLieu'] == $nl['MaNguyenLieu']) {
                                                    $checked = 'checked';
                                                    $quantity = $item['KhoiLuong'];
                                                    break;
                                                }
                                            }
                                        }

                                        echo "
                                        <div class='form-check' style='width: 50%;'>
                                            <input class='form-check-input' type='checkbox' name='nguyen_lieu[]' id='nl_{$nl['MaNguyenLieu']}' value='{$nl['MaNguyenLieu']}' {$checked} onchange='toggleQuantityInput(this, {$nl['MaNguyenLieu']})'>
                                            <label class='form-check-label' for='nl_{$nl['MaNguyenLieu']}'>
                                                {$nl['TenNguyenLieu']}
                                            </label>
                                            <input type='number' name='so_luong[{$nl['MaNguyenLieu']}]' id='so_luong_{$nl['MaNguyenLieu']}' class='form-control' min='1' style='width: 100px; margin-top: 5px;' value='{$quantity}' " . ($checked ? '' : 'disabled') . ">
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
                            <label for="" class="col-sm-2 col-form-label">Tình trạng</label>
                            <div class="col-sm-8">
                            <select id="loai-nguyen-lieu" class="form-control" name="tinhTrang" required>
   
                            <?php
                                include_once("controller/cMonAn.php");
                                $controller = new cMonAn();
                                $dsMonAn = $controller->getAllMonAN();  // Fetch the list of dishes (MonAn)

                                // Check if `maMonAn` is available for selection from the request
                                $selectedMonAn = isset($_REQUEST['Tinhtrang']) ? $_REQUEST['Tinhtrang'] : '';

                                // Create an array to track already displayed values
                                $displayedValues = [];

                                if ($dsMonAn) {
                                    while ($monAn = $dsMonAn->fetch_assoc()) {
                                        // If the Tinhtrang has already been displayed, skip it
                                        if (in_array($monAn['Tinhtrang'], $displayedValues)) {
                                            continue;
                                        }

                                        // Add Tinhtrang to the array of displayed values
                                        $displayedValues[] = $monAn['Tinhtrang'];

                                        // Check if the current MonAn `Tinhtrang` should be selected
                                        $selected = (isset($monan['Tinhtrang']) && $monan['Tinhtrang'] == $monAn['Tinhtrang']) ? 'selected' : '';
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
                            <label for="" class="col-sm-2 col-form-label">Hình ảnh</label>
                            <div class="col-sm-8">
                                <input type="file" name="hinhanh" class="form-control" id="" ] >
                            </div>
                        </div>
                    
                        
                        <div class="form-actions py-3">
                            <label for="" class="col-sm-2 col-form-label"></label>
                        <!-- <a href="qlnl.html"> -->
                        <a href="index.php?page=quanly/quanlymonan" class="btn btn-secondary">
                            Quay lại
                        </a>            
                            <button class="btn btn-secondary"  type="cancel"><i class="fas fa-times"></i> Hủy</button>
            
                        <!-- </a> -->
                        <!-- <a href="qlnl.html"> -->
            
                            <button class="btn btn-success" onclick="showConfirmation()" name="btsua"><i class="far fa-save" ></i> Lưu</button>
                        <!-- </a> -->
                        </div>
                    </div>
                    <div class="suanl-right col-2">
                    <img src="img/monan/<?= $monan['Hinhanh'] ?>" width="300px" alt="Current Image">
                    

                    </div>

                </div>
            </form>
        </div>

    </body>
    <script>
        // Hàm bật/tắt input số lượng khi checkbox được chọn
        function toggleQuantityInput(checkbox, id) {
            const input = document.getElementById('so_luong_' + id);
            input.disabled = !checkbox.checked;
            if (!checkbox.checked) input.value = ''; // Xóa giá trị khi bỏ chọn
        }
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
        if (giaMA.value < 0 || !giaMA.value.trim()) {
            showError(giaMA, "Giá món ăn không được âm hoặc rỗng.");
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
        if (giaMA.value < 0 || !giaMA.value.trim()) {
            showError(giaMA, "Giá món ăn không được âm hoặc rỗng.");
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

        if (!isValid) {
        
            alert('Thêm món ăn thất bại. Vui lòng nhập đầy đủ!');
            e.preventDefault();  // Ngừng gửi form nếu có lỗi
            
          
        }
    });
});
</script>