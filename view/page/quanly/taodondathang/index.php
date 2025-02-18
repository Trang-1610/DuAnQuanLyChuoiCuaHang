<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        /* Navbar */
        .navbar {
            background-color: #A0522D;
        }

        .navbar .nav-link,
        .navbar .navbar-brand {
            color: white !important;
        }

        .navbar .nav-link:hover,
        .navbar .navbar-brand:hover {
            color: #FFD700 !important;
        }

        /* Food Cards */
        .card {
            margin: 10px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .card img {
            height: 150px;
            object-fit: cover;
        }

        .card-body {
            text-align: center;
        }

        /* Order Summary */
        .order-summary {
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
            padding: 40px; /* Increased padding for a bigger container */
            border-radius: 15px;
            border: 1px solid rgba(255, 165, 0, 0.4);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 10px;
        }

        .order-summary h5 {
            font-size: 2.2rem; /* Increased font size */
            font-weight: bold;
            color: black;
            /* text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2); */
            margin-bottom: 20px; /* Larger spacing below the title */
            text-align: center;
        }

        .order-summary .list-group {
            max-height: 350px; /* Increased max height for order items */
            overflow-y: auto;
        }

        .order-summary .list-group-item {
            /* display: flex; */
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 1rem; /* Slightly increased font size for list items */
        }

        .order-summary .btn-warning,
        .order-summary .btn-danger {
            /* width: 50%; */
            margin-top: 0px; /* Increased margin between buttons */
            font-size: 1rem; /* Larger button text */
        }
        .total-section {
            padding: 10px; /* Increased padding for a bigger container */
            top: 10px;
        }
        /* Scrollbar Styling */
        .order-summary .list-group::-webkit-scrollbar {
            width: 5px; /* Wider scrollbar */
        }

        .order-summary .list-group::-webkit-scrollbar-thumb {
            background-color: #ffab91;
            border-radius: 10px;
        }
        /* Order Summary Layout */
        .order-summary-container {
            position: sticky; /* Để cố định khi cuộn */
            top: 20px;        /* Khoảng cách từ trên cùng */
            max-width: 100%;  /* Giới hạn chiều rộng cột */
        }

        .order-summary {
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
            padding: 20px;    /* Cách đều nội dung bên trong */
            border-radius: 15px;
            border: 1px solid rgba(255, 165, 0, 0.4);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .row {
            display: flex; /* Đảm bảo các cột trong row dùng flexbox */
        }

        .col-md-8 {
            flex: 0 0 66.666%; /* Cột chính (8 phần) */
            max-width: 66.666%;
        }

        .col-md-4 {
            flex: 0 0 33.333%; /* Cột bên phải (4 phần) */
            max-width: 33.333%;
        }
        /* Container for the buttons */
        .nut {
            display: flex;
            justify-content: center; /* Center the buttons horizontally */
            gap: 20px; /* Space between buttons */
            margin-top: 30px; /* Space from the top */
            align-items: center; /* Align the buttons vertically in the center if needed */
        }

        /* Styling for the individual buttons */
        .nut a {
            text-decoration: none; /* Remove underline from the links */
        }

        /* Styling for the Quay lại button */
        .btn-primary {
            padding: 12px 30px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        /* Hover effect for Quay lại button */
        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05); /* Slight scale effect on hover */
        }

        /* Styling for the Duyệt đơn button */
        .btn-warning {
            padding: 12px 30px;
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        /* Hover effect for Duyệt đơn button */
        .btn-warning:hover {
            background-color: #f57c00;
            transform: scale(1.05); /* Slight scale effect on hover */
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Food Order</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="quaylai">
        
    </div>
    <div class="nut">
        <a href="index.php?page=quanly/">
                <button class="btn btn-primary">Quay lại</button>
        </a>
        <a href="index.php?page=quanly/taodondathang/duyetdon">
                <button class="btn btn-warning">Duyệt đơn</button>
        </a>
    </div>
    <!-- Main Container -->
     <form action="" method="post">
        <div class="container my-4">
            <div class="row">
                <!-- Main Content -->
                <div class="col-md-8">
        <div class="row">
            <!-- Search Section -->
            <div class="col-md-12 mb-4">
            
                    <div class="row g-2">   
                        <div class="col">
                            <select name="loaiMonAnId" class="form-select" onchange="this.form.submit()">
                                <option value="">Chọn loại</option>
                                <!-- PHP for Dropdown Population -->
                                <?php
                                include("controller/cLoaiMonAn.php");
                                $controller = new CLoaiMonAn();
                                $dsLoaiMonAn = $controller->getAllLMA();

                                if ($dsLoaiMonAn) {
                                    while ($loai = $dsLoaiMonAn->fetch_assoc()) {
                                        $selected = (isset($_POST['loaiMonAnId']) && $_POST['loaiMonAnId'] == $loai['MaLoaiMonAn']) ? 'selected' : '';
                                        echo "<option value='{$loai['MaLoaiMonAn']}' {$selected}>{$loai['TenLoaiMonAn']}</option>";
                                    }
                                } else {
                                    echo "<option value=''>Không hợp lệ</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                
            </div>

            <!-- Food Items -->
        
            <?php
            include_once("controller/cMonAn.php");
            $p = new CMonAn();
            include_once("view/page/quanly/taodondathang/xuly.php");
            // Fetching the selected category or search text
            $maLoaiMonAn = $_POST['loaiMonAnId'] ?? '';
            $searchText = $_POST['txtTK'] ?? '';
            $btnTKPressed = isset($_POST['btnTK']);
            // Getting data based on conditions
            if ($btnTKPressed && !empty($searchText)) {
                $tblMonAn = $p->getAllSPbyName(htmlspecialchars($searchText));
            } elseif (!empty($maLoaiMonAn)) {
                $tblMonAn = $p->getAllMonanbyLoai($maLoaiMonAn);
            } else {
                $tblMonAn = $p->getAllMonAn();
            }

            // Display food items or message if none found
            if ($tblMonAn && $tblMonAn->num_rows > 0) {
                while ($r = $tblMonAn->fetch_assoc()) {
                    echo "
                    <div class='col-md-6 mb-4'>
                        
                            <div class='card food-item' data-id='{$r['MaMonAn']}' data-name='{$r['Tenmonan']}' data-price='{$r['Giaban']}'>
                                <img src='img/Monan/{$r['Hinhanh']}' class='card-img-top' alt='{$r['Tenmonan']}'>
                                <div class='card-body'>
                                    
                                    <h5 class='card-title'>{$r['Tenmonan']}</h5>
                                    <p class='card-text'>" . number_format($r['Giaban'], 0, ',', '.') . " VNĐ</p>
                                    <button type='button' class='btn btn-success add-to-cart'>Đặt món</button>
                                </div>
                            </div>
                    </div>";
                }
            } else {
                echo "<p>Không tìm thấy món ăn.</p>";
            }
            ?>
        </div>
    </div>


                <!-- Order Summary -->
                <div class="col-md-4">
                        <div class="order-summary">
                            <h5>ĐƠN ĐẶT MÓN</h5>
                            <ul class="list-group order-items">
                                <!-- Dynamic Order Items -->
                            </ul>
                            <div class="total-section">
                                <span><h6>Tổng tiền:</h6></span>
                                <input type="text" readonly name="tongtiendon" class="total" style="background-color: transparent; border: none; outline: none; font-size:30px; font-weight: bold; color: #660000;"/>
<input type="hiden" readonly readonly oninput="document.querySelector('input[name=tongtiendon]').value = this.value" style="background-color: transparent; border: none; outline: none;" />
                            </div>
                            <button class="btn btn-danger" onclick="clearCart()" type="button">Xóa đơn hàng</button>
                            <button class="btn btn-success" onclick="document.querySelector('form').submit();" type="submit" name="btnSubmitdon">Lưu đơn hàng</button>
                        </div>
                </div>

            </div>
        </div>
  

    <!-- JavaScript -->
    <script>
    const saveOrder = () => {
    const cartItems = [];
    const totalAmount = parseFloat(document.querySelector('.total').textContent.replace(' VNĐ', '').replace(/,/g, ''));
    
    document.querySelectorAll('.order-items .list-group-item').forEach(item => {
        const id= item.dataset.id;

        const name = item.dataset.name;
        const price = parseFloat(item.dataset.price);
        const quantity = parseInt(item.querySelector('.quantity').value) || 0;
        if (quantity > 0) {
            cartItems.push({ id,name, price, quantity });
        }
    });

    if (cartItems.length === 0) {
        alert("Giỏ hàng trống! Vui lòng thêm món vào giỏ hàng.");
        return;
    }

    // Gửi dữ liệu đến server
            const formData = new FormData();
            formData.append('cartItems', JSON.stringify(cartItems));
            formData.append('totalAmount', totalAmount);
            formData.append('maNV', <?php echo $_SESSION['dangnhap']['MaNV'] ?? 'null'; ?>); // Gửi mã nhân viên (đảm bảo đã đăng nhập)

            fetch('xuly.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Đơn hàng đã được lưu!");
                    location.reload(); // Reload page or navigate to another page
                } else {
                    alert("Lưu đơn hàng thất bại!");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Đơn hàng được lưu thành công !");
            });
        };


        // Helper Functions
        const saveCartToLocalStorage = () => {
            const cart = [];
            document.querySelectorAll('.order-items .list-group-item').forEach(item => {
                const id = item.dataset.id;
                const name = item.dataset.name;
                const price = parseFloat(item.dataset.price);
                const quantity = parseInt(item.querySelector('.quantity').value) || 0;
                if (quantity > 0) cart.push({id, name, price, quantity });
            });
            localStorage.setItem('cart', JSON.stringify(cart));
        };

        const loadCartFromLocalStorage = () => {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.forEach(item => addToCart(item.id,item.name, item.price, item.quantity));
        };

        const updateTotal = () => {
            let total = 0;
            document.querySelectorAll('.order-items .list-group-item').forEach(item => {
                const quantity = parseInt(item.querySelector('.quantity').value) || 0;
                const price = parseFloat(item.dataset.price);
                total += quantity * price;
            });
            document.querySelector('.total').value = total; // Chỉ giá trị số
            saveCartToLocalStorage();
        };


        const addToCart = (id, name, price, quantity = 1) => {
            const orderItemsList = document.querySelector('.order-items');
            const existingItem = Array.from(orderItemsList.children).find(
                item => item.dataset.name === name
            );

            if (existingItem) {
                const quantityInput = existingItem.querySelector('.quantity');
                quantityInput.value = parseInt(quantityInput.value) + quantity;
            } else {
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item';
                listItem.dataset.id = id;
                listItem.dataset.name = name;
                listItem.dataset.price = price;

                listItem.innerHTML = `
                    <div style="display: flex; flex-direction: column; padding: 15px; margin-bottom: 10px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                        <!-- Top: Food Name -->
                        <h6 style="margin: 0; color: #333; font-size: 1.1rem; font-weight: 600;"><input type="hidden" name="mama[]" value="${id}"></h6>
                        
                        <h6 style="margin: 0; color: #333; font-size: 1.1rem; font-weight: 600;">${name}</h6>
                        
                        
                        <!-- Bottom: Price, Quantity, and Remove Button -->
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                            <!-- Left side: Price -->
                            <span style="font-size: 1rem; color: #555;"> ${price.toLocaleString()} VNĐ</span>
                            
                            <!-- Right side: Quantity Input and Remove Button -->
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <input 
                                    type="number" 
                                    class="quantity form-control form-control-sm" 
                                    name="quantity[]"
                                    min="1" 
                                    value="${quantity}" 
                                    style="width: 60px; text-align: center; border-radius: 4px; border: 1px solid #ddd; padding: 5px;">
                                
                                <button 
                                    class="btn btn-sm btn-danger remove-item" 
                                    style="border-radius: 50%; padding: 6px; font-size: 1rem; background-color: #ff6f61; border: none;">
                                    &times;
                                </button>
                            </div>
                        </div>
                    </div>
                `;



                listItem.querySelector('.quantity').addEventListener('change', updateTotal);
                listItem.querySelector('.remove-item').addEventListener('click', () => {
                    listItem.remove();
                    updateTotal();
                });

                orderItemsList.appendChild(listItem);
            }

            updateTotal();
        };

        const clearCart = () => {
            if (confirm("Bạn có chắc chắn muốn xóa toàn bộ đơn hàng?")) {
                document.querySelector('.order-items').innerHTML = '';
                updateTotal();
            }
        };
        document.querySelectorAll('.quantity').forEach(function(input) {
            input.addEventListener('input', function() {
                // Chuyển đổi giá trị nhập thành số và kiểm tra
                let value = parseInt(input.value);
                if (value < 1) {
                    input.value = 1; // Đặt lại giá trị về 1 nếu giá trị nhỏ hơn 1
                }
            });
        });


        // Event Listeners
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', () => {
                const foodCard = button.closest('.food-item');
                const id = foodCard.dataset.id;
                const name = foodCard.dataset.name;
                const price = parseFloat(foodCard.dataset.price);
                addToCart(id,name, price);
            });
        });

        document.addEventListener('DOMContentLoaded', loadCartFromLocalStorage);
    </script>
  </form>
