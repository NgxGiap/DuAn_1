<?php
class AdminProductsController
{
    public $modelProducts;
    public $modelCategories;
    public function __construct()
    {
        $this->modelProducts = new AdminProducts();
        $this->modelCategories = new AdminCategories();
    }
    public function listProducts()
    {
        $listProducts = $this->modelProducts->getAllProducts();
        require_once './views/products/listProducts.php';
    }

    public function formAddProducts()
    {
        $listCategories = $this->modelCategories->getAllCategories();
        require_once './views/products/addProducts.php';
    }




    public function postAddProducts()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ProductName = $_POST['ProductName'];
            $Price = $_POST['Price'];
            $StockQuantity = $_POST['StockQuantity'];
            $Color = $_POST['Color'];
            $Storage = $_POST['Storage'];
            $Size = $_POST['Size'];
            $SKU = $_POST['SKU'];
            $CategoryID = $_POST['CategoryID'];
            $Description = $_POST['Description'];
            $Image = $_FILES['Image'];
            $file_thumb = uploadFile($Image, './uploads/');


            $Image_Array = $_FILES['Image_Array'];


            $error = [];
            if (empty($ProductName)) {
                $error['ProductName'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($Price)) {
                $error['Price'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($StockQuantity)) {
                $error['StockQuantity'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($Color)) {
                $error['Color'] = 'Màu sản phẩm không được để trống';
            }
            if (empty($Storage)) {
                $error['Storage'] = 'Dung lượng sản phẩm không được để trống';
            }
            if (empty($Size)) {
                $error['Size'] = 'Kích thước sản phẩm không được để trống';
            }
            if (empty($SKU)) {
                $error['SKU'] = 'SKU sản phẩm không được để trống';
            }
            if (empty($CategoryID)) {
                $error['CategoryID'] = 'Danh mục sản phẩm phải chọn';
            }


            if (empty($error)) {
                $this->modelProducts->insertProducts(
                    $ProductName,
                    $Price,
                    $StockQuantity,
                    $Color,
                    $Storage,
                    $Size,
                    $SKU,
                    $CategoryID,
                    $Description,
                    $file_thumb
                );
                header("Location: " . BASE_URL_ADMIN . '?act=list-products');
            } else {
                require_once './views/products/addProducts.php';
            }
        }
    }



    // public function formEditCategories()
    // {
    //     $id = $_GET['id'];
    //     $category = $this->modelCategories->getDetailCategory($id);
    //     if ($category) {
    //         require_once './views/categories/editCategories.php';
    //     } else {
    //         header("Location: " . BASE_URL_ADMIN . '?act=list-categories');
    //     }
    // }
    // public function postEditCategories()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $id = $_POST['id'];
    //         $categoryName = $_POST['name'];
    //         $description = $_POST['Description'];

    //         $error = [];
    //         if (empty($categoryName)) {
    //             $error['name'] = 'Tên danh mục không được để trống';
    //         }
    //         if (empty($error)) {
    //             $this->modelCategories->updateCategories($id, $categoryName, $description);
    //             header("Location: " . BASE_URL_ADMIN . '?act=list-categories');
    //             exit();
    //         } else {
    //             $category = ['id' => $id, 'name' => $categoryName, 'Description' => $description];
    //             require_once './views/categories/editCategories.php';
    //         }
    //     }
    // }

    // public function deleteCategories()
    // {
    //     $id = $_GET['id'];
    //     $category = $this->modelCategories->getDetailCategory($id);
    //     if ($category) {
    //         $this->modelCategories->destroyCategories($id);
    //     }
    //     header("Location: " . BASE_URL_ADMIN . '?act=list-categories');
    //     exit();
    // }
}
