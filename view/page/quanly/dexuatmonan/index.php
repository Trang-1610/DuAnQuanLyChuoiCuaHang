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

  textarea {
    resize: vertical;
  }

  button {
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
  }

  button:hover {
    opacity: 0.9;
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
    margin-top: 10px;
  }

  .form-actions button {
    width: 120px;
  }

  .error-message {
    color: red;
    font-size: 0.9rem;
    margin-top: 5px;
  }

  .is-invalid {
    border-color: red;
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
  error_reporting(E_ALL);
?>

<?php
  include_once("controller/cDeXuat.php");
  $p = new CDeXuat();
  include_once("view/page/quanly/dexuatmonan/xuly.php");
?>

<body>
  <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <h3 style="text-align: center; padding-top: 10px;">ĐỀ XUẤT MÓN ĂN</h3>
      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Tên món ăn</label>
        <div class="col-sm-6">
          <input
            type="text"
            class="form-control"
            id=""
            name="tenmon"
            placeholder="Nhập tên món ăn"
            required
            onblur="validateField(this, 'Tên món ăn không được để trống.', value => value.length > 0)"
          />
          <span class="error-message"></span>
        </div>
      </div>
      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Loại món ăn</label>
        <div class="col-sm-6">
          <select id="" class="form-control" name="loaiMA" required onblur="validateField(this, 'Vui lòng chọn loại món ăn.', value => value !== '')">
            <option value="">- Chọn loại món ăn -</option>
              <?php
                include("controller/cLoaiMonAn.php");
                $controller = new CLoaiMonAn();
                $dsLoaiMonAn = $controller->getAllLoaiMonAn();
                if($dsLoaiMonAn){
                  while ($loai = $dsLoaiMonAn->fetch_assoc()) {
                    // Kiểm tra xem loại món ăn này có phải là loại món ăn hiện tại không
                    $selected = (isset($monan['MaLoaiMonAn']) && $monan['MaLoaiMonAn'] == $loai['MaLoaiMonAn']) ? 'selected' : '';
                    echo "<option value='{$loai['MaLoaiMonAn']}' {$selected}>{$loai['TenLoaiMonAn']}</option>";
                  }
                }
              ?>
          </select>
          <span class="error-message"></span>
        </div>
      </div>
      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Mô tả</label>
        <div class="col-sm-6">
          <textarea
            name="mota"
            class="form-control"
            id=""
            rows="5"
            placeholder="Mô tả"
          ></textarea>
        </div>
      </div>
      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Nguyên liệu</label>
        <div class="col-sm-6">
          <textarea
            name="nguyenlieu"
            class="form-control"
            id=""
            rows="5"
            placeholder="Nhập nguyên liệu"
            required
            onblur="validateField(this, 'Nguyên liệu không được để trống.', value => value !== '')"
          ></textarea>
          <span class="error-message"></span>
        </div>
      </div>
      <div class="form-group row py-2">
        <label for="" class="col-sm-4 col-form-label">Giá đề xuất</label>
        <div class="col-sm-6">
          <input
            type="number"
            class="form-control"
            id=""
            name="giadexuat"
            placeholder="VND"
            required
            step="any"
            onblur="validateField(this, 'Vui lòng nhập giá đề xuất.', value => value !== '')"
          />
          <span class="error-message"></span>
        </div>
      </div>
      <div class="form-actions py-3">
        <label for="" class="col-sm-3 col-form-label"></label>
        <button class="btn btn-primary">
          <a href="index.php?page=quanly" style="text-decoration: none; color: inherit;">Quay lại</a>
        </button>
        <button type="reset" class="btn btn-secondary">
          <i class="fas fa-times"></i> Hủy
        </button>
        <button type="submit" class="btn btn-success" name="btnSubmit" onclick=" return validateForm()">
          <i class=""></i> Gửi đề xuất
        </button>
      </div>
    </form>
  </div>
</body>

<script>
  // Hiển thị thông báo lỗi
  function showError(input, message) {
    const parent = input.parentElement;
    let error = parent.querySelector('.error-message');
    if (!error) {
      error = document.createElement('span');
      error.classList.add('error-message');
      parent.appendChild(error);
    }
    error.textContent = message;
    input.classList.add('is-invalid');
  }

  // Xóa thông báo lỗi
  function clearError(input) {
    const parent = input.parentElement;
    const error = parent.querySelector('.error-message');
    if (error) {
      error.textContent = '';
    }
    input.classList.remove('is-invalid');
  }

  // Kiểm tra trường nhập liệu
  function validateField(input, message, validator = null) {
    const value = input.value.trim();
    
    if (validator) {
      // Nếu có hàm kiểm tra, sử dụng nó
      if (!validator(value)) {
        showError(input, message);
        return false;
      }
    } else if (!value) {
      // Kiểm tra trường hợp giá trị trống
      showError(input, message);
      return false;
    }

    // Xóa lỗi nếu hợp lệ
    clearError(input);
    return true;
  }

  // Kiểm tra toàn bộ biểu mẫu
  function validateForm() {
    const tenmon = document.querySelector('input[name="tenmon"]');
    const loaiMA = document.querySelector('select[name="loaiMA"]');
    const nguyenlieu = document.querySelector('textarea[name="nguyenlieu"]');
    const giadexuat = document.querySelector('input[name="giadexuat"]');

    let isValid = true;

    isValid &= validateField(tenmon, "Vui lòng nhập tên món ăn.", value => value.length > 0);
    isValid &= validateField(loaiMA, "Vui lòng chọn loại món ăn.", value => value !== "");
    isValid &= validateField(nguyenlieu, "Vui lòng nhập nguyên liệu.", value => value.length > 0);
    isValid &= validateField(giadexuat, "Vui lòng nhập giá đề xuất.", value => value.length > 0);

    function validateGiaDeXuat(giadexuat) {
  // Chuyển giá trị về số để kiểm tra
  const numericGiaDeXuat = parseFloat(giadexuat);

  if (giadexuat.trim() === "") {
    return { valid: false, message: "Giá đề xuất không được để trống." };
  }
  if (isNaN(numericGiaDeXuat)) {
    return { valid: false, message: "Giá đề xuất phải là một số hợp lệ." };
  }
  if (numericGiaDeXuat < 0) {
    return { valid: false, message: "Giá đề xuất không hợp lệ. Vui lòng nhập giá trị không âm." };
  }
  return { valid: true, message: "" };
}

// Kiểm tra họ tên
const giadexuatValidation = validateGiaDeXuat(giadexuat.value);
    if (!giadexuatValidation.valid) {
        const giadexuatError = giadexuat.nextElementSibling;
        giadexuatError.textContent = giadexuatValidation.message;
        giadexuat.classList.add("is-invalid");
        isValid = false;
    } else {
      giadexuat.nextElementSibling.textContent = "";
      giadexuat.classList.remove("is-invalid");
    }

    // Nếu có bất kỳ lỗi nào, không gửi form
    if (!isValid) {
      return false;
    }

    // Hiển thị xác nhận trước khi gửi
    return confirm("Bạn có chắc muốn gửi đề xuất?");
  }
</script>



