<?php

class HomeController
{
    public $modelProducts;
    public $modelAccounts;
    public $modelCart;
    public $modelOrder;
    public $modelComments;

    public function __construct()
    {
        $this->modelProducts = new Products();
        $this->modelAccounts = new Accounts();
        $this->modelCart = new Carts();
        $this->modelOrder = new Orders();
        $this->modelComments = new Comments();
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
        $abc = $this->modelProducts->getDetailProduct($id);
        // var_dump($abc);

        $listAlbum = $this->modelProducts->getListAlbum($id);
        $listComments = $this->modelProducts->getCommentFromProduct($id);

        $listProductsxCategory = $this->modelProducts->getListProductCategory($abc['CategoryID']);
        // var_dump($listProductsxCategory);
        // die();
        if ($abc) {
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
            $AccountID = $this->modelAccounts->getAccountFromEmail($Email);
            // var_dump($AccountID['AccountID']);
            // die();
            $user = $this->modelAccounts->checkLogin($Email, $PasswordHash);
            // var_dump($user);
            // die();
            if ($user == $Email) {
                $_SESSION['user_client'] = $user;
                $_SESSION['user_id'] = $AccountID['AccountID'];
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
                // var_dump($mail);
                // die();
                if (!$mail) {
                    $EmailUserClient = $_SESSION['user_client'];
                    $mail = $this->modelAccounts->getAccountFromEmailUserClient($EmailUserClient);
                    // var_dump($mail);
                    // die();
                }
                $cart = $this->modelCart->getCartFromID($mail['AccountID']);


                if (!$cart) {
                    // var_dump($mail['AccountID']);
                    // die;
                    $cartID = $this->modelCart->addCart($mail['AccountID']);
                    $cart = ['CartID' => $cartID];
                    // var_dump($cartID);
                    // die();
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

            if (!$mail) {
                $EmailUserClient = $_SESSION['user_client'];
                $mail = $this->modelAccounts->getAccountFromEmailUserClient($EmailUserClient);
                // var_dump($mail);
                // die();
            }
            $cart = $this->modelCart->getCartFromID($mail['AccountID']);

            if (!$cart) {
                $cartID = $this->modelCart->addCart($mail['AccountID']);
                $cart = ['CartID' => $cartID];

                $cartdetailabc = $this->modelCart->getCartDetail($cart['CartID']);
            } else {
                $cartdetailabc = $this->modelCart->getCartDetail($cart['CartID']);
                // var_dump($cartdetail);
                // die();
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
            if (!$user) {
                $EmailUserClient = $_SESSION['user_client'];
                $user = $this->modelAccounts->getAccountFromEmailUserClient($EmailUserClient);
            }
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
            $RecipientName = $_POST['RecipientName'];
            $RecipientEmail = $_POST['RecipientEmail'];
            $RecipientPhone = $_POST['RecipientPhone'];
            $RecipientAddress = $_POST['RecipientAddress'];
            $Note = $_POST['Note'];
            $TotalAmount = $_POST['TotalAmount'];
            $paymentmethod = intval($_POST['paymentmethod']);
            $OrderDate = new DateTime();
            $formattedDate = $OrderDate->format('Y-m-d H:i:s');
            $Status = '1';
            $user = $this->modelAccounts->getAccountFromEmail($_SESSION['user_client']);
            if (!$user) {
                $EmailUserClient = $_SESSION['user_client'];
                $user = $this->modelAccounts->getAccountFromEmailUserClient($EmailUserClient);
            }
            $AccountID = $user['AccountID'];
            $OrderCode = 'DH-' . rand(1000, 9999);
            // var_dump($user);
            // die;
            // Thêm đơn hàng
            $orderID = $this->modelOrder->addOrder(
                $AccountID,
                $RecipientName,
                $RecipientEmail,
                $RecipientPhone,
                $RecipientAddress,
                $Note,
                $TotalAmount,
                $paymentmethod,
                $formattedDate,
                $OrderCode,
                $Status
            );
            $error = [];
            if (empty($RecipientName)) {
                $error['RecipientName'] = 'Tên người nhận không được để trống';
            }
            if (empty($RecipientEmail)) {
                $error['RecipientEmail'] = 'Email người nhận không được để trống';
            }
            if (empty($RecipientPhone)) {
                $error['RecipientPhone'] = 'Số điện thoại lượng người nhận không được để trống';
            }
            if (empty($RecipientAddress)) {
                $error['RecipientAddress'] = 'Địa chỉ người nhận không được để trống';
            }
            $_SESSION['error'] = $error;
            // var_dump($error);
            // die();
            if ($orderID) {
                // Lấy chi tiết giỏ hàng hiện tại
                $cart = $this->modelCart->getCartFromID($AccountID);
                $cartDetails = $this->modelCart->getCartDetail($cart['CartID']);

                // Thêm từng sản phẩm trong giỏ hàng vào bảng orderdetail
                foreach ($cartDetails as $cartItem) {
                    $this->modelOrder->addOrderDetail(
                        $orderID,
                        $cartItem['ProductID'],
                        $cartItem['Quantity'],
                        $cartItem['Price'],
                        $cartItem['Quantity'] * $cartItem['Price']
                    );
                }

                // Xóa giỏ hàng sau khi thêm xong
                $this->modelCart->clearCart($cart['CartID']);
            }

            echo "<script>alert('Thanh toán thành công! Cảm ơn bạn đã mua hàng.');</script>";
            echo "<script>window.location.href = '" . BASE_URL . "';</script>";
        }
    }



    // Build
    public function minicart()
    {
        $cartdetailxyz = [];
        // var_dump($cartdetail);
        if (isset($_SESSION['user_client'])) {
            // var_dump('ccc');
            $mail = $this->modelAccounts->getAccountFromEmail($_SESSION['user_client']);
            if (!$mail) {
                $EmailUserClient = $_SESSION['user_client'];
                $mail = $this->modelAccounts->getAccountFromEmailUserClient($EmailUserClient);
            }
            if ($mail != false) {
                $cart = $this->modelCart->getCartFromID($mail['AccountID']);
                // var_dump($cart);
                if (!$cart) {
                    $cartID = $this->modelCart->addCart($mail['AccountID']);
                    $cart = ['CartID' => $cartID];

                    $cartdetailxyz = $this->modelCart->getCartDetail($cart['CartID']);
                } else {
                    $cartdetailxyz = $this->modelCart->getCartDetail($cart['CartID']);
                }
            }
        }
        // var_dump($cartdetail);
        // die();


        return $cartdetailxyz;
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
        if (isset($_GET['category'])) {
            $categoryName = urldecode($_GET['category']); // Giải mã lại
            $listProducts = $this->modelProducts->getProductsxCategories($categoryName);
            // var_dump($_GET['category']); // Xem giá trị danh mục
            // var_dump($products);         // Kiểm tra danh sách sản phẩm
            // die();
        } else {
            $listProducts = $this->modelProducts->getAllProducts();
        }
        require_once './views/listProducts.php';
    }


    public function listProductsxCategories($CategoryName)
    {
        $listProductCate = $this->modelProducts->getProductsxCategories($CategoryName);

        return $listProductCate;
    }

    public function searchProducts()
    {
        $keyword = $_GET['search'] ?? '';
        $products = $this->modelProducts->searchProductsByName($keyword);

        require_once './views/searchResults.php'; // View hiển thị kết quả tìm kiếm
    }


    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            // die;
            if (isset($_SESSION['user_client'])) {
                $ProductID = $_POST['ProductID'];
                $Content = $_POST['Content'];
                $AccountID = $_SESSION['user_id'];  // Lấy từ session

                // var_dump($ProductID);
                // die;
                $comment = [
                    'ProductID' => intval($ProductID),
                    'AccountID' => $AccountID,
                    'Content' => $Content,
                    'CommentDate' => date('Y-m-d H:i:s'),
                    'Status' => 'approved'
                ];
                // var_dump($comment);
                // die;
                $this->modelComments->addComment($comment);

                // Chuyển hướng lại trang chi tiết sản phẩm
                header("Location: " . BASE_URL . "?act=detail-product&id=$ProductID");
            } else {
                // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
                header("Location: " . BASE_URL . "?act=login");
            }
        }
    }


    public function contactUs()
    {
        require_once './views/contactUs.php';
    }

    public function updateCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy thông tin giỏ hàng từ session
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelAccounts->getAccountFromEmail($_SESSION['user_client']);
                if (!$mail) {
                    $EmailUserClient = $_SESSION['user_client'];
                    $mail = $this->modelAccounts->getAccountFromEmailUserClient($EmailUserClient);
                }

                $cart = $this->modelCart->getCartFromID($mail['AccountID']);
                $cartId = $cart['CartID'];

                // Lấy dữ liệu từ form
                $productIds = $_POST['product_ids'] ?? [];
                $quantities = $_POST['quantities'] ?? [];
                $removeIds = $_POST['remove_ids'] ?? [];

                // Xử lý cập nhật số lượng
                foreach ($productIds as $index => $productId) {
                    $quantity = (int)$quantities[$index];
                    if ($quantity > 0) {
                        $this->modelCart->updateCartQuantity($productId, $quantity, $cartId);
                    }
                }

                // Xử lý xóa sản phẩm
                foreach ($removeIds as $productId) {
                    $this->modelCart->removeProductFromCart($productId, $cartId);
                }

                // Điều hướng lại về giỏ hàng
                header("Location: " . BASE_URL . "?act=cart");
                exit();
            } else {
                header("Location: " . BASE_URL . "?act=login");
                exit();
            }
        }
    }

    public function formForgotPassword()
    {
        require_once './views/auth/formForgotPassword.php';

        deleteSessionError();
    }

    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $phone = $_POST['phone'] ?? null;

            if ($email && $phone) {
                // Gọi model để kiểm tra thông tin
                $account = $this->modelAccounts->getAccountByEmailAndPhone($email, $phone);

                if ($account) {
                    // Mật khẩu mặc định
                    $newPassword = "123456";
                    $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT);

                    // Cập nhật mật khẩu trong DB
                    $updateResult = $this->modelAccounts->updatePassword($account['AccountID'], $newPasswordHash);

                    if ($updateResult) {
                        echo "<script>alert('Mật khẩu đã được đặt lại thành: 123456'); window.location.href='" . BASE_URL . "?act=login';</script>";
                    } else {
                        echo "<script>alert('Có lỗi xảy ra. Vui lòng thử lại!'); window.history.back();</script>";
                    }
                } else {
                    echo "<script>alert('Email hoặc số điện thoại không đúng! Vui lòng thử lại.'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Vui lòng nhập đủ thông tin!'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Phương thức không hợp lệ!'); window.history.back();</script>";
        }
    }



    // public function removeFromCart()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $productID = $_POST['product_id'] ?? null;
    //         // var_dump($_POST);
    //         // die;
    //         if ($productID) {
    //             // Lấy thông tin giỏ hàng hiện tại từ session hoặc database
    //             $Email = $_SESSION['user_client'];
    //             $abcd = $this->modelAccounts->getAccountFormEmail($Email);
    //             $accountID = $abcd['AccountID'];
    //             $cart = $this->modelCart->getCartFromID($accountID);
    //             // var_dump($cart);
    //             // die();
    //             if ($cart) {
    //                 $this->modelCart->removeProductFromCart($cart['CartID'], $productID);
    //             }
    //         }
    //     }
    //     // Redirect về giỏ hàng
    //     header("Location: " . BASE_URL . '?act=cart');
    //     exit();
    // }

    // public function updateCart()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $productIDs = $_POST['product_ids'] ?? [];
    //         $quantities = $_POST['quantities'] ?? [];

    //         if (!empty($productIDs) && !empty($quantities)) {
    //             // Lấy thông tin giỏ hàng hiện tại từ session hoặc database
    //             $Email = $_SESSION['user_client'];
    //             $abc = $this->modelAccounts->getAccountFormEmailUpdate($Email);
    //             $accountID = $abc['AccountID'];
    //             // $accountID = $this->modelAccounts->getAccountID();
    //             $cart = $this->modelCart->getCartFromID($accountID);
    //             // var_dump($productIDs);
    //             // var_dump($quantities);
    //             // var_dump($accountID);
    //             // var_dump($cart);
    //             // die();
    //             if ($cart) {
    //                 foreach ($productIDs as $index => $productID) {
    //                     $quantity = $quantities[$index];
    //                     $this->modelCart->updateProductQuantity($cart['CartID'], $productID, $quantity);
    //                 }
    //             }
    //         }
    //     }
    //     // Redirect về giỏ hàng
    //     header("Location: " . BASE_URL . '?act=cart');
    //     exit();
    // }
}
