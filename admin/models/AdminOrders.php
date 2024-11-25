<?php

class AdminOrders
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllOrders()
    {
        try {
            $sql = 'SELECT `orders`.*, order_statuses.StatusName FROM `orders` 
            INNER JOIN order_statuses ON orders.order_status_id = order_statuses.id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getOrderFormCustomer($id)
    {
        try {
            $sql = 'SELECT `orders`.*, order_statuses.StatusName FROM `orders` 
            INNER JOIN order_statuses ON orders.order_status_id = order_statuses.id
            WHERE orders.AccountID = :id
            ';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function getDetailOrder($id)
    {
        try {
            $sql = 'SELECT `orders`.*, order_statuses.StatusName, accounts.*, payments.PaymentMethod FROM `orders`
            INNER JOIN order_statuses ON orders.order_status_id = order_statuses.id 
            INNER JOIN accounts ON orders.AccountID = accounts.AccountID
            INNER JOIN payments ON orders.OrderID = payments.OrderID
            WHERE orders.OrderID = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getListProductOrder($id)
    {
        try {
            $sql = 'SELECT `orderdetails`.*, products.ProductName
            FROM orderdetails
            INNER JOIN products ON orderdetails.ProductID = products.ProductID
            WHERE OrderDetailID = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function getAllStatusOrder()
    {
        try {
            $sql = 'SELECT * FROM `order_statuses`';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    // public function getListAlbum($id)
    // {
    //     try {
    //         $sql = 'SELECT * FROM `album` WHERE ProductID = :id';

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute([':id' => $id]);

    //         return $stmt->fetchAll();
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    public function updateOrders(
        $id,
        $RecipientName,
        $RecipientEmail,
        $RecipientPhone,
        $RecipientAddress,
        $Note,
        $order_status_id,
    ) {
        try {
            $sql = "UPDATE `orders` SET 
            `RecipientName`= :RecipientName,
            `RecipientEmail`= :RecipientEmail,
            `RecipientPhone`= :RecipientPhone,
            `RecipientAddress`= :RecipientAddress,
            `Note`= :Note,
            `order_status_id`= :order_status_id
            WHERE OrderID = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':RecipientName' => $RecipientName,
                ':RecipientEmail' => $RecipientEmail,
                ':RecipientPhone' => $RecipientPhone,
                ':RecipientAddress' => $RecipientAddress,
                ':Note' => $Note,
                ':order_status_id' => $order_status_id,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // public function getDetailAlbum($id)
    // {
    //     try {
    //         $sql = 'SELECT * FROM `album` WHERE ID = :id';

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute([':id' => $id]);

    //         return $stmt->fetch();
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    // public function updateAlbum($id, $new_file)
    // {
    //     try {
    //         $sql = "UPDATE `album` SET `SRC`= :new_file
    //         WHERE ID = :id";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute([
    //             ':new_file' => $new_file,
    //             ':id' => $id
    //         ]);

    //         return true;
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    // public function destroyAlbum($albumID)
    // {
    //     try {
    //         $sql = "DELETE FROM `album` WHERE `ID`= :id";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute([
    //             ':id' => $albumID
    //         ]);

    //         return true;
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    // public function destroyProducts($id)
    // {
    //     try {
    //         $sql = "DELETE FROM `products` WHERE `ProductID`= :id";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute([
    //             ':id' => $id
    //         ]);

    //         return true;
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }
}
