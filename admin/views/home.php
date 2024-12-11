<!-- Header -->
<?php include './views/layout/header.php' ?>
<!-- End header -->

<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<!-- Sidebar -->
<?php include './views/layout/sidebar.php' ?>
<!-- /.sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2>Admin Reports</h2>
                    <div class="row">
                        <!-- Doanh thu -->
                        <div class="card-single col d-flex justify-content-around bg-primary text-white py-5 ml-3">
                            <div>
                                <h1 class="font-weight-bold"><?php echo formatPrice($totalRevenue) . ' đ'; ?></h1>
                                <span>Total Revenue</span>
                            </div>
                            <div>
                                <i class="fas fa-wallet" style="font-size: 80px;"></i>
                            </div>
                        </div>
                        <!-- Products -->
                        <div class="card-single col d-flex justify-content-around bg-warning text-white py-5 ml-3">
                            <div>
                                <h1 class="font-weight-bold"><?php echo $totalProducts; ?></h1>
                                <span>Total Products</span>
                            </div>
                            <div>
                                <i class="fab fa-product-hunt" style="font-size: 80px;"></i>
                                <!-- <i class=""></i> -->
                            </div>
                        </div>
                        <!-- Danh mục -->
                        <div class="card-single col d-flex justify-content-around bg-success text-white py-5 ml-3">
                            <div>
                                <h1 class="font-weight-bold"><?php echo $totalCategories; ?></h1>
                                <span>Total Categories</span>
                            </div>
                            <div>
                                <i class="fas fa-th-list" style="font-size: 80px;"></i>
                            </div>
                        </div>
                        <!-- Khách hàng -->
                        <div class="card-single col d-flex justify-content-around bg-danger text-white py-5 ml-3">
                            <div>
                                <h1 class="font-weight-bold"><?php echo $totalCustomers; ?></h1>
                                <span>Total Customers</span>
                            </div>
                            <div>
                                <i class="fas fa-users" style="font-size: 80px;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="filter-form">
                            <form method="GET" action="index.php">
                                <input type="hidden" name="act" value="home"> <!-- Giữ nguyên route -->

                                <label for="start_date">Ngày bắt đầu:</label>
                                <input type="date" id="start_date" name="start_date" value="<?= $_GET['start_date'] ?? date('Y-m-d', strtotime('-7 days')) ?>" required>

                                <label for="end_date">Ngày kết thúc:</label>
                                <input type="date" id="end_date" name="end_date" value="<?= $_GET['end_date'] ?? date('Y-m-d') ?>" required>

                                <button type="submit" class="btn btn-primary">Lọc dữ liệu</button>
                            </form>
                        </div>

                        <div class="report-summary">
                            <h3>Thống kê từ <?= htmlspecialchars($startDate) ?> đến <?= htmlspecialchars($endDate) ?>:</h3>
                            <p><strong>Doanh thu:</strong> <?= formatPrice($data['TotalRevenue']) . ' đ' ?></p>
                            <p><strong>Khách hàng mới:</strong> <?= $data['new_customers'] ?> khách</p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <canvas id="revenueChart"></canvas>
    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php' ?>
<!-- End footer -->
<!-- Biểu đồ doanh thu -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Doanh thu', 'Khách hàng mới'],
            datasets: [{
                label: 'Thống kê',
                data: [<?= $data['revenue'] ?>, <?= $data['new_customers'] ?>],
                backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!-- Code injected by live-server -->

</body>

</html>