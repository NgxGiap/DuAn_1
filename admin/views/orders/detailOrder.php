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
                <div class="col-sm-10">
                    <h1>Quản lý danh sách đơn hàng - Đơn hàng: <?= $orders['OrderCode'] ?></h1>
                </div>
                <div class="col-sm-2 mt-2">
                    <form action="" method="POST">
                        <select name="" id="">
                            <?php foreach ($listStatusOrder as $key => $status): ?>
                                <option
                                    <?= $status['ID'] == $orders['order_status_id'] ? 'selected' : '' ?>
                                    <?= $status['ID'] < $orders['order_status_id'] ? 'disabled' : '' ?>
                                    value="<?= $status['ID'] ?>"><?= $status['StatusName'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php
                    if ($orders['order_status_id'] == 1) {
                        $colorAlert = 'warning';
                    } elseif ($orders['order_status_id'] >= 2 && $orders['order_status_id'] <= 7) {
                        $colorAlert = 'primary';
                    } elseif ($orders['order_status_id'] == 10) {
                        $colorAlert = 'success';
                    } else {
                        $colorAlert = 'danger';
                    }
                    ?>
                    <div class="alert alert-<?= $colorAlert ?>" role="alert">
                        Đơn hàng: <?= $orders['StatusName'] ?>
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="nav-icon fab fa-product-hunt"></i> High Tech - NVG.
                                    <small class="float-right">Date: <?= $orders['OrderDate'] ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Thông tin người đặt
                                <address>
                                    <strong><?= $orders['FullName'] ?></strong><br>
                                    Email: <?= $orders['Email'] ?><br>
                                    Phone: <?= $orders['Phone'] ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Nguời nhận
                                <address>
                                    <strong><?= $orders['RecipientName'] ?></strong><br>
                                    Email: <?= $orders['RecipientEmail'] ?><br>
                                    Phone: <?= $orders['RecipientPhone'] ?><br>
                                    Address: <?= $orders['RecipientAddress'] ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Thông tin đơn hàng
                                <address>
                                    <strong>Mã đơn hàng: <?= $orders['OrderCode'] ?></strong><br>
                                    Tổng tiền: <?= $orders['TotalPrice'] ?><br>
                                    Note: <?= $orders['Note'] ?><br>
                                    Phương thức thanh toán: <?= $orders['Name'] ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tong = 0; ?>
                                        <?php foreach ($productOrder as $key => $product): ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $product['ProductName'] ?></td>
                                                <td><?= $product['PriceAtOrder'] ?></td>
                                                <td><?= $product['Quantity'] ?></td>
                                                <td><?= $product['TotalPrice'] ?></td>
                                            </tr>
                                            <?php $tong += ($product['PriceAtOrder'] * $product['Quantity']) ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Ngày đặt hàng: <?= $orders['OrderDate'] ?></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Thành tiền:</th>
                                            <td>
                                                <?= $tong ?>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <th>Vận chuyển:</th>
                                            <td>200000</td>
                                        </tr> -->
                                        <tr>
                                            <th>Tổng:</th>
                                            <td>
                                                <?= $tong ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->

                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php' ?>
<!-- End footer -->

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Code injected by live-server -->

</body>

</html>