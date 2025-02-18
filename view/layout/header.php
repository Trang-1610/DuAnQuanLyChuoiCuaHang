<html>

<head>
  <title>
    BurgerFun
  </title>
  <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="view/layout/css/style.css?v=146">
  <link rel="stylesheet" href="view/layout/css/bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="view/layout/js/jquery-3.7.1.min.js"></script>
  <script src="view/layout/js/tham.js"></script>
<style>
 
</style>
</head>

<body>

<!-- header -->
<div class="head">
    <div class="header ">
        <div>
          <a href="index.html"><img alt="BurgerFun Logo" src="img/logo.png" width="60" /></a>

          <!-- <img alt="BurgerFun Logo" src="img/logo.png" width="60" /> -->
        </div>
        <div class="h-nav">
          <a href="index.php">TRANG CHỦ  </a>
         <a href="index.php?page=gioithieu">GIỚI THIỆU <i class="fas fa-store"></i></a>

          <a href="index.php?page=giohang">GIỎ HÀNG <i class='fas fa-shopping-cart'></i></a>

          <?php
              if (isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"]) {
                  echo '<a href="index.php?page=quanly">QUẢN LÝ <i class="fas fa-store"></i></a> ';
                  echo '<span style="margin-right: 10px;">Xin chào, ' . $_SESSION["dangnhap"]["HoTen"] . '!</span>';  
                  echo '<a href="index.php?page=dangxuat"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>';
              } else {
                  echo '<a href="index.php?page=dangnhap">Đăng nhập</a>';
              }
          ?>
          <a href="index.php?page=hoso"><i class="fas fa-user"></i></a>          
        </div>
    </div>

 