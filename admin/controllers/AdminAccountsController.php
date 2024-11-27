<?php

class AdminAccountsController
{
    public $modelAccounts;
    public $modelOrders;
    public $modelProducts;

    public function __construct()
    {
        $this->modelAccounts = new AdminAccounts;
        $this->modelOrders = new AdminOrders;
        $this->modelProducts = new AdminProducts;
    }

    public function listAccountsAdmin()
    {
        $listAdmin = $this->modelAccounts->getAllAccounts(1);
        // var_dump($listAdmin);
        // die();
        require_once './views/accounts/admin/listAdmin.php';
    }

    public function formAddAdmin()
    {
        require_once './views/accounts/admin/addAdmin.php';
        deleteSessionError();
    }

    public function postAddAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Username = $_POST['Username'];
            $Email = $_POST['Email'];
            $FullName = $_POST['FullName'];

            $error = [];
            if (empty($Username)) {
                $error['Username'] = 'Tên đăng nhập không được để trống';
            }
            if (empty($Email)) {
                $error['Email'] = 'Email không được để trống';
            }
            if (empty($FullName)) {
                $error['FullName'] = 'Họ tên không được để trống';
            }

            $_SESSION['error'] = $error;

            if (empty($error)) {
                // $this->modelCategories->insertCategories($categoryName, $description);
                $PasswordHash = password_hash('123@123ab', PASSWORD_BCRYPT);
                // var_dump($PasswordHash);
                // die();
                $RoleID = 1;
                $this->modelAccounts->insertAdmin($Username, $Email, $FullName, $PasswordHash, $RoleID);

                header("Location: " . BASE_URL_ADMIN . '?act=list-admin');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-add-admin');
                exit();
            }
        }
    }

    public function formEditAdmin()
    {
        $id_admin = $_GET['id_admin'];
        $Admin = $this->modelAccounts->getDetailAccount($id_admin);
        // var_dump($Admin);
        // die();
        require_once './views/accounts/admin/editAdmin.php';
        deleteSessionError();
    }

    public function postEditAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_admin = $_POST['id_admin'] ?? '';

            $Username = $_POST['Username'] ?? '';
            $Email = $_POST['Email'] ?? '';
            $FullName = $_POST['FullName'] ?? '';
            $Phone = $_POST['Phone'] ?? '';


            $error = [];
            if (empty($Username)) {
                $error['Username'] = 'Tên đăng nhập không được để trống';
            }
            if (empty($Email)) {
                $error['Email'] = 'Email không được để trống';
            }
            if (empty($FullName)) {
                $error['FullName'] = 'Họ tên không được để trống';
            }
            $_SESSION['error'] = $error;

            if (empty($error)) {
                $this->modelAccounts->updateAccount(
                    $id_admin,
                    $Username,
                    $Email,
                    $FullName,
                    $Phone
                );

                header("Location: " . BASE_URL_ADMIN . '?act=list-admin');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-edit-admin&id_admin=' . $id_admin);
                exit();
            }
        }
    }

    public function resetPassword()
    {
        $AccountID = $_GET['id_admin'];
        $Account = $this->modelAccounts->getDetailAccount($AccountID);
        $PasswordHash = password_hash('123456', PASSWORD_BCRYPT);
        $status = $this->modelAccounts->resetPassword($AccountID, $PasswordHash);
        if ($status && $Account['RoleID'] == 1) {
            header("Location: " . BASE_URL_ADMIN . '?act=list-admin');
            exit();
        } elseif ($status && $Account['RoleID'] == 2) {
            header("Location: " . BASE_URL_ADMIN . '?act=list-customer');
            exit();
        } else {
            var_dump('Lỗi khi reset password!');
            die();
        }
    }

    public function listAccountsCustomer()
    {
        $listCustomer = $this->modelAccounts->getAllAccounts(2);
        // var_dump($listAdmin);
        // die();
        require_once './views/accounts/customer/listCustomer.php';
    }

    public function formEditCustomer()
    {
        $id_customer = $_GET['id_customer'];
        $Customer = $this->modelAccounts->getDetailAccount($id_customer);
        // var_dump($Admin);
        // die();
        require_once './views/accounts/customer/editCustomer.php';
        deleteSessionError();
    }

    public function postEditCustomer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_customer = $_POST['id_customer'] ?? '';

            $Username = $_POST['Username'] ?? '';
            $Email = $_POST['Email'] ?? '';
            $FullName = $_POST['FullName'] ?? '';
            $Phone = $_POST['Phone'] ?? '';


            $error = [];
            if (empty($Username)) {
                $error['Username'] = 'Tên đăng nhập không được để trống';
            }
            if (empty($Email)) {
                $error['Email'] = 'Email không được để trống';
            }
            if (empty($FullName)) {
                $error['FullName'] = 'Họ tên không được để trống';
            }
            $_SESSION['error'] = $error;

            if (empty($error)) {
                $this->modelAccounts->updateCustomer(
                    $id_customer,
                    $Username,
                    $Email,
                    $FullName,
                    $Phone
                );

                header("Location: " . BASE_URL_ADMIN . '?act=list-customer');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-edit-customer&id_customer=' . $id_customer);
                exit();
            }
        }
    }

    public function detailCustomer()
    {
        $id_customer = $_GET['id_customer'];
        $Customer = $this->modelAccounts->getDetailAccount($id_customer);
        $listOrders = $this->modelOrders->getOrderFormCustomer($id_customer);
        $listComments = $this->modelProducts->getCommentCustomer($id_customer);

        require_once './views/accounts/customer/detailCustomer.php';
    }

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';

        deleteSessionError();
    }

    public function login()
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
                $_SESSION['user_admin'] = $user;
                header("Location:" . BASE_URL_ADMIN);
                exit();
            } else {
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);
                // die();
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header("Location:" . BASE_URL_ADMIN . '?act=login-admin');
        }
    }

    public function formEditInfoAdmin()
    {
        $Email = $_SESSION['user_admin'];
        $info = $this->modelAccounts->getAccountFormEmail($Email);
        // var_dump($info);
        // die();
        require_once './views/accounts/persona/editPersona.php';
        deleteSessionError();
    }

    public function postEditPasswordAdmin()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];


            $user = $this->modelAccounts->getAccountFormEmail($_SESSION['user_admin']);

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
                    header("Location:" . BASE_URL_ADMIN . '?act=form-edit-info-admin');
                }
            } else {
                // var_dump($_SESSION['error']);
                // die();
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-edit-info-admin');
                exit();
            }
        }
    }

    public function postEditInfoAdmin()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $AccountID = $_POST['AccountID'];
            $old_Username = $_POST['Username'];
            $old_FullName = $_POST['FullName'];
            $old_Phone = $_POST['Phone'];
            $old_Email = $_POST['Email'];


            $info = $this->modelAccounts->getAccountFormEmail($_SESSION['user_admin']);

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
                    header("Location:" . BASE_URL_ADMIN . '?act=form-edit-info-admin');
                }
            } else {
                // var_dump($_SESSION['error']);
                // die();
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-edit-info-admin');
                exit();
            }
        }
    }
}
