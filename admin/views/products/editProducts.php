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
                <div class="col-sm-11">
                    <h1>Chỉnh sửa sản phẩm <?= $product['ProductName'] ?></h1>
                </div>
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=list-products' ?>" class="btn btn-secondary">Hủy</a>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin sản phẩm</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="<?= BASE_URL_ADMIN . '?act=edit-products' ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body row">
                            <div class="form-group col-12">
                                <input type="hidden" name="id" id="" value="<?= $product['ProductID'] ?>">
                                <label for="ProductName">Tên sản phẩm</label>
                                <input type="text" name="ProductName" id="ProductName" class="form-control" value="<?= $product['ProductName'] ?>">
                                <?php if (isset($_SESSION['error']['ProductName'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['ProductName'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-6">
                                <label for="Price">Giá sản phẩm</label>
                                <input type="number" name="Price" id="Price" class="form-control" value="<?= $product['Price'] ?>">
                                <?php if (isset($_SESSION['error']['Price'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['Price'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-6">
                                <label for="StockQuantity">Số lượng</label>
                                <input type="number" name="StockQuantity" id="StockQuantity" class="form-control" value="<?= $product['StockQuantity'] ?>">
                                <?php if (isset($_SESSION['error']['StockQuantity'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['StockQuantity'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-12">
                                <label for="Image">Hình ảnh sản phẩm</label>
                                <input type="file" name="Image" id="Image" class="form-control">
                            </div>
                            <!-- <div class="form-group">
                            <label for="ProductName">Album sản phẩm</label>
                            <input type="text" id="inputName" class="form-control" value="<?= $product['ProductName'] ?>">
                        </div> -->
                            <div class="form-group col-3">
                                <label for="Color">Màu sắc</label>
                                <input type="text" name="Color" id="Color" class="form-control" value="<?= $product['Color'] ?>">
                                <?php if (isset($_SESSION['error']['Color'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['Color'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-3">
                                <label for="Storage">Dung lượng</label>
                                <input type="text" name="Storage" id="Storage" class="form-control" value="<?= $product['Storage'] ?>">
                                <?php if (isset($_SESSION['error']['Storage'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['Storage'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-3">
                                <label for="Size">Kích thước</label>
                                <input type="text" name="Size" id="Size" class="form-control" value="<?= $product['Size'] ?>">
                                <?php if (isset($_SESSION['error']['Size'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['Size'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-3">
                                <label for="SKU">SKU</label>
                                <input type="text" name="SKU" id="SKU" class="form-control" value="<?= $product['SKU'] ?>">
                                <?php if (isset($_SESSION['error']['SKU'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['SKU'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-12">
                                <label for="CategoryID">Danh mục sản phẩm</label>
                                <select name="CategoryID" id="CategoryID" class="form-control custom-select">
                                    <?php foreach ($listCategories as $category): ?>
                                        <option <?= $category['id'] == $product['CategoryID'] ? 'selected' : '' ?> value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php if (isset($_SESSION['error']['CategoryID'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['CategoryID'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-12">
                                <label for="Description">Mô tả</label>
                                <textarea name="Description" id="Description" class="form-control" rows="3"><?= $product['Description'] ?></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <!-- /.card -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Albums Product</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <form action="<?= BASE_URL_ADMIN . '?act=edit-album' ?>" method="POST" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table id="faqs" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>File</th>
                                            <th>
                                                <div class="text-center"><button onclick="addfaqs();" type="button" class="badge badge-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" name="ProductID" value="<?= $product['ProductID'] ?>">
                                        <input type="hidden" name="Image_Delete" id="Image_Delete">
                                        <?php

                                        // print_r($listAlbum);

                                        foreach ($listAlbum as $key => $value): ?>
                                            <tr id="faqs-row-<?= $key ?>">
                                                <input type="hidden" name="current_image_ids" id="" value="<?= $value['ID'] ?>">
                                                <td><img src="<?= BASE_URL . $value['SRC'] ?>" style="width: 50px; height:50px" alt=""></td>
                                                <td><input type="file" name="Image_Array[]" class="form-control"></td>
                                                <td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(<?= $key ?>, <?= $value['ID'] ?>)"><i class="fa fa-trash"></i> Delete</button></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>

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
    var faqs_row = <?= count($listAlbum) ?>;

    function addfaqs() {
        html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td> <img src="https://drop.ndtv.com/TECH/product_database/images/530201340318PM_635_Nokia_1280.png" style="width: 50px; height:50px" alt=""> </td>';
        html += '<td><input type="file" class="form-control" name="Image_Array[]"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }

    function removeRow(rowID, ID) {
        $('#faqs-row-' + rowID).remove();
        if (ID !== null) {
            var imgDeleteInput = document.getElementById('Image_Delete')
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + ID : ID;
        }
    }
</script>

</html>