<?php
include_once("controller/cloainguyenlieu.php");

$p = new cloainguyenlieu();

// Kiểm tra xem người dùng có gửi form không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tenLoai = $_POST['TenLoaiNguyenLieu'];
    
    // Gọi phương thức trong controller để thêm loại món ăn
    $result = $p->insertloainguyenlieu($tenLoai);
    
    if ($result) {
        echo "<script>alert('Thêm loại nguyên liệu thành công!'); window.location.href='index.php?page=quanly/quanlyloainguyenlieu/quanlyloainguyenlieu';</script>";
    } else {
        echo "<script>alert('Thêm loại nguyên liệu thất bại!');</script>";
    }
}
?>

<body>
    <div class="container py-4">
        <h1 class="text-center font-weight-bold mb-4">THÊM LOẠI NGUYÊN LIỆU</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" class="p-3">
                    <div class="form-group row mb-3">
                        <label for="TenLoaiNguyenLieu" class="col-sm-4 col-form-label text-right font-weight-bold">Tên Loại Nguyên liệu</label>
                        <div class="col-sm-6">
                            <input type="text" name="TenLoaiNguyenLieu" id="TenLoaiNguyenLieu" class="form-control" placeholder="Nhập tên loại nguyên liệu" required>
                        </div>
                    </div>

                    

                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4 me-2" onclick="return confirm('Bạn có chắc chắn muốn thêm loại nguyên liệu không ')" >
                            <i class="far fa-save"></i> Lưu
                        </button>
                        <a href="index.php?page=quanly/quanlynguyenlieu/quanlyloainguyenlieu" class="btn btn-secondary px-4">
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
