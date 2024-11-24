<?php

class AdminAccountsController
{
    public $modelAccounts;

    public function __construct()
    {
        $this->modelAccounts = new AdminAccounts;
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
        $PasswordHash = password_hash('123@123ab', PASSWORD_BCRYPT);
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
}
