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

input[type="radio"] {
  margin-right: 5px;
  margin-left: 15px;
}

input[type="radio"]:first-of-type {
  margin-left: 0;
}

select {
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
  font-size: 14px;
}

button {
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  font-size: 14px;
  cursor: pointer;
}

.btn-primary:hover,
.btn-secondary:hover,
.btn-success:hover {
  filter: brightness(0.9);
}

.form-actions {
  display: flex;
  justify-content: flex-start;
  gap: 10px;
  margin-top: 20px;
}

.alert {
  font-size: 14px;
  color: #d9534f;
}
.error-message {
    color: red; /* Màu đỏ cho thông báo lỗi */
    font-size: 0.9rem;
    margin-top: 5px;
    display: block;
  }

  .is-invalid {
    border-color: red; /* Đường viền đỏ cho trường nhập lỗi */
  }

  .is-invalid:focus {
    box-shadow: 0 0 5px rgba(255, 0, 0, 0.5); /* Hiệu ứng khi focus vào trường lỗi */
  }

@media (max-width: 768px) {
  .container {
    padding: 15px;
  }

  .form-group {
    flex-direction: column;
    align-items: flex-start;
  }

  .col-sm-2 {
    width: 100%;
  }

  .col-sm-5 {
    width: 100%;
  }

  .form-actions {
    flex-direction: column;
  }
}
</style>

<?php
    error_reporting();
?>

<?php
  include_once("controller/cNhanVien.php");
  $id = $_GET['id'];
  $p = new CNhanVien();
  include_once("view/page/quanly/quanlynhanvien/suanhanvien/xuly.php");
  $NhanVien = $p->getMaNV($id);
?>

<body>
  <div class="container">
    <form id="formNhanVien" action="" method="post" enctype="multipart/form-data">
    <h3 class="d-flex justify-content-center" style="padding-top:10px;">SỬA THÔNG TIN NHÂN VIÊN</h3>
      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Họ Và Tên</label>
        <div class="col-sm-6">
          <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            required
            value="<?=$NhanVien['HoTen']?>"
            onblur="validateField(this, 'Họ và tên không được để trống.', value => value.length > 0)"
          />
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Giới tính</label>
        <div class="col-sm-6">
          <div class="form-control">
            <input
              type="radio"
              id="male"
              name="gender"
              value="1"
              <?= ($NhanVien['GioiTinh'] == 1) ? 'checked' : '' ?>
            /> Nam
            <input
              type="radio"
              id="female"
              name="gender"
              value="0"
              <?= ($NhanVien['GioiTinh'] == 0) ? 'checked' : '' ?>
            /> Nữ
          </div>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Chức vụ</label>
        <div class="col-sm-6">
          <select name="chucvu" id="chucvu" class="form-control" required onblur="validateField(this, 'Vui lòng chọn chức vụ.', value => value !== '')">
            <?php
            include_once("model/mChucVu.php");
            $mChucVu = new MChucVu();
            $listChucVu = $mChucVu->SelectAllChucVu(); 

            // Duyệt qua danh sách chức vụ và tạo các <option> tương ứng
            foreach ($listChucVu as $chucVu) {
                $selected = ($NhanVien['MaChucVu'] == $chucVu['MaChucVu']) ? 'selected' : ''; 
                echo "<option value='{$chucVu['MaChucVu']}' $selected>{$chucVu['TenChucVu']}</option>";
            }
            ?>
          </select>
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Địa chỉ</label>
        <div class="col-sm-6">
          <input
            type="text"
            class="form-control"
            id="address"
            name="address"
            required
            value="<?=$NhanVien['DiaChi']?>"
            onblur="validateField(this, 'Địa chỉ không được để trống.', value => value.length > 0)"
          />
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Số điện thoại</label>
        <div class="col-sm-6">
          <input
            type="tel"
            class="form-control"
            id="phone"
            name="phone"
            required
            value="<?=$NhanVien['SDT']?>"
            onblur="validateField(this, 'Số điện thoại không được để trống.', value => value.length > 0)"
          />
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-6">
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            required
            value="<?=$NhanVien['Email']?>"
            onblur="validateField(this, 'Email không được để trống.', value => value.length > 0)"
          />
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Trạng thái</label>
        <div class="col-sm-6">
          <select id="status" class="form-control" name="trangthai" required>
            <option value="Đang làm việc" <?= ($NhanVien['TrangThai'] == 'Đang làm việc') ? 'selected' : '' ?>>
              Đang làm việc
            </option>
            <option value="Thử việc" <?= ($NhanVien['TrangThai'] == 'Thử việc') ? 'selected' : '' ?>>
              Thử việc
            </option>
            <option value="Nghỉ việc" <?= ($NhanVien['TrangThai'] == 'Nghỉ việc') ? 'selected' : '' ?>>
              Nghỉ việc
            </option>
          </select>
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Cửa hàng</label>
        <div class="col-sm-6">
          <select name="cuahang" id="cuahang" class="form-control" required>
            <?php
            include_once("model/mCuaHang.php");
            $mCuaHang = new MCuaHang();
            $listCuaHang = $mCuaHang->SelectAllCuaHang(); // Lấy tất cả cửa hàng từ cơ sở dữ liệu

            // Duyệt qua danh sách cửa hàng và tạo các <option> tương ứng
            foreach ($listCuaHang as $cuaHang) {
                $selected = ($NhanVien['MaCuaHang'] == $cuaHang['MaCuaHang']) ? 'selected' : ''; 
                echo "<option value='{$cuaHang['MaCuaHang']}' $selected>{$cuaHang['TenCuaHang']}</option>";
            }
            ?>
          </select>
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-actions py-3">
        <label for="" class="col-sm-4 col-form-label"></label>
        <button class="btn btn-primary">
          <a href="index.php?page=quanly/quanlynhanvien" style="text-decoration: none; color: inherit;">Quay lại</a>
        </button>
        <button type="reset" class="btn btn-secondary">
          <i class="fas fa-times"></i> Hủy
        </button>
        <button type="submit" class="btn btn-success" name="btnSua" onclick="return validateForm()">
          <i class="far fa-save"></i> Lưu
        </button>
      </div>
    </form>
  </div>
