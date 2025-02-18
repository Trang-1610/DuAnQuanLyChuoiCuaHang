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

<?php
  error_reporting();
?>

<?php
  include_once("controller/cNhanVien.php");
  $p = new CNhanVien();
  include_once("view/page/quanly/quanlynhanvien/themnhanvien/xuly.php");
?>

<body>
  <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <h3 style="text-align: center; padding-top: 10px;">THÊM NHÂN VIÊN</h3>
      <div class="form-group row py-2">
        <label for="" class="col-sm-2 col-form-label">Họ và tên</label>
        <div class="col-sm-5">
          <input
            type="text"
            class="form-control"
            id="name"
            placeholder="Nhập họ và tên"
            name="name" required
            onblur="validateField(this, 'Họ và tên không được để trống.', value => value.length > 0)"
          />
          <span class="error-message"></span>
        </div>
      </div>
      
      <div class="form-group row py-2">
        <label for="" class="col-sm-2 col-form-label">Giới tính</label>
        <div class="col-sm-5">
          <div class="form-control">
            <input
              type="radio"
              class=""
              id="male"
              name="gender"
              value="1" checked
            />Nam
            <input
              type="radio"
              class=""
              id="female"
              name="gender"
              value="0"
            />Nữ
          </div>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-2 col-form-label">Chức vụ</label>
        <div class="col-sm-5">
          <select name="idchucvu" class="form-control" required onblur="validateField(this, 'Vui lòng chọn chức vụ.', value => value !== '')">
              <option value="">- Chọn chức vụ -</option>
              <?php
                  include("controller/cChucVu.php");
                  $obj = new CChucVu();
                  $dsChucVu = $obj ->getAllChucVu();
                  if ($dsChucVu){
                    while($id = $dsChucVu->fetch_assoc()){
                      $selected = isset($_POST['MaChucVu']) && $_POST['MaChucVu'] == $id['MaChucVu'] ? 'selected' : '';
                      
                      echo "<option value='{$id['MaChucVu']}' {$selected}>{$id['TenChucVu']}</option>";
                    }
                  }
              ?>              
          </select>
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-2 col-form-label">Địa chỉ</label>
        <div class="col-sm-5">
          <input
            type="text"
            class="form-control"
            id=""
            placeholder="Nhập địa chỉ"
            name="address"
            required
            onblur="validateField(this, 'Địa chỉ không được để trống.', value => value.length > 0)"
          />
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-5">
          <input
            type="email"
            class="form-control"
            id=""
            placeholder="Nhập email"
            name="email"
            required
            onblur="validateField(this, 'Email không được để trống.', value => value.length > 0)"
          />
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-2 col-form-label">Số điện thoại</label>
        <div class="col-sm-5">
          <input
            type="text"
            class="form-control"
            id="phone"
            placeholder="Nhập số điện thoại"
            name="phone"
            required
            onblur="validateField(this, 'Số điện thoại không được để trống.', value => value.length > 0)"
          />
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-2 col-form-label">Trạng thái</label>
        <div class="col-sm-5">
          <select id="status" class="form-control" name="trangthai" required>
          <option value="">- Chọn trạng thái -</option>
            <option>Đang làm việc</option>
            <option>Thử việc</option>
            <option>Nghỉ việc</option>
          </select>
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-2 col-form-label">Cửa hàng</label>
        <div class="col-sm-5">
          <select name="idcuahang" class="form-control" required>
              <option value="">- Chọn cửa hàng -</option>
              <?php
                  include("controller/cCuaHang.php");
                  $obj = new CCuaHang();
                  $dsCuaHang = $obj ->getAllCuaHang();
                  if ($dsCuaHang){
                    while($id = $dsCuaHang->fetch_assoc()){
                      $selected = isset($_POST['MaCuaHang']) && $_POST['MaCuaHang'] == $id['MaCuaHang'] ? 'selected' : '';
                      
                      echo "<option value='{$id['MaCuaHang']}' {$selected}>{$id['TenCuaHang']}</option>";
                    }
                  }
              ?>
          </select>
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-group row py-2">
        <label for="" class="col-sm-2 col-form-label">Mật khẩu</label>
        <div class="col-sm-5">
          <input
            type="password"
            class="form-control"
            id=""
            placeholder="Nhập mật khẩu"
            name="password"
            required
            onblur="validateField(this, 'Mật khẩu không được để trống.', value => value.length > 0)"
          />
          <span class="error-message"></span>
        </div>
      </div>

      <div class="form-actions py-3">
        <button class="btn btn-primary">
          <a href="index.php?page=quanly/quanlynhanvien" style="text-decoration: none; color: inherit;">Quay lại</a>
        </button>
         
        <button type="reset" class="btn btn-secondary">
          <i class="fas fa-times"></i> Hủy
        </button>
        <button type="submit" class="btn btn-success" onclick="return validateForm()" name="btnAdd">
          <i class="far fa-save"></i> Lưu
        </button>
      </div>
    </form>

  </div>
</body>

