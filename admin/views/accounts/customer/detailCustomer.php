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
                    <h1>Quản lý tài khoản Customer</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Họ tên</th>
                                <td><?= $Customer['FullName'] ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?= $Customer['Username'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $Customer['Email'] ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?= $Customer['Phone'] ?></td>
                            </tr>
                            <tr>
                                <th>Ngày tạo</th>
                                <td><?= $Customer['CreatedAt'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <div>
                <h2>Lịch sử mua hàng</h2>
                <table class="table">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Tên người nhận</th>
                                <th>Số điện thoại</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listOrders as $key => $order): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $order['OrderCode'] ?></td>
                                    <td><?= $order['RecipientName'] ?></td>
                                    <td><?= $order['RecipientPhone'] ?></td>
                                    <td><?= $order['OrderDate'] ?></td>
                                    <td><?= $order['TotalAmount'] ?></td>
                                    <td><?= $order['StatusName'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= BASE_URL_ADMIN . '?act=detail-orders&id=' . $product['ProductID'] ?>">
                                                <button class="btn btn-primary">View</button>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=form-edit-orders&id=' . $product['ProductID'] ?>">
                                                <button class="btn btn-warning">Edit</button>
                                            </a>
                                        </div>
                                    </td>
                                <?php endforeach ?>
                                </tr>
                        </tbody>
                    </table>
                </table>
            </div>
            <hr>
            <div>
                <h2>Lịch sử bình luận</h2>
                <table class="table">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Người dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listComments as $key => $comment): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><a href="<?= BASE_URL_ADMIN . '?act=detail-products&id=' . $comment['ProductID'] ?>"><?= $comment['ProductName'] ?></a></td>
                                    <td><?= $comment['Username'] ?></td>
                                    <td><?= $comment['Content'] ?></td>
                                    <td><?= $comment['CommentDate'] ?></td>
                                    <td><?= $comment['Status'] ?></td>
                                    <td>
                                        <form action="<?= BASE_URL_ADMIN . '?act=update-status-comments' ?>" method="POST">
                                            <input type="hidden" name="CommentID" value="<?= $comment['CommentID'] ?>">
                                            <input type="hidden" name="name_view" value="detail_customer">
                                            <button class="btn btn-warning" onclick="return confirm('Xác nhận ẩn?')">
                                                <?= $comment['Status'] == 'hide' ? 'approved' : 'hide' ?>
                                            </button>
                                        </form>
                                    </td>
                                <?php endforeach ?>
                                </tr>
                        </tbody>
                    </table>
                </table>
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
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            // "paging": true,
            // "lengthChange": false,
            // "searching": false,
            // "ordering": true,
            // "info": true,
            // "autoWidth": false,
            // "responsive": true,

            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>

</html>