

<body>
        <div class="container ulnl">
            <h1 class="d-flex justify-content-center py-3 font-weight-bold">ƯỚC LƯỢNG NGUYÊN LIỆU</h1>

            <form action="index.php?page=quanly/quanlynguyenlieu/uocluongnguyenlieu/quanlyketquauocluongnguyenlieu" method="post">
            <!-- <button type="submit" class="btn btn-success p-2" name="tinh" value="tinh">Tính </button> -->

            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Mã Món Ăn
                        </th>
                        <th>
                            Tên Món Ăn
                        </th>
                        <th>
                            Hình Ảnh
                        </th>
                        <th>
                            Số Lượng
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once("controller/cMonAn.php");
                    $p= new cmonan();
                    $table=$p->getallmonan();
                    if(!$table){
                        echo "Không tìm thấy dữ liệu";
                        
                    }else{
                        while($r=$table->fetch_assoc()){
                            echo "<tr>";
                            echo'<td>'.$r["MaMonAn"].'</td>';
                            echo'<td>'.$r["Tenmonan"].'</td>';
                            echo '<td><img style="width: 100px;height=100" src="img/Monan/'.$r["Hinhanh"].'" alt=""></td>';

                            echo'<td><input class="ul-input btn border " type="number" name="soluong[]" id="" placeholder="0" value="0" ></td> </tr>';
                        
                        }
                    }

                    ?>
                    
                    
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-center py-4">
                <button class="btn btn-secondary mx-3"><a href="index.php?page=quanly/quanlynguyenlieu"><i class="fas fa-times"></i> Hủy</a></button>
                
                
                <button class="btn btn-success p-2" name="tinhtoan">Tính toán</button>
                
                
                
            </div>
            
        </form>
        </div>
    </body>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listener for checkboxes
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="nguyen_lieu[]"]');
        
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const quantityInput = document.getElementById('so_luong_' + this.value);
                if (this.checked) {
                    quantityInput.disabled = false;  // Enable the quantity input when checked
                } else {
                    quantityInput.disabled = true;  // Disable the quantity input when unchecked
                }
            });
        });
    });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Hàm để hiển thị thông báo lỗi
    function showError(inputElement, message) {
        const errorElement = document.createElement('small');
        errorElement.classList.add('text-danger');
        errorElement.textContent = message;

        // Nếu đã có thông báo lỗi, không thêm nữa
        if (inputElement.nextElementSibling && inputElement.nextElementSibling.classList.contains('text-danger')) {
            inputElement.nextElementSibling.textContent = message;
        } else {
            inputElement.parentNode.appendChild(errorElement);
        }

        inputElement.classList.add('is-invalid');  // Thêm lớp lỗi cho input
    }

    // Hàm để xóa thông báo lỗi
    function removeError(inputElement) {
        if (inputElement.nextElementSibling && inputElement.nextElementSibling.classList.contains('text-danger')) {
            inputElement.nextElementSibling.remove();
        }
        inputElement.classList.remove('is-invalid');
    }


    // Kiểm tra số lượng món ăn
    // const soluong = document.querySelectorAll('input[name="soluong[]"]');
    const soluongInputs = document.querySelectorAll('input[name="soluong[]"]');

    soluongInputs.forEach(function(input) {
    input.addEventListener('blur', function() {
        if (!input.value.trim() ) {
            showError(input, "Số lượng món ăn không được rỗng.");
        }else if(input.value < 0){
            showError(input, "Số lượng món ăn không được âm.");

        } else {
            removeError(input);
        }
    });
});

    



    // Kiểm tra trước khi gửi form
    // document.querySelector('form').addEventListener('submit', function (e) {
    //     let isValid = true;

    //     // Kiểm tra lại số lượng món ăn
    //     if (!soluong.value.trim() || soluong.value < 0) {
    //         showError(soluong, "Giá nguyên liệu không được rỗng và không được âm.");
    //         isValid = false;
    //     } else {
    //         removeError(soluong);
    //     }
    document.querySelector('form').addEventListener('submit', function (e) {
    let isValid = true; // Biến để kiểm tra tổng thể

    // Lấy tất cả các input của số lượng
    const soluongInputs = document.querySelectorAll('input[name="soluong[]"]');

    // Duyệt qua từng input để kiểm tra
    soluongInputs.forEach(function(input) {
        if (!input.value.trim()) {
            showError(input, "Số lượng món ăn không được rỗng.");
            isValid = false; // Có lỗi, không hợp lệ
        } else if (input.value < 0) {
            showError(input, "Số lượng món ăn không được âm.");
            isValid = false; // Có lỗi, không hợp lệ
        } else {
            removeError(input); // Xóa lỗi nếu hợp lệ
        }
    });
    

        if (!isValid) {
        
            alert('Thêm nguyên liệu thất bại. Vui lòng nhập đầy đủ!');
            e.preventDefault();  // Ngừng gửi form nếu có lỗi
            
          
        }
    });
});
</script>




