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
                    <h1>Quản lý bình luận sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <table class="table">
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
                                        <td><a href="<?= BASE_URL_ADMIN . '?act=detail-customer&id_customer=' . $comment['AccountID'] ?>">
                                                <?= $comment['Username'] ?>
                                            </a>
                                        </td>
                                        <td><?= $comment['Content'] ?></td>
                                        <td><?= $comment['CommentDate'] ?></td>
                                        <td><?= $comment['Status'] ?></td>
                                        <td>
                                            <form action="<?= BASE_URL_ADMIN . '?act=update-status-comments' ?>" method="POST">
                                                <input type="hidden" name="CommentID" value="<?= $comment['CommentID'] ?>">
                                                <input type="hidden" name="name_view" value="list_comments">
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
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

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
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>

</html>