<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminCategoriesController.php';
require_once './controllers/AdminProductsController.php';

// Require toàn bộ file Models
require_once './models/AdminCategories.php';
require_once './models/AdminProducts.php';
// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Router categories
    'list-categories' => (new AdminCategoriesController())->listCategories(),
    'form-add-categories' => (new AdminCategoriesController())->formAddCategories(),
    'add-categories' => (new AdminCategoriesController())->postAddCategories(),
    'form-edit-categories' => (new AdminCategoriesController())->formEditCategories(),
    'edit-categories' => (new AdminCategoriesController())->postEditCategories(),
    'delete-categories' => (new AdminCategoriesController())->deleteCategories(),

    // Router products
    'list-products' => (new AdminProductsController())->listProducts(),
    'form-add-products' => (new AdminProductsController())->formAddProducts(),
    'add-products' => (new AdminProductsController())->postAddProducts(),
    'form-edit-products' => (new AdminProductsController())->formEditProducts(),
    'edit-products' => (new AdminProductsController())->postEditProducts(),
    'edit-album' => (new AdminProductsController())->postEditAlbum(),
    'delete-products' => (new AdminProductsController())->deleteProducts(),
    'detail-products' => (new AdminProductsController())->detailProducts(),
};
