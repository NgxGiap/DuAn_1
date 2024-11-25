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
                    <h1>Quản lý thông tin đơn hàng</h1>
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
                            <h3 class="card-title">Sửa thông tin đơn hàng: <?= $orders['OrderCode'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=edit-orders' ?>" method="POST">
                            <input type="text" name="id_order" id="" value="<?= $orders['OrderID'] ?>" hidden>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên người nhận</label>
                                    <input type="text" class="form-control" name="RecipientName" value="<?= $orders['RecipientName'] ?>" placeholder="Nhập tên người nhận">
                                    <?php if (isset($error['RecipientName'])) { ?>
                                        <p class="text-danger"> <?= $error['RecipientName'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Tên người nhận</label>
                                    <input type="text" class="form-control" name="RecipientEmail" value="<?= $orders['RecipientEmail'] ?>" placeholder="Nhập email người nhận">
                                    <?php if (isset($error['RecipientEmail'])) { ?>
                                        <p class="text-danger"> <?= $error['RecipientEmail'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại người nhận</label>
                                    <input type="text" class="form-control" name="RecipientPhone" value="<?= $orders['RecipientPhone'] ?>" placeholder="Nhập số điện thoại người nhận">
                                    <?php if (isset($error['RecipientPhone'])) { ?>
                                        <p class="text-danger"> <?= $error['RecipientPhone'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ người nhận</label>
                                    <input type="text" class="form-control" name="RecipientAddress" value="<?= $orders['RecipientAddress'] ?>" placeholder="Nhập địa chỉ người nhận">
                                    <?php if (isset($error['RecipientAddress'])) { ?>
                                        <p class="text-danger"> <?= $error['RecipientAddress'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea name="Note" id="" class="form-control" placeholder="Nhập note"><?= $orders['Note'] ?></textarea>
                                </div>
                                <hr>
                                <div class="form-group col-12">
                                    <label for="order_status_id">Trạng thái đơn hàng</label>
                                    <select name="order_status_id" id="order_status_id" class="form-control custom-select">
                                        <?php foreach ($listStatusOrder as $status): ?>
                                            <option
                                                <?php
                                                if (
                                                    $status['ID'] < $orders['order_status_id'] ||
                                                    $orders['order_status_id'] == 8 ||
                                                    $orders['order_status_id'] == 9 ||
                                                    $orders['order_status_id'] == 10
                                                ) {
                                                    echo 'disabled';
                                                }
                                                ?>
                                                <?= $status['ID'] == $orders['order_status_id'] ? 'selected' : '' ?>
                                                value="<?= $status['ID']; ?>">
                                                <?= $status['StatusName']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($_SESSION['error']['order_status_id'])) { ?>
                                        <p class="text-danger"> <?= $_SESSION['error']['order_status_id'] ?></p>
                                    <?php } ?>
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