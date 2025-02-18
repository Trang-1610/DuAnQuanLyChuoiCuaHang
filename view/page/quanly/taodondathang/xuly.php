<?php
include_once("model/mDon.php");
$obj = new mDon();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra nếu có dữ liệu giỏ hàng (cartItems)
    if (isset($_POST['cartItems'])) {
        $cartItems = json_decode($_POST['cartItems'], true);
        $totalAmount = $_POST['totalAmount'];
        $maNV = $_POST['maNV'];
    }
}
?>

