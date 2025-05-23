<?php

class Carts
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getCartFromID($id)
    {
        try {
            $sql = "SELECT * FROM `carts` WHERE AccountID = :AccountID";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':AccountID' => $id,
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getCartDetail($id)
    {
        try {
            $sql = "SELECT `cartdetails`.*, products.*
            FROM cartdetails
            INNER JOIN products ON cartdetails.ProductID = products.ProductID
            WHERE cartdetails.CartID = :CartID";

            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt->debugDumpParams());

            $stmt->execute([
                ':CartID' => $id,
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function addCart($id)
    {
        try {
            $sql = "INSERT INTO `carts`(`AccountID`) VALUES (:id)";
            // var_dump($id);
            // die();
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id,
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // public function removeProductFromCart($cartID, $productID)
    // {
    //     try {
    //         $sql = "DELETE FROM cartdetails WHERE CartID = :CartID AND ProductID = :ProductID";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([
    //             ':CartID' => $cartID,
    //             ':ProductID' => $productID,
    //         ]);
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    public function removeProductFromCart($productId, $cartId)
    {
        try {
            $sql = "DELETE FROM cartdetails WHERE ProductID = :ProductID AND CartID = :CartID";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ProductID' => $productId,
                ':CartID' => $cartId
            ]);

            return true; // Trả về true nếu xóa thành công
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false; // Trả về false nếu xảy ra lỗi
        }
    }


    public function updateCartQuantity($productId, $quantity, $cartId)
    {
        try {
            $sql = "UPDATE cartdetails 
                    SET Quantity = :Quantity 
                    WHERE ProductID = :ProductID AND CartID = :CartID";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':Quantity' => $quantity,
                ':ProductID' => $productId,
                ':CartID' => $cartId
            ]);

            return true; // Trả về true nếu cập nhật thành công
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false; // Trả về false nếu xảy ra lỗi
        }
    }



    // public function updateProductQuantity($cartID, $productID, $quantity)
    // {
    //     try {
    //         $sql = "UPDATE cartdetails SET Quantity = :Quantity 
    //         WHERE CartID = :CartID AND ProductID = :ProductID";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([
    //             ':Quantity' => $quantity,
    //             ':CartID' => $cartID,
    //             ':ProductID' => $productID,
    //         ]);
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }


    public function updateQuantity($CartID, $ProductID, $Quantity)
    {
        try {
            $sql = "UPDATE `cartdetails` SET `Quantity`=:Quantity
            WHERE CartID = :CartID AND ProductID = :ProductID";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':CartID' => $CartID,
                ':ProductID' => $ProductID,
                ':Quantity' => $Quantity,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function addCartDetail($CartID, $ProductID, $Quantity)
    {
        try {
            $sql = "INSERT INTO `cartdetails`(`CartID`, `ProductID`, `Quantity`) 
            VALUES (:CartID,:ProductID,:Quantity)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':CartID' => $CartID,
                ':ProductID' => $ProductID,
                ':Quantity' => $Quantity,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function clearCart($CartID)
    {
        try {
            $sql = "DELETE FROM cartdetails WHERE CartID = :CartID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':CartID' => $CartID]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
