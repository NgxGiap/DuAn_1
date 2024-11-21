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
                    <h1>Quản lý danh sách sản phẩm</h1>
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
                            <a href="<?= BASE_URL_ADMIN . '?act=form-add-products' ?>">
                                <button class="btn btn-success">Add Product</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Stock Quantity</th>
                                        <th>Color</th>
                                        <th>Storage</th>
                                        <th>SKU</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listProducts as $key => $product): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $product['ProductName'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $product['Image'] ?>" alt="" width="100px" onerror="this.onerror=null; this.src='https://drop.ndtv.com/TECH/product_database/images/530201340318PM_635_Nokia_1280.png'">
                                            </td>
                                            <td><?= $product['Price'] ?></td>
                                            <td><?= $product['StockQuantity'] ?></td>
                                            <td><?= $product['Color'] ?></td>
                                            <td><?= $product['Storage'] ?></td>
                                            <td><?= $product['SKU'] ?></td>
                                            <td><?= $product['name'] ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=form-edit-products&id=' . $product['ProductID'] ?>">
                                                    <button class="btn btn-warning">Edit</button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=delete-products&id=' . $product['ProductID'] ?>"
                                                    onclick="return confirm('Xác nhận xóa?')">
                                                    <button class="btn btn-danger">Del</button>
                                                </a>
                                            </td>
                                        <?php endforeach ?>
                                        </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Stock Quantity</th>
                                        <th>Color</th>
                                        <th>Storage</th>
                                        <th>SKU</th>
                                        <th>Category</th>
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