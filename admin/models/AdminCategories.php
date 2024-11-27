<?php

class AdminCategories
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
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

    public function insertCategories($categoryName, $description)
    {
        try {
            $sql = "INSERT INTO `categories`(`name`, `Description`) 
            VALUES (:name, :Description)";
            // var_dump($sql);
            // die();
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':name' => $categoryName,
                ':Description' => $description,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getDetailCategory($id)
    {
        try {
            $sql = "SELECT * FROM `categories` WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id,
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateCategories($id, $categoryName, $description)
    {
        try {
            $sql = "UPDATE `categories` SET `name`= :name ,`Description`= :Description WHERE `id`= :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':name' => $categoryName,
                ':Description' => $description,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function destroyCategories($id)
    {
        try {
            $sql = "DELETE FROM `categories` WHERE `id`= :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
