<?php

class HomeController
{
    public $modelProducts;
    public $modelAccounts;
    public $modelCart;
    public $modelOrder;

    public function __construct()
    {
        $this->modelProducts = new Products();
        $this->modelAccounts = new Accounts();
        $this->modelCart = new Carts();
        $this->modelOrder = new Orders();
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

    public function formRegister()
    {
        require_once './views/auth/formRegister.php';

        deleteSessionError();
    }

    public function postRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Username = $_POST['Username'];
            $Email = $_POST['Email'];
            $PasswordHash = password_hash($_POST['PasswordHash'], PASSWORD_BCRYPT);
            // var_dump($PasswordHash);
            // die();

            $user = $this->modelAccounts->checkRegister($Email);
            // var_dump($user);
            // die();
            if (empty($user)) {
                $user = $this->modelAccounts->insetAccount($Username, $Email, $PasswordHash);

                header("Location:" . BASE_URL . '?act=login');
                // var_dump($user);
                // exit();
            } else {
                $_SESSION['error'] = 'Email đã được sử dụng!';
                // var_dump($_SESSION['error']);
                // die();
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=register');
                exit();
            }
        }
    }

    // public function logout()
    // {
    //     if (isset($_SESSION['user_admin'])) {
    //         unset($_SESSION['user_admin']);
    //         header("Location:" . BASE_URL );
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
                header("Location:" . BASE_URL . '?act=login');
            }
        }
    }

    public function cart()
    {
        // var_dump($_SESSION['user_client']);
        // die();
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelAccounts->getAccountFromEmail($_SESSION['user_client']);
            // var_dump($mail);
            // die();
            $cart = $this->modelCart->getCartFromID($mail['AccountID']);

            if (!$cart) {
                $cartID = $this->modelCart->addCart($mail['AccountID']);
                $cart = ['CartID' => $cartID];

                $cartdetail = $this->modelCart->getCartDetail($cart['CartID']);
            } else {
                $cartdetail = $this->modelCart->getCartDetail($cart['CartID']);
            }

            require_once './views/cart.php';
        } else {
            header("Location:" . BASE_URL . '?act=login');
        }
    }

    public function checkOut()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelAccounts->getAccountFromEmail($_SESSION['user_client']);
            // var_dump($user);
            // die();
            $cart = $this->modelCart->getCartFromID($user['AccountID']);

            if (!$cart) {
                $cartID = $this->modelCart->addCart($user['AccountID']);
                $cart = ['CartID' => $cartID];

                $cartdetail = $this->modelCart->getCartDetail($cart['CartID']);
            } else {
                $cartdetail = $this->modelCart->getCartDetail($cart['CartID']);
            }

            require_once './views/checkOut.php';

            // header("Location:" . BASE_URL . '?act=checkOut');
        } else {
            header("Location:" . BASE_URL . '?act=login');
        }

        require_once './views/checkOut.php';
    }

    public function postCheckOut()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // echo '<pre>';
            // var_dump($_POST);
            // die();
            $RecipientName = $_POST['RecipientName'];
            $RecipientEmail = $_POST['RecipientEmail'];
            $RecipientPhone = $_POST['RecipientPhone'];
            $RecipientAddress = $_POST['RecipientAddress'];
            $Note = $_POST['Note'];
            $TotalAmount = $_POST['TotalAmount'];
            $paymentmethod = intval($_POST['paymentmethod']);

            $OrderDate = new DateTime();
            $formattedDate = $OrderDate->format('Y-m-d H:i:s');
            // var_dump($formattedDate);
            // die();
            $Status = '1';
            $user = $this->modelAccounts->getAccountFromEmail($_SESSION['user_client']);
            $AccountID = $user['AccountID'];

            $OrderCode = 'DH-' . rand(1000, 9999);
            // var_dump($RecipientName, $RecipientEmail, $RecipientPhone, $RecipientAddress, $Note, $TotalAmount, $paymentmethod, $OrderDate, $formattedDate, $Status, $AccountID);
            // die();

            $this->modelOrder->addOrder(
                $AccountID,
                $RecipientName,
                $RecipientEmail,
                $RecipientAddress,
                $Note,
                $TotalAmount,
                $paymentmethod,
                $formattedDate,
                $OrderCode,
                $Status

            );
            // echo ('Add done </pre>');
            // die();
        }
    }

    // Build
    public function minicart()
    {
        $cartdetail = [];
        // var_dump($cartdetail);
        if (isset($_SESSION['user_client'])) {
            // var_dump('ccc');
            $mail = $this->modelAccounts->getAccountFromEmail($_SESSION['user_client']);

            if ($mail != false) {
                $cart = $this->modelCart->getCartFromID($mail['AccountID']);
                // var_dump($cart);
                if (!$cart) {
                    $cartID = $this->modelCart->addCart($mail['AccountID']);
                    $cart = ['CartID' => $cartID];

                    $cartdetail = $this->modelCart->getCartDetail($cart['CartID']);
                } else {
                    $cartdetail = $this->modelCart->getCartDetail($cart['CartID']);
                }
            }
        }
        // var_dump($cartdetail);
        // die();


        return $cartdetail;
    }

    public function listCategories()
    {
        $listProductxCategory = $this->modelProducts->getAllCategories();

        // var_dump($listProductxCategory);
        // die();

        return $listProductxCategory;
    }

    public function logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header("Location:" . BASE_URL);
        }
    }

    public function formEditInfo()
    {
        $Email = $_SESSION['user_client'];
        $info = $this->modelAccounts->getAccountFormEmail($Email);
        // var_dump($info);
        // die();
        require_once './views/auth/formEditInfo.php';
        deleteSessionError();
    }

    public function postEditPassword()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];


            $user = $this->modelAccounts->getAccountFormEmail($_SESSION['user_client']);

            $checkPass = password_verify($old_pass, $user['PasswordHash']);

            $error = [];
            if (!$checkPass) {
                $error['old_pass'] = 'Mật khẩu người dùng không chính xác!';
            }
            if ($new_pass !== $confirm_pass) {
                $error['confirm_pass'] = 'Mật khẩu nhập lại không chính xác!';
            }
            if (empty($old_pass)) {
                $error['old_pass'] = 'Vui lòng nhập dữ liệu!';
            }
            if (empty($new_pass)) {
                $error['new_pass'] = 'Vui lòng nhập dữ liệu!';
            }
            if (empty($confirm_pass)) {
                $error['confirm_pass'] = 'Vui lòng nhập dữ liệu!';
            }
            $_SESSION['error'] = $error;
            if (!$error) {
                $PasswordHash = password_hash($new_pass, PASSWORD_BCRYPT);
                $status = $this->modelAccounts->resetPassword($user['AccountID'], $PasswordHash);
                if ($status) {
                    // var_dump($status);
                    // die;
                    $_SESSION['success'] = "Đổi mật khẩu thành công";

                    $_SESSION['flash'] = true;
                    header("Location:" . BASE_URL . '?act=form-edit-info');
                }
            } else {
                // var_dump($_SESSION['error']);
                // die();
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=form-edit-info');
                exit();
            }
        }
    }

    public function postEditInfo()
    {
        // var_dump($_POST);
        // die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $AccountID = $_POST['AccountID'];
            $old_Username = $_POST['Username'];
            $old_FullName = $_POST['FullName'];
            $old_Phone = $_POST['Phone'];
            $old_Email = $_POST['Email'];


            $info = $this->modelAccounts->getAccountFormEmail($_SESSION['user_client']);

            $error = [];
            if (empty($old_Email)) {
                $error['old_Email'] = 'Vui lòng nhập dữ liệu!';
            }
            $_SESSION['error'] = $error;
            if (!$error) {
                $status = $this->modelAccounts->updateAccount($AccountID, $old_Username, $old_Email, $old_FullName, $old_Phone);
                if ($status) {
                    // var_dump($status);
                    // die;
                    $_SESSION['successInfo'] = "Đổi thông tin thành công";

                    $_SESSION['flash'] = true;
                    header("Location:" . BASE_URL . '?act=form-edit-info');
                }
            } else {
                // var_dump($_SESSION['error']);
                // die();
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=form-edit-info');
                exit();
            }
        }
    }

    public function listProducts()
    {
        $listProducts = $this->modelProducts->getAllProducts();
        require_once './views/listProducts.php';
    }

    public function listProductsxCategories($CategoryName)
    {
        $listProductCate = $this->modelProducts->getProductsxCategories($CategoryName);

        return $listProductCate;
    }

    // public function postCmt() {}

    public function contactUs()
    {
        require_once './views/contactUs.php';
    }
}
