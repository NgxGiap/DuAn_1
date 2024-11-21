<?php

class HomeController
{
    public $modelProducts;

    public function __construct()
    {
        $this->modelProducts = new Products();
    }

    public function home()
    {
        echo "This is Home 1234";
    }
    public function trangChu()
    {
        echo "This is Home Home";
    }
    public function listProducts()
    {
        // echo "This is productsList";
        $listProducts = $this->modelProducts->getAllProducts();
        // var_dump($listProducts);
        // die();
        require_once './views/listProducts.php';
    }
}