</body>

<script>
  // Hàm hiển thị lỗi
  function showError(field, message) {
    const errorSpan = field.nextElementSibling;
    errorSpan.textContent = message;
    field.classList.add("is-invalid");
  }

  // Hàm xóa lỗi
  function clearError(field) {
    const errorSpan = field.nextElementSibling;
    errorSpan.textContent = "";
    field.classList.remove("is-invalid");
  }

  // Hàm kiểm tra chung
  function validateField(field, message, validator) {
    if (!validator(field.value.trim())) {
      showError(field, message);
      return false;
    } else {
      clearError(field);
      return true;
    }
  }

  // Kiểm tra từng trường cụ thể
  function validateName(name) {
    const regex = /^[a-zA-ZÀ-ỹ\s]+$/;
    return validateField(name, "Họ và tên chỉ được chứa ký tự chữ cái và dấu cách.", value => regex.test(value));
  }

  function validatePhone(phone) {
    const regex = /^(03|05|07|08|09)\d{8}$/; 
    return validateField(phone, "Số điện thoại không hợp lệ. Số điện thoại phải gồm 10 chữ số và bắt đầu là 03, 05, 07, 08, 09.", value => regex.test(value));
  }

  function validateEmail(email) {
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return validateField(email, "Email không hợp lệ. Email có định dạng là abc@xxx.yy", value => regex.test(value));
  }

  function validateSelect(field, message) {
    return validateField(field, message, value => value !== "");
  }

  // Hàm kiểm tra toàn bộ form
  function validateForm() {
    const name = document.getElementById("name");
    const phone = document.getElementById("phone");
    const email = document.getElementById("email");
    const address = document.getElementById("address");
    const status = document.getElementById("status");
    const chucvu = document.getElementById("chucvu");
    const cuahang = document.getElementById("cuahang");

    let isValid = true;

    isValid &= validateName(name);
    isValid &= validateField(address, "Địa chỉ không được để trống.", value => value.length > 0);
    isValid &= validatePhone(phone);
    isValid &= validateEmail(email);
    isValid &= validateSelect(chucvu, "Vui lòng chọn chức vụ.");
    isValid &= validateSelect(status, "Vui lòng chọn trạng thái.");
    isValid &= validateSelect(cuahang, "Vui lòng chọn cửa hàng.");

    // Nếu hợp lệ, hiển thị xác nhận
    if (isValid) {
      return confirm("Bạn có chắc chắn muốn cập nhật nhân viên này không?");
    }

    return false; // Nếu không hợp lệ, ngăn form gửi đi
  }
</script>
