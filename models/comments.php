<?php

class Comments
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addComment($comment)
    {
        try {
            $sql = "INSERT INTO comments (ProductID, AccountID, Content, CommentDate, Status) 
                VALUES (:ProductID, :AccountID, :Content, :CommentDate, :Status)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ProductID' => $comment['ProductID'],
                ':AccountID' => $comment['AccountID'],
                ':Content' => $comment['Content'],
                ':CommentDate' => $comment['CommentDate'],
                ':Status' => $comment['Status'],
            ]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
