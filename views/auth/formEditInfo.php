<?php
require_once 'views/layout/header.php';
?>

<?php
require_once 'views/layout/menu.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tài khoản cá nhân</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content card-footer">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <img src="https://th.bing.com/th/id/OIP.9IwgOXmpwMDGFmzb6LpUoQHaHa?rs=1&pid=ImgDetMain" width="200px" class="avatar img-circle" alt="avatar">
                        <h6 class="mt-2">Tên người dùng: <?= $info['Username'] ?></h6>
                        <h6 class="mt-2">Chức vụ: <?= $info['RoleID'] ?></h6>
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <form action="<?= BASE_URL . '?act=edit-info' ?>" method="POST">
                        <hr>
                        <?php if (isset($_SESSION['successInfo'])) { ?>
                            <div class="alert alert-info alert-dismissable">
                                <a class="panel-close close" data-dismiss="alert">×</a>
                                <i class="fa fa-coffee"></i>
                                <?= $_SESSION['successInfo'] ?>
                            </div>
                        <?php } ?>
                        <h3>Thông tin cá nhân</h3>
                        <input type="hidden" name="AccountID" value="<?= $info['AccountID'] ?>">
                        <div class="form-group single-input-item">
                            <label class="col-lg-3 control-label">Tên người dùng:</label>
                            <div class="col-lg-12">
                                <input class="form-control" name="Username" type="text" value="<?= $info['Username'] ?>" placeholder="Sửa tên người dùng">
                            </div>
                        </div>
                        <div class="form-group single-input-item">
                            <label class="col-lg-3 control-label">Họ tên:</label>
                            <div class="col-lg-12">
                                <input class="form-control" name="FullName" type="text" value="<?= $info['FullName'] ?>" placeholder="Nhập họ tên">
                            </div>
                        </div>
                        <div class="form-group single-input-item">
                            <label class="col-lg-3 control-label">Số điện thoại:</label>
                            <div class="col-lg-12">
                                <input class="form-control" name="Phone" type="text" value="<?= $info['Phone'] ?>" placeholder="Thêm số điện thoại">
                            </div>
                        </div>
                        <div class="form-group single-input-item">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-12">
                                <input class="form-control" name="Email" type="text" value="<?= $info['Email'] ?>" placeholder="Thêm email">
                                <?php if (isset($_SESSION['error']['old_Email'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['old_Email'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group single-input-item col-2">
                            <div>
                                <button type="submit" class="btn btn-sqr">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a>
                            <i class="fa fa-coffee"></i>
                            <?= $_SESSION['success'] ?>
                        </div>
                    <?php } ?>
                    <h3>Đổi mật khẩu</h3>
                    <form action="<?= BASE_URL . '?act=edit-password' ?>" method="POST">
                        <div class="form-group single-input-item">
                            <label class="col-md-3 control-label">Mật khẩu cũ:</label>
                            <div class="col-md-12">
                                <input class="form-control" type="password" name="old_pass" value="">
                                <?php if (isset($_SESSION['error']['old_pass'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['old_pass'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group single-input-item">
                            <label class="col-md-3 control-label">Mật khẩu mới:</label>
                            <div class="col-md-12">
                                <input class="form-control" type="password" name="new_pass" value="">
                                <?php if (isset($_SESSION['error']['new_pass'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['new_pass'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group single-input-item">
                            <label class="col-md-3 control-label">Nhập lại mật khẩu:</label>
                            <div class="col-md-12">
                                <input class="form-control" type="password" name="confirm_pass" value="">
                                <?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['confirm_pass'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group single-input-item col-2">
                            <div>
                                <button type="submit" class="btn btn-sqr">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<!-- offcanvas mini cart start -->
<?php
require_once 'views/layout/miniCart.php';
?>
<!-- offcanvas mini cart end -->

<?php
require_once 'views/layout/footer.php';
?>