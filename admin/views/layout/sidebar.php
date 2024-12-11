<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= BASE_URL_ADMIN ?>" class="brand-link">
        <img src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">High Tech</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://th.bing.com/th/id/OIP.9IwgOXmpwMDGFmzb6LpUoQHaHa?rs=1&pid=ImgDetMain" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= BASE_URL_ADMIN . '?act=form-edit-info-admin' ?>" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Trang chủ
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=list-categories' ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh mục sản phẩm
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=list-products' ?>" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Sản phẩm
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=list-orders' ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Đơn hàng
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=list-comments' ?>" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Bình luận
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Quản lý tài khoản</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=list-admin' ?>" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>Tài khoản quản trị</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=list-customer' ?>" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>Tài khoản khách hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-edit-info-admin' ?>" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>Tài khoản cá nhân</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>