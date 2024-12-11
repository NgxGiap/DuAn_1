<?php

class AdminReportsController
{
    public $adminOrders;
    public $adminProducts;
    public $adminCategories;
    public $adminAccounts;
    public $adminReports;

    public function __construct()
    {
        $this->adminOrders = new AdminOrders();  // Lấy dữ liệu từ bảng orders
        $this->adminProducts = new AdminProducts(); // Lấy dữ liệu từ bảng products
        $this->adminCategories = new AdminCategories(); // Lấy dữ liệu từ bảng categories
        $this->adminAccounts = new AdminAccounts(); // Lấy dữ liệu từ bảng accounts
        $this->adminReports = new AdminReports();
    }

    public function home()
    {
        // Lấy thống kê
        $totalRevenue = $this->adminOrders->getTotalRevenue();  // Tổng doanh thu
        $totalProducts = $this->adminProducts->getTotalProducts();  // Tổng sản phẩm
        $totalCategories = $this->adminCategories->getTotalCategories();  // Tổng danh mục
        $totalCustomers = $this->adminAccounts->getTotalCustomers();  // Tổng khách hàng

        // $dailyRevenue = $this->adminReports->getDailyRevenue();
        // $dailyOrders = $this->adminReports->getDailyOrders();
        // $newCustomers = $this->adminReports->getNewCustomers();
        // $recentOrders = $this->adminReports->getRecentOrders();
        // $trendingProducts = $this->adminReports->getTrendingProducts();


        // Lấy ngày bắt đầu và ngày kết thúc từ form (nếu có)
        $startDate = $_GET['start_date'] ?? null;
        $endDate = $_GET['end_date'] ?? null;

        // Dữ liệu mặc định nếu không lọc (tuần này)
        if (!$startDate || !$endDate) {
            $startDate = date('Y-m-d', strtotime('-7 days')); // 7 ngày trước
            $endDate = date('Y-m-d'); // hôm nay
        }

        // Lấy dữ liệu từ Model
        $data = $this->adminReports->getDataByDateRange($startDate, $endDate);
        if ($data['TotalRevenue'] == NULL) {
            $data['TotalRevenue'] = 0;
        }
        // var_dump($data);
        // die();


        // Chuyển dữ liệu qua view
        require_once './views/home.php';
    }
}
