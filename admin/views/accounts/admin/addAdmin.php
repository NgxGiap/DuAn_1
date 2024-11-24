<!-- Header -->
<?php include './views/layout/header.php' ?>
<!-- End header -->

<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<!-- Sidebar -->
<?php include './views/layout/sidebar.php' ?>
<!-- /.sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tài khoản Admin</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=add-admin' ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group col-12">
                                    <label>Tên đăng nhập</label>
                                    <input type="text" class="form-control" name="Username" placeholder="Nhập tên đăng nhập">
                                    <?php if (isset($_SESSION['error']['Username'])) { ?>
                                        <p class="text-danger"> <?= $_SESSION['error']['Username'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="Email" placeholder="Nhập email">
                                    <?php if (isset($_SESSION['error']['Email'])) { ?>
                                        <p class="text-danger"> <?= $_SESSION['error']['Email'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-12">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control" name="FullName" placeholder="Nhập họ tên">
                                    <?php if (isset($_SESSION['error']['FullName'])) { ?>
                                        <p class="text-danger"> <?= $_SESSION['error']['FullName'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php' ?>
<!-- End footer -->


<!-- Code injected by live-server -->

</body>

</html>