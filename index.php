<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/products.php';
require_once './models/accounts.php';
require_once './models/carts.php';
require_once './models/orders.php';
require_once './models/comments.php';

// Route
$act = $_GET['act'] ?? '/';
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController())->home(),

    'detail-product' => (new HomeController())->detailProduct(),
    'add-to-cart' => (new HomeController())->addToCart(),
    'cart' => (new HomeController())->cart(),
    'check-out' => (new HomeController())->checkOut(),
    'post-check-out' => (new HomeController())->postCheckOut(),

    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),


    'register' => (new HomeController())->formRegister(),
    'check-register' => (new HomeController())->postRegister(),

    'logout' => (new HomeController())->logout(),

    'forgot' => (new HomeController())->formForgotPassword(),
    'resetPassword' => (new HomeController())->resetPassword(),

    // Router info
    'form-edit-info' => (new HomeController())->formEditInfo(),
    'edit-info' => (new HomeController())->postEditInfo(),
    'edit-password' => (new HomeController())->postEditPassword(),

    'list-products' => (new HomeController())->listProducts(),
    'search-products' => (new HomeController())->searchProducts(),

    'contact-us' => (new HomeController())->contactUs(),
    'introduce' => (new HomeController())->introduce(),

    'add-comment' => (new HomeController())->addComment(),

    // Cart functionalities
    // 'removeFromCart' => (new HomeController())->removeFromCart(), // Xóa sản phẩm khỏi giỏ hàng
    'updateCart' => (new HomeController())->updateCart(),         // Cập nhật số lượng trong giỏ hàng
};
