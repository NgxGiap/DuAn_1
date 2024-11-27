<?php
require_once 'layout/header.php';
?>

<?php
require_once 'layout/menu.php';
?>


<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="<?= BASE_URL ?>"><i
                                            class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a
                                        href="shop.html">Sản phẩm</a></li>
                                <li class="breadcrumb-item active"
                                    aria-current="page">Chi tiết sản phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <?php foreach ($listAlbum as $key => $image): ?>
                                        <div class="pro-large-img">
                                            <img
                                                src="<?= BASE_URL . $image['SRC'] ?>"
                                                alt="product-details" />
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div
                                    class="pro-nav slick-row-10 slick-arrow-style">
                                    <?php foreach ($listAlbum as $key => $image): ?>
                                        <div class="pro-nav-thumb">
                                            <img
                                                src="<?= BASE_URL . $image['SRC'] ?>"
                                                alt="product-details" />
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a
                                            href="#"><?= $product['name'] ?></a>
                                    </div>
                                    <h3 class="product-name"><?= $product['ProductName'] ?></h3>
                                    <div class="ratings d-flex">
                                        <div class="pro-review">
                                            <?php $countCmt = count($listComments) ?>
                                            <span><?= $countCmt . ' bình luận' ?></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span
                                            class="price-regular"><?= formatPrice($product['Price']) . 'đ' ?></span>
                                        <!-- <span
                                            class="price-old"><del>$90.00</del></span> -->
                                    </div>
                                    <div class="availability">
                                        <i
                                            class="fa fa-check-circle"></i>
                                        <span><?= $product['StockQuantity'] . ' trong kho' ?></span>
                                    </div>
                                    <p class="pro-desc"><?= $product['Description'] ?></p>
                                    <div
                                        class="quantity-cart-box d-flex align-items-center">
                                        <h6
                                            class="option-title">Số lượng:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input
                                                    type="text"
                                                    value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="btn btn-cart2"
                                                href="#">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="pro-size">
                                        <h6 class="option-title">size
                                            :</h6>
                                        <select class="nice-select">
                                            <option>5 inch</option>
                                            <option>5.5 inch</option>
                                            <option>6 inch</option>
                                            <option>6.5 inch</option>
                                        </select>
                                    </div>
                                    <div class="color-option">
                                        <h6 class="option-title">color
                                            :</h6>
                                        <ul class="color-categories">
                                            <li>
                                                <a class="c-lightblue"
                                                    href="#"
                                                    title="LightSteelblue"></a>
                                            </li>
                                            <li>
                                                <a class="c-darktan"
                                                    href="#"
                                                    title="Darktan"></a>
                                            </li>
                                            <li>
                                                <a class="c-grey"
                                                    href="#"
                                                    title="Grey"></a>
                                            </li>
                                            <li>
                                                <a class="c-brown"
                                                    href="#"
                                                    title="Brown"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i
                                                class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i
                                                class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i
                                                class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i
                                                class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div
                        class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-bs-toggle="tab"
                                                href="#tab_three">Bình luận (<?= $countCmt ?>)</a>
                                        </li>
                                    </ul>
                                    <div
                                        class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_three">
                                            <?php foreach ($listComments as $comment): ?>
                                                <h5><?= $countCmt ?> bình luận cho
                                                    <span><?= $product['ProductName'] ?></span>
                                                </h5>
                                                <div
                                                    class="total-reviews mt-3">
                                                    <div
                                                        class="rev-avatar">
                                                        <img
                                                            src="<?= $comment['Avatar'] ?>" alt>
                                                    </div>
                                                    <div
                                                        class="review-box">
                                                        <div
                                                            class="post-author">
                                                            <p><span><?= $comment['Username'] ?></span> - Ngày bình luận: <?= $comment['CommentDate'] ?></p>
                                                        </div>
                                                        <p><?= $comment['Content'] ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            <form action="#" class="review-form">
                                                <div
                                                    class="form-group row">
                                                    <div class="col">
                                                        <label
                                                            class="col-form-label"><span
                                                                class="text-danger">*</span>
                                                            Nội dung bình luận</label>
                                                        <textarea
                                                            class="form-control"
                                                            required></textarea>
                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <button
                                                        class="btn btn-sqr"
                                                        type="submit">Bình luận</button>
                                                </div>
                                            </form>
                                            <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm liên quan</h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div
                        class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <?php foreach ($listProductxCategory as $key => $product): ?>
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
        </div>
    </section>
    <!-- related products area end -->
</main>

<!-- offcanvas mini cart start -->
<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <div class="minicart-item-wrapper">
                    <ul>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="assets/img/cart/cart-1.jpg" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                </h3>
                                <p>
                                    <span class="cart-quantity">1 <strong>&times;</strong></span>
                                    <span class="cart-price">$100.00</span>
                                </p>
                            </div>
                            <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                        </li>
                        <li class="minicart-item">
                            <div class="minicart-thumb">
                                <a href="product-details.html">
                                    <img src="assets/img/cart/cart-2.jpg" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                </h3>
                                <p>
                                    <span class="cart-quantity">1 <strong>&times;</strong></span>
                                    <span class="cart-price">$80.00</span>
                                </p>
                            </div>
                            <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                        </li>
                    </ul>
                </div>

                <div class="minicart-pricing-box">
                    <ul>
                        <li>
                            <span>sub-total</span>
                            <span><strong>$300.00</strong></span>
                        </li>
                        <li>
                            <span>Eco Tax (-2.00)</span>
                            <span><strong>$10.00</strong></span>
                        </li>
                        <li>
                            <span>VAT (20%)</span>
                            <span><strong>$60.00</strong></span>
                        </li>
                        <li class="total">
                            <span>total</span>
                            <span><strong>$370.00</strong></span>
                        </li>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="cart.html"><i class="fa fa-shopping-cart"></i> View Cart</a>
                    <a href="cart.html"><i class="fa fa-share"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offcanvas mini cart end -->

<?php
require_once 'layout/footer.php';
?>