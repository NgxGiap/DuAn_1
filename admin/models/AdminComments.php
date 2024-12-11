<?php

class AdminComments
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllComments()
    {
        try {
            $sql = 'SELECT `comments`.*, products.ProductName, accounts.Username FROM `comments` 
            INNER JOIN products ON comments.ProductID = products.ProductID
            INNER JOIN accounts ON comments.AccountID = accounts.AccountID';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