</body>

</html>
<?php

include_once("model/mDon.php");
// Kiểm tra thông tin đăng nhập của người dùng
if (isset($_SESSION['dangnhap']) && $_SESSION['dangnhap']) {
    $userIsAuthenticated = true;
} else {
    $userIsAuthenticated = false;
}
if (isset($_SESSION["dangnhap"])) {
    $nguoiDung = $_SESSION["dangnhap"];  // Lấy thông tin người dùng từ session
    $maCuaHang = $nguoiDung['MaCuaHang']; // Lấy mã cửa hàng của nhân viên
    $maCV = $nguoiDung["MaChucVu"];
    $manv = $nguoiDung["MaNV"];
    $hoten=$nguoiDung["HoTen"];
} else {
    // Nếu không có thông tin đăng nhập, redirect về trang đăng nhập hoặc xử lý lỗi
    header("Location: dangnhap/index.php");
    exit();
}
$pp = new mDon();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_REQUEST['btnSubmitdon'])) {
        error_log("Nút submit đã được nhấn");
        $TrangThai = 2;
        $GioTaoDon = date('Y-m-d H:i:s');
        $tongTienDon = str_replace(',', '', $_POST["tongtiendon"]);
        $tongTienDon = filter_var($tongTienDon, FILTER_VALIDATE_FLOAT);
        $PhuongThucThanhToan = 1;
        $GhiChu = "";
        $TenKhachHang = "";
        $SoDienThoai = "";
        $DiaChi = "";
        
        // Gọi hàm để lưu đơn hàng và lấy mã đơn
        $madon = $pp->them($GioTaoDon, $tongTienDon, $PhuongThucThanhToan, $GhiChu, $TenKhachHang, $SoDienThoai, $DiaChi, $manv, $maCuaHang, $TrangThai);
        
        if ($madon) {
            // Tiến hành lưu chi tiết đơn hàng với mã đơn được lưu một lần
            foreach ($_POST['mama'] as $index => $mama) {
                $quantity = intval($_POST['quantity'][$index] ?? 0);
                if ($quantity <= 0) {
                    echo "<script>alert('Số lượng không hợp lệ cho mã: $mama');</script>";
                    error_log("Số lượng không hợp lệ cho mã: $mama");
                    continue;
                }
                // Lưu chi tiết đơn hàng vào cơ sở dữ liệu
                $pp->themChiTiet($mama, $madon, $quantity);
            }
            echo "<script>alert('Lưu thành công');</script>";
            error_log("Lưu thành công");
        } else {
            echo "<script>alert('Lỗi khi lưu');</script>";
            error_log("Lỗi khi lưu");
        }
    }
}


?>