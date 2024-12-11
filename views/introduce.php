<?php
require_once 'layout/header.php';
?>

<?php
require_once 'layout/menu.php';
?>

<body>
    <div style="background-color: #C29958;">
        <header class="text-white text-center py-5">
            <h1>Chào mừng đến với High Tech</h1>
            <p>Thế giới công nghệ hiện đại trong tầm tay bạn</p>
        </header>
    </div>

    <main class="container my-5">
        <!-- Sứ mệnh -->
        <section class="text-center my-5">
            <h2 class="text-submit">Sứ mệnh</h2>
            <p>
                High Tech mang đến trải nghiệm mua sắm hiện đại, tiện lợi và minh bạch. Chúng tôi cung cấp các thiết bị công nghệ
                tiên tiến, giúp bạn tối ưu hóa cuộc sống và công việc.
            </p>
        </section>

        <!-- Tính năng nổi bật -->
        <section class="my-5">
            <h2 class="text-center ">Tính năng nổi bật</h2>

            <div class="service-policy section-padding">
                <div class="container">
                    <div class="row mtn-30">
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-plane"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Giao hàng</h6>
                                    <p>Miễn phí giao hàng</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-help2"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Hỗ trợ</h6>
                                    <p>Hỗ trợ 24/7</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-back"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Hoàn tiền</h6>
                                    <p>Hoàn tiền trong vòng 30 ngày</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-credit"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Thanh toán</h6>
                                    <p>Bảo mật thanh toán</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ưu đãi -->
        <section class="bg-light p-5 rounded my-5">
            <h2 class="text-center ">Ưu đãi đặc biệt</h2>
            <p class="text-center">
                Nhận nhiều khuyến mãi hấp dẫn và giao hàng miễn phí khi mua hàng tại High Tech!
            </p>
        </section>

        <!-- Tại sao chọn High Tech -->
        <section class="my-5">
            <h2 class="text-center ">Tại sao chọn High Tech?</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">✅ Cam kết sản phẩm chính hãng 100%</li>
                <li class="list-group-item">✅ Giá cả cạnh tranh</li>
                <li class="list-group-item">✅ Đội ngũ nhân viên tư vấn tận tâm</li>
            </ul>
        </section>
    </main>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
require_once 'layout/miniCart.php';
?>

<?php
require_once 'layout/footer.php';
?>