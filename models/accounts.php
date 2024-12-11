<?php

class Accounts
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkLogin($Email, $PasswordHash)
    {
        try {
            $sql = "SELECT * FROM accounts WHERE Email = :Email";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute(['Email' => $Email]);

            $user = $stmt->fetch();
            // var_dump($user['PasswordHash']);
            // die();
            // $vrf = password_verify($PasswordHash, $user['PasswordHash']);
            if ($user && password_verify($PasswordHash, $user['PasswordHash'])) {
                // var_dump($PasswordHash);
                // die();
                if ($user['RoleID'] == 2) {
                    return $user['Email'];
                }
                // else {
                //     return "Tài khoản không đủ quyền!";
                // }
            } else {
                // var_dump($vrf);
                // die();
                return "Email hoặc mật khẩu không chính xác!";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function checkRegister($Email)
    {
        try {
            $sql = "SELECT Email FROM accounts WHERE Email = :Email";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute(['Email' => $Email]);

            $user = $stmt->fetch();
            return $user;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }



    public function insetAccount($Username, $Email, $PasswordHash)
    {
        try {
            $sql = "INSERT INTO `accounts`(`Username`, `Email`, `PasswordHash`) 
            VALUES (:Username, :Email, :PasswordHash)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':Username' => $Username,
                ':Email' => $Email,
                ':PasswordHash' => $PasswordHash
            ]);

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAccountFromEmail($Email)
    {
        try {
            $sql = "SELECT `accounts`.*, orders.*
            FROM accounts
            INNER JOIN orders ON accounts.AccountID = orders.AccountID
            WHERE accounts.Email = :Email";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':Email' => $Email,
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAccountFromEmailUserClient($Email)
    {
        try {
            $sql = "SELECT * FROM `accounts` WHERE Email = :Email";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':Email' => $Email,
            ]);

            return $stmt->fetch();
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

    public function getAccountFormEmail($Email)
    {
        try {
            $sql = "SELECT * FROM `accounts` WHERE Email = :Email";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':Email' => $Email,
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAccountFormEmailUpdate($Email)
    {
        try {
            $sql = "SELECT AccountID FROM `accounts` WHERE Email = :Email";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':Email' => $Email,
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
