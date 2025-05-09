<!-- Start Header Area -->
<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">

        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">

                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="<?= BASE_URL ?>">
                                <img src="assets/img/logo/logo.png" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->

                    <!-- main menu area start -->
                    <div class="col-lg-4 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        <li><a href="<?= BASE_URL ?>">Trang chủ</a>

                                        </li>

                                        <li><a href="<?= BASE_URL . '?act=list-products' ?> ">Sản phẩm <i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <?php
                                                $listProductxCategory =  (new HomeController())->listCategories();
                                                // var_dump($listProductxCategory);
                                                // die();
                                                foreach ($listProductxCategory as $category):
                                                ?>
                                                    <li><a href="<?= BASE_URL . '?act=list-products&category=' . urlencode($category['name']) ?>"><?= $category['name'] ?></a></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </li>
                                        <li><a href="?act=introduce">Giới thiệu</a></li>
                                        <li><a href="?act=contact-us">Liên hệ</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->

                    <!-- mini cart area start -->
                    <div class="col-lg-6">
                        <div
                            class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                            <div class="header-search-container">
                                <button class="search-trigger d-xl-none d-lg-block"><i
                                        class="pe-7s-search"></i></button>
                                <form action="<?= BASE_URL ?>" method="GET" class="header-search-box">
                                    <input type="hidden" name="act" value="search-products">
                                    <input type="text" name="search" placeholder="Nhập tên sản phẩm cần tìm..." class="header-search-field input-grow">
                                    <button type="submit" class="header-search-btn"><i class="pe-7s-search"></i></button>
                                </form>

                            </div>
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <label for="">
                                        <?php if (isset($_SESSION['user_client'])) {
                                            echo $_SESSION['user_client'];
                                        }  ?>
                                    </label>
                                    <li class="user-hover">
                                        <a href="#">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                            <?php if (!isset($_SESSION['user_client'])) { ?>
                                                <li><a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a></li>
                                                <li><a href="<?= BASE_URL . '?act=register' ?>">Đăng ký</a></li>
                                                <li><a href="<?= BASE_URL_ADMIN . '?act=login-admin' ?>">Đăng nhập Admin</a></li>
                                            <?php } else { ?>
                                                <li><a href="<?= BASE_URL . '?act=form-edit-info' ?>">Tài khoản</a></li>
                                                <li><a href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="minicart-btn">
                                            <i class="pe-7s-shopbag"></i>
                                            <div class="notification">
                                                <?php
                                                $Quantity = 0;
                                                $cartdetailxyz =  (new HomeController())->minicart();
                                                foreach ($cartdetailxyz as $key => $product):
                                                ?>
                                                    <?php
                                                    $Quantity += $product['Quantity'];
                                                    ?>
                                                <?php endforeach ?>
                                                <?php echo $Quantity; ?>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mini cart area end -->

                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->

</header>
<!-- end Header Area -->