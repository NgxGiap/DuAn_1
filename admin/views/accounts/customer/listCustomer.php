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

                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>User Name</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listCustomer as $key => $customer): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $customer['Username'] ?></td>
                                            <td><?= $customer['FullName'] ?></td>
                                            <td><?= $customer['Email'] ?></td>
                                            <td><?= $customer['Phone'] ?></td>
                                            <td><?= $customer['CreatedAt'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= BASE_URL_ADMIN . '?act=detail-customer&id_customer=' . $customer['AccountID'] ?>">
                                                        <button class="btn btn-primary">Detail</button>
                                                    </a>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=form-edit-customer&id_customer=' . $customer['AccountID'] ?>">
                                                        <button class="btn btn-warning">Edit</button>
                                                    </a>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_admin=' . $customer['AccountID'] ?>"
                                                        onclick="return confirm('Xác nhận reset password?')">
                                                        <button class="btn btn-danger">Reset</button>
                                                    </a>
                                                </div>
                                            </td>
                                        <?php endforeach ?>
                                        </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>User Name</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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