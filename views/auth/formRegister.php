<?php
require_once 'views/layout/header.php';
?>

<?php
require_once 'views/layout/menu.php';
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
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- login register wrapper start -->
    <div class="login-register-wrapper section-padding">
        <div class="container" style="max-width: 40vw;">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
                    <div class="col-lg-12">
                        <div class="login-reg-form-wrap">
                            <h5 class="text-center">Đăng ký</h5>
                            <?php if (isset($_SESSION['error'])) { ?>
                                <p class="text-danger login-box-msg text-center"> <?= $_SESSION['error'] ?></p>
                            <?php } else { ?>
                                <p class="login-box-msg text-center">Vui lòng nhập thông tin</p>
                            <?php } ?>
                            <form action="<?= BASE_URL . '?act=check-register' ?>" method="post">
                                <div class="single-input-item">
                                    <input type="text" placeholder="Tên người dùng" name="Username" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="email" placeholder="Nhập Email" name="Email" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="password" placeholder="Nhập mật khẩu" name="PasswordHash" required />
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <a href="<?= BASE_URL . '?act=login' ?>" class="forget-pwd">Đã có tài khoản?</a>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button class="btn btn-sqr">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Content End -->

                </div>
            </div>
        </div>
    </div>
    <!-- login register wrapper end -->
</main>

<!-- offcanvas mini cart start -->
<?php
require_once 'views/layout/miniCart.php';
?>
<!-- offcanvas mini cart end -->

<?php
require_once 'views/layout/footer.php';
?>