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
                                    aria-current="page">Giỏ hàng</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <form method="POST" action="<?= BASE_URL . '?act=updateCart' ?>" id="cart-form">
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                            <th class="pro-title">Tên sản phẩm</th>
                                            <th class="pro-price">Giá</th>
                                            <th class="pro-quantity">Số lượng</th>
                                            <th class="pro-subtotal">Thành tiền</th>
                                            <th class="pro-remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalCart = 0;
                                        foreach ($cartdetailabc as $key => $product):
                                        ?>
                                            <tr>
                                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                            src="<?= BASE_URL . $product['Image'] ?>" alt="Product"></a></td>
                                                <td class="pro-title"><a href="#"><?= $product['ProductName'] ?></a></td>
                                                <td class="pro-price"><span><?= formatPrice($product['Price']) . ' đ' ?></span></td>
                                                <td class="pro-quantity">
                                                    <input type="hidden" name="product_ids[]" value="<?= $product['ProductID'] ?>">
                                                    <div class="pro-qty">
                                                        <input type="text" name="quantities[]" value="<?= $product['Quantity'] ?>" min="1" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="pro-subtotal">
                                                    <span>
                                                        <?php
                                                        $totals = $product['Price'] * $product['Quantity'];
                                                        $totalCart += $totals;
                                                        echo formatPrice($totals) . ' đ';
                                                        ?>
                                                    </span>
                                                </td>
                                                <td class="pro-remove">
                                                    <button type="button" class="btn btn-danger" onclick="return confirmAndRemoveFromCart(event, this)" data-product-id="<?= $product['ProductID'] ?>">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div>
                                    <!-- <form action="#" method="post" class="d-block d-md-flex">
                                        <input class="col-8" type="hidden" placeholder="Nhập mã giảm giá">
                                        <button class="btn btn-sqr">Áp dụng</button>
                                    </form> -->
                                </div>
                                <div class="cart-update">
                                    <button type="submit" class="btn btn-sqr">Cập nhật đơn hàng</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Hóa đơn</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Thành tiền</td>
                                            <td><?php echo formatPrice($totalCart) . ' đ'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Miễn phí ship toàn quốc</td>
                                            <td></td>
                                        </tr>
                                        <tr class="total">
                                            <td>Tổng tiền</td>
                                            <td
                                                class="total-amount"><?php echo formatPrice($totalCart) . ' đ'; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="<?= BASE_URL . '?act=check-out' ?>"
                                class="btn btn-sqr d-block">Tiến hành thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
</main>

<script>
    function confirmAndRemoveFromCart(event, button) {
        // Hiển thị xác nhận
        const isConfirmed = confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
        if (!isConfirmed) {
            return false; // Người dùng hủy bỏ
        }

        // Nếu người dùng xác nhận, gọi hàm removeFromCart
        removeFromCart(event, button);
        return false; // Ngăn chặn hành vi mặc định
    }

    function removeFromCart(event, button) {
        event.preventDefault(); // Ngăn việc form chính submit ngay lập tức

        // Lấy ID sản phẩm cần xóa
        const productId = button.getAttribute('data-product-id');

        // Tạo input ẩn để truyền dữ liệu xóa sản phẩm vào form
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'remove_ids[]';
        hiddenInput.value = productId;

        // Thêm input ẩn vào form chính
        const cartForm = document.getElementById('cart-form');
        cartForm.appendChild(hiddenInput);

        // Submit form
        cartForm.submit();
    }
</script>

<?php
require_once 'layout/footer.php';
?>