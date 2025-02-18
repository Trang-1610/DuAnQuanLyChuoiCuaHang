<?php
if (isset($_REQUEST["tinhtoan"])){
    $_SESSION["soluong"]=$_POST["soluong"];
    foreach($_SESSION["soluong"] as $sl) {
        // echo $sl;
    }
}
$nguoiDung = $_SESSION["dangnhap"];  // Lấy thông tin người dùng từ session
        $maCuaHang = $nguoiDung['MaCuaHang']; // Lấy mã cửa hàng của nhân viên
       $maCV = $nguoiDung["MaChucVu"];
       $manv = $nguoiDung["MaNV"];
        $hoten=$nguoiDung["HoTen"];
?>
    <body>
            <div class="container kqulnl ">
                <h1 class="d-flex justify-content-center py-3 font-weight-bold">KẾT QUẢ ƯỚC LƯỢNG NGUYÊN LIỆU</h1>


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
                    <tbody>
                        <?php
                        include_once("controller/cNguyenLieu.php");
                        $p= new cnguyenlieu();
                        
                        if (isset($_SESSION["soluong"]) && count($_SESSION["soluong"]) > 0) {
                                $table = $p->ulnl($_SESSION["soluong"]);
                                
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
                                    // if($r["TongKhoiLuong"]-$r["SoLuong"]>0){
                                    //     echo '<td><input type="text" readonly class="form-control-plaintext text-center" value="' . $r["TongKhoiLuong"]-$r["SoLuong"] . '" name="khoiluongnl[]"></td>';
                                    // }else {
                                    //     echo "<td class='py-2 border-2'>Đã đủ</td>";
                                    // }
                                        echo '<td><input type="text" readonly class="form-control-plaintext text-center" value="' . $r["TongKhoiLuong"] . '" name="khoiluongnl[]"></td>';

                                    echo '<td>' . $r["TenDonViTinh"] . '</td></tr>';
                                }
                        } else {
                            echo "Mảng không có dữ liệu.";
                        }
                        




                        
                        ?>



    </tbody>
                </table>


             




                <div class="d-flex justify-content-center py-4">
                <button class="btn btn-secondary mx-3"><a href="index.php?page=quanly/quanlynguyenlieu/uocluongnguyenlieu"><i class="fas fa-times"></i> Hủy</a></button>

                    <!-- <a href="index.php?page=quanly/quanlydonnhaphang"> -->
                  
                                <button class="btn btn-success p-2" name="btnluu">Xác nhận và lưu</button>
                 
                    <!-- </a> -->

                </div>

                </form>

            </div>

        </body>


        
