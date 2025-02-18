<?php

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['action']) && $_GET['action'] === 'remove') {
    $productId = (int)$_GET['product_id']; // Lấy ID sản phẩm từ GET

    // Kiểm tra nếu giỏ hàng và sản phẩm tồn tại
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]); // Xóa sản phẩm khỏi giỏ hàng
    }

    // Chuyển hướng về giỏ hàng sau khi xóa
    header("Location: index.php?page=giohang");
    exit();
}

// Cập nhật số lượng sản phẩm trong giỏ hàng
if (isset($_POST['action']) && $_POST['action'] === 'update_quantity') {
    $productId = $_POST['product_id'];
    $newQuantity = (int)$_POST['quantity'];

    // Kiểm tra nếu số lượng hợp lệ
    if ($newQuantity > 0) {
        $_SESSION['cart'][$productId]['quantity'] = $newQuantity;
    }

    // Chuyển hướng lại giỏ hàng sau khi cập nhật
    header("Location: index.php?page=giohang");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Giỏ hàng container */
        .cart-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Tiêu đề */
        .cart-title {
            font-size: 26px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-transform: uppercase;
        }

        /* Bảng giỏ hàng */
        .cart-table {
            width: 100%;
            max-width: 900px;
            border-collapse: collapse;
            margin-bottom: 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .cart-table th, .cart-table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        .cart-table th {
            background-color: #f8f8f8;
            font-weight: bold;
            color: #555;
            text-transform: uppercase;
        }

        .cart-table td {
            background-color: #fff;
        }

        /* Hình ảnh sản phẩm */
        .product-image {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 5px;
        }

        /* Nút số lượng */
        .quantity-btn {
            padding: 6px 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 14px;
        }

        .quantity-btn:hover {
            background-color: #2980b9;
        }

        .quantity-display {
            margin: 0 12px;
            font-size: 14px;
            font-weight: bold;
        }

        /* Nút xóa */
        .btn-remove {
            padding: 6px 12px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 12px;
        }

        .btn-remove:hover {
            background-color: #c0392b;
        }

        /* Tổng giá */
        .total-price-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            font-size: 18px;
            width: 100%;
        }

        .total-price {
            font-weight: bold;
            color: #2c3e50;
        }

        /* Nút thanh toán */
        .btn-checkout {
            padding: 8px 18px;
            background-color: #f39c12;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-checkout:hover {
            background-color: #e67e22;
        }

        .empty-cart {
            text-align: center;
            font-size: 16px;
            color: #e74c3c;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <h2 class="cart-title">Giỏ hàng của bạn</h2>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $productId => $product): ?>
                        <?php $totalProductPrice = number_format($product['price'] * $product['quantity'], 0, ',', '.') . " VNĐ"; ?>
                        <tr>
                            <td><img src="img/Monan/<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="product-image"></td>
                            <td><?= $product['name']; ?></td>
                            <td><?= $totalProductPrice; ?></td>
                            <td>
                                <form action="index.php?page=giohang" method="post">
                                    <input type="hidden" name="action" value="update_quantity">
                                    <input type="hidden" name="product_id" value="<?= $productId; ?>">
                                    <button type="submit" name="quantity" value="<?= $product['quantity'] - 1; ?>" class="quantity-btn" <?= $product['quantity'] <= 1 ? 'disabled' : ''; ?>>-</button>
                                    <span class="quantity-display"><?= $product['quantity']; ?></span>
                                    <button type="submit" name="quantity" value="<?= $product['quantity'] + 1; ?>" class="quantity-btn">+</button>
                                </form>
                            </td>
                            <td>
                                <form action="index.php" method="get">
                                    <input type="hidden" name="page" value="giohang">
                                    <input type="hidden" name="action" value="remove">
                                    <input type="hidden" name="product_id" value="<?= $productId; ?>">
                                    <button type="submit" class="btn-remove">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
            $totalPrice = array_sum(array_map(function ($product) {
                return $product['price'] * $product['quantity'];
            }, $_SESSION['cart']));
            ?>
            <div class="total-price-container">
                <div class="total-price">Tổng cộng: <?= number_format($totalPrice, 0, ',', '.'); ?> VNĐ</div>
                <a href="index.php?page=giohang/thanhtoan/" class="btn-checkout">Thanh toán</a>

            </div>
        <?php else: ?>
            <p class="empty-cart">Giỏ hàng của bạn đang trống.</p>
        <?php endif; ?>
    </div>
</body>
</html>
