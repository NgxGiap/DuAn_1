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
                        <h2 class="title">Kết quả tìm kiếm cho từ khóa</h2>
                        <p class="sub-title"><?= htmlspecialchars($_GET['search'] ?? '') ?></p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- product item start -->

                    <?php if (!empty($products)): ?>
                        <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                            <div class="product-list">
                                <?php foreach ($products as $product): ?>
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
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <p>Không tìm thấy sản phẩm nào phù hợp.</p>
                    <?php endif; ?>

                    <!-- product item end -->
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