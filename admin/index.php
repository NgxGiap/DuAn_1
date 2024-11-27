<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminCategoriesController.php';
require_once './controllers/AdminProductsController.php';
require_once './controllers/AdminOrdersController.php';
require_once './controllers/AdminReportsController.php';
require_once './controllers/AdminAccountsController.php';
// Require toàn bộ file Models
require_once './models/AdminCategories.php';
require_once './models/AdminProducts.php';
require_once './models/AdminOrders.php';
require_once './models/AdminAccounts.php';
// Route
$act = $_GET['act'] ?? '/';

if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin') {
    checkLoginAdmin();
}


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Router reports - home
    '/' => (new AdminReportsController())->home(),

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

    // Router comments
    'update-status-comments' => (new AdminProductsController())->updateStatusComments(),

    // Router orders
    'list-orders' => (new AdminOrdersController())->listOrders(),
    'form-edit-orders' => (new AdminOrdersController())->formEditOrders(),
    'edit-orders' => (new AdminOrdersController())->postEditOrders(),
    // 'delete-orders' => (new AdminOrdersController())->deleteOrders(),
    'detail-orders' => (new AdminOrdersController())->detailOrders(),

    // Router accounts
    // Accounts admin
    'list-admin' => (new AdminAccountsController())->listAccountsAdmin(),
    'form-add-admin' => (new AdminAccountsController())->formAddAdmin(),
    'add-admin' => (new AdminAccountsController())->postAddAdmin(),
    'form-edit-admin' => (new AdminAccountsController())->formEditAdmin(),
    'edit-admin' => (new AdminAccountsController())->postEditAdmin(),

    'reset-password' => (new AdminAccountsController())->resetPassword(),

    // Customers
    'list-customer' => (new AdminAccountsController())->listAccountsCustomer(),
    'form-edit-customer' => (new AdminAccountsController())->formEditCustomer(),
    'edit-customer' => (new AdminAccountsController())->postEditCustomer(),
    'detail-customer' => (new AdminAccountsController())->detailCustomer(),

    // Router info admin
    'form-edit-info-admin' => (new AdminAccountsController())->formEditInfoAdmin(),
    'edit-info-admin' => (new AdminAccountsController())->postEditInfoAdmin(),
    'edit-password-admin' => (new AdminAccountsController())->postEditPasswordAdmin(),

    // Router auth
    'login-admin' => (new AdminAccountsController())->formLogin(),
    'check-login-admin' => (new AdminAccountsController())->login(),
    'logout-admin' => (new AdminAccountsController())->logout(),
};
