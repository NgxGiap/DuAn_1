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

// Route
$act = $_GET['act'] ?? '/';
// var_dump($_GET['act']);
// die();

// if($_GET['act']){
//     $act = $_GET['act'];
// }else{
//     $act = '/';
// }

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

    // Build

    'minicart' => (new HomeController())->minicart(),
};
