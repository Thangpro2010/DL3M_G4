<?php
include("DAO.php");
include("includes/header.php");
include("includes/navbar.php");
include("includes/topbar.php");
?>
<!-- Content Wrapper -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 style="font-weight: 800; color: tomato;">Trang Chủ</h5>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                SỐ LƯỢNG TOUR</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                require 'count.php';
                                $query = "SELECT tour_id FROM tbtour ORDER BY tour_id";
                                $query_run = mysqli_query($conection, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<p> ' . $row . '</p>';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                DOANH THU
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $in = SumPayMent();
                                $sum = 0;
                                foreach ($in as $row) {
                                    $sum += $row["payment_term"];
                                }
                                echo number_format($sum, 0, ',', ',') . "đ";
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                ĐƠN ĐẶT CHỜ DUYỆT
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                require 'count.php';
                                $query = "SELECT * FROM tbbooking WHERE status='Chờ Duyệt'";
                                $query_run = mysqli_query($conection, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<p> ' . $row . '</p>';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                ĐÁNH GIÁ
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                require 'count.php';
                                $query = "SELECT feedback_id FROM tbfeedback ORDER BY feedback_id";
                                $query_run = mysqli_query($conection, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<p> ' . $row . '</p>';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php
include("includes/script.php");
include("includes/footer.php");
?>
</body>

</html>