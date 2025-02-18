<?php
include_once("controller/cNguyenLieu.php");
$p = new cnguyenlieu();
$manl= $_REQUEST["idnl"];
$mach=$_REQUEST["idch"];

$kq=$p->get1nguyenlieu($manl,$mach);
if($kq){
    while($r=$kq->fetch_assoc()){
        $tennl=$r["TenNguyenLieu"];
        $giamua=$r["GiaMua"];
        $gia = number_format($giamua, 0, ',', '.'); // Không có số thập phân
                          
        $hinhanh=$r["HinhAnh"];
        $loainl=$r["MaLoaiNguyenLieu"];
        $dvt=$r["MaDonViTinh"];
        $cuahang=$r["MaCuaHang"];
        $soluong=$r["SoLuong"];
        $tinhtrang=$r["TinhTrang"];


    }
}else{
    echo '<script>alert("ma san pham khong ton tai")</script>';
}


?>




<body>
        <div class="container qlnl">
            <h1 class="d-flex justify-content-center py-3 font-weight-bold">SỬA THÔNG TIN NGUYÊN LIỆU</h1>
            <form action="" method="post" enctype="multipart/form-data">
            <div class=" row">
                <div class="suanl-left col-9     ">
                    <div class="form-group row py-2">
                        <label for="" class="col-sm-2 col-form-label">Tên Nguyên Liệu</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" value="<?php if(isset($tennl)) echo $tennl ?>" name="TenNguyenLieu" id="">

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
                                if($r["MaLoaiNguyenLieu"]==$loainl){
                                    echo '<option name="maloainl"  value = "' .$r["MaLoaiNguyenLieu"].'" selected >'.$r["TenLoaiNguyenLieu"].'</option>';
                                }else{
                                    echo '<option name="maloainl"  value = "'.$r["MaLoaiNguyenLieu"].'"> '.$r["TenLoaiNguyenLieu"].'</option>';
                                }
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
                            <option value="" >Chọn Đơn Vị Tính</option>
                            <?php
                            include_once("controller/cDonViTinh.php");
                            $d=new cdonvitinh();
                            $madvt = $d->getalldvt();
                            if(!$madvt){
                                echo "khong co data";
                            }else{

                                while($r1= $madvt->fetch_assoc()) {
                                    if($r1["MaDonViTinh"]==$dvt){
                                        echo '<option name="dvt"  value = "' .$r1["MaDonViTinh"].'" selected >'.$r1["TenDonViTinh"].'</option>';
                                    }else{
                                        echo '<option name="dvt"  value = "'.$r1["MaDonViTinh"].'"> '.$r1["TenDonViTinh"].'</option>';
                                    }
                                }
                            }
        
                            ?>
                        </select>    


                        </div>
                    </div>
        
                    <div class="form-group row py-2">
                        <label for="" class="col-sm-2 col-form-label">Gía Mua</label>
                        <div class="col-sm-5">
                        <input type="number" class="form-control" value="<?php if(isset($gia)) echo $gia ?>" name="giamua" id="">

                        </div>
                    </div>

                    
        
                   
                    <!-- <div class="form-group row py-2">
                        <label for="" class="col-sm-2 col-form-label">Tình Trạng</label>
                        <div class="col-sm-5">
                            <select name="tinhtrang" id="" class="form-control">

                            
                            <?php
                            // if($tinhtrang==1){
                            //     echo '<option name="tinhtrang"  value = "' .$r["TinhTrang"].'" selected >Đang sử dụng</option>';
                                
                            // }else{
                            //     echo '<option name="tinhtrang"  value = "' .$r["TinhTrang"].'" selected >Không còn sử dụng</option>';

                            // }

                            ?>
                        </select>
                        </div>
                    </div> -->
                    <div class="form-group row py-2">
                        <label for="" class="col-sm-2 col-form-label">Hình ảnh</label>
                        <div class="col-sm-5">
                        <input type="file" name="hinhanh" class="form-control" id="">
                        </div>
                    </div>
                    
                    <!-- <div class="form-group row py-2 hidden"> -->
                        <!-- <label for="" class="col-sm-2 col-form-label">Số Lượng</label> -->
                        <!-- <div class="col-sm-5">
                        <input type="hidden" class="form-control" readonly value="<?php if(isset($soluong)) echo $soluong ?>" name="soluong" id="">

                        </div>
                    </div> -->
                    
                    <div class="form-actions py-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                       <!-- <a href="qlnl.html"> -->
                           <button class="btn btn-secondary"><a href="index.php?page=quanly/quanlynguyenlieu"><i class="fas fa-times"></i> Hủy</a></button>
        
                       <!-- </a> -->
                       <!-- <a href="qlnl.html"> -->
        
                           <button name = "submit"class="btn btn-success" onclick="return showConfirm('Bạn có chắc chắn muốn sửa không?')"><i class="far fa-save"></i> Lưu</button>
                       <!-- </a> -->
                    </div>
                </div>
                <div class="suanl-right col-2">
                <img src="img/nguyenlieu/<?php  echo $hinhanh ?>" width="300px" alt="">
                </div>
            </div>
            </form>
        </div>

    </body>

    <?php

if(isset($_REQUEST["submit"])){
    $filename_new = $_FILES["hinhanh"]["name"];
    if($_FILES["hinhanh"]["type"]=="image/png"||$_FILES["hinhanh"]["type"]=="image/jpeg"||$_FILES["hinhanh"]["type"]=="image/jpg"||strlen($filename_new) === 0){
        if(strlen($filename_new) != 0) {
            if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "img/" . $filename_new)) {
                if ($p->updatenguyenlieu($manl,$_REQUEST["TenNguyenLieu"],  $filename_new, $_REQUEST["giamua"], $_REQUEST["maloainl"], $_REQUEST["dvt"])){
    
                    echo "<script>alert('bạn đã sửa thông tin thành công')</script>";
                }
            else{
    
                echo "<script>alert('bạn đã sửa thất bại')</script>";
            }
            }else
            echo "<script>alert('Upload ảnh thất bại')</script>";
        }else {
            if($p->updatenguyenlieu($manl,$_REQUEST["TenNguyenLieu"],$filename_new, $_REQUEST["giamua"], $_REQUEST["maloainl"], $_REQUEST["dvt"])){
                echo "<script>alert('bạn đã sửa thông tin thành công')</script>";

            }else{
                echo "<script>alert('bạn đã sửa thất bại')</script>";

            }
        }
       }else{
        echo "<script>alert('File khong phai la anh')</script>";
    
       }


}


?>


<script>
    function showConfirm(message) {
    return confirm(message);
}
</script>
   
         

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
    const tennl = document.querySelector('input[name="TenNguyenLieu"]');

tennl.addEventListener('blur', function () {
    // Lấy giá trị nhập vào và loại bỏ khoảng trắng ở đầu và cuối
    const value = tennl.value.trim();

    // Biểu thức chính quy kiểm tra chỉ chứa chữ cái và khoảng trắng
    const regex = /^[a-zA-ZÀ-ỹ\s]+$/;

    if (!value) {
        // Kiểm tra giá trị rỗng
        showError(tennl, "Tên nguyên liệu không được rỗng.");
    } else if (!regex.test(value)) {
        // Kiểm tra ký tự không hợp lệ
        showError(tennl, "Tên nguyên liệu chỉ được chứa chữ cái và khoảng trắng.");
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
        
            alert('Sửa nguyên liệu thất bại. Vui lòng nhập đầy đủ!');
            e.preventDefault();  // Ngừng gửi form nếu có lỗi
            
          
        }
    });
});
</script>


