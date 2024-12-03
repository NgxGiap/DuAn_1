<?php
require_once 'layout/header.php';
?>

<?php
require_once 'layout/menu.php';
?>
<main>
    <!-- hero slider area start -->
    <section class="slider-area container-fluid">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/home1-slide2.png" style="height: 400px;">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/home1-slide4.png" style="height: 400px;">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/home1-slide3.png" style="height: 400px;">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/home1-slide1.png" style="height: 400px;">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
        </div>
    </section>
    <!-- hero slider area end -->



    <!-- service policy area start -->
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
    <!-- service policy area end -->

    <!-- banner statistics area start -->
    <div class="banner-statistics-area">
        <div class="container">
            <div class="row row-20 mtn-20">
                <div class="col-sm-12">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="assets/img/slider/home1-slider5.png" alt="product banner">
                        </a>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!-- banner statistics area end -->

    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm nổi bật</h2>
                        <p class="sub-title">Sản phẩm được cập nhật liên tục</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <!-- product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <?php foreach ($listProducts as $key => $product): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $product['Image'] ?>"
                                                        alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $product['Image'] ?>"
                                                        alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    $CreateAt = new DateTime($product['CreateAt']);
                                                    $Now = new DateTime();
                                                    $Days = $Now->diff($CreateAt);
                                                    if ($Days->days <= 7) { ?>
                                                        <div class="product-label new">
                                                            <span>Mới</span>
                                                        </div>
                                                    <?php }; ?>
                                                </div>
                                                <div class="cart-hover">
                                                    <a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>">
                                                        <button class="btn btn-cart">Xem chi tiết</button></a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>"><?= $product['ProductName'] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular"><?= formatPrice($product['Price']) . 'đ' ?></span>
                                                    <!-- <span class="price-old"><del>$70.00</del></span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->

    <!-- product banner statistics area start -->
    <!-- <section class="product-banner-statistics">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="product-banner-carousel slick-row-10">
                            banner single slide start
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="assets/img/banner/img1-middle.jpg" alt="product banner">
                                    </a>
                                    <div class="banner-content banner-content_style2">
                                        <h5 class="banner-text3"><a href="#">BRACELATES</a></h5>
                                    </div>
                                </figure>
                            </div>
                            banner single slide start
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- product banner statistics area end -->

    <!-- banner statistics area start -->
    <div class="banner-statistics-area">
        <div class="container">
            <div class="row row-20 mtn-20">
                <div class="col-sm-12">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="assets/img/slider/home1-slider6.png" alt="product banner">
                        </a>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!-- banner statistics area end -->

    <!-- featured product area start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm của chúng tôi</h2>
                        <p class="sub-title">Sản phẩm được cập nhật liên tục</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        <!-- product item start -->

                        <?php foreach ($listProducts as $key => $product): ?>
                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>">
                                        <img class="pri-img" src="<?= BASE_URL . $product['Image'] ?>"
                                            alt="product">
                                        <img class="sec-img" src="<?= BASE_URL . $product['Image'] ?>"
                                            alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <?php
                                        $CreateAt = new DateTime($product['CreateAt']);
                                        $Now = new DateTime();
                                        $Days = $Now->diff($CreateAt);
                                        if ($Days->days <= 7) { ?>
                                            <div class="product-label new">
                                                <span>Mới</span>
                                            </div>
                                        <?php }; ?>
                                    </div>
                                    <div class="cart-hover">
                                        <a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>">
                                            <button class="btn btn-cart">Xem chi tiết</button></a>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <h6 class="product-name">
                                        <a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>"><?= $product['ProductName'] ?></a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular"><?= formatPrice($product['Price']) . 'đ' ?></span>
                                        <!-- <span class="price-old"><del>$70.00</del></span> -->
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->
                        <?php endforeach ?>

                        <!-- <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="assets/img/product/product-6.jpg" alt="product">
                                    <img class="sec-img" src="assets/img/product/product-13.jpg" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>10%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                                </div>
                                <ul class="color-categories">
                                    <li>
                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                    </li>
                                    <li>
                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                    </li>
                                    <li>
                                        <a class="c-grey" href="#" title="Grey"></a>
                                    </li>
                                    <li>
                                        <a class="c-brown" href="#" title="Brown"></a>
                                    </li>
                                </ul>
                                <h6 class="product-name">
                                    <a href="product-details.html">Perfect Diamond Jewelry</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">$60.00</span>
                                    <span class="price-old"><del>$70.00</del></span>
                                </div>
                            </div>
                        </div> -->
                        <!-- product item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured product area end -->

    <!-- testimonial area start -->

    <!-- testimonial area end -->

    <!-- group product start -->
    <section class="group-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>Sản phẩm mới</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">
                                <?php foreach ($listProducts as $key => $product): ?>
                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>">
                                                    <img src="<?= $product['Image'] ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>">
                                                        <?= $product['ProductName'] ?></a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular"><?= formatPrice($product['Price']) . 'đ' ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->
                                <?php endforeach ?>
                            </div>
                        </div>
                        <!-- group list carousel start -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>Sản phẩm bán chạy</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">
                                <?php foreach ($listProducts as $key => $product): ?>
                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>">
                                                    <img src="<?= $product['Image'] ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>">
                                                        <?= $product['ProductName'] ?></a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular"><?= formatPrice($product['Price']) . 'đ' ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->
                                <?php endforeach ?>
                            </div>
                        </div>
                        <!-- group list carousel start -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- group product end -->

    <!-- latest blog area start -->
    <section class="latest-blog-area section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Tin công nghệ</h2>
                        <p class="sub-title">Cập nhật các thông tin mới nhất về công nghệ</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="#">
                                    <img src="assets/img/blog/blog-img1.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>25/11/2034 | <a href="#">High Tech</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="#">Hé lộ nâng cấp quan trọng của bộ đôi Galaxy S25 và Galaxy S25+</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="#">
                                    <img src="assets/img/blog/blog-img2.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>25/11/2024 | <a href="#">High Tech</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="#">Tin vui cho những ai đang mong chờ Galaxy S25 Slim</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="#">
                                    <img src="assets/img/blog/blog-img3.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>25/11/2024 | <a href="#">High Tech</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="#">High Tech mở bán JBL Wave Beam 2</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="#">
                                    <img src="assets/img/blog/blog-img4.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>25/11/2024 | <a href="#">High Tech</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="#">Rò rỉ khay SIM Galaxy S25, hé lộ loạt màu sắc mới</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->

                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="#">
                                    <img src="assets/img/blog/blog-img5.jpg" alt="blog image">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p>25/11/2024 | <a href="#">High Tech</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="#">vivo S20 và S20 Pro ra mắt với màn hình 4500 nits, camera 50MP, pin 6500 mAh, giá từ 8.05 triệu đồng</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest blog area end -->

    <!-- brand logo area start -->
    <div class="brand-logo section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/1.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/2.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/3.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/4.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/5.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/6.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand logo area end -->
</main>



<?php
require_once 'layout/miniCart.php';
?>

<?php
require_once 'layout/footer.php';
?>