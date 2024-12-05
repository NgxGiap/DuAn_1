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
        $RecipientPhone,
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
                        RecipientPhone,
                        RecipientAddress,
                        Note,
                        TotalAmount,
                        payment_method_id,
                        OrderDate,
                        OrderCode,
                        Status) 
                    VALUES (
                        :AccountID,
                        :RecipientName,
                        :RecipientEmail,
                        :RecipientPhone,
                        :RecipientAddress,
                        :Note,
                        :TotalAmount,
                        :payment_method_id,
                        :formattedDate,
                        :OrderCode,
                        :Status)";
            // echo $sql;
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':AccountID' => $AccountID,
                ':RecipientName' => $RecipientName,
                ':RecipientEmail' => $RecipientEmail,
                ':RecipientPhone' => $RecipientPhone,
                ':RecipientAddress' => $RecipientAddress,
                ':Note' => $Note,
                ':TotalAmount' => $TotalAmount,
                ':payment_method_id' => $paymentmethod,
                ':formattedDate' => $formattedDate,
                ':OrderCode' => $OrderCode,
                ':Status' => $Status
            ]);




            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function addOrderDetail($OrderID, $ProductID, $Quantity, $PriceAtOrder, $TotalPrice)
    {
        try {
            $sql = "INSERT INTO orderdetails (OrderID, ProductID, Quantity, PriceAtOrder, TotalPrice)
                VALUES (:OrderID, :ProductID, :Quantity, :PriceAtOrder, :TotalPrice)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':OrderID' => $OrderID,
                ':ProductID' => $ProductID,
                ':Quantity' => $Quantity,
                ':PriceAtOrder' => $PriceAtOrder,
                ':TotalPrice' => $TotalPrice
            ]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
