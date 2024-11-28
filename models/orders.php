<?php

class Orders
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addOrder(
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
    ) {
        try {
            $sql = "INSERT INTO `orders`(
                        AccountID,
                        RecipientName,
                        RecipientEmail,
                        RecipientAddress,
                        Note,
                        TotalAmount,
                        paymentmethod,
                        OrderDate,
                        OrderCode,
                        Status) 
                    VALUES (
                        :AccountID,
                        :RecipientName,
                        :RecipientEmail,
                        :RecipientAddress,
                        :Note,
                        :TotalAmount,
                        :paymentmethod,
                        :formattedDate,
                        :OrderCode,
                        :Status)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':AccountID' => $AccountID,
                ':RecipientName' => $RecipientName,
                ':RecipientEmail' => $RecipientEmail,
                ':RecipientAddress' => $RecipientAddress,
                ':Note' => $Note,
                ':TotalAmount' => $TotalAmount,
                ':paymentmethod' => $paymentmethod,
                ':OrderDate' => $formattedDate,
                ':OrderCode' => $OrderCode,
                ':Status' => $Status
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
