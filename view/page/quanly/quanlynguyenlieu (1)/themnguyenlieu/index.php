<?php

include_once("controller/cNguyenLieu.php");
include_once("xuly.php");
$p=new cnguyenlieu();
$p1 = new clsUpload();
if (isset($_POST["btnThem"])) {
    $TenNguyenLieu = $_POST["tennl"];
    // $SoLuong = $_POST["soluong"];
    $GiaMua = $_POST["giamua"];
    $MaLoaiNguyenLieu = $_POST["maloainl"];
    $MaDonViTinh= $_POST["dvt"];
    // $MaCuaHang = $_POST["cuahang"];
    $filename_new = $_FILES["hinhanh"]["name"];
   if($_FILES["hinhanh"]["type"]=="image/png"||$_FILES["hinhanh"]["type"]=="image/jpeg"||$_FILES["hinhanh"]["type"]=="image/jpg"){
    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "img/nguyenlieu/" . $filename_new)) {
        if ($p->insertnguyenlieu($TenNguyenLieu, $filename_new, $GiaMua, $MaLoaiNguyenLieu, $MaDonViTinh))
            echo "<script>alert('bạn đã thêm thành công');window.location.href='index.php?page=quanly/quanlynguyenlieu';</script>";
        else
        echo "<script>alert('bạn đã thêm thất bại')</script>";
    }else
    echo "<script>alert('Upload ảnh thất bại')</script>";
   }else{
    echo "<script>alert('File không phải là ảnh')</script>";

   }


}
?>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="container ">
            <h1 class="d-flex justify-content-center py-3 font-weight-bold">THÊM NGUYÊN LIỆU</h1>
            <div class="form-group row py-2">
                <label for="" class="col-sm-2 col-form-label">Tên Nguyên Liệu</label>
                <div class="col-sm-5">
                    <input type="text" name="tennl" class="form-control" id="" placeholder="Nhập tên nguyên liệu" required>
                </div>
            </div>
           
            <div class="form-group row py-2">
                <label for="" class="col-sm-2 col-form-label">Loại Nguyên Liệu</label>
                <div class="col-sm-5">
                    <select name="maloainl" class="form-control" required>
                        <option value="" >Chọn Loại Nguyên Liệu</option>
                        <?php
                        include_once("controller/cLoaiNguyenLieu.php");
                        $x=new cloainguyenlieu();
                        $loai = $x->getallloainguyenlieu();
                        if(!$loai){
                            echo "khong co data";
                        }else{

                            while($r= $loai->fetch_assoc()) {
                                echo ' <option name="maloainl" value="'. $r["MaLoaiNguyenLieu"] .'">'. $r["TenLoaiNguyenLieu"] .'</option>';
                            }
                        }
    
                        ?>
                    </select>
                    
                </div>
            </div>

            <div class="form-group row py-2">
                <label for="" class="col-sm-2 col-form-label">Đơn Vị Tính</label>
                <div class="col-sm-5">
                <select name="dvt" class="form-control" required>
                        <option value="" name="dvt">Chọn Đơn Vị Tính</option>
                        <?php
                        include_once("controller/cDonViTinh.php");
                        $x1=new cdonvitinh();
                        $dvt = $x1->getalldvt();
                        if(!$dvt){
                            echo "khong co data";
                        }else{

                            while($r1= $dvt->fetch_assoc()) {
                                echo ' <option name="dvt" value="'. $r1["MaDonViTinh"] .'">'. $r1["TenDonViTinh"] .'</option>';
                            }
                        }
    
                        ?>
                    </select>
                    <!-- <input type="text" class="form-control" id="" placeholder="Nhập đơn vị tính"> -->
                </div>
            </div>
            <div class="form-group row py-2">
                <label for="" class="col-sm-2 col-form-label">Gía Mua</label>
                <div class="col-sm-5">
                    <input type="number" name="giamua" class="form-control" id="" placeholder="Nhập Gía Mua" required>
                </div>
            </div>
            <!-- <div class="form-group row py-2">
                <label for="" class="col-sm-2 col-form-label">Số Lượng</label>
                <div class="col-sm-5">
                    <input type="text" name="soluong" class="form-control" id="" placeholder="Nhập số lượng" required>
                </div>
            </div> -->

            
            <div class="form-group row py-2">
                <label for="" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-5">
                    <input type="file" name="hinhanh" class="form-control" id="">
                </div>
            </div>
           
       

