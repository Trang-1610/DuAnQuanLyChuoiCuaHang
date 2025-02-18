
<?php
    include_once("controller/cNguyenLieu.php");
$p=new cnguyenlieu();
$nguoiDung = $_SESSION["dangnhap"];  // Lấy thông tin người dùng từ session
 $maCuaHang = $nguoiDung['MaCuaHang']; // Lấy mã cửa hàng của nhân viên
$maCV = $nguoiDung["MaChucVu"];

if ($maCV == "1") {  // Nếu là quản lý, lấy tất cả các bàn từ tất cả cửa hàng
    if(isset($_GET["loainguyenlieu"])){
        $table= $p->getallnguyenlieubytype($_GET["loainguyenlieu"]);
        }
    elseif(isset($_POST["search"])){
        $table= $p->getallnguyenlieubyname($_REQUEST["txtsearch"]);
        
        }
        
        elseif(isset($_POST["reset"])){
            $table=$p->resetnguyenlieutuoi();
    $table= $p->getallnguyenlieujoinloainguyenlieu();
    
        }elseif(isset($_GET["cuahang"])){
            $table=$p->getallnguyenlieubych($_GET["cuahang"]);
    
        }
        else{
    $table= $p->getallnguyenlieujoinloainguyenlieu();
        }
} else {  // Nếu là nhân viên, chỉ lấy bàn của cửa hàng mà nhân viên đó quản lý
    if(isset($_GET["loainguyenlieu"])){
        $table= $p->getallnguyenlieubytypetheoch($_GET["loainguyenlieu"],$maCuaHang);
        }
    elseif(isset($_POST["search"])){
        $table= $p->getallnguyenlieubynametheoch($_REQUEST["txtsearch"],$maCuaHang);
        
        }
        
        elseif(isset($_POST["reset"])){
            $table=$p->resetnguyenlieutuoitheoch($maCuaHang);
    $table= $p->getallnguyenlieujoinloainguyenlieutheoch($maCuaHang);
    
        }
        else{
    $table= $p->getallnguyenlieujoinloainguyenlieutheoch($maCuaHang);
        }
}

// include_once ("view/quanlynguyenlieu/xuly.php");
// if(isset($_GET["loainguyenlieu"])){
//     $table= $p->getallnguyenlieubytype($_GET["loainguyenlieu"]);
//     }
// elseif(isset($_POST["search"])){
//     $table= $p->getallnguyenlieubyname($_REQUEST["txtsearch"]);
    
//     }
    
//     elseif(isset($_POST["reset"])){
//         $table=$p->resetnguyenlieutuoi();
// $table= $p->getallnguyenlieujoinloainguyenlieu();

//     }
//     else{
// $table= $p->getallnguyenlieujoinloainguyenlieu();
//     }