<script>
  function validateField(field, message, validator) {
    const errorSpan = field.nextElementSibling;
    if (!validator(field.value.trim())) {
      errorSpan.textContent = message;
      field.classList.add("is-invalid"); // Thêm class để làm nổi bật lỗi
    } else {
      errorSpan.textContent = "";
      field.classList.remove("is-invalid");
    }
  }

  function validateForm() {
    // Kiểm tra lại toàn bộ form trước khi gửi
    const name = document.getElementById("name");
    const phone = document.getElementById("phone");
    const email = document.getElementsByName("email")[0];
    const address = document.getElementsByName("address")[0];
    const password = document.getElementsByName("password")[0];
    const status = document.getElementById("status");
    const chucvu = document.getElementsByName("idchucvu")[0];
    const cuahang = document.getElementsByName("idcuahang")[0];

    let isValid = true;

    // Kiểm tra trường nhập liệu
    validateField(name, "Họ và tên không được để trống.", value => value.length > 0);
    validateField(address, "Địa chỉ không được để trống.", value => value.length > 0);
    validateField(password, "Mật khẩu không được để trống.", value => value.length > 0);
    validateField(chucvu, "Vui lòng chọn chức vụ.", value => value !== "");
    validateField(status, "Vui lòng chọn trạng thái.", value => value !== "");
    validateField(cuahang, "Vui lòng chọn cửa hàng.", value => value !== "");


    function validateName(name) {
    const nameRegex = /^[a-zA-ZÀ-ỹ\s]+$/; // Cho phép ký tự alphabet (bao gồm có dấu) và dấu cách
    if (name.trim() === "") {
        return { valid: false, message: "Họ và tên không được để trống." };
    }
    if (!nameRegex.test(name)) {
        return { valid: false, message: "Họ và tên chỉ được chứa ký tự chữ cái và dấu cách." };
    }
    return { valid: true, message: "" };
    }

    function validatePhoneNumber(phoneNumber) {
  // Kiểm tra số bắt đầu bằng mã vùng hợp lệ ở Việt Nam và có 10 chữ số
  const phoneRegex = /^(03|05|07|08|09)\d{8}$/; 
  if (phoneNumber.trim() === "") {
    return { valid: false, message: "Số điện thoại không được để trống." };
  }
  if (!phoneRegex.test(phoneNumber)) {
    return { 
      valid: false, 
      message: "Số điện thoại không hợp lệ. Số điện thoại phải gồm 10 chữ số và bắt đầu là 03, 05, 07, 08, 09." 
    };
  }
  return { valid: true, message: "" };
}


    function validateEmail(email) {
      const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // Định dạng email chuẩn
      if (email.trim() === "") {
        return { valid: false, message: "Email không được để trống." };
      }
      if (!emailRegex.test(email)) {
        return { valid: false, message: "Email không hợp lệ. Email có định dạng là abc@xxx.yy" };
      }
      return { valid: true, message: "" };
    }

    // Kiểm tra họ tên
    const nameValidation = validateName(name.value);
    if (!nameValidation.valid) {
        const nameError = name.nextElementSibling;
        nameError.textContent = nameValidation.message;
        name.classList.add("is-invalid");
        isValid = false;
    } else {
        name.nextElementSibling.textContent = "";
        name.classList.remove("is-invalid");
    }

    // Kiểm tra số điện thoại
    const phoneValidation = validatePhoneNumber(phone.value);
      if (!phoneValidation.valid) {
        const phoneError = phone.nextElementSibling;
        phoneError.textContent = phoneValidation.message;
        phone.classList.add("is-invalid");
        isValid = false;
      } else {
        phone.nextElementSibling.textContent = "";
        phone.classList.remove("is-invalid");
      }

    // Kiểm tra email
    const emailValidation = validateEmail(email.value);
    if (!emailValidation.valid) {
      const emailError = email.nextElementSibling;
      emailError.textContent = emailValidation.message;
      email.classList.add("is-invalid");
      isValid = false;
    } else {
      email.nextElementSibling.textContent = "";
      email.classList.remove("is-invalid");
    }

    // Kiểm tra mật khẩu
    const passwordValidation = validatepassword(password.value);
    if (!passwordValidation.valid) {
      const passwordError = password.nextElementSibling;
      passwordError.textContent = passwordValidation.message;
      password.classList.add("is-invalid");
      isValid = false;
    } else {
      password.nextElementSibling.textContent = "";
      password.classList.remove("is-invalid");
    }

    // Kiểm tra các trường select
    if (status.value === "") {
      const statusError = status.nextElementSibling;
      statusError.textContent = "Vui lòng chọn trạng thái.";
      status.classList.add("is-invalid");
      isValid = false;
    } else {
      status.nextElementSibling.textContent = "";
      status.classList.remove("is-invalid");
    }

    if (chucvu.value === "") {
      const chucvuError = chucvu.nextElementSibling;
      chucvuError.textContent = "Vui lòng chọn chức vụ.";
      chucvu.classList.add("is-invalid");
      isValid = false;
    } else {
      chucvu.nextElementSibling.textContent = "";
      chucvu.classList.remove("is-invalid");
    }

    if (cuahang.value === "") {
      const cuahangError = cuahang.nextElementSibling;
      cuahangError.textContent = "Vui lòng chọn cửa hàng.";
      cuahang.classList.add("is-invalid");
      isValid = false;
    } else {
      cuahang.nextElementSibling.textContent = "";
      cuahang.classList.remove("is-invalid");
    }

    // If the form is valid, show the confirmation prompt
    if (isValid) {
      return confirm("Bạn có chắc chắn muốn thêm nhân viên này không?");
        
    }
    return false; // If the form is invalid, prevent submission
}
</script>