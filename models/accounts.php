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

    public function getAccountFromEmail($Email)
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
}
