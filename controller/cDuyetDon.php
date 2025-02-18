<?php
    include_once("model/mDuyetDon.php");
    class cDuyetDon{
        public function getAllDon(){
            $p = new mDuyetDon();
            $tblDD = $p->selectAllDon();
            if(!$tblDD){
                return -1;
            }else{
                if($tblDD->num_rows > 0){
                    return $tblDD;
                }else{
                    return 0; // không có dữ liệu trong bảng
                }
            }
        }

        // Lấy de xuat mon an theo mã
        public function getMaDon($id){
            $p = new MDeXuat();
            $tblDD = $p->SelectMaDon($id);
            if($tblDD){
                return $tblDD;
            }else{
                return null; // Không có DX với id đó
            }
        }

        public function getDanhSachDon() {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
        
            if ($con) {
                // Truy vấn để lấy danh sách món ăn đề xuất và thông tin người đề xuất
                $sql = "SELECT * FROM donhang d 
                        JOIN nhanvien n ON n.MANV = d.MaNhanVien 
                        JOIN pttt p ON d.PhuongThucThanhToan = p.MaPhuongThuc 
                        JOIN chitiethoadon c ON c.Madon = d.Madon
                        join monan m on d.Mamonan = m.MaMonAn
                        ORDER BY d.Madon ASC";
                $result = $con->query($sql);
                $p->dongKetNoi($con);
        
                return $result;
            } else {
                return false;
            }
        }
        public function getChiTietDon($chitiet) {
            $p = new mDuyetDon(); 
            $tblDD = $p->SelectChiTietDon($chitiet); 
            if ($tblDD) {
                if ($tblDD->num_rows > 0) {
                    return $tblDD; 
                } else {
                    return -1; // Không có dữ liệu
                }
            } else {
                return false; // Lỗi kết nối hoặc truy vấn
            }
        }
        
        public function getChiTietDonmonan($chitiet) {
            $p = new mDuyetDon(); 
            $tblDD = $p->SelectChiTietDonmonan($chitiet); 
            if ($tblDD) {
                if ($tblDD->num_rows > 0) {
                    return $tblDD; 
                } else {
                    return -1; // Không có dữ liệu
                }
            } else {
                return false; // Lỗi kết nối hoặc truy vấn
            }
        }
        public function updateTrangThai($id, $trangthai) {
            $mDuyetDon = new mDuyetDon(); // Khởi tạo đối tượng MDeXuat
            $result = $mDuyetDon->updateTrangThai($id, $trangthai); 
    
            // Kiểm tra kết quả trả về
            if ($result) {
                return true; // Thành công
            } else {
                return false; // Thất bại
            }
        }
        public function getAllDonWithLimit($offset, $limit) {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();  // Open connection
            
            if ($con) {
                $sql = "SELECT * FROM donhang LIMIT $offset, $limit";
                $result = $con->query($sql);
                $p->dongKetNoi($con);  // Close connection
                
                return $result;
            } else {
                return false; // Error opening connection
            }
        }
    
        // Function to get total row count for pagination
        public function getRowCount() {
            $p = new clsKetNoi();
            $con = $p->moKetNoi();  // Open connection
            
            if ($con) {
                $sql = "SELECT COUNT(*) AS total FROM donhang";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                $p->dongKetNoi($con);  // Close connection
                
                return $row['total'];
            } else {
                return false; // Error opening connection
            }
        }
    }
?>

