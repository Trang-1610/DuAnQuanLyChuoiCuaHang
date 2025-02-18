<style>
    .ql-card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}
</style>

<?php
if (!isset($_SESSION["dangnhap"])) {
    header("Location: index.php?page=dangnhap");
    exit();
}
$nguoiDung = $_SESSION["dangnhap"];
//Chủ cửa hàng
if($nguoiDung['MaChucVu'] == '1'){
    echo '
    <body>
        <div class="ql">
            <div class="container ql-container row ">                
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlymonan">
                        <img alt="" height="150" style=" object-fit: cover;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1lpKNQu2qN9rN9pTb27-U_DfvUijBjcIde9yBFe-xCRUkDAhAnBoVOqqcpRQsq5QMkPQ&usqp=CAU" width="150"/>
                        <p>
                        QUẢN LÝ MÓN ĂN
                        </p>
                    </a>
                </div>

                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlynguyenlieu">
                        <img alt="" height="150" src="https://img.freepik.com/premium-vector/vegetables-fruits-set_1348530-844.jpg" width="150"/>

                        <p>
                        QUẢN LÝ NGUYÊN LIỆU
                        </p>
                    </a>
                </div>

                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlydonnhaphang">
                        <img alt="" height="150" src="https://img.freepik.com/free-vector/online-order-delivery-service-shipment-internet-shop-basket-cardboard-boxes-buyer-with-laptop-delivery-note-monitor-screen-parcel-vector-isolated-concept-metaphor-illustration_335657-2838.jpg" width="150"/>

                        <p>
                        QUẢN LÝ ĐƠN NHẬP HÀNG   
                        </p>
                    </a>
                </div>
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/dexuatmonan">
                        <img alt="" height="150" src="https://img.freepik.com/vetores-premium/pizza-de-frango-frito-e-bebida-fria-menu-de-fast-food-conjunto-de-ilustracoes-estilo-de-desenho-animado-plano_429765-564.jpg" width="150"/>
                        <p>
                            ĐỀ XUẤT MÓN ĂN
                        </p>
                    </a>
                </div>
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlyduyetdexuatmonan">
                        <img alt="" height="150" src="https://img.freepik.com/vetores-premium/pizza-de-fast-food-e-icone-de-refrigerante-isolado_24911-109365.jpg?w=360" width="150"/>
                        <p>
                        QUẢN LÝ ĐỀ XUẤT MÓN ĂN
                        </p>
                    </a>
                </div>
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlynhanvien">
                        <img alt="" height="150" src="https://img.freepik.com/free-vector/waiters-concept-illustration_114360-2782.jpg?semt=ais_hybrid" width="150"/>
                        <p>
                        QUẢN LÝ NHÂN VIÊN
                        </p>
                    </a>
                </div>
                
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlycuahang">
                        <img alt="" height="150" src="https://thumbs.dreamstime.com/b/frente-de-la-tienda-del-caf%C3%A9-74168959.jpg" width="150"/>
                        <p>
                        QUẢN LÝ CỬA HÀNG
                        </p>
                    </a>
                </div>
                 <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlydatban">
                        <img alt="" height="150" src="https://cdn.vectorstock.com/i/500p/45/79/cafe-table-isolated-flat-vector-51744579.jpg" width="150"/>
                        <p>
                        QUẢN LÝ BÀN
                        </p>
                    
                    </a>
                </div>
               
                
                 <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlydoanhthu">
                        <img alt="" height="150" style=" object-fit: cover;" src="https://storage.googleapis.com/a1aa/image/nmh4gTPBc8K4M9BggVrdtDPlyw3aleeYfIdRCDSx74fANtqOB.jpg " width="150"/>
                        <p>
                        QUẢN LÝ DOANH THU
                        </p>
                    </a>
                </div>
                  
                
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/tatcalichlamviec">   
                        <img alt="" height="150" src="https://cdn-icons-png.flaticon.com/512/1067/1067374.png" width="150"/>
                        <p>
                        TẤT CẢ LỊCH LÀM VIỆC
                        </p>
                    </a>
                </div>
             </div>  
        </div>
    </body>
    ';
}//Quản lý
elseif($nguoiDung['MaChucVu'] == '2'){
    echo '
    <body>
        <div class="ql">
            <div class="container ql-container row ">
                
                
                
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlydoanhthu">
                        <img alt="" height="150" style=" object-fit: cover;" src="https://storage.googleapis.com/a1aa/image/nmh4gTPBc8K4M9BggVrdtDPlyw3aleeYfIdRCDSx74fANtqOB.jpg " width="150"/>
                        <p>
                        QUẢN LÝ DOANH THU
                        </p>
                    </a>
                </div>
                
               
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/dexuatmonan">
                        <img alt="" height="150" src="https://img.freepik.com/vetores-premium/pizza-de-frango-frito-e-bebida-fria-menu-de-fast-food-conjunto-de-ilustracoes-estilo-de-desenho-animado-plano_429765-564.jpg" width="150"/>
                        <p>
                            ĐỀ XUẤT MÓN ĂN
                        </p>
                    </a>
                </div>
               
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlycuahang">
                        <img alt="" height="150" src="https://thumbs.dreamstime.com/b/frente-de-la-tienda-del-caf%C3%A9-74168959.jpg" width="150"/>
                        <p>
                        QUẢN LÝ CỬA HÀNG
                        </p>
                    </a>
                </div>
                
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlydonhang">
                        <img alt="" height="150" src="https://cdn.iconscout.com/icon/free/png-256/free-confirm-order-icon-download-in-svg-png-gif-file-formats--approve-placed-final-food-services-pack-icons-1569294.png" width="150"/>
                        <p>
                        QUẢN LÝ ĐƠN HÀNG
                        </p>
                    </a>
                </div>
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlydonnhaphang">
                        <img alt="" height="150" src="https://img.freepik.com/free-vector/online-order-delivery-service-shipment-internet-shop-basket-cardboard-boxes-buyer-with-laptop-delivery-note-monitor-screen-parcel-vector-isolated-concept-metaphor-illustration_335657-2838.jpg" width="150"/>
                        <p>
                        QUẢN LÝ ĐƠN NHẬP HÀNG
                        </p>
                    </a>
                
                </div>
               
                
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/lichlamviec">
                        <img alt="" height="150" src="https://cdn-icons-png.flaticon.com/512/1067/1067374.png" width="150"/>
                        <p>
                        LỊCH LÀM VIỆC
                        </p>
                    </a>
                </div>
                
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlynguyenlieu">
                        <img alt="" height="150" src="https://img.freepik.com/premium-vector/vegetables-fruits-set_1348530-844.jpg" width="150"/>
                        <p>
                        QUẢN LÝ NGUYÊN LIỆU
                        </p>
                    </a>
                </div>
                
                </div>
            </div>
    </body>
    ';
}//Nhân viên
elseif($nguoiDung['MaChucVu'] == '3'){
    echo '
    <body>
        <div class="ql">
            <div class="container ql-container row ">
                
                
                
              
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/dexuatmonan">
                        <img alt="" height="150" src="https://img.freepik.com/vetores-premium/pizza-de-frango-frito-e-bebida-fria-menu-de-fast-food-conjunto-de-ilustracoes-estilo-de-desenho-animado-plano_429765-564.jpg" width="150"/>
                        <p>
                            ĐỀ XUẤT MÓN ĂN
                        </p>
                    </a>
                </div>
                
     
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/taodondathang">
                        <img alt="" height="150" src="https://png.pngtree.com/png-clipart/20200225/original/pngtree-clear-sheet-illustration-vector-on-white-background-png-image_5295786.jpg" width="150"/>
                        <p>
                        TẠO ĐƠN ĐẶT HÀNG
                        </p>
                    </a>
                
                </div>  
                
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/xemlich">
                        <img alt="" height="150" src="https://cdn-icons-png.flaticon.com/512/1067/1067374.png" width="150"/>
                        <p>
                        XEM LỊCH LÀM VIỆC
                        </p>
                    </a>
                </div>
                
              
                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlydatban">
                        <img alt="" height="150" src="https://cdn.vectorstock.com/i/500p/45/79/cafe-table-isolated-flat-vector-51744579.jpg" width="150"/>
                        <p>
                        QUẢN LÝ BÀN
                        </p>
                        </a>
                </div>
                <div class="ql-card col-3">
                    <a href="index.php?page=giohang/thanhtoan/hoadon">
                        <img alt="" height="150" src="https://img.freepik.com/vetores-premium/pizza-de-frango-frito-e-bebida-fria-menu-de-fast-food-conjunto-de-ilustracoes-estilo-de-desenho-animado-plano_429765-564.jpg" width="150"/>
                        <p>
                            ĐƠN HÀNG
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </body>
    ';
}
elseif($nguoiDung['MaChucVu'] == '4'){
    echo '
    <body>
        <div class="ql">
            <div class="container ql-container row ">
                
                
                
              <div class="ql-card col-3">
                    <a href="index.php?page=quanly/xemlich">
                        <img alt="" height="150" src="https://cdn-icons-png.flaticon.com/512/1067/1067374.png" width="150"/>
                        <p>
                        XEM LỊCH LÀM VIỆC
                        </p>
                    </a>
                </div>

                <div class="ql-card col-3">
                    <a href="index.php?page=quanly/quanlydonhang">
                        <img alt="" height="150" src="https://cdn.iconscout.com/icon/free/png-256/free-confirm-order-icon-download-in-svg-png-gif-file-formats--approve-placed-final-food-services-pack-icons-1569294.png" width="150"/>
                        <p>
                        QUẢN LÝ ĐƠN HÀNG
                        </p>
                    </a>
                </div>
            </div>
        
        </div>
    </body>
    ';
}

?>
