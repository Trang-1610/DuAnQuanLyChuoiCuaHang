<?php
include_once("model/mThanhToan.php");

$errorMessages = [
    'name' => '',
    'phone' => '',
    'address' => ''
];

// Kiểm tra nếu giỏ hàng trống
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    header("Location: index.php?page=giohang");
    exit();
}

// Tính tổng tiền nếu giỏ hàng không trống
$tongtien = array_sum(array_map(function ($product) {
    return $product['price'] * $product['quantity'];
}, $_SESSION['cart']));

// Xử lý gửi thông tin thanh toán
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = $_POST['name'];
    $sdt = $_POST['phone'];
    $diachi = $_POST['address'];
    $phuongthucthanhtoan = $_POST['payment_method'] ?? 1;
    $maCuaHang = $_POST['MaCuaHang'] ?? '';

    // Kiểm tra tên
    if (!preg_match('/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơưƯẠ-ỹ\s\-]+$/u', $ten)) {
        $errorMessages['name'] = "Tên không hợp lệ! Vui lòng chỉ nhập chữ cái và khoảng trắng.";
    }

    // Kiểm tra số điện thoại
    if (!preg_match('/^0[1-9][0-9]{8,9}$/', $sdt)) {
        $errorMessages['phone'] = "Số điện thoại không hợp lệ! Số điện thoại phải bắt đầu bằng 0, theo sau là 9 hoặc 10 chữ số.";
    }

    // Kiểm tra địa chỉ
    if (!preg_match('/^[\p{L}\p{M}0-9\s\-]+$/u', $diachi)) {
        $errorMessages['address'] = "Địa chỉ không hợp lệ! Vui lòng kiểm tra lại.";
    }
    

    // Nếu không có lỗi thì tiếp tục xử lý
    if (empty(array_filter($errorMessages))) {
        // Thêm đơn hàng và lấy mã đơn hàng vừa tạo
        $pp = new MThanhToan();
        $gioTaoDon = date('Y-m-d H:i:s');
        $tinhtrang = 1;
        $manhanvien = 3; // Giả sử manhanvien = 3

        $madon = $pp->them($gioTaoDon, $tongtien, $phuongthucthanhtoan, '', $ten, $sdt, $diachi, $manhanvien, $tinhtrang, $maCuaHang);

        if ($madon) {
            // Thêm chi tiết hóa đơn cho từng sản phẩm trong giỏ hàng
            foreach ($_SESSION['cart'] as $product) {
                $pp->themChiTiet($product['id'], $madon, $product['quantity']);
            }

            // Lưu thông tin hóa đơn vào session
            $_SESSION['hoadon'] = [
                'tongtien' => $tongtien,
                'ten' => $ten,
                'sdt' => $sdt,
                'diachi' => $diachi
            ];

            // Xóa giỏ hàng sau khi thanh toán thành công
            unset($_SESSION['cart']);
            echo "<script>
            alert('Thanh toán thành công! Cảm ơn bạn đã mua hàng.');
            window.location.href = 'index.php?page=trangchu';
        </script>";
         
                // Chuyển hướng đến trang xác nhận thanh toán
                exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .checkout-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .checkout-title {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart-table th,
        .cart-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .cart-table th {
            background-color: #f5f5f5;
            color: #333;
        }

        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            margin-bottom: 15px;
            font-size: 18px;
        }

        .form-container input,
        .form-container select,
        .form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color: #2980b9;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .total-price {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            margin-bottom: 20px;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="checkout-container">
        <h2 class="checkout-title">Thông tin thanh toán</h2>

        <!-- Danh sách sản phẩm -->
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['name']); ?></td>
                    <td><?= $product['quantity']; ?></td>
                    <td><?= number_format($product['price'], 0, ',', '.'); ?> VNĐ</td>
                    <td><?= number_format($product['price'] * $product['quantity'], 0, ',', '.'); ?> VNĐ</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Tổng giá -->
        <div class="total-price">
        <strong>Tổng cộng: <?= number_format($tongtien, 0, ',', '.'); ?> VNĐ</strong>
        </div>

        <!-- Form thông tin khách hàng -->
        <div class="form-container">
            <h3>Điền thông tin của bạn</h3>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Họ và tên" value="<?= htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                <div class="error-message"><?= $errorMessages['name']; ?></div>

                <input type="text" name="phone" placeholder="Số điện thoại" value="<?= htmlspecialchars($_POST['phone'] ?? ''); ?>" required>
                <div class="error-message"><?= $errorMessages['phone']; ?></div>

                <input type="text" name="address" placeholder="Địa chỉ giao hàng" value="<?= htmlspecialchars($_POST['address'] ?? ''); ?>" required>
                <div class="error-message"><?= $errorMessages['address']; ?></div>

                <select name="payment_method" required>
                    <option value="1" <?= (isset($_POST['payment_method']) && $_POST['payment_method'] == 1) ? 'selected' : ''; ?>>Tiền mặt</option>
                    <option value="2" <?= (isset($_POST['payment_method']) && $_POST['payment_method'] == 2) ? 'selected' : ''; ?>>Chuyển khoản</option>
                </select>

                <select name="MaCuaHang" required>
                    <?php
                        include("controller/cCuaHang.php");
                        $p = new CCuaHang();
                        $tblCH = $p->getAllCuaHang();
                        if ($tblCH && $tblCH->num_rows > 0) {
                            while ($row = $tblCH->fetch_assoc()) {
                                $selected = (isset($_POST['MaCuaHang']) && $_POST['MaCuaHang'] == $row['MaCuaHang']) ? 'selected' : '';
                                echo '<option value="' . $row["MaCuaHang"] . '" ' . $selected . '>' . htmlspecialchars($row["TenCuaHang"]) . '</option>';
                            }
                        } else {
                            echo '<option value="">Không có cửa hàng</option>';
                        }
                    ?>
                </select>

                <button type="submit" name="btnsubmit">Xác nhận thanh toán</button>
            </form>
        </div>
    </div>
</body>

</html>