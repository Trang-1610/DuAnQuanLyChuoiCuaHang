<?php
        $nguoiDung = $_SESSION["dangnhap"];  // Lấy thông tin người dùng từ session
        $maCuaHang = $nguoiDung['MaCuaHang']; // Lấy mã cửa hàng của nhân viên
       $maCV = $nguoiDung["MaChucVu"];
       $manv = $nguoiDung["MaNV"];
        $hoten=$nguoiDung["HoTen"];
        include_once("controller/cNguyenLieu.php");
        $p= new cnguyenlieu();
        include_once("controller/cNLUL.php");
        $p1=new cnlul();
        $kl=0;
        if(isset($_POST["btnluu"])){
            
            if (isset($_SESSION["soluong"]) && count($_SESSION["soluong"]) > 0) {
                $table1 = $p->ulnl($_SESSION["soluong"]);
                while ($r1 = $table1->fetch_assoc()) {
                // $p1->themnlul($r1["MaNguyenLieu"],$r1["MaDonNhapHang"],$r1["TongKhoiLuong"],5);
                $kl=$kl+($r1["TongKhoiLuong"]*$r1["GiaMua"]);
                // *
            }

            if($p1->themdnh($kl,$_POST["manlieu"],$_POST["khoiluongnl"],$maCuaHang,$manv)){
                echo "<script>alert('Tạo đơn nhập hàng thành công')</script>";

            }

            }
        }



        if(isset($_POST["updatednh"])){
            if($p1->updatesoluongnl($_POST["manguyenlieu"],$_POST["khoiluongnhap"],$maCuaHang,$_POST["madonnhaphang"],$_POST["tongtiennhap"]*1000)){
                echo "<script>alert('Đã nhập hàng')</script>";

            }else{
                echo "<script>alert('Nhập hàng thất bại')</script>";
            }
        }

        

    ?>

<?php
    include_once("controller/cNLUL.php");
    $p4=new cnlul();
    include_once("controller/cNguyenLieu.php");
    
    $p5= new cnguyenlieu();
    $table5 = $p5->getallnguyenlieujoinloainguyenlieutheoch($maCuaHang);
        $kl1=0;
        if(isset($_POST["btntao"])){
        $khoi[] = 0;
        $demm=0;
            while ($r5 = $table5->fetch_assoc()) {
                
                if($_POST["khoiluongnl"] != 0) {
                    $khoi["id"] = $r5["MaNguyenLieu"];
                    $khoi["soluong"] = $_POST["khoiluongnl"];
                }
                $kl1=$kl1+($_POST["khoiluongnl"][$demm]*$r5["GiaMua"]);
$demm++;
            } 
            foreach($khoi["id"] as $khoiluong){
                echo "<script>alert('". $khoiluong ."')</script>";
            }   

            if($p1->themdnh($kl1,$_POST["manlieu"],$_POST["khoiluongnl"],$maCuaHang,$manv)){
                echo "<script>alert('Tạo đơn nhập hàng thành công')</script>";

            }else{
                echo "<script>alert('Tạo đơn nhập hàng thất bại')</script>";
            }

            }
        
    

?>

<body>
        <div class="container qldnh">
            <h1 class="d-flex justify-content-center py-3 font-weight-bold">QUẢN LÝ ĐƠN NHẬP HÀNG</h1>
            <?php
            if($maCV==2){
                echo '<a href="index.php?page=quanly/quanlydonnhaphang/taodonnhaphang/taodonnhaphang2" class="d-flex justify-content-center">Nhập hàng </a>
            <a href="index.php?page=quanly/quanlydonnhaphang/taodonnhaphang" class="d-flex justify-content-center">Tạo đơn nhập hàng thủ công</a>';
            }else{
                echo "";
            }

            ?>
            

            <div class="date-picker d-flex justify-content-end">
                <!-- <input type="date" name="" id="" class="date-input"> -->
                <!-- <input type="text" value="12 / 10 / 2024" readonly> -->
                <!-- <i class="fas fa-calendar-alt"></i> -->
            </div>
            <form action="" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã Nhập Hàng</th>
                        <th>Ngày Nhập Hàng</th>
                        <th>Giá Nhập</th>
                        <th>Tên Người Nhập</th>
                        <th>Cửa Hàng</th>
                        <th>Tình Trạng</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once("controller/cDonNhapHang.php");
                   $p= new cdonnhaphang();
                   if ($maCV == "1") {  // Nếu là quản lý, lấy tất cả các bàn từ tất cả cửa hàng
                    $table=$p->getalldonnhaphang();
                    
                } else {  // Nếu là nhân viên, chỉ lấy bàn của cửa hàng mà nhân viên đó quản lý
                    $table=$p->getalldonnhaphangtheoch($maCuaHang);
                    
                }
                   if(!$table){
                    echo "Không tìm thấy dữ liệu";

                   } else{
                    while($row=$table->fetch_assoc()){
                        echo '<tr>';
                        echo '<td>'.$row['MaDonNhapHang'].'</td>';
                        $formatted_date = date("d-m-Y", strtotime($row['NgayNhapHang']));
                        echo '<td>' .$formatted_date.'</td>';
                        echo '<td>';
                        $gia = number_format($row['GiaNhap'], 0, ',', '.'); // Không có số thập phân
                            echo $gia . " VND";
                        echo '</td>';
                        echo '<td>'.$hoten.'</td>';
                        echo '<td>'.$row['MaCuaHang'].'</td>';
                        echo '<td>';
                        if($row['TinhTrang']==1){
                            echo 'Chưa nhập ';
                        }elseif($row['TinhTrang']==2){
                            echo 'Đã nhập';
                        }
                        // echo $row['TinhTrang'];
                        echo '</td>';
                        echo '<td><a href="index.php?page=quanly/quanlydonnhaphang/xemchitietdonnhaphang&madonnhaphang='.$row['MaDonNhapHang'].'">Xem Chi Tiết</a> <i class="fas fa-eye action-icon"></i></td>';
                        echo '</tr>';
                    }
 
                   }


?>
                   
                    
                </tbody>
            </table>
            </form>
                <div class="d-flex justify-content-center py-5">
                    
                </div>
        </div>
    </body>