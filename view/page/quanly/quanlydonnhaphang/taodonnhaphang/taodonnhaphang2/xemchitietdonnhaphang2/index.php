<?php
$nguoiDung = $_SESSION["dangnhap"];  // Lấy thông tin người dùng từ session
$maCuaHang = $nguoiDung['MaCuaHang']; // Lấy mã cửa hàng của nhân viên
$maCV = $nguoiDung["MaChucVu"];
$manv = $nguoiDung["MaNV"];
// $hoten=$nguoiDung["HoTen"];
include_once("controller/cDonNhapHang.php");
$p = new cdonnhaphang();
$madnh= $_REQUEST["madonnhaphang"];
$kq=$p->get1donnhaphang($madnh);
if($kq){
    while($r=$kq->fetch_assoc()){
        $madnh=$r["MaDonNhapHang"];
        $ngaynhap=$r["NgayNhapHang"];
        $gia=$r["GiaNhap"];
        $hoten=$r["HoTen"];
        $tench=$r["MaCuaHang"];
        $trangthai=$r["TinhTrang"];


    }
}else{
    echo '<script>alert("ma dnh khong ton tai")</script>';
}

include_once("controller/cNLUL.php");
$p1=new cnlul();

if(isset($_POST["updatednh"])){
    if($p1->updatesoluongnl($_POST["manguyenlieu"],$_POST["khoiluongnhap"],$maCuaHang,$_POST["madonnhaphang"],$_POST["tongtiennhap"]*1000)){
        echo "<script>alert('Đã nhập hàng');window.location.href='index.php?page=quanly/quanlydonnhaphang';</script>";

    }else{
        echo "<script>alert('Nhập hàng thất bại')</script>";
    }
}
?>
<body>
        <div class="container kqulnl ">
            <h1 class="d-flex justify-content-center py-3 font-weight-bold">CHI TIẾT ĐƠN NHẬP HÀNG </h1>
            
<form action="" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã Nhập Hàng:</th>
                        <td colspan="5"><input type="text" class="ul-input btn border w-50" readonly name="madonnhaphang" id="" value="<?php if(isset($madnh)) echo $madnh ?>"></td>
                    </tr>
                    <tr>
                        <th>Ngày Nhập Hàng:</th>
                        <td colspan="5">
                        <?php 
                        $formatted_date = date("d-m-Y", strtotime($ngaynhap));
                        if(isset($formatted_date)) echo $formatted_date ?>
                    </td>
                    </tr>
                    <!-- <tr>
                        <th>Giá Nhập:</th>
                        <td colspan="5">
                        
                        <?php $gia = number_format($gia, 0, ',', '.'); // Không có số thập phân
                            echo $gia . " VND"; ?>
                        </td>
                    </tr> -->
                    <tr>
                        <th>Tên Người Nhập: </th>
                        <td colspan="5"><?php if(isset($hoten)) echo $hoten ?></td>
                    </tr>
                    <tr>
                        <th>Cửa Hàng: </th>
                        <td colspan="5"><?php if(isset($tench)) echo $tench ?></td>
                    </tr>
                    <tr>
                        <th>Trạng Thái: </th>
                        <td colspan="5"><?php if($trangthai==2){echo "Đã Cập Nhập";} else { echo "Chưa Cập Nhập";} ?></td>
                    </tr>

                    <tr>
                        <th colspan="6">DANH SÁCH NHẬP HÀNG</th>
                    </tr>
                    <tr>
                        <th>
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
                        
                        <th>
                            Số Lượng
                        </th>
                        <th>
                            Đơn Vị Tính
                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                <div class="container kqulnl ">



                <table class="table">
                    
                    <tbody>
                        <?php
                       
                                $table1 = $p->getchitietdonnhaphang($madnh);
                                
                                // Kiểm tra xem truy vấn có thành công không
                                if (!$table1) {
                                    // Nếu truy vấn bị lỗi, in ra lỗi SQL
                                    echo "Lỗi SQL: " ;
                                    exit; // Dừng chương trình để kiểm tra lỗi
                                }
                        
                                // Nếu truy vấn thành công, xử lý kết quả
                                while ($r1   = $table1->fetch_assoc()) {
                                    echo "<tr>";
                                    echo '<td><input type="text" name="manguyenlieu[]" readonly class="ul-input btn border" id="" value="' . $r1["MaNguyenLieu"] . '"></td>';
                                    echo '<td>' . $r1["TenNguyenLieu"] . '</td>';
                                    echo '<td>' . $r1["TenLoaiNguyenLieu"] . '</td>';
                                    echo '<td><img style="width: 50px;height=50" src="img/nguyenlieu/' . $r1["HinhAnh"] . '" alt=""></td>';
                                    echo '<td><input type="number" data-price="'. $r1["GiaMua"] .'" class="sln ul-input btn border" name="khoiluongnhap[]" id="" value= "' . $r1["KhoiLuong"] . '"></td>';
                                    echo '<td>' . $r1["TenDonViTinh"] . '</td></tr>';
                                }
                        
                        
                            echo " <tr>";
                            echo " <th style='color: red;'>Tổng Tiền: </th>";
                            echo " <td colspan='6' style='font-size: 20px;' ><input value='" . $gia . "' type='text' class='giatien ul-input btn border w-50' readonly name='tongtiennhap' id=''></td>";
                            echo "</tr>";
                           
                            
                           
                           
                        
                        ?>



    </tbody>
                </table>

            

                <?php
        
        

    ?>





            <div class="d-flex justify-content-center py-4">
                <a href="index.php?page=quanly/quanlydonnhaphang">

                <button class="btn btn-success p-2"><a href="index.php?page=quanly/quanlydonnhaphang/taodonnhaphang/taodonnhaphang2">Xác nhận</a> </button>

                </a>
                <a href="index.php?page=quanly/quanlydonnhaphang">
                <?php
    if($trangthai==2){
        echo '<button class="btn btn-outline-danger mx-3 p-2" name="update">Đã cập nhật số lượng</button>';
    }else{
        echo '<button class="btn btn-outline-success mx-3 p-2" name="updatednh">Cập nhật số lượng</button>';

    }



    // if(isset($_POST["update"])){
    //     while()
    // }
    ?>
                    
                </a>

            </div>



        </div>
        </form>
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


    // Kiểm tra số lượng món ăn
    // const soluong = document.querySelectorAll('input[name="khoiluongnl[]"]');
    const soluongInputs = document.querySelectorAll('input[name="khoiluongnhap[]"]');

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
    const soluongInputs = document.querySelectorAll('input[name="khoiluongnhap[]"]');

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




