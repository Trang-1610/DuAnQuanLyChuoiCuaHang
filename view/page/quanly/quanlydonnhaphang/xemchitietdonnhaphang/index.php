<?php
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




?>
<body>
        <div class="container kqulnl ">
            <h1 class="d-flex justify-content-center py-3 font-weight-bold">CHI TIẾT ĐƠN NHẬP HÀNG</h1>
            
<form action="" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã Nhập Hàng:</th>
                        <td colspan="5"><?php if(isset($madnh)) echo $madnh ?></td>
                    </tr>
                    <tr>
                        <th>Ngày Nhập Hàng:</th>
                        <td colspan="5">
                        <?php 
                        $formatted_date = date("d-m-Y", strtotime($ngaynhap));
                        if(isset($formatted_date)) echo $formatted_date ?>
                    </td>
                    </tr>
                    <tr>
                        <th>Giá Nhập:</th>
                        <td colspan="5">
                        
                        <?php $gia = number_format($gia, 0, ',', '.'); // Không có số thập phân
                            echo $gia . " VND"; ?>
                        </td>
                    </tr>
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
                                    echo '<td>' . $r1["MaNguyenLieu"] . '</td>';
                                    echo '<td>' . $r1["TenNguyenLieu"] . '</td>';
                                    echo '<td>' . $r1["TenLoaiNguyenLieu"] . '</td>';
                                    echo '<td><img style="width: 50px;height=50" src="img/nguyenlieu/' . $r1["HinhAnh"] . '" alt=""></td>';
                                    echo '<td>' . $r1["KhoiLuong"] . '</td>';
                                    echo '<td>' . $r1["TenDonViTinh"] . '</td></tr>';
                                }
                        
                        


                       
                            echo " <tr>";
                            echo " <th style='color: red;'>Tổng Tiền: </th>";
                            echo " <td colspan='6' style='font-size: 20px;'>".$gia."VNĐ</td>";
                            echo "</tr>";
                           
                            
                           
                           
                        
                        ?>



    </tbody>
                </table>

            

                <?php
        
        

    ?>





            <div class="d-flex justify-content-center py-4">
                <a href="index.php?page=quanlydonnhaphang">

                    <button class="btn btn-success p-2"><a href="index.php?page=quanly/quanlydonnhaphang">Xác nhận</a> </button>
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
   