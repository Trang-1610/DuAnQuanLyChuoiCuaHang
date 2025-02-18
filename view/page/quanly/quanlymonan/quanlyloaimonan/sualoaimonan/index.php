<?php
include_once("controller/cloaimonan.php");

$cLoaiMonAn = new CLoaiMonAn();
if (isset($_GET['maloai'])) {
    $maloai = $_GET['maloai'];
    $loaiMonAn = $cLoaiMonAn->getLoaiMonAnById($maloai);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tenLoai = $_POST['TenLoaiMonAn'];
    $tinhTrang = $_POST['TinhTrangMonAn'];
    $result = $cLoaiMonAn->updateLoaiMonAn($maloai, $tenLoai, $tinhTrang);
    if ($result) {
        echo "<script>alert('Cập nhật thành công!'); window.location.href='index.php?page=quanly/quanlymonan/quanlyloaimonan';</script>";
    } else {
        echo "<script>alert('Cập nhật thất bại!');</script>";
    }
}
?>

<body>
    <div class="container py-4">
        <h1 class="text-center font-weight-bold mb-4">SỬA LOẠI MÓN ĂN</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" class="p-3">
                    <div class="form-group row mb-3">
                        <label for="TenLoaiMonAn" class="col-sm-4 col-form-label text-right font-weight-bold">Tên Loại Món Ăn</label>
                        <div class="col-sm-6">
                            <input type="text" name="TenLoaiMonAn" id="TenLoaiMonAn" class="form-control" value="<?php echo $loaiMonAn['TenLoaiMonAn']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="TinhTrangMonAn" class="col-sm-4 col-form-label text-right font-weight-bold">Tình Trạng</label>
                        <div class="col-sm-6">
                            <select name="TinhTrangMonAn" id="TinhTrangMonAn" class="form-control">
                                <option value="1" <?php if ($loaiMonAn['TinhTrangMonAn'] == 1) echo 'selected'; ?>>Có</option>
                                <option value="0" <?php if ($loaiMonAn['TinhTrangMonAn'] == 0) echo 'selected'; ?>>Chưa sẵn sàng</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4 me-2">
                            <i class="far fa-save"></i> Lưu
                        </button>
                        <a href="index.php?page=quanly/quanlymonan/quanlyloaimonan" class="btn btn-secondary px-4">
                            <i class="fas fa-times"></i> Hủy
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
        }
        .card {
            border-radius: 8px;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .form-control {
            border-radius: 5px;
        }
        label {
            color: #333;
        }
    </style>
</body>

