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

        deleteSessionError();
    }




    public function postAddProducts()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ProductName = $_POST['ProductName'] ?? '';
            $Price = $_POST['Price'] ?? '';
            $StockQuantity = $_POST['StockQuantity'] ?? '';
            $Color = $_POST['Color'] ?? '';
            $Storage = $_POST['Storage'] ?? '';
            $Size = $_POST['Size'] ?? '';
            $SKU = $_POST['SKU'] ?? '';
            $CategoryID = $_POST['CategoryID'] ?? '';
            $Description = $_POST['Description'] ?? '';
            $Image = $_FILES['Image'] ?? null;
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
            if ($Image['error'] !== 0) {
                $error['Image'] = 'Hình ảnh sản phẩm phải chọn';
            }
            $_SESSION['error'] = $error;


            if (empty($error)) {
                $ProductID = $this->modelProducts->insertProducts(
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

                if (!empty($Image_Array['name'])) {
                    foreach ($Image_Array['name'] as $key => $value) {
                        $file = [
                            'name' => $Image_Array['name'][$key],
                            'type' => $Image_Array['type'][$key],
                            'tmp_name' => $Image_Array['tmp_name'][$key],
                            'error' => $Image_Array['error'][$key],
                            'size' => $Image_Array['size'][$key]
                        ];
                        $SRC = uploadFile($file, './uploads/');
                        $this->modelProducts->insertAlbum($ProductID, $SRC);
                    }
                }

                header("Location: " . BASE_URL_ADMIN . '?act=list-products');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-add-products');
                exit();
            }
        }
    }



    public function formEditProducts()
    {
        $id = $_GET['id'];
        $product = $this->modelProducts->getDetailProduct($id);
        $listAlbum = $this->modelProducts->getListAlbum($id);
        $listCategories = $this->modelCategories->getAllCategories();
        if ($product) {
            require_once './views/products/editProducts.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=list-products');
        }
    }


    public function postEditProducts()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ProductID = $_POST['id'] ?? '';
            $productOld = $this->modelProducts->getDetailProduct($ProductID);
            $old_file = $productOld['Image'];

            $ProductName = $_POST['ProductName'] ?? '';
            $Price = $_POST['Price'] ?? '';
            $StockQuantity = $_POST['StockQuantity'] ?? '';
            $Color = $_POST['Color'] ?? '';
            $Storage = $_POST['Storage'] ?? '';
            $Size = $_POST['Size'] ?? '';
            $SKU = $_POST['SKU'] ?? '';
            $CategoryID = $_POST['CategoryID'] ?? '';
            $Description = $_POST['Description'] ?? '';
            $Image = $_FILES['Image'] ?? null;


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
            $_SESSION['error'] = $error;

            // logic sua anh
            if (isset($Image) && $Image['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($Image, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            if (empty($error)) {
                $ProductID = $this->modelProducts->updateProducts(
                    $ProductID,
                    $ProductName,
                    $Price,
                    $StockQuantity,
                    $Color,
                    $Storage,
                    $Size,
                    $SKU,
                    $CategoryID,
                    $Description,
                    $new_file
                );

                header("Location: " . BASE_URL_ADMIN . '?act=list-products');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-edit-products&id=' . $ProductID);
                exit();
            }
        }
    }

    public function postEditAlbum()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ProductID = $_POST['ProductID'] ?? '';
            $listAlbumCurrent = $this->modelProducts->getListAlbum($ProductID);
            // var_dump($listAlbumCurrent);
            // die;
            $Image_Array = $_FILES['Image_Array'];
            $Image_Delete = isset($_POST['Image_Delete']) ? explode(',', $_POST['Image_Delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];
            $upload_file = [];
            foreach ($Image_Array['name'] as $key => $value) {
                if ($Image_Array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($Image_Array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelProducts->getDetailAlbum($file_info['id'])['SRC'];
                    $this->modelProducts->updateAlbum($file_info['id'], $file_info['file']);
                    deleteFile($old_file);
                } else {
                    $this->modelProducts->insertAlbum($ProductID, $file_info['file']);
                }
            }
            foreach ($listAlbumCurrent as $Album) {
                $albumID = $Album['ID'];
                // var_dump($albumID);
                // print_r($_POST);
                // print_r($Image_Delete);
                // die;
                if (in_array($albumID, $Image_Delete)) {
                    $this->modelProducts->destroyAlbum($albumID);
                    deleteFile($Album['SRC']);
                }
            }
            header("Location: " . BASE_URL_ADMIN . '?act=form-edit-products&id=' . $ProductID);
            exit();
        }
    }

    public function deleteProducts()
    {
        $ProductID = $_GET['id'];
        $product = $this->modelProducts->getDetailProduct($ProductID);
        $listAlbum = $this->modelProducts->getListAlbum($ProductID);
        if ($product) {
            deleteFile('SRC');
            $this->modelProducts->destroyProducts($ProductID);
        }
        if ($listAlbum) {
            // var_dump($listAlbum);
            // die();
            foreach ($listAlbum as $key => $Image) {
                deleteFile($Image['SRC']);
                $this->modelProducts->destroyAlbum($Image['ID']);
            }
        }
        header("Location: " . BASE_URL_ADMIN . '?act=list-products');
        exit();
    }

    public function detailProducts()
    {
        $id = $_GET['id'];
        $product = $this->modelProducts->getDetailProduct($id);
        $listAlbum = $this->modelProducts->getListAlbum($id);
        $listComments = $this->modelProducts->getCommentFromProduct($id);
        if ($product) {
            require_once './views/products/detailProducts.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=list-products');
            exit();
        }
    }

    public function updateStatusComments()
    {
        $CommentID = $_POST['CommentID'];
        $name_view = $_POST['name_view'];
        $comment = $this->modelProducts->getDetailComment($CommentID);
        // var_dump($name_view);
        // die();
        if ($comment) {
            $updateStatus = '';
            if ($comment['Status'] == 'approved') {
                $updateStatus = 'hide';
            } else {
                $updateStatus = 'approved';
            }
            $status = $this->modelProducts->updateStatusComments($CommentID, $updateStatus);
            if ($status) {
                if ($name_view == 'detail_customer') {
                    header("Location: " . BASE_URL_ADMIN . '?act=detail-customer&id_customer=' . $comment['AccountID']);
                } elseif ($name_view == 'detail_product') {
                    header("Location: " . BASE_URL_ADMIN . '?act=detail-products&id=' . $comment['ProductID']);
                } else {
                    header("Location: " . BASE_URL_ADMIN . '?act=list-comments');
                }
            }
        }
    }
}
