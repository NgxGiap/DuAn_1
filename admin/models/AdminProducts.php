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

            //     die("$ProductName,
            // $Price,
            // $StockQuantity,
            // $Color,
            // $Storage,
            // $Size,
            // $SKU,
            // $CategoryID,
            // $Description,
            // $Image");

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

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insertAlbum($ProductID, $SRC)
    {
        try {
            $sql = "INSERT INTO `album` (ProductID,SRC) 
            VALUES (:ProductID,:SRC)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ProductID' => $ProductID,
                ':SRC' => $SRC
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getDetailProduct($id)
    {
        try {
            $sql = 'SELECT `products`.*, categories.name FROM `products`
            INNER JOIN categories ON products.CategoryID = categories.id 
            WHERE products.ProductID = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getListAlbum($id)
    {
        try {
            $sql = 'SELECT * FROM `album` WHERE ProductID = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateProducts(
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
        $Image
    ) {
        try {
            $sql = "UPDATE `products` SET 
            `ProductName`= :ProductName,
            `Price`= :Price,
            `StockQuantity`= :StockQuantity,
            `Color`= :Color,
            `Storage`= :Storage,
            `Size`= :Size,
            `SKU`= :SKU,
            `CategoryID`= :CategoryID,
            `Description`= :Description,
            `Image`= :Image
            WHERE ProductID = :ProductID";

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
                ':ProductID' => $ProductID
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getDetailAlbum($id)
    {
        try {
            $sql = 'SELECT * FROM `album` WHERE ID = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateAlbum($id, $new_file)
    {
        try {
            $sql = "UPDATE `album` SET `SRC`= :new_file
            WHERE ID = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':new_file' => $new_file,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function destroyAlbum($albumID)
    {
        try {
            $sql = "DELETE FROM `album` WHERE `ID`= :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $albumID
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function destroyProducts($id)
    {
        try {
            $sql = "DELETE FROM `products` WHERE `ProductID`= :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Comments
    public function getCommentCustomer($id)
    {
        try {
            $sql = 'SELECT `comments`.*, products.ProductName, accounts.Username FROM `comments` 
            INNER JOIN products ON comments.ProductID = products.ProductID
            INNER JOIN accounts ON comments.AccountID = accounts.AccountID
            WHERE comments.AccountID = :id
            ';
            // var_dump($sql);
            // die;
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getDetailComment($id)
    {
        try {
            $sql = 'SELECT * FROM `comments` WHERE CommentID = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateStatusComments($id, $Status)
    {
        try {
            $sql = "UPDATE `comments` SET `Status`= :Status
            WHERE CommentID = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':Status' => $Status,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getCommentFromProduct($id)
    {
        try {
            $sql = 'SELECT `comments`.*, products.ProductName, accounts.Username FROM `comments` 
            INNER JOIN products ON comments.ProductID = products.ProductID
            INNER JOIN accounts ON comments.AccountID = accounts.AccountID
            WHERE comments.ProductID = :id
            ';
            // var_dump($sql);
            // die;
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Report
    public function getTotalProducts()
    {
        try {
            $sql = 'SELECT COUNT(*) AS total_products FROM products';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetch()['total_products'];
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getProductCountByCategory()
    {
        try {
            $sql = 'SELECT categories.name, COUNT(products.ProductID) AS product_count
                FROM categories
                LEFT JOIN products ON categories.CategoryID = products.CategoryID
                GROUP BY categories.name';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
