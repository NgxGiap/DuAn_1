<?php

class HomeController
{
    public $modelProducts;
    public $modelAccounts;

    public function __construct()
    {
        $this->modelProducts = new Products();
        $this->modelAccounts = new Accounts();
    }

    public function home()
    {
        $listProducts = $this->modelProducts->getAllProducts();
        require_once './views/home.php';
    }
    public function trangChu()
    {
        echo "This is Home Home";
    }

    public function detailProduct()
    {
        $id = $_GET['id'];
        $product = $this->modelProducts->getDetailProduct($id);
        $listAlbum = $this->modelProducts->getListAlbum($id);
        $listComments = $this->modelProducts->getCommentFromProduct($id);

        $listProductxCategory = $this->modelProducts->getListProductCategory($product['CategoryID']);
        // var_dump($listProductxCategory);
        // die();
        if ($product) {
            require_once './views/detailProducts.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';

        deleteSessionError();
    }

    public function postlogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Email = $_POST['Email'];
            $PasswordHash = $_POST['PasswordHash'];
            // var_dump($PasswordHash);
            // die();

            $user = $this->modelAccounts->checkLogin($Email, $PasswordHash);
            // var_dump($user);
            // die();
            if ($user == $Email) {
                $_SESSION['user_client'] = $user;
                header("Location:" . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);
                // die();
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    // public function logout()
    // {
    //     if (isset($_SESSION['user_admin'])) {
    //         unset($_SESSION['user_admin']);
    //         header("Location:" . BASE_URL_ADMIN . '?act=login-admin');
    //     }
    // }
}
