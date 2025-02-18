<?php
include_once("controller/cCuaHang.php");
$id = $_GET['id'];
$p = new CCuaHang();
include_once("view/page/quanly/quanlycuahang/suacuahang/xuly.php");
$CuaHang = $p->getMaCuaHang($id);
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
        <h1 class="d-flex justify-content-center py-3 font-weight-bold">SỬA THÔNG TIN CỬA HÀNG</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="suanl-left col-9">
                    <div class="form-group row py-2">
                        <label for="ten" class="col-sm-2 col-form-label">Tên Cửa Hàng</label>
                        <div class="col-sm-7">
                            <input type="text" id="ten" class="form-control" name="ten" required value="<?= htmlspecialchars($CuaHang['TenCuaHang']) ?>" />
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="diachi" class="col-sm-2 col-form-label">Địa Chỉ</label>
                        <div class="col-sm-7">
                            <input type="text" id="diachi" class="form-control" name="diachi" required value="<?= htmlspecialchars($CuaHang['DiaChi']) ?>" />
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="tinhtrang" class="col-sm-2 col-form-label">Tình trạng</label>
                        <div class="col-sm-7">
                            <select id="tinhtrang" class="form-control" name="tinhtrang" required>
                                <?php
                                include_once("controller/cCuahang.php");
                                $controller = new cCuahang();
                                $dsCuahang = $controller->getAllCuaHang(); // Fetch the list of stores (CuaHang)
                                
                                // Get the current selected value for tinhtrang
                                $selectedTinhTrang = isset($_REQUEST['tinhtrang']) ? $_REQUEST['tinhtrang'] : $CuaHang['TinhTrang'];

                                // Create an array to track already displayed values
                                $displayedValues = [];

                                if ($dsCuahang) {
                                    while ($CH = $dsCuahang->fetch_assoc()) {
                                        // Skip if the Tinhtrang has already been displayed
                                        if (in_array($CH['TinhTrang'], $displayedValues)) continue;

                                        $displayedValues[] = $CH['TinhTrang'];
                                        $selected = ($selectedTinhTrang == $CH['TinhTrang']) ? 'selected' : '';
                                        echo "<option value='{$CH['TinhTrang']}' {$selected}>{$CH['TinhTrang']}</option>";
                                    }
                                } else {
                                    echo "<option value=''>Không có dữ liệu cửa hàng</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="hinhanh" class="col-sm-2 col-form-label">Hình ảnh</label>
                        <div class="col-sm-7">
                            <input type="file" id="hinhanh" name="hinhanh" class="form-control" />
                        </div>
                    </div>

                    <div class="form-actions py-3" style="margin-left: 20%">
                        <a href="index.php?page=quanly/quanlycuahang" class="btn btn-secondary">Quay lại</a>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-times"></i> Hủy</button>
                        <button type="submit" class="btn btn-success" name="btnsua"><i class="far fa-save"></i> Lưu</button>
                    </div>
                </div>

                <div class="suanl-right col-2">
                    <img src="img/cuahang/<?= $CuaHang['HinhAnh'] ?>" width="300px" alt="Current Image">
                </div>
            </div>
        </form>
    </div>
</body>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Function to display error messages
    function showError(inputElement, message) {
        const errorElement = document.createElement('small');
        errorElement.classList.add('text-danger');
        errorElement.textContent = message;

        if (inputElement.nextElementSibling && inputElement.nextElementSibling.classList.contains('text-danger')) {
            inputElement.nextElementSibling.textContent = message;
        } else {
            inputElement.parentNode.appendChild(errorElement);
        }

        inputElement.classList.add('is-invalid');
    }

    // Function to remove error messages
    function removeError(inputElement) {
        if (inputElement.nextElementSibling && inputElement.nextElementSibling.classList.contains('text-danger')) {
            inputElement.nextElementSibling.remove();
        }
        inputElement.classList.remove('is-invalid');
    }

    const ten = document.querySelector('input[name="ten"]');
    const diachi = document.querySelector('input[name="diachi"]');
    const tinhtrang = document.querySelector('select[name="tinhtrang"]');

    // Blur event to check the input fields when they lose focus
    ten.addEventListener('blur', function () {
        if (!ten.value.trim()) {
            showError(ten, "Tên cửa hàng không được rỗng.");
        } else {
            removeError(ten);
        }
    });

    diachi.addEventListener('blur', function () {
        if (!diachi.value.trim()) {
            showError(diachi, "Địa chỉ không được rỗng.");
        } else {
            removeError(diachi);
        }
    });

    tinhtrang.addEventListener('blur', function () {
        if (!tinhtrang.value) {
            showError(tinhtrang, "Tình trạng không được rỗng.");
        } else {
            removeError(tinhtrang);
        }
    });

    // Validate the form before submit
    document.querySelector('form').addEventListener('submit', function (e) {
        let isValid = true;

        if (!ten.value.trim()) {
            showError(ten, "Tên cửa hàng không được rỗng.");
            isValid = false;
        } else {
            removeError(ten);
        }

        if (!diachi.value.trim()) {
            showError(diachi, "Địa chỉ không được rỗng.");
            isValid = false;
        } else {
            removeError(diachi);
        }

        if (!tinhtrang.value) {
            showError(tinhtrang, "Tình trạng không được rỗng.");
            isValid = false;
        } else {
            removeError(tinhtrang);
        }

        if (!isValid) {
            alert('Sửa cửa hàng thất bại. Vui lòng nhập đầy đủ!');
            e.preventDefault();
        }
    });
});
</script>
