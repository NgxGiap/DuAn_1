<?php
require_once 'layout/header.php';
?>

<?php
require_once 'layout/menu.php';
?>

<main>

    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Tất cả sản phẩm</h2>
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
                        <!-- product item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php
require_once 'layout/miniCart.php';
?>

<?php
require_once 'layout/footer.php';
?>