<?php
    include_once("model/mDeXuat.php");
    class CDeXuat{
        public function getAllDX(){
            $p = new MDeXuat();
            $tblDX = $p->selectAllDX();
            if(!$tblDX){
                return -1;
            }else{
                if($tblDX->num_rows > 0){
                    return $tblDX;
                }else{
                    return 0; // không có dữ liệu trong bảng
                }
            }
        }

        // Lấy de xuat mon an theo mã
        public function getMaDX($id){
            $p = new MDeXuat();
            $tblDX = $p->SelectMaDX($id);
            if($tblDX){
                return $tblDX;
            }else{
                return null; // Không có DX với id đó
            }
        }

        public function getDanhSachDeXuat($statusFilter = null) {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
        
            if ($con) {
                // Câu truy vấn chính
                $sql = "SELECT d.MaDeXuat, d.TenMonAn, n.HoTen AS NguoiDeXuat, d.TrangThai 
                        FROM monandexuat AS d
                        INNER JOIN nhanvien AS n ON d.MaNV = n.MaNV";
        
                // Thêm điều kiện WHERE nếu có trạng thái lọc
                if ($statusFilter !== null) {
                    $sql .= " WHERE d.TrangThai = " . intval($statusFilter);
                }
        
                // $sql .= " ORDER BY d.MaDeXuat DESC";
        
                $result = $con->query($sql);
                $p->dongKetNoi($con);
        
                return $result;
            } else {
                return false;
            }
        }
        
        public function getAllTinhTrang() {
            $p = new MDeXuat();
            $tblSP = $p->SelectAllTinhTrang();
            
            if (!$tblSP) {
                return -1; 
            } else {
                if ($tblSP->num_rows > 0) {
                    return $tblSP; 
                } else { 
                    return 0; 
                }
            }
        }

        public function getChiTietDX($chitiet) {
            $p = new MDeXuat(); 
            $tblDX = $p->SelectChiTietDX($chitiet); 
            if ($tblDX) {
                if ($tblDX->num_rows > 0) {
                    return $tblDX; 
                } else {
                    return -1; // Không có dữ liệu
                }
            } else {
                return false; // Lỗi kết nối hoặc truy vấn
            }
        }
    
        public function updateTrangThai($id, $trangThai) {
            $mDeXuat = new MDeXuat(); // Khởi tạo đối tượng MDeXuat
            $result = $mDeXuat->updateTrangThai($id, $trangThai); // Gọi phương thức updateTrangThai từ lớp MDeXuat
    
            // Kiểm tra kết quả trả về
            if ($result) {
                return true; // Thành công
            } else {
                return false; // Thất bại
            }
        }

    }
?>

