<?php
// Kiểm tra xem có thêm sản phẩm vào giỏ hàng hay không
if (isset($_GET['add_to_cart'])) {
    $productId = $_GET['add_to_cart'];

    // Kiểm tra nếu giỏ hàng chưa tồn tại, tạo mới
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Kiểm tra nếu sản phẩm đã có trong giỏ hàng, chỉ cập nhật số lượng
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        // Thêm sản phẩm vào giỏ hàng
        $_SESSION['cart'][$productId] = array(
            'id' => $productId,
            'name' => $_GET['product_name'],
            'price' => $_GET['product_price'],
            'quantity' => 1,
            'image' => $_GET['product_image']  // Thêm thông tin hình ảnh
        );
    }

    // Hiển thị thông báo thêm sản phẩm vào giỏ hàng dưới dạng alert
    echo "<script>alert('bạn đã thêm sản phẩm thành công vào giỏ hàng!');</script>";
}

?>

