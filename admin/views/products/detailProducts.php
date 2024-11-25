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

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img style="width: 400px; height:auto" src="<?= BASE_URL . $product['Image'] ?>" class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <?php foreach ($listAlbum as $key => $Image): ?>
                                <!-- <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div> -->
                                <div class="product-image-thumb <?= $Image[$key] == 0 ? 'active' : '' ?>"><img src="<?= BASE_URL . $Image['SRC'] ?>" alt="Product Image"></div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Tên sản phẩm: <?= $product['ProductName'] ?></h3>
                        <!-- <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p> -->
                        <hr>
                        <h4 class="mt-3">Price: <small><?= $product['Price'] ?></small></h4>
                        <h4 class="mt-3">StockQuantity: <small><?= $product['StockQuantity'] ?></small></h4>
                        <h4 class="mt-3">Color: <small><?= $product['Color'] ?></small></h4>
                        <h4 class="mt-3">Storage: <small><?= $product['Storage'] ?></small></h4>
                        <h4 class="mt-3">Size: <small><?= $product['Size'] ?></small></h4>
                        <h4 class="mt-3">Category: <small><?= $product['name'] ?></small></h4>
                        <h4 class="mt-3">SKU: <small><?= $product['SKU'] ?></small></h4>
                        <h4 class="mt-3">Mô tả: <small><?= $product['Description'] ?></small></h4>



                        <!-- <h4>Available Colors</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center active">
                                <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                                Green
                                <br>
                                <i class="fas fa-circle fa-2x text-green"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                                Blue
                                <br>
                                <i class="fas fa-circle fa-2x text-blue"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                                Purple
                                <br>
                                <i class="fas fa-circle fa-2x text-purple"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                                Red
                                <br>
                                <i class="fas fa-circle fa-2x text-red"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                                Orange
                                <br>
                                <i class="fas fa-circle fa-2x text-orange"></i>
                            </label>
                        </div> -->

                        <!-- <h4 class="mt-3">Size <small>Please select one</small></h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                <span class="text-xl">S</span>
                                <br>
                                Small
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                                <span class="text-xl">M</span>
                                <br>
                                Medium
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                                <span class="text-xl">L</span>
                                <br>
                                Large
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                                <span class="text-xl">XL</span>
                                <br>
                                Xtra-Large
                            </label>
                        </div> -->
                        <!-- Price
                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                $80.00
                            </h2>
                            <h4 class="mt-0">
                                <small>Ex Tax: $80.00 </small>
                            </h4>
                        </div> -->
                        <!-- Add to cart 
                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Add to Cart
                            </div>

                            <div class="btn btn-default btn-lg btn-flat">
                                <i class="fas fa-heart fa-lg mr-2"></i>
                                Add to Wishlist
                            </div>
                        </div> -->

                        <div class="mt-4 product-share">
                            <a href="#" class="text-gray">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-envelope-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-rss-square fa-2x"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <h2>Bình luận sản phẩm</h2>
                <table class="table">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
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
                                            <input type="hidden" name="name_view" value="detail_product">
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