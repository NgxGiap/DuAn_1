<?php

class HomeController
{
    public $modelProducts;
    public $modelAccounts;
    public $modelCart;

    public function __construct()
    {
        $this->modelProducts = new Products();
        $this->modelAccounts = new Accounts();
        $this->modelCart = new Carts();
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

    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelAccounts->getAccountFromEmail($_SESSION['user_client']);

                $cart = $this->modelCart->getCartFromID($mail['AccountID']);

                // var_dump($cart);
                // die;
                if (!$cart) {
                    $cartID = $this->modelCart->addCart($mail['AccountID']);
                    $cart = ['CartID' => $cartID];

                    $cartdetail = $this->modelCart->getCartDetail($cart['CartID']);
                } else {
                    $cartdetail = $this->modelCart->getCartDetail($cart['CartID']);
                    // var_dump($cartdetail);
                    // die();
                }

                $ProductID = intval($_POST['ProductID']);
                $Quantity = intval($_POST['Quantity']);
                // đến đây là có cartID, có product id, có số lượng
                //kiểm tra sp có trong gio hàng chưa:  select * from cartdetails where catid = ... and productid = ... 
                //nếu rỗng thì là chưa có sp trong giỏ hàng ==> chạy lệnh insert
                // nếu không rỗng thì là đã có ==> chạy lệnh update  

                // var_dump($ProductID);
                // var_dump($Quantity);



                // var_dump($Quantity);
                // die();
                $checkCart = false;
                foreach ($cartdetail as $detail) {
                    if ($detail['ProductID'] == $ProductID) {
                        $newQuantity = $detail['Quantity'] + $Quantity;
                        $this->modelCart->updateQuantity($cart['CartID'], $ProductID, $newQuantity);
                        $checkCart = true;
                        break;
                    }
                }
                if (!$checkCart) {
                    $this->modelCart->addCartDetail($cart['CartID'], $ProductID, $Quantity);
                    // var_dump($abc);
                    // die();
                }
                header("Location:" . BASE_URL . '?act=cart');
            } else {
                var_dump('Chưa đăng nhập');
                die();
            }
        }
    }

    public function cart()
    {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelAccounts->getAccountFromEmail($_SESSION['user_client']);

            $cart = $this->modelCart->getCartFromID($mail['AccountID']);

            if (!$cart) {
                $cartID = $this->modelCart->addCart($mail['AccountID']);
                $cart = ['CartID' => $cartID];

                $cartdetail = $this->modelCart->getCartDetail($cart['CartID']);
            } else {
                $cartdetail = $this->modelCart->getCartDetail($cart['CartID']);
            }

            require_once './views/cart.php';

            header("Location:" . BASE_URL . '?act=cart');
        } else {
            var_dump('Chưa đăng nhập');
            die();
        }
    }
}