<script>
  function showConfirm() {
    if (confirm("Bạn có chắc chắn muốn lưu không?")) {
      // Nếu người dùng chọn "OK", thực hiện hành động lưu
    //   alert("Đã lưu!");
    } else {
      // Nếu người dùng chọn "Cancel", không làm gì cả
      alert("Hủy bỏ thêm nguyên liệu!");
    }
  }
</script>     
            <div class="form-actions py-3">
                <label for="" class="col-sm-2 col-form-label"></label>
               <!-- <a href="qlnl.html"> -->
                   <button class="btn btn-secondary"><a href="index.php?page=quanly/quanlynguyenlieu"><i class="fas fa-times"></i> Hủy</a></button>

               <!-- </a> -->
               <!-- <a href="qlnl.html"> -->

                   <button name="btnThem" class="btn btn-success" onclick="return confirm('Bạn có chắc chắn muốn thêm nguyên liệu không ')"><i class="far fa-save"></i> Lưu</button>
               <!-- </a> -->
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

    // Kiểm tra tên nguyên liệu
    const tennl = document.querySelector('input[name="tennl"]');

tennl.addEventListener('blur', function () {
    // Lấy giá trị nhập vào và loại bỏ khoảng trắng ở đầu và cuối
    const value = tennl.value.trim();

    // Biểu thức chính quy kiểm tra chỉ chứa chữ cái và khoảng trắng
    const regex = /^[a-zA-ZÀ-ỹ\s]+$/;
    // const regex1 = /(\b\w+\b)(?=.*\b\1\b)/;


    if (!value) {
        // Kiểm tra giá trị rỗng
        showError(tennl, "Tên nguyên liệu không được rỗng.");
    } else if (!regex.test(value)) {
        // Kiểm tra ký tự không hợp lệ
        showError(tennl, "Tên nguyên liệu chỉ được chứa chữ cái và khoảng trắng.");
    }else if (!regex1.test(value)) {
        // Kiểm tra ký tự không hợp lệ
        showError(tennl, "Tên nguyên liệu không được trùng.");
    } else {
        // Xóa lỗi nếu không có vấn đề
        removeError(tennl);
    }
});


    // Kiểm tra Loại nguyên liệu
    const maloainl = document.querySelector('select[name="maloainl"]');
    maloainl.addEventListener('blur', function() {
        if (!maloainl.value) {
            showError(maloainl, "Loại nguyên liệu không được rỗng.");
        } else {
            removeError(maloainl);
        }
    });
    //kiem tra don vi tinh
    const dvt = document.querySelector('select[name="dvt"]');
    dvt.addEventListener('blur', function() {
        if (!dvt.value) {
            showError(dvt, "Đơn vị tính không được rỗng.");
        } else {
            removeError(dvt);
        }
    });

    // Kiểm tra Giá nguyên liệu
    const giamua = document.querySelector('input[name="giamua"]');
    giamua.addEventListener('blur', function() {
        if (!giamua.value.trim() || giamua.value < 0) {
            showError(giamua, "Giá nguyên liệu không được rỗng và không được âm.");
        } else {
            removeError(giamua);
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

        // Kiểm tra lại Tên nguyên liệu
        if (!tennl.value.trim()) {
            showError(tennl, "Tên nguyên liệu không được rỗng.");
            isValid = false;
        } else {
            removeError(tennl);
        }

        // Kiểm tra lại Loại nguyên liệu
        if (!maloainl.value) {
            showError(maloainl, "Loại nguyên liệu không được rỗng.");
            isValid = false;
        } else {
            removeError(maloainl);
        }
        // Kiểm tra lại dvt
        if (!dvt.value) {
            showError(dvt, "Đơn Vị Tính không được rỗng.");
            isValid = false;
        } else {
            removeError(dvt);
        }
        // Kiểm tra lại Giá nguyên liệu
        if (!giamua.value.trim() || giamua.value < 0) {
            showError(giamua, "Giá nguyên liệu không được rỗng và không được âm.");
            isValid = false;
        } else {
            removeError(giamua);
        }

        
        // Kiểm tra lại Hình ảnh
        if (!hinhanh.files.length) {
            showError(hinhanh, "Hình ảnh không được rỗng.");
            isValid = false;
        } else {
            removeError(hinhanh);
        }

        if (!isValid) {
        
            alert('Thêm nguyên liệu thất bại. Vui lòng nhập đầy đủ!');
            e.preventDefault();  // Ngừng gửi form nếu có lỗi
            
          
        }
    });
});
</script>


