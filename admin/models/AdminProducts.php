<?php

class AdminProducts
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllProducts()
    {
        try {
            $sql = 'SELECT `products`.*, categories.name FROM `products`
            INNER JOIN categories ON products.CategoryID = categories.id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insertProducts(
        $ProductName,
        $Price,
        $StockQuantity,
        $Color,
        $Storage,
        $Size,
        $SKU,
        $CategoryID,
        $Description,
        $Image
    ) {
        try {
            $sql = "INSERT INTO `products`(ProductName,
        Price,
        StockQuantity,
        Color,
        Storage,
        Size,
        SKU,
        CategoryID,
        Description,
        Image) 
            VALUES (:ProductName,
        :Price,
        :StockQuantity,
        :Color,
        :Storage,
        :Size,
        :SKU,
        :CategoryID,
        :Description,
        :Image)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ProductName' => $ProductName,
                ':Price' => $Price,
                ':StockQuantity' => $StockQuantity,
                ':Color' => $Color,
                ':Storage' => $Storage,
                ':Size' => $Size,
                ':SKU' => $SKU,
                ':CategoryID' => $CategoryID,
                ':Description' => $Description,
                ':Image' => $Image,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
