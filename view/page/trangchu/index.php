
<style>
/* General body styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Navigation bar */
.nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffffff; /* Nền trắng */
    padding: 8px 16px; /* Giảm độ dày */
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); /* Giảm độ nổi */
}

.nav .logo a {
    color: #000000; /* Chữ đen */
    font-size: 24px;
    text-decoration: none;
}

.nav-links {
    display: flex; /* Thay đổi thành flex để các mục hiển thị ngang */
    align-items: center; /* Căn giữa theo trục dọc */
    justify-content: center; /* Căn giữa theo trục ngang */
    gap: 10px; /* Khoảng cách giữa các mục */
}

.nav-links a {
    display: flex; /* Đảm bảo nội dung bên trong link hiển thị ngang */
    align-items: center; /* Căn giữa icon và text theo trục dọc */
    text-decoration: none; /* Xóa gạch chân */
    color: #000; /* Màu chữ đen */
    padding: 6px 10px; /* Khoảng cách bên trong */
    transition: background-color 0.3s ease; /* Hiệu ứng hover */
    border-radius: 5px; /* Bo góc nhẹ */
}

.nav-links a:hover {
    background-color: #f0f0f0; /* Màu nền khi hover */
}


.contact-info a {
    color: #000000; /* Chữ đen */
    font-size: 18px;
    text-decoration: none;
}


.contact-info a {
    color: red;
    font-size: 18px;
    text-decoration: none;
}

/* Product container */
.product-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    padding: 20px;
    justify-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.product {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 100%;
    text-align: center;
    padding: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.product-img {
    width: 100%;
    height: auto;
    max-height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

.product-name {
    font-size: 18px;
    font-weight: bold;
    margin: 15px 0;
}

.price {
    color: #e74c3c;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;
}

.cart {
    color: #2ecc71;
    font-size: 24px;
    text-decoration: none;
    transition: color 0.3s ease;
}

.cart:hover {
    color: #27ae60;
}

/* Slider */
.slider-container {
    position: relative;
    width: 100%;
    max-width: 1200px;
    margin: 20px auto;
    overflow: hidden;
}

.slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide {
    min-width: 100%;
    height: 400px;
    background-color: #ddd;
}

.navigation {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}

.navigation button {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    font-size: 24px;
    border: none;
    padding: 10px;
    cursor: pointer;
}

.navigation button:hover {
    background-color: rgba(0, 0, 0, 0.8);
}
</style>

<?php
include("controller/cGioHang.php");
include("controller/cLoaiMonAn.php");
$cLoaiMonAn = new CLoaiMonAn();
$loaiMonAnList = $cLoaiMonAn->getAllLMA(); // Lấy danh sách loại món ăn
?>

<!-- Thanh Điều Hướng -->
<div class="nav ">
    <div class="nav-links container">
        <div class="logo">
            <a href="index.php"><img src="img/new.png" alt="Logo"></a>
        </div>
        <?php
        if ($loaiMonAnList->num_rows > 0) {
            while ($row = $loaiMonAnList->fetch_assoc()) {
                // Kiểm tra trạng thái của loại món ăn
                if ($row['TinhTrangMonAn'] == 1) {
                    echo "
                    <a href='index.php?loaiMonAnId={$row['MaLoaiMonAn']}'>
                        <img alt='{$row['TenLoaiMonAn']}' src='img/{$row['HinhAnh']}' class='nav-icon' />
                        {$row['TenLoaiMonAn']}
                    </a>";
                }
            }
        }
        ?>
    <div class="contact-info">
        <a href="#">1900 6960</a>
    </div>
    </div>
</div>

<!-- Slider -->
<div class="slider-container">
    <div class="slides">
        <div class="slide slide-1"></div>
        <div class="slide slide-2"></div>
        <div class="slide slide-3"></div>
    </div>
    <div class="navigation">
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>
</div>

<?php
include("controller/cMonAn.php");

$maLoaiMonAn = isset($_GET['loaiMonAnId']) ? $_GET['loaiMonAnId'] : '';

$p = new CMonAn();

if (isset($_POST['btnTK']) && !empty($_POST['txtTK'])) {
    $tblMonAn = $p->getAllSPbyName($_POST['txtTK']);
} elseif ($maLoaiMonAn != '') {
    $tblMonAn = $p->getAllMonanbyLoaiTT($maLoaiMonAn);
} else {
    $tblMonAn = $p->getAllMonAnTT();
}
?>

<!-- Hiển Thị Sản Phẩm -->
<div class="product-container">
<?php
if ($tblMonAn && $tblMonAn->num_rows > 0) {
    while ($r = $tblMonAn->fetch_assoc()) {
        echo "
        <div class='product'>
            <img alt='{$r['Tenmonan']}' src='img/monan/{$r['Hinhanh']}' class='product-img' />
            <h3 class='product-name'>{$r['Tenmonan']}</h3>
            <div class='price'>" . number_format($r['Giaban'], 0, ',', '.') . " VNĐ</div>
            <a class='cart' href='index.php?add_to_cart=" . urlencode($r['MaMonAn']) . "&product_name=" . urlencode($r['Tenmonan']) . "&product_price=" . urlencode($r['Giaban']) . "&product_image=" . urlencode($r['Hinhanh']) . "'>
                <i class='fas fa-shopping-cart'></i>
            </a>
        </div>
        ";
    }
} else {
    echo "<p>Không có món ăn nào phù hợp.</p>";
}
?>
</div>

<!-- Footer -->
<div class="ft row">
    <div class="footer1 col-4">
        <div class="icon"><i class="fas fa-drumstick-bite"></i></div>
        <h2>GÀ GIÒN CHUẨN TƯƠI 100%</h2>
        <p>Thưởng thức gà rán giòn tan, sử dụng gà tươi 100% từ nông trại</p>
    </div>
    <div class="footer1 col-4">
        <div class="icon"><i class="fas fa-glass-whiskey"></i></div>
        <h2>NƯỚC NGỌT UỐNG KHÔNG GIỚI HẠN</h2>
        <p>Uống nước ngọt thoải mái với concept refill miễn phí</p>
    </div>
    <div class="footer1 col-4">
        <div class="icon"><i class="fas fa-store"></i></div>
        <h2>DỊCH VỤ CHUYÊN NGHIỆP & KHÔNG GIAN HIỆN ĐẠI</h2>
        <p style="font-size:15px;">Trải nghiệm phong cách phục vụ chuyên nghiệp & không gian cực cool</p>
    </div>
</div>

<script>
let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slide').length;

    if (index >= totalSlides) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = totalSlides - 1;
    } else {
        currentSlide = index;
    }

    slides.style.transform = `translateX(-${currentSlide * 100}%)`;
}

function changeSlide(direction) {
    showSlide(currentSlide + direction);
}

// Tự động chuyển slide mỗi 3 giây
setInterval(() => {
    changeSlide(1);
}, 3000);
</script>
