<?php
class AdminOrdersController
{
    public $modelOrders;

    public function __construct()
    {
        $this->modelOrders = new AdminOrders();
    }
    public function listOrders()
    {
        $listOrders = $this->modelOrders->getAllOrders();
        require_once './views/orders/listOrders.php';
    }


    public function detailOrders()
    {
        $id_order = $_GET['id_order'];
        $orders = $this->modelOrders->getDetailOrder($id_order);
        $productOrder = $this->modelOrders->getListProductOrder($id_order);
        // var_dump($productOrder);
        // die();
        $listStatusOrder = $this->modelOrders->getAllStatusOrder();
        require_once './views/orders/detailOrder.php';
    }

    public function formEditOrders()
    {
        $id_order = $_GET['id_order'];
        $orders = $this->modelOrders->getDetailOrder($id_order);
        $listStatusOrder = $this->modelOrders->getAllStatusOrder();
        if ($orders) {
            require_once './views/Orders/editOrder.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=list-orders');
        }
    }


    public function postEditOrders()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_order = $_POST['id_order'] ?? '';

            $RecipientName = $_POST['RecipientName'] ?? '';
            $RecipientEmail = $_POST['RecipientEmail'] ?? '';
            $RecipientPhone = $_POST['RecipientPhone'] ?? '';
            $RecipientAddress = $_POST['RecipientAddress'] ?? '';
            $Note = $_POST['Note'] ?? '';
            $order_status_id = $_POST['order_status_id'] ?? '';

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
            if (empty($order_status_id)) {
                $error['order_status_id'] = 'Trạng thái đơn hàng';
            }
            $_SESSION['error'] = $error;

            // var_dump($error);
            // die();

            if (empty($error)) {
                $this->modelOrders->updateOrders(
                    $id_order,
                    $RecipientName,
                    $RecipientEmail,
                    $RecipientPhone,
                    $RecipientAddress,
                    $Note,
                    $order_status_id,
                );
                // var_dump($abc);
                // die();
                header("Location: " . BASE_URL_ADMIN . '?act=list-orders');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-edit-orders&id_order=' . $id_order);
                exit();
            }
        }
    }

    // public function postEditAlbum()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $ProductID = $_POST['ProductID'] ?? '';
    //         $listAlbumCurrent = $this->modelProducts->getListAlbum($ProductID);
    //         // var_dump($listAlbumCurrent);
    //         // die;
    //         $Image_Array = $_FILES['Image_Array'];
    //         $Image_Delete = isset($_POST['Image_Delete']) ? explode(',', $_POST['Image_Delete']) : [];
    //         $current_img_ids = $_POST['current_img_ids'] ?? [];
    //         $upload_file = [];
    //         foreach ($Image_Array['name'] as $key => $value) {
    //             if ($Image_Array['error'][$key] == UPLOAD_ERR_OK) {
    //                 $new_file = uploadFileAlbum($Image_Array, './uploads/', $key);
    //                 if ($new_file) {
    //                     $upload_file[] = [
    //                         'id' => $current_img_ids[$key] ?? null,
    //                         'file' => $new_file
    //                     ];
    //                 }
    //             }
    //         }
    //         foreach ($upload_file as $file_info) {
    //             if ($file_info['id']) {
    //                 $old_file = $this->modelProducts->getDetailAlbum($file_info['id'])['SRC'];
    //                 $this->modelProducts->updateAlbum($file_info['id'], $file_info['file']);
    //                 deleteFile($old_file);
    //             } else {
    //                 $this->modelProducts->insertAlbum($ProductID, $file_info['file']);
    //             }
    //         }
    //         foreach ($listAlbumCurrent as $Album) {
    //             $albumID = $Album['ID'];
    //             // var_dump($albumID);
    //             // print_r($_POST);
    //             // print_r($Image_Delete);
    //             // die;
    //             if (in_array($albumID, $Image_Delete)) {
    //                 $this->modelProducts->destroyAlbum($albumID);
    //                 deleteFile($Album['SRC']);
    //             }
    //         }
    //         header("Location: " . BASE_URL_ADMIN . '?act=form-edit-products&id=' . $ProductID);
    //         exit();
    //     }
    // }

    // public function deleteProducts()
    // {
    //     $ProductID = $_GET['id'];
    //     $product = $this->modelProducts->getDetailProduct($ProductID);
    //     $listAlbum = $this->modelProducts->getListAlbum($ProductID);
    //     if ($product) {
    //         deleteFile('SRC');
    //         $this->modelProducts->destroyProducts($ProductID);
    //     }
    //     if ($listAlbum) {
    //         // var_dump($listAlbum);
    //         // die();
    //         foreach ($listAlbum as $key => $Image) {
    //             deleteFile($Image['SRC']);
    //             $this->modelProducts->destroyAlbum($Image['ID']);
    //         }
    //     }
    //     header("Location: " . BASE_URL_ADMIN . '?act=list-products');
    //     exit();
    // }

    // public function detailProducts()
    // {
    //     $id = $_GET['id'];
    //     $product = $this->modelProducts->getDetailProduct($id);
    //     $listAlbum = $this->modelProducts->getListAlbum($id);
    //     if ($product) {
    //         require_once './views/products/detailProducts.php';
    //     } else {
    //         header("Location: " . BASE_URL_ADMIN . '?act=list-products');
    //     }
    // }
}
