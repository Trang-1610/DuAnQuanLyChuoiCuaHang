<?php
include_once("ketnoi.php");
class mnguyenlieu{
    //lấy tất cả nguyen lieu
    public function selectallnguyenlieu(){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select * from nguyenlieu";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    //lấy tất cả nguyên liệu join bảng loại 
    public function selectallnguyenlieujoinloainguyenlieu(){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select s.MaNguyenLieu,s.TenNguyenLieu,t.TenLoaiNguyenLieu,d.TenDonViTinh,slt.SoLuong,s.HinhAnh,c.TenCuaHang,c.MaCuaHang,s.TinhTrang from nguyenlieu s inner join loainguyenlieu t on s.MaLoaiNguyenLieu = t.MaLoaiNguyenLieu inner join soluongton slt on s.MaNguyenLieu=slt.MaNguyenLieu inner join cuahang c on c.MaCuaHang=slt.MaCuaHang inner join DonViTinh d on d.MaDonViTinh=s.MaDonViTinh ORDER BY s.MaNguyenLieu";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    public function selectallnguyenlieujoinloainguyenlieutheoch($mach){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select s.MaNguyenLieu,s.TenNguyenLieu,s.GiaMua,t.TenLoaiNguyenLieu,d.TenDonViTinh,slt.SoLuong,s.HinhAnh,c.TenCuaHang,c.MaCuaHang,s.TinhTrang from nguyenlieu s inner join loainguyenlieu t on s.MaLoaiNguyenLieu = t.MaLoaiNguyenLieu inner join soluongton slt on s.MaNguyenLieu=slt.MaNguyenLieu inner join cuahang c on c.MaCuaHang=slt.MaCuaHang inner join DonViTinh d on d.MaDonViTinh=s.MaDonViTinh where c.MaCuaHang = $mach ORDER BY s.MaNguyenLieu";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    //lấy nguyên liệu theo loại
    public function selectallnguyenlieubytype($th){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select s.MaNguyenLieu,s.TenNguyenLieu,t.TenLoaiNguyenLieu,d.TenDonViTinh,slt.SoLuong,s.HinhAnh,c.TenCuaHang,c.MaCuaHang,s.TinhTrang from nguyenlieu s inner join loainguyenlieu t on s.MaLoaiNguyenLieu = t.MaLoaiNguyenLieu inner join soluongton slt on s.MaNguyenLieu=slt.MaNguyenLieu inner join cuahang c on c.MaCuaHang=slt.MaCuaHang inner join donvitinh d on d.MaDonViTinh=s.MaDonViTinh where s.MaLoaiNguyenLieu = " .$th;
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    public function selectallnguyenlieubych($th){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select s.MaNguyenLieu,s.TenNguyenLieu,t.TenLoaiNguyenLieu,d.TenDonViTinh,slt.SoLuong,s.HinhAnh,c.TenCuaHang,c.MaCuaHang,s.TinhTrang from nguyenlieu s inner join loainguyenlieu t on s.MaLoaiNguyenLieu = t.MaLoaiNguyenLieu inner join soluongton slt on s.MaNguyenLieu=slt.MaNguyenLieu inner join cuahang c on c.MaCuaHang=slt.MaCuaHang inner join donvitinh d on d.MaDonViTinh=s.MaDonViTinh where c.MaCuaHang = " .$th;
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    //lấy nguyên liệu theo tên
    public function selectallnguyenlieubyname($name){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select s.MaNguyenLieu,s.TenNguyenLieu,t.TenLoaiNguyenLieu,d.TenDonViTinh,slt.SoLuong,s.HinhAnh,c.TenCuaHang,c.MaCuaHang,s.TinhTrang from nguyenlieu s inner join loainguyenlieu t on s.MaLoaiNguyenLieu = t.MaLoaiNguyenLieu inner join soluongton slt on s.MaNguyenLieu=slt.MaNguyenLieu inner join cuahang c on c.MaCuaHang=slt.MaCuaHang inner join donvitinh d on d.MaDonViTinh=s.MaDonViTinh where s.TenNguyenLieu like N'%".$name."%'";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    public function selectallnguyenlieubytypetheoch($th,$ch){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select s.MaNguyenLieu,s.TenNguyenLieu,t.TenLoaiNguyenLieu,d.TenDonViTinh,slt.SoLuong,s.HinhAnh,c.TenCuaHang,c.MaCuaHang,s.TinhTrang from nguyenlieu s inner join loainguyenlieu t on s.MaLoaiNguyenLieu = t.MaLoaiNguyenLieu inner join soluongton slt on s.MaNguyenLieu=slt.MaNguyenLieu inner join cuahang c on c.MaCuaHang=slt.MaCuaHang inner join donvitinh d on d.MaDonViTinh=s.MaDonViTinh where s.MaLoaiNguyenLieu = $th and c.MaCuaHang=$ch";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    //lấy nguyên liệu theo tên
    public function selectallnguyenlieubynametheoch($name,$ch){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select s.MaNguyenLieu,s.TenNguyenLieu,t.TenLoaiNguyenLieu,d.TenDonViTinh,slt.SoLuong,s.HinhAnh,c.TenCuaHang,c.MaCuaHang,s.TinhTrang from nguyenlieu s inner join loainguyenlieu t on s.MaLoaiNguyenLieu = t.MaLoaiNguyenLieu inner join soluongton slt on s.MaNguyenLieu=slt.MaNguyenLieu inner join cuahang c on c.MaCuaHang=slt.MaCuaHang inner join donvitinh d on d.MaDonViTinh=s.MaDonViTinh where s.TenNguyenLieu like N'%".$name."%' and c.MaCuaHang=$ch";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
//lấy 1 nguyên liệu
    public function select1nguyenlieu($masp,$mach){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select s.MaNguyenLieu,s.TenNguyenLieu,s.GiaMua,s.MaLoaiNguyenLieu,s.MaDonViTinh,t.TenLoaiNguyenLieu,slt.SoLuong,s.HinhAnh,c.TenCuaHang,c.MaCuaHang,s.TinhTrang from nguyenlieu s inner join loainguyenlieu t on s.MaLoaiNguyenLieu = t.MaLoaiNguyenLieu inner join soluongton slt on s.MaNguyenLieu=slt.MaNguyenLieu inner join cuahang c on c.MaCuaHang=slt.MaCuaHang where s.MaNguyenLieu = $masp and slt.MaCuaHang =$mach" ;
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }
    public function select1nguyenlieuql($masp){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        $str="select s.MaNguyenLieu,s.TenNguyenLieu,t.TenLoaiNguyenLieu,d.TenDonViTinh,slt.SoLuong,s.HinhAnh,c.TenCuaHang,c.MaCuaHang,s.TinhTrang from nguyenlieu s inner join loainguyenlieu t on s.MaLoaiNguyenLieu = t.MaLoaiNguyenLieu inner join soluongton slt on s.MaNguyenLieu=slt.MaNguyenLieu inner join cuahang c on c.MaCuaHang=slt.MaCuaHang where s.MaNguyenLieu = $masp " ;
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }

//xóa nguyên liệu
    public function deletenguyenlieu($idsp) {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if($conn) {
            $str = "delete from nguyenlieu where MaNguyenLieu   = '$idsp'";
            $result = $conn->query($str);
            $p->dongKetNoi($conn);
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        }
    }
//thêm nguyên liệu
    public function insertnguyenlieu($TenNguyenLieu, $HinhAnh, $GiaMua, $MaLoaiNguyenLieu, $MaDonViTinh)
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if ($conn) {
            $str = "insert into nguyenlieu(TenNguyenLieu, HinhAnh, GiaMua, MaLoaiNguyenLieu, MaDonViTinh) values ('$TenNguyenLieu', '$HinhAnh', '$GiaMua', '$MaLoaiNguyenLieu', '$MaDonViTinh')";
            $result = $conn->query($str);
            if ($result) {
                return $conn->insert_id;
            } else {
                return 0;
            }
        } else {
            return false;
        }
    }
    public function insertnl($manl)
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if ($conn) {
            for($i=1;$i<=5;$i++){
            $str = "insert into soluongton(MaNguyenLieu, MaCuaHang, SoLuong) values ($manl, $i, 0)";
            $result = $conn->query($str);}
            $p->dongKetNoi($conn);
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return false;
        }
    }
//sửa nguyên liệu
    public function updatenguyenlieuha($MaNguyenLieu,$TenNguyenLieu, $HinhAnh, $GiaMua, $MaLoaiNguyenLieu, $MaDonViTinh, $SoLuong)
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if ($conn) {
            $str = "update nguyenlieu set TenNguyenLieu = '$TenNguyenLieu', HinhAnh= '$HinhAnh', GiaMua = '$GiaMua', MaLoaiNguyenLieu = '$MaLoaiNguyenLieu', MaDonViTinh = '$MaDonViTinh', SoLuong = '$SoLuong' where MaNguyenLieu = '$MaNguyenLieu'";
            $result = $conn->query($str);
            $p->dongKetNoi($conn);
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return false;
        }
    }
    public function updatenguyenlieu($MaNguyenLieu,$TenNguyenLieu, $GiaMua, $MaLoaiNguyenLieu, $MaDonViTinh)
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if ($conn) {
            $str = "update nguyenlieu set TenNguyenLieu = '$TenNguyenLieu',  GiaMua = '$GiaMua', MaLoaiNguyenLieu = '$MaLoaiNguyenLieu', MaDonViTinh = '$MaDonViTinh' where MaNguyenLieu = '$MaNguyenLieu'";
            $result = $conn->query($str);
            $p->dongKetNoi($conn);
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return false;
        }
    }
   
    public function uocluongnguyenlieu($soluong){
        $p= new clsKetNoi();
        $conn=$p->moKetNoi();
        // $str = "SELECT s.MaNguyenLieu, n.HinhAnh, n.TenNguyenLieu, t.TenLoaiNguyenLieu,n.HinhAnh,d.TenDonViTinh ,SUM(s.KhoiLuong * $soluong) AS TongKhoiLuong FROM soluongnguyenlieu s inner join nguyenlieu n on s.MaNguyenLieu = n.MaNguyenLieu inner join loainguyenlieu t on n.MaLoaiNguyenLieu = t.MaLoaiNguyenLieu inner join donvitinh d on n.madonvitinh = d.madonvitinh  where s.MaMonAn = $mamonan GROUP BY MaNguyenLieu";
        $count=0;
        $sql_parts = [];
        foreach ($soluong as $mamonan => $soluongmon) {
            $mamonan+=1;
            $sql_parts[] = "WHEN s.MaMonAn = $mamonan THEN $soluongmon";
            $count++;  // Tăng biến đếm mỗi lần duyệt qua
        }
        $sql_case = implode(' ', $sql_parts);
        $str = "SELECT s.MaNguyenLieu,n.GiaMua, n.HinhAnh, n.TenNguyenLieu, t.TenLoaiNguyenLieu,n.HinhAnh,d.TenDonViTinh,s.KhoiLuong * CASE $sql_case ELSE 0 END AS TongKhoiLuong FROM soluongnguyenlieu s inner join nguyenlieu n on s.MaNguyenLieu = n.MaNguyenLieu inner join loainguyenlieu t on n.MaLoaiNguyenLieu = t.MaLoaiNguyenLieu inner join donvitinh d on n.madonvitinh = d.madonvitinh inner join soluongnguyenlieu m on m.MaNguyenLieu=n.MaNguyenLieu GROUP BY s.MaNguyenLieu HAVING TongKhoiLuong != 0";
        $ketqua = mysqli_query($conn,$str);
        $p->dongKetNoi($conn);
        return $ketqua;
    }

    public function resetnguyenlieu()
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if ($conn) {
            $str = "update nguyenlieu s inner join soluongton slt on slt.MaNguyenLieu=s.MaNguyenLieu set slt.SoLuong = 0 where s.NguyenLieuTuoi=1";
            $result = $conn->query($str);
            $p->dongKetNoi($conn);
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return false;
        }
    }
    public function resetnguyenlieutheoch($ch)
    {
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();
        if ($conn) {
            $str = "update nguyenlieu s inner join soluongton slt on slt.MaNguyenLieu=s.MaNguyenLieu set slt.SoLuong = 0 where s.NguyenLieuTuoi=1 and slt.MaCuaHang = $ch ";
            $result = $conn->query($str);
            $p->dongKetNoi($conn);
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return false;
        }
    }


//trang
 
public function them($sql) {
    $p = new clsKetNoi();
    $con = $p->moKetNoi();
    
    if ($con) {
        if ($con->query($sql) === TRUE) {
            // Đóng kết nối sau khi thực hiện truy vấn thành công
            $p->dongKetNoi($con);
            return true;
        } else {
            // Đóng kết nối sau khi truy vấn không thành công
            $p->dongKetNoi($con);
            return false;
        }
    } else {
        return false;
    }
}
public function sua($sql) {
    $p = new clsKetNoi();
    $con = $p->moKetNoi();
    
    if ($con) {
        if ($con->query($sql) === TRUE) {
            // Đóng kết nối sau khi thực hiện truy vấn thành công
            $p->dongKetNoi($con);
            return true;
        } else {
            // Đóng kết nối sau khi truy vấn không thành công
            $p->dongKetNoi($con);
            return false;
        }
    } else {
        return false;
    }
}




}


?>