<?php

class AdminAccounts
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllAccounts($RoleID)
    {
        try {
            $sql = 'SELECT * FROM `accounts` WHERE RoleID = :RoleID';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':RoleID' => $RoleID]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insertAdmin($Username, $Email, $FullName, $PasswordHash, $RoleID)
    {
        try {
            $sql = "INSERT INTO `accounts`(`Username`, `Email`, `FullName`, `PasswordHash`, `RoleID`) 
            VALUES (:Username, :Email, :FullName, :PasswordHash, :RoleID)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':Username' => $Username,
                ':Email' => $Email,
                ':FullName' => $FullName,
                ':PasswordHash' => $PasswordHash,
                ':RoleID' => $RoleID,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getDetailAccount($id)
    {
        try {
            $sql = "SELECT * FROM `accounts` WHERE AccountID = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id,
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateAccount($id, $Username, $Email, $FullName, $Phone)
    {
        try {
            $sql = "UPDATE `accounts` SET 
            `Username`= :Username,
            `Email`= :Email,
            `FullName`= :FullName,
            `Phone`= :Phone
            WHERE AccountID = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':Username' => $Username,
                ':Email' => $Email,
                ':FullName' => $FullName,
                ':Phone' => $Phone,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function resetPassword($id, $PasswordHash)
    {
        try {
            $sql = "UPDATE `accounts` SET 
            `PasswordHash`= :PasswordHash
            WHERE AccountID = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':PasswordHash' => $PasswordHash,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateCustomer($id, $Username, $Email, $FullName, $Phone)
    {
        try {
            $sql = "UPDATE `accounts` SET 
            `Username`= :Username,
            `Email`= :Email,
            `FullName`= :FullName,
            `Phone`= :Phone
            WHERE AccountID = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':Username' => $Username,
                ':Email' => $Email,
                ':FullName' => $FullName,
                ':Phone' => $Phone,
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
