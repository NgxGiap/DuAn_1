<!-- offcanvas mini cart start -->
<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <?php
                $cartdetail =  (new HomeController())->minicart();
                $totalCart = 0;
                foreach ($cartdetail as $key => $product):
                ?>
                    <div class="minicart-item-wrapper">
                        <ul>
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>">
                                        <img src="<?= $product['Image'] ?>" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="<?= BASE_URL . '?act=detail-product&id=' . $product['ProductID'] ?>"><?= $product['ProductName'] ?></a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity"><?= $product['Quantity'] ?><strong>&times;</strong></span>
                                        <span class="cart-price"><?= formatPrice($product['Price']) . 'đ' ?></span>
                                    </p>
                                </div>
                                <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-pricing-box">
                        <ul>
                            <li>
                                <span>Thành tiền</span>
                                <span>
                                    <?php
                                    $totalCart = 0;
                                    $totals = 0;
                                    $totals = $product['Price'] * $product['Quantity'];
                                    $totalCart += $totals;
                                    echo formatPrice($totals) . ' đ';
                                    ?>
                                </span>
                            </li>
                            <li>
                                <span>Vận chuyển</span>
                                <span><strong>Miễn phí ship toàn quốc</strong></span>
                            </li>
                            <!-- <li>
                                <span>VAT (20%)</span>
                                <span><strong>$60.00</strong></span>
                            </li> -->
                            <li class="total">
                                <span>Tổng tiền</span>
                                <span><strong><?php echo formatPrice($totalCart) . ' đ'; ?></strong></span>
                            </li>
                        </ul>
                    </div>
                <?php endforeach ?>

                <div class="minicart-button">
                    <a href="<?= BASE_URL . '?act=cart' ?>"><i class="fa fa-shopping-cart"></i>Xem giỏ hàng</a>
                    <a href="<?= BASE_URL . '?act=check-out' ?>"><i class="fa fa-share"></i> Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offcanvas mini cart end -->