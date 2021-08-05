<?php
session_start();
include("includes/header.php");
include("includes/navbar-user.php");
// include("includes/topbar-user.php");
include_once("DAO.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    booking::deleteBooking($id);
    if(isset($_GET["id"])&&isset($_GET["uid"])){
        $uid = $_GET["uid"];
    }
}

?>
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-lg-inline text-gray-600 small" id="name">
                            <?php
                            echo "Hi, " . $_SESSION['username'];
                            ?>
                        </span>
                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h5 style="font-weight: 800; color: tomato; padding-bottom: 1rem;">THÔNG TIN ĐẶT TOUR</h5>
            <div class="table-responsive" style="font-size: 14.4px;">
                <table class="table table-hover">
                    <thead>
                        <tr style="background-color: #4e73df; color: white;">
                            <th scope="col">Status</th>
                            <th scope="col">ID</th>
                            <th scope="col">Persons</th>
                            <th scope="col">Children</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Note</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Schedule</th>
                            <th scope="col">See More</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ds = booking::getListBooking();
                        // $sum_count = countTour();
                        // $pages = ceil($sum_count / 6);
                        foreach ($ds as $row) {
                            echo "<tr>";
                            if ($row["status"] == "Đã Duyệt") {
                                echo "<td> <div class='btn btn-success' style='color: white; text-align: center; padding:7px; font-size:12px'><b> {$row['status']} </b></div> </td>";
                            } else {
                                echo "<td> <div class='btn btn-danger' style='color: white; text-align: center; padding:7px; font-size:12px'><b> {$row['status']} </b></div> </td>";
                            }
                            echo "<td>" . $row["booking_id"] . "</td>";
                            echo "<td>" . $row["persons"] . "</td>";
                            echo "<td>" . $row["children"] . "</td>";
                            echo "<td>" . $row["date"] . "</td>";
                            echo "<td>" . $row["amount"] . "</td>";
                            echo "<td>" . number_format($row["payment_term"], 0, ',', ',') . 'đ' . "</td>";
                            echo "<td>" . $row["note"] . "  </td>";
                            echo "<td>" . $row["customer_id"] . "</td>";
                            echo "<td>" . $row["schedule_id"] . "</td>";
                            echo "<td>";
                            echo "<a href='see-more.php?id={$row['booking_id']}&uid={$row['schedule_id']}'><button type='seemore' class='btn btn-info' name='edit' style='font-size:12px;'><i class='fas fa-eye'></i></button></a>";
                            echo "<td>";
                            echo "<a href='details-view-user.php?id={$row['booking_id']}'><button type='delete' class='btn btn-danger' onclick='return confirm(\"Bạn Có Chắc Muốn Xóa Đơn Đặt Này ?\")' style='font-size:12px;'><i class='fas fa-trash-alt'></i></button></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- <nav aria-label="Page navigation example" style="float: right; padding: 4px;">
        <ul class="pagination">
            <?php
            // for ($i = 1; $i <= $pages; $i++) {
            ?>
                <li class="page-item"><a class="page-link" href="tour-view.php?pages=<?php // echo $i; 
                                                                                        ?>"><?php //echo $i; 
                                                                                            ?></a></li>
            <?php
            // }
            ?>
        </ul>
    </nav> -->
        </div>
    </div>
    <?php
    include("includes/script.php");
    include("includes/footer.php");
    ?>