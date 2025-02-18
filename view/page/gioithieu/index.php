<style>
/* General styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.row.padding {
    display: flex;
    gap: 20px;
    justify-content: space-between;
    align-items: stretch;
}

/* Column styling */
.col-md-5, .col-md-7 {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    background: white;
    overflow: hidden;
}

.col-md-5 {
    flex: 0 0 40%;
}

.col-md-7 {
    flex: 0 0 55%;
}

/* Image styling */
img {
    border-radius: 5px;
    max-width: 100%;
    height: auto;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

img:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

/* Intro section */
#intro h2 {
    color: #d35400;
    font-size: 2rem;
    margin-bottom: 20px;
}

#intro p {
    margin-bottom: 15px;
    text-align: justify;
}

#intro h4 {
    color: #2980b9;
    margin-top: 20px;
    margin-bottom: 10px;
}

/* Card styling */
.card {
    display: inline-block;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    background-color: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card-img-top {
    width: 100%;
    height: auto;
}

.card-body {
    padding: 15px;
    text-align: center;
}

.card-text {
    font-size: 1rem;
    color: #555;
}

/* Flex layout for cards */
.row.cards {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    gap: 20px;
    margin-top: 20px;
}

.container .card {
    flex: 1;
    max-width: calc(20% - 20px);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .row.padding {
        flex-direction: column;
        align-items: flex-start;
    }

    .col-md-5, .col-md-7 {
        flex: 0 0 100%;
        margin-bottom: 20px;
    }

    .row.cards {
        flex-wrap: wrap;
    }

    .container .card {
        max-width: 100%;
        flex: 0 0 calc(50% - 10px);
    }
}

@media (max-width: 576px) {
    .container .card {
        flex: 0 0 100%;
    }
}
.the{
    width: 100%;
    text-align: center;
}
.chinhanh{
    margin-top: 30px;
    text-align: center;
    border-radius: 10px;
    overflow: hidden;
}

</style>

<div class="container qlnl">
        <div class="row padding">
            <div class="col-md-5 py-5 px-5">
                <!-- <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fposapp.vn%2Fmau-thiet-ke-nha-hang-dep&psig=AOvVaw1r-L5--WZCh8TuBMxm1ZGZ&ust=1733996511290000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCOiyhsO2n4oDFQAAAAAdAAAAABAQ" alt="" width="100%" style="transform: rotate(-5deg);"> -->
                <img src="img/nội-thất-quán-ăn.jpg" width="100%" style="transform: rotate(-5deg);">
                <img src="img/Fast Food 9.jpg" width="100%" style="transform: rotate(12deg);">
                <!-- <img src="../IMAGE/view2.jpg" alt="" width="100%" style="transform: rotate(12deg);"> -->
            </div>
            <div class="col-md-7 py-md-2 px-4" id="intro">
                <h2 style="padding-top: 20px;"><b>GIỚI THIỆU BURGER FUN</b></h2>
                <p>
                Chuỗi cửa hàng thức ăn nhanh BurgerFun là một thương hiệu hiện đại, 
                hướng tới cung cấp những bữa ăn nhanh chất lượng cao với hương vị độc đáo, 
                phù hợp với nhiều đối tượng khách hàng. Với sứ mệnh mang đến trải nghiệm ẩm thực tiện lợi 
                nhưng không kém phần ngon miệng, BurgerFun tự hào là điểm dừng chân lý tưởng cho những ai 
                yêu thích hamburger và các món ăn nhanh khác. Với phương châm "Ngon - Nhanh - Vui", 
                BurgerFun luôn nỗ lực mang đến cho khách hàng trải nghiệm vượt trên sự mong đợi.
              </p>
              <h4>Sứ mệnh của BurgerFun</h4>
              <p>BurgerFun mong muốn không chỉ là nơi bán đồ ăn nhanh, mà còn là nơi kết nối mọi người. Dù là một bữa trưa vội vã, một buổi gặp mặt bạn bè hay một bữa ăn gia đình ấm áp, BurgerFun luôn sẵn sàng mang đến niềm vui trọn vẹn qua từng món ăn.
                Hãy ghé thăm BurgerFun để khám phá thế giới burger đầy màu sắc và những khoảnh khắc khó quên!
                </p>
                <p>
                    BurgerFun hiện sở hữu 5 chi nhánh chính trải dài trên các tuyến đường sầm uất, giúp khách hàng dễ dàng tìm kiếm và thưởng thức:
                </p>
        
            </div>
        </div>
        <br>
        <div class="the">
            <div class="card" style="width: 18rem;">
                <img src="img/ch1.jpg" class="card-img-top" alt="..." style ="height: 200px;">
                <div class="card-body">
                    <p class="card-text">Địa chỉ: 1 Nguyễn Văn Bảo</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/ch2.jpg" class="card-img-top" alt="..."style ="height: 200px;">
                <div class="card-body">
                    <p class="card-text">Địa chỉ: 2 Nguyễn Thái Sơn</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/ch3.jpg" class="card-img-top" alt="..."style ="height: 200px;">
                <div class="card-body">
                    <p class="card-text">Địa chỉ: 3 Phạm Văn Đồng</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/ch4.jpg" class="card-img-top" alt="..."style ="height: 200px;">
                <div class="card-body">
                    <p class="card-text">Địa chỉ: 4 Quang Trung</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="img/ch5.jpg" class="card-img-top" alt="..."style ="height: 200px;">
                <div class="card-body">
                    <p class="card-text">Địa chỉ: 5 Trường Chinh</p>
                </div>
            </div>
        </div>
            
    </div>