<?php
class AdminCategoriesController
{
    public $modelCategories;
    public function __construct()
    {
        $this->modelCategories = new AdminCategories();
    }
    public function listCategories()
    {
        $listCategories = $this->modelCategories->getAllCategories();
        require_once './views/categories/listCategories.php';
    }

    public function formAddCategories()
    {
        require_once './views/categories/addCategories.php';
    }
    public function postAddCategories()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $categoryName = $_POST['name'];
            $description = $_POST['Description'];

            $error = [];
            if (empty($categoryName)) {
                $error['name'] = 'Tên danh mục không được để trống';
            }

            // $_SESSION['error'] = $error;
            // var_dump($_POST);
            // die();

            if (empty($error)) {
                // var_dump('OK');
                // die();
                $abc = $this->modelCategories->insertCategories($categoryName, $description);
                // var_dump($abc);
                // die();
                header("Location: " . BASE_URL_ADMIN . '?act=list-categories');
            } else {
                require_once './views/categories/addCategories.php';
            }
        }
    }

    public function formEditCategories()
    {
        $id = $_GET['id'];
        $category = $this->modelCategories->getDetailCategory($id);
        if ($category) {
            require_once './views/categories/editCategories.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=list-categories');
        }
    }
    public function postEditCategories()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $categoryName = $_POST['name'];
            $description = $_POST['Description'];

            $error = [];
            if (empty($categoryName)) {
                $error['name'] = 'Tên danh mục không được để trống';
            }
            if (empty($error)) {
                $this->modelCategories->updateCategories($id, $categoryName, $description);
                header("Location: " . BASE_URL_ADMIN . '?act=list-categories');
                exit();
            } else {
                $category = ['id' => $id, 'name' => $categoryName, 'Description' => $description];
                require_once './views/categories/editCategories.php';
            }
        }
    }

    public function deleteCategories()
    {
        $id = $_GET['id'];
        $category = $this->modelCategories->getDetailCategory($id);
        if ($category) {
            $this->modelCategories->destroyCategories($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=list-categories');
        exit();
    }
}
