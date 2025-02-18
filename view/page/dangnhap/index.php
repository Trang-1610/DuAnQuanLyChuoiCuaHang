<style>
    body {
      background-image: url('https://img.freepik.com/photos-premium/burger-classique-table-bois_235627-476.jpg');
      background-size: cover;
      background-position: center;
     
      justify-content: center;
      align-items: center;
      
      font-family: Arial, sans-serif;
    }
    .container {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
      margin-left: 60%;
      padding: 32px;
      height: 70%;
      margin-top: 10px;
      margin-bottom: 10px;
      width: 24rem;
      text-align: center;
      transform: translateX(20px); /* Di chuyển khối sang phải */
    }
    .logo-container {
      background-color: #ebf5ff;
      border-radius: 50%;
      padding: 10px;
      display: inline-block;
    }
    .logo {
      width: 50px;
      height: 50px;
    }
    h1 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-top: 12px;
    }
    .input-group {
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      border-bottom: 2px solid #d1d5db;
      margin-top: 10%;
    }
    .input-group i {
      color: #4a5568;
      margin-right: 8px;
    }
    .input-group input {
      width: 100%;
      border: none;
      padding: 10px 0;
      outline: none;
    }
    .input-group input:focus {
      border-bottom-color: #3b82f6;
    }
    .forgot-password {
      color: #3b82f6;
      text-decoration: none;
      font-size: 0.875rem;
      display: block;
      text-align: right;
      margin-bottom: 16px;
      margin-top: 10%;
    }
    .button-group {
      display: flex;
      justify-content: space-between;
    }
    .button {
      padding: 10px 16px;
      border-radius: 8px;
      color: white;
      display: flex;
      align-items: center;
      border: none;
      cursor: pointer;
      font-size: 1rem;
      margin-top: 1 0%;
    }
    .button i {
      margin-right: 8px;
    }
    .button-blue {
      background-color: #3b82f6;
    }
    .button-green {
      background-color: #10b981;
    }
  </style>

<body>
  <div class="container">
    <div class="logo-container">
      <!-- <img src="https://storage.googleapis.com/a1aa/image/n4OP2kn6yT7yBZshdqmk2rioMhzyUCoQhZenloL0YcFGxV1JA.jpg" alt="Hamburger Fun logo" class="logo"/> -->
      <img src="img/logo.png" alt="Hamburger Fun logo" class="logo"/>
    
    </div>
    <h1>Hamburger Fun</h1>
    <?php
if (isset($_POST["btDangnhap"])) {
    include("controller/cNguoiDung.php");

    $obj = new CNguoiDung();
    $tenTK = $_POST["TenTK"];
    $password = $_POST["password"];
    
    // Gọi hàm đăng nhập để lấy thông tin tài khoản
    $user = $obj->dangnhaptaikhoan($tenTK, $password);

    if ($user) {
        if ($user['TrangThai'] == 0) {
            // Kiểm tra trạng thái "Nghỉ việc"
            echo "<p style='color:red;'>Tài khoản của bạn đã bị khóa hoặc bạn đã nghỉ việc.</p>";
        } else {
            // Đăng nhập thành công
            $_SESSION["dangnhap"] = $user;
            header("Location: index.php?page=quanly");
            exit();
        }
    } else {
        // Thông báo lỗi đăng nhập
        echo "<script>
        window.onload = function() {
            alert('Đăng nhập không thành công!');
           
        }
        </script>";
    }
}
?>
        <form method="POST" action="">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="TenTK" id="TenTK" placeholder="Tên đăng nhập" required />
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Mật khẩu" required />
            </div>
            <!-- <a href="#" class="forgot-password">Quên mật khẩu?</a> -->
            <div class="button-group">
                <button type="submit" class="button button-green" name="btDangnhap">Đăng nhập</button>
            </div>
        </form>
    </div>
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
<!-- <script>
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

    // Kiểm tra tên 
    const TenTK = document.querySelector('input[name="TenTK"]');
    TenTK.addEventListener('blur', function() {
        if (!TenTK.value.trim()) {
            showError(TenTK, "Tên đăng nhập không được rỗng.");
        } else {
            removeError(TenTK);
        }
    });
    const password = document.querySelector('input[name="password"]');
    password.addEventListener('blur', function() {
        if (!password.value.trim()) {
            showError(password, "Mật khẩu không được rỗng.");
        } else {
            removeError(password);
        }
    });

    // Kiểm tra trước khi gửi form
    document.querySelector('form').addEventListener('submit', function (e) {
        let isValid = true;

        // Kiểm tra lại Tên 
        if (!TenTK.value.trim()) {
            showError(TenTK, "Tên đăng nhập không được rỗng.");
            isValid = false;
        } else {
            removeError(TenTK);
        }
        if (!password.value.trim()) {
            showError(password, "Mật khẩu không được rỗng.");
            isValid = false;
        } else {
            removeError(password);
        }

        if (!isValid) {
        
            alert('Đăng nhập thất bại. Vui lòng nhập đầy đủ!');
            e.preventDefault();  // Ngừng gửi form nếu có lỗi
            
          
        }
    });
});
</script> -->

