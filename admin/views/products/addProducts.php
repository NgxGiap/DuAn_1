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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=add-products' ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="ProductName" placeholder="Nhập tên sản phẩm">
                                    <?php if (isset($error['ProductName'])) { ?>
                                        <p class="text-danger"> <?= $error['ProductName'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" class="form-control" name="Price" placeholder="Nhập giá sản phẩm">
                                    <?php if (isset($error['Price'])) { ?>
                                        <p class="text-danger"> <?= $error['Price'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" name="StockQuantity" placeholder="Nhập số lượng sản phẩm">
                                    <?php if (isset($error['StockQuantity'])) { ?>
                                        <p class="text-danger"> <?= $error['StockQuantity'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="Image">
                                    <?php if (isset($error['Image'])) { ?>
                                        <p class="text-danger"> <?= $error['Image'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Album sản phẩm</label>
                                    <input type="file" class="form-control" name="Image_Array[]" multiple>
                                </div>
                                <div class="form-group col-3">
                                    <label>Màu sắc</label>
                                    <input type="text" class="form-control" name="Color" placeholder="Nhập màu sắc">
                                    <?php if (isset($error['Color'])) { ?>
                                        <p class="text-danger"> <?= $error['Color'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-3">
                                    <label>Dung lượng</label>
                                    <input type="text" class="form-control" name="Storage" placeholder="Nhập dung lượng">
                                    <?php if (isset($error['Storage'])) { ?>
                                        <p class="text-danger"> <?= $error['Storage'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-3">
                                    <label>Size</label>
                                    <input type="text" class="form-control" name="Size" placeholder="Nhập size">
                                    <?php if (isset($error['Size'])) { ?>
                                        <p class="text-danger"> <?= $error['Size'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-3">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" name="SKU" placeholder="Nhập SKU">
                                    <?php if (isset($error['SKU'])) { ?>
                                        <p class="text-danger"> <?= $error['SKU'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-12">
                                    <label>Danh mục</label>
                                    <select name="CategoryID" id="" class="form-control" aria-label="Default select example">
                                        <option value="" hidden>Chọn danh mục</option>
                                        <?php
                                        foreach ($listCategories as $category):
                                        ?>
                                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($error['CategoryID'])) { ?>
                                        <p class="text-danger"> <?= $error['CategoryID'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-12">
                                    <label>Mô tả</label>
                                    <textarea name="Description" id="" class="form-control" placeholder="Nhập mô tả"></textarea>

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