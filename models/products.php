<?php
class Products
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllProducts()
    {
        try {
            $sql = 'SELECT `products`.*, categories.name
            FROM products
            INNER JOIN categories ON products.CategoryID = categories.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
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

    public function getCommentFromProduct($id)
    {
        try {
            $sql = 'SELECT `comments`.*, products.ProductName, accounts.Username, accounts.Avatar FROM `comments` 
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

    public function getListProductCategory($CategoryID)
    {
        try {
            $sql = 'SELECT `products`.*, categories.name
            FROM products
            INNER JOIN categories ON products.CategoryID = categories.id
            WHERE products.CategoryID = ' . $CategoryID;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        require_once './views/layout/menu.php';
    }

    public function getAllCategories()
    {
        try {
            $sql = "SELECT * FROM `categories`";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getProductsxCategories($CategoryName)
    {
        try {
            $sql = 'SELECT `products`.*, categories.name
            FROM products
            INNER JOIN categories ON products.CategoryID = categories.id
            WHERE categories.name = :CategoryName';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':CategoryName' => $CategoryName]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function searchProductsByName($keyword)
    {
        try {
            $sql = "SELECT * FROM products WHERE ProductName LIKE :keyword";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':keyword' => '%' . $keyword . '%'
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