if(!$table){

echo '<body>
        <div class=" qlnl ">

            <h1 class="d-flex justify-content-center py-3 font-weight-bold">QUẢN LÝ NGUYÊN LIỆU </h1>
            <a href="index.php?page=quanly/quanlynguyenlieu/themnguyenlieu" class="d-flex justify-content-center ">Thêm nguyên liệu</a>
            <a href="index.php?page=quanly/quanlynguyenlieu/quanlyloainguyenlieu" class="d-flex justify-content-center ">Quản lý loại nguyên liệu</a>

            <div class="qlnl-header justify-content-end py-3 container">
                <div class="qlnl-search">
                    <form action="" method="post" class="d-flex justify-content-end">
                    <input placeholder="Tìm kiếm theo tên..." type="text" name="txtsearch"> 
                    <input class="btn btn-primary" type="submit" value="Tìm kiếm" name="search">
                    </form>
                </div>';

              
                include_once("controller/cLoaiNguyenLieu.php");
                $p1=new cloainguyenlieu();
                $table1= $p1->getallloainguyenlieu();
                if(!$table1){
                echo "khong co data";
                }else{
                    
                    
                    echo'
                    <div class="dropdown1">
  <button class="dropbtn1">Tất cả loại nguyên liệu</button>
  <div class="dropdown-content1"><ul>';
  echo "<li class='dropdown-item2'><a class='dropdown-item1' href='index.php?page=quanly/quanlynguyenlieu'>Tất cả loại nguyên liệu</a></li>";
                    
                    while($r1=$table1->fetch_assoc()){
      
                            echo "<li class='dropdown-item2'><a class='dropdown-item1' href='index.php?page=quanly/quanlynguyenlieu&loainguyenlieu=" . $r1["MaLoaiNguyenLieu"] . "&#ci'>" . $r1["TenLoaiNguyenLieu"] . "</a></li>";

                            
                        }
                    
                        echo "  </ul></div>
    </div>";


                    
                        



                }
              if($maCV==2)  {
           
             echo '  <button class="qlnl-uocluong ">
                    <a href="index.php?page=quanly/quanlynguyenlieu/uocluongnguyenlieu">Ước lượng nguyên liệu</a>
                </button>
                <button class="qlnl-uocluong btn btn-danger">
                    <a href="index.php?page=quanly/quanlynguyenlieu/uocluongnguyenlieu">Ước lượng nguyên liệu</a>
                    Reset Nguyên Liệu
                </button>
            </div>
            <table class="table container" >
                ';
                echo "<p class='container'>Không có dữ liệu</p>";
                echo "</div>";}else{echo "<p class=''>Không có dữ liệu</p>";}

                
}else{
    echo '<body>
        <div class="container qlnl ">
            <h1 class="d-flex justify-content-center py-3 font-weight-bold">QUẢN LÝ NGUYÊN LIỆU</h1>';
            
            if ($maCV == "1") {  
                echo '<a href="index.php?page=quanly/quanlynguyenlieu/themnguyenlieu" class="d-flex justify-content-center ">Thêm nguyên liệu</a>';
            echo '<a href="index.php?page=quanly/quanlynguyenlieu/quanlyloainguyenlieu" class="d-flex justify-content-center ">Quản lý loại nguyên liệu</a>';

                    }
            elseif($maCV != "2") {  // Nếu là nhân viên, chỉ lấy bàn của cửa hàng mà nhân viên đó quản lý
            //    echo "<td> </td>";
            }
            echo '<div class="qlnl-header justify-content-end py-3">
                <div class="qlnl-search">
                    <form action="" method="post" class="d-flex justify-content-end">
                    <input placeholder="Tìm kiếm theo tên..." type="text" name="txtsearch"> 
                    <input class="btn btn-primary" type="submit" value="Tìm kiếm" name="search">
                    </form>
                </div>';

              
                include_once("controller/cLoaiNguyenLieu.php");
                $p1=new cloainguyenlieu();
                $table1= $p1->getallloainguyenlieu();
                if(!$table1){
                echo "khong co du lieu";
                }else{
                    
                    
                    echo'
                    <div class="dropdown1">
  <button class="dropbtn1">Tất cả loại nguyên liệu</button>
  <div class="dropdown-content1"><ul>';
  echo "<li class='dropdown-item2'><a class='dropdown-item1' href='index.php?page=quanly/quanlynguyenlieu'>Tất cả loại nguyên liệu</a></li>";
                    
                    while($r1=$table1->fetch_assoc()){
      
                            echo "<li class='dropdown-item2'><a class='dropdown-item1' href='index.php?page=quanly/quanlynguyenlieu&loainguyenlieu=" . $r1["MaLoaiNguyenLieu"] . "&#ci'>" . $r1["TenLoaiNguyenLieu"] . "</a></li>";

                            
                        }
                    
                        echo "  </ul></div>
    </div>";


                    
                        



                }
                
                if ($maCV == "1") {  
                    include_once("controller/cCuaHang.php");
                $p5=new ccuahang();
                $table5= $p5->getAllCuaHang();
                if(!$table5){
                echo "khong co data";
                }else{
                    
                    
                    echo'
                    <div class="dropdown1">
  <button class="dropbtn1">Tất cả cửa hàng</button>
  <div class="dropdown-content1"><ul>';
  echo "<li class='dropdown-item2'><a class='dropdown-item1' href='index.php?page=quanly/quanlynguyenlieu'>Tất cả cửa hàng</a></li>";
                    
                    while($r5=$table5->fetch_assoc()){
      
                            echo "<li class='dropdown-item2'><a class='dropdown-item1' href='index.php?page=quanly/quanlynguyenlieu&cuahang=" . $r5["MaCuaHang"] . "&#ci'>" . $r5["TenCuaHang"] . "</a></li>";

                            
                        }
                    
                        echo "  </ul></div>
    </div>";

                        }
                    echo '</div>
            <table class="table">
                <thead>';
                
                }
                elseif($maCV == "2") {  // Nếu là nhân viên, chỉ lấy bàn của cửa hàng mà nhân viên đó quản lý
                //    echo "<td> </td>";
                echo '  <button class="qlnl-uocluong">
                    <a href="index.php?page=quanly/quanlynguyenlieu/uocluongnguyenlieu">Ước lượng nguyên liệu</a>
                </button>
               
               
                
            </div>
            <table class="table">
                <thead>';
                }
             
    echo '<form action="" class="container" method="post">
    <table class ="table" style = "width: 100%;">';
    echo "<thead>
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
                            Đơn Vị Tính
                        </th>
                        <th>
                            Số Lượng
                        </th>
                        <th>
                            Hình Ảnh
                        </th>
                        <th>
                            Tên Cửa Hàng
                        </th>
                        <th>
                            Tình Trạng
                        </th>";
                        if ($maCV == "1") {  
                            echo '<th>
                            Thao Tác
                        </th>';
                                }
                        elseif($maCV == "2") {  // Nếu là nhân viên, chỉ lấy bàn của cửa hàng mà nhân viên đó quản lý
                        //    echo "<td> </td>";
                        }
                        
      echo "                  
                    </tr>
                </thead>";



    while($r=$table->fetch_assoc()){
        echo "<tr>";
        echo'<td>'.$r["MaNguyenLieu"].'</td>';
        echo'<td>'.$r["TenNguyenLieu"].'</td>';
        echo'<td>'.$r["TenLoaiNguyenLieu"].'</td>';
        echo'<td>'.$r["TenDonViTinh"].'</td>';
        echo'<td>'.$r["SoLuong"].'</td>';
        echo '<td><img style="width: 50px;height=50" src="img/nguyenlieu/'.$r["HinhAnh"].'" alt=""></td>';
        
        echo'<td>'.$r["TenCuaHang"].'</td>';
        echo'<td>';
        if($r["SoLuong"]>10){
            echo '<p style="color:green">Còn hàng</p>';
        }elseif($r["SoLuong"]<=10){
            echo '<p style="color:red">Sắp hết hàng</p>';
        }
        echo '</td>';
        if ($maCV == "1") {  
            echo'<td> <a class="btn" href="index.php?page=quanly/quanlynguyenlieu/suanguyenlieu&idnl='. $r["MaNguyenLieu"] .'&idch='. $r["MaCuaHang"] .'"><i class="fas fa-edit edit-icon" style="color:blue"></i> </a></td>';
            
                }
        elseif($maCV == "2") {  // Nếu là nhân viên, chỉ lấy bàn của cửa hàng mà nhân viên đó quản lý
        //    echo "<td> </td>";
        }


        echo "</tr>";
    }




    echo "    </table>";
    echo ' <button name = "reset" class="qlnl-uocluong btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn reset nguyên liệu tươi không!\')">
                    Reset Nguyên Liệu
                </button>
    
    </form>';
}
echo '<hr class="my-4"></div>';

?>



