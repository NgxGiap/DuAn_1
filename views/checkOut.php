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
                                <li class="breadcrumb-item active"
                                    aria-current="page">Thanh toán</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Checkout Login Coupon Accordion Start -->
                    <div class="checkoutaccordion"
                        id="checkOutAccordion">

                        <div class="card">
                            <h6>Thêm mã giảm giá? <span
                                    data-bs-toggle="collapse"
                                    data-bs-target="#couponaccordion">Nhập mã giảm giá</span></h6>
                            <div id="couponaccordion" class="collapse"
                                data-parent="#checkOutAccordion">
                                <div class="card-body">
                                    <div class="cart-update-option">
                                        <div
                                            class="apply-coupon-wrapper">
                                            <form action="#"
                                                method="post"
                                                class=" d-block d-md-flex">
                                                <input type="text"
                                                    placeholder="Enter Your Coupon Code"
                                                    required />
                                                <button
                                                    class="btn btn-sqr">Xác nhận</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Login Coupon Accordion End -->
                </div>
            </div>
            <form action="<?= BASE_URL . '?act=post-check-out' ?>" method="POST">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Thông tin người nhận</h5>
                            <div class="billing-form-wrap">

                                <div class="single-input-item">
                                    <label for="RecipientName"
                                        class="required">Tên người nhận
                                    </label>
                                    <input type="text" name="RecipientName" value="<?= $user['FullName'] ?>" id="RecipientName"
                                        placeholder="Tên người nhận"
                                        required />
                                </div>

                                <div class="single-input-item">
                                    <label for="RecipientEmail"
                                        class="required">Email người nhận</label>
                                    <input type="email" name="RecipientEmail" value="<?= $user['Email'] ?>" id="RecipientEmail"
                                        placeholder="Email người nhận"
                                        required />
                                </div>

                                <div class="single-input-item">
                                    <label for="RecipientPhone">Số điện thoại người nhận</label>
                                    <input type="text" name="RecipientPhone" value="<?= $user['Phone'] ?>" id="RecipientPhone"
                                        placeholder="Số điện thoại người nhận" />
                                </div>

                                <div class="single-input-item">
                                    <label for="RecipientAddress">Địa chỉ người nhận</label>
                                    <input type="text" name="RecipientAddress" value="<?= $user['Address'] ?>" id="RecipientAddress"
                                        placeholder="Địa chỉ người nhận" />
                                </div>

                                <div class="single-input-item">
                                    <label for="Note">Ghi chú</label>
                                    <textarea name="Note"
                                        id="Note" cols="30"
                                        rows="3"
                                        placeholder="Ghi chú về đơn hàng "><?= $user['Note'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Thông tin sản phẩm</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div
                                    class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $totalCart = 0;
                                            foreach ($cartdetail as $key => $product):
                                            ?>
                                                <tr>
                                                    <td><a href="#"><?= $product['ProductName'] ?>
                                                            <strong> × <?= $product['Quantity'] ?></strong></a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $totals = 0;
                                                        $totals = $product['Price'] * $product['Quantity'];
                                                        $totalCart += $totals;
                                                        echo formatPrice($totals) . ' đ';
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Thành tiền</td>
                                                <td><strong><?php echo formatPrice($totalCart) . ' đ'; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td
                                                    class="d-flex justify-content-center">
                                                    <strong>30.000 đ</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tổng tiền</td>
                                                <input type="hidden" name="TotalAmount" value="<?php echo formatPrice($totalCart + 30000) . ' đ'; ?>">
                                                <td><strong><?php echo formatPrice($totalCart + 30000) . ' đ'; ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div
                                                class="custom-control custom-radio">
                                                <input type="radio"
                                                    id="cashon"
                                                    name="paymentmethod"
                                                    value=1
                                                    class="custom-control-input"
                                                    checked />
                                                <label
                                                    class="custom-control-label"
                                                    for="cashon">Thanh toán khi nhận hàng</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details"
                                            data-method=1>
                                            <p>Khách hàng có thể thanh toán khi nhận hàng thành công (Cần xác nhận đơn hàng).</p>
                                        </div>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div
                                                class="custom-control custom-radio">
                                                <input type="radio"
                                                    id="directbank"
                                                    name="paymentmethod"
                                                    value=2
                                                    class="custom-control-input" />
                                                <label
                                                    class="custom-control-label"
                                                    for="directbank">Thanh toán Online</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details"
                                            data-method=2>
                                            <p>Chuyển khoản thông qua QR Code</p>
                                            <div class="d-flex justify-content-center">
                                                <img src="assets/img/QRCode.png" alt="" width="100px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">
                                        <div
                                            class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox"
                                                class="custom-control-input"
                                                id="terms" required />
                                            <label
                                                class="custom-control-label"
                                                for="terms">Đồng ý với các điều khoản của cửa hàng</label>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-sqr">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout main wrapper end -->
</main>


<?php
require_once 'layout/footer.php';
?>