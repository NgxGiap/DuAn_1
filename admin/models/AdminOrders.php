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
            $sql = 'SELECT `orders`.*, order_statuses.StatusName, orderdetails.TotalPrice FROM `orders` 
            INNER JOIN order_statuses ON orders.order_status_id = order_statuses.id
            INNER JOIN orderdetails ON orders.OrderID = orderdetails.OrderID';

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
            $sql = 'SELECT `orders`.*, order_statuses.StatusName, accounts.*, payment_methods.Name, orderdetails.* FROM `orders`
            INNER JOIN order_statuses ON orders.order_status_id = order_statuses.id 
            INNER JOIN accounts ON orders.AccountID = accounts.AccountID
            INNER JOIN payment_methods ON orders.OrderID = payment_methods.OrderID
            INNER JOIN orderdetails ON orders.OrderID = orderdetails.OrderID
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
            $sql = 'SELECT `orderdetails`.*, products.*
            FROM orderdetails
            INNER JOIN products ON orderdetails.ProductID = products.ProductID
            WHERE OrderID = :id';
            // var_dump('OK');
            // die();
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
}
