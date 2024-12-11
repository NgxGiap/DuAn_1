<?php

class AdminReports
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getDataByDateRange($startDate, $endDate)
    {
        try {
            // Doanh thu theo khoảng thời gian
            $sqlRevenue = "SELECT SUM(CAST(REPLACE(REPLACE(TotalAmount, '.', ''), ' đ', '') AS DECIMAL(15, 2))) AS TotalRevenue
                            FROM Orders
                            WHERE DATE(OrderDate) BETWEEN :start_date AND :end_date AND order_status_id IN(2,4,5,6,7,10)";

            // Khách hàng mới theo khoảng thời gian
            $sqlCustomers = "SELECT COUNT(*) as new_customers 
                             FROM accounts 
                             WHERE DATE(CreatedAt) BETWEEN :start_date AND :end_date AND RoleID = 2";

            // Chuẩn bị truy vấn
            $stmtRevenue = $this->conn->prepare($sqlRevenue);
            $stmtCustomers = $this->conn->prepare($sqlCustomers);

            // Thực thi truy vấn
            $stmtRevenue->execute([':start_date' => $startDate, ':end_date' => $endDate]);
            $stmtCustomers->execute([':start_date' => $startDate, ':end_date' => $endDate]);

            return [
                'TotalRevenue' => $stmtRevenue->fetch()['TotalRevenue'],
                'new_customers' => $stmtCustomers->fetch()['new_customers']
            ];
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
