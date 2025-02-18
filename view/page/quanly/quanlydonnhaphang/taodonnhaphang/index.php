<?php
$nguoiDung = $_SESSION["dangnhap"];  // Lấy thông tin người dùng từ session
$maCuaHang = $nguoiDung['MaCuaHang']; // Lấy mã cửa hàng của nhân viên
$maCV = $nguoiDung["MaChucVu"];
$manv = $nguoiDung["MaNV"];
$hoten=$nguoiDung["HoTen"];

if($maCV!=2){
    echo "<script>alert('Bạn không có quyền truy cập chức năng này')</script>";
    // include_once("../index.php");
}else{
    echo '<body>
        <div class="container qldnh">
            <h1 class="d-flex justify-content-center py-3 font-weight-bold">TẠO ĐƠN NHẬP HÀNG</h1>
            <form action="index.php?page=quanly/quanlydonnhaphang" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 15%;">
                                Mã Nguyên Liệu
                            </th>
                            <th>
                                Tên Nguyên Liệu
                            </th>
                            <th>
                                Loại Nguyên Liệu
                            </th>
                            <th>
                            Hình Ảnh
                            </th>
                            <th style="width: 15%;">
                                Số Lượng
                            </th>
                            <th>
                            Đơn Vị Tính
                            </th>
                        
                        </tr>
                    </thead>
                    <tbody>';
                        
                        include_once("controller/cNguyenLieu.php");
                        $p= new cnguyenlieu();
                        $kl=0;
                        
                                $table = $p->getallnguyenlieujoinloainguyenlieutheoch($maCuaHang);
                                
                                // Kiểm tra xem truy vấn có thành công không
                                if (!$table) {
                                    // Nếu truy vấn bị lỗi, in ra lỗi SQL
                                    echo "Lỗi SQL: " ;
                                    exit; // Dừng chương trình để kiểm tra lỗi
                                }

                        
                                // Nếu truy vấn thành công, xử lý kết quả
                                while ($r = $table->fetch_assoc()) {
                                    echo "<tr class ='text-center'>";
                                    echo '<td><input type="text" readonly class="form-control-plaintext text-center" value="' . $r["MaNguyenLieu"] . '" name= "manlieu[]"></td>';
                                    echo '<td>' . $r["TenNguyenLieu"] . '</td>';
                                    echo '<td>' . $r["TenLoaiNguyenLieu"] . '</td>';
                                    echo '<td><img style="width: 50px;height=50" src="img/nguyenlieu/' . $r["HinhAnh"] . '" alt=""></td>';
                                    echo '<td><input type="number" class="form-control text-center" value="0" name="khoiluongnl[]"></td>';
                                    echo '<td>' . $r["TenDonViTinh"] . '</td></tr>';
                                }
                       
                                




                        
                



  echo '  </tbody>
                </table>


             




                <div class="d-flex justify-content-center py-4">
                <button class="btn btn-secondary mx-3"><a href="index.php?page=quanly/quanlydonnhaphang"><i class="fas fa-times"></i> Hủy</a></button>

                    <!-- <a href="index.php?page=quanly/quanlydonnhaphang"> -->
                  
                                <button class="btn btn-success p-2" name="btntao">Xác nhận và lưu</button>
                 
                    <!-- </a> -->

                </div>

                </form>
        </div>
    </body>
';
}


?>



   
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


    // Kiểm tra số lượng món ăn
    // const soluong = document.querySelectorAll('input[name="khoiluongnl[]"]');
    const soluongInputs = document.querySelectorAll('input[name="khoiluongnl[]"]');

    soluongInputs.forEach(function(input) {
    input.addEventListener('blur', function() {
        if (!input.value.trim() ) {
            showError(input, "Số lượng món ăn không được rỗng.");
        }else if(input.value < 0){
            showError(input, "Số lượng món ăn không được âm.");

        } else {
            removeError(input);
        }
    });
});

    



    
    document.querySelector('form').addEventListener('submit', function (e) {
    let isValid = true; // Biến để kiểm tra tổng thể

    // Lấy tất cả các input của số lượng
    const soluongInputs = document.querySelectorAll('input[name="khoiluongnl[]"]');

    // Duyệt qua từng input để kiểm tra
    soluongInputs.forEach(function(input) {
        if (!input.value.trim()) {
            showError(input, "Số lượng món ăn không được rỗng.");
            isValid = false; // Có lỗi, không hợp lệ
        } else if (input.value < 0) {
            showError(input, "Số lượng món ăn không được âm.");
            isValid = false; // Có lỗi, không hợp lệ
        } else {
            removeError(input); // Xóa lỗi nếu hợp lệ
        }
    });
    

        if (!isValid) {
        
            alert('Thêm nguyên liệu thất bại. Vui lòng nhập đầy đủ!');
            e.preventDefault();  // Ngừng gửi form nếu có lỗi
            
          
        }
    });
});
</script>




