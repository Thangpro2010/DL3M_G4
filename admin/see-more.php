<?php
session_start();
include("includes/header.php");
include("includes/navbar-user.php");
// include("includes/topbar-user.php");
include_once("DAO.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $ds = getListBookingId($id);
    $uid = $_GET["uid"];

    if ($ds['schedule_id'] == $uid) {
        $ds2 = getListScheduleId($uid);
    }
    // $tour = tour::getListTourAdmin();
    // echo "<pre>";
    // print_r($tour);
    // die();
}
$ds3 = tour::getListTourAdmin();
$tour = getListTourById($ds2["tour_id"]);
$ds4 = user::getListUser();
$user = getUserId($ds["customer_id"]);

if (isset($_POST["btOK"])) {
    if ($ds["status"] == "Đã Duyệt") {
        echo "<script type='text/javascript'>
                alert('Đã Duyệt Hóa Đơn Này, Từ Chối Duyệt Lại.');
                window.location = 'details-view-user.php';
            </script>";
        if ($ds2["remanders"] > $ds["amount"]) {
            echo "<script type='text/javascript'>
                alert('Không Thể Duyệt Hóa Đơn Này Vì Số Chỗ Còn Lại Bé Hơn Số Lượng Đặt.');
                window.location = 'details-view-user.php';
            </script>";
        }
    } else {
        $booking_id = $ds["booking_id"];
        $status = "Đã Duyệt";
        $schedule_id = $ds2["schedule_id"];
        $remanders = $ds2["remanders"] - $ds["amount"];
        editScheduleRemanders($schedule_id, $remanders);
        editBookingStatus($booking_id, $status);
    }
?>
    <script type="text/javascript">
        alert("Đã Duyệt Thành Công.");
        window.location = "details-view-user.php";
    </script>

    <!-- echo "<h4 style='color: green; padding-left:3rem;'>Đã Duyệt Thành Công !!!</h4>"; -->
<?php
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
            <form action="" method="POST">
                <div class="container">
                    <div class="card-title" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background-color: #4e73df;">
                        <h5 style="font-weight: 800; color: white; text-align: center; padding-top: .6rem;">CHI TIẾT ĐƠN ĐẶT TOUR</h5>
                        <div class="card-body" style="background-color: white;">
                            <div class="row">
                                <div class="col-lg-6">

                                    <label for="" style="color: tomato; font-weight: 800;">Email: </label>
                                    <input type="text" name="status" id="status" style="width: 204px; border: none; outline: none;" readonly value="<?php echo $user["email"] ?>">
                                    <div style="padding: .1px;"></div>
                                    <label for="" style="color: tomato; font-weight: 800;">Tên Khách Hàng: </label>
                                    <input type="text" name="" id="" style="width: 204px; border: none; outline: none;" readonly value="<?php echo $user["name"] ?>">
                                    <div style="padding: .1px;"></div>
                                    <label for="" style="color: tomato; font-weight: 800;">Số Điện Thoại: </label>
                                    <input type="text" name="" id="" style="width: 204px; border: none; outline: none;" readonly value="<?php echo "+" . $user["phone"] ?>">
                                    <div style="padding: .1px;"></div>
                                    <label for="" style="color: tomato; font-weight: 800;">Ngày Bắt Đầu: </label>
                                    <input type="text" name="" id="" style="width: 204px; border: none; outline: none;" readonly value="<?php echo $ds2["start_date"] ?>">
                                    <div style="padding: .1px;"></div>
                                    <label for="" style="color: tomato; font-weight: 800;">Người Lớn: </label>
                                    <input type="text" name="" id="" style="width: 204px; border: none; outline: none;" readonly value="<?php echo $ds["persons"] ?>">
                                    <div style="padding: .1px;"></div>
                                    <label for="" style="color: tomato; font-weight: 800;">Trẻ Em: </label>
                                    <input type="text" name="" id="" style="width: 204px; border: none; outline: none;" readonly value="<?php echo $ds["children"] ?>">
                                    <div style="padding: .1px;"></div>
                                    <label for="" style="color: tomato; font-weight: 800;">Số Chỗ Còn Lại: </label>
                                    <input type="text" name="" id="" style="width: 204px; border: none; outline: none;" readonly value="<?php echo $ds2["remanders"] ?>">
                                    <div style="padding: .1px;"></div>
                                    <label for="" style="color: tomato; font-weight: 800;">Thành Tiền: </label>
                                    <input type="text" name="" id="" style="width: 204px; border: none; outline: none;" readonly value="<?php echo number_format($ds["payment_term"], 0, ',', ',') . "đ" ?>">
                                    <div style="padding: .6px;"></div>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="" id="" style="width: 100%; border: none; outline: none; color: tomato; font-weight: 800;" readonly value="<?php echo $tour["name"] ?>">
                                    <?php
                                    echo "<img src='../admin/uploads/" . $tour['image'] . "' alt='' style='width:100%;'>";
                                    ?>
                                </div>
                            </div>
                            <br>
                            <input type="submit" value="Duyệt" name="btOK" id="btOK" class="btn btn-success">
                            <div style="padding: .2rem;"></div>
                        </div>
                    </div>
                </div>
                <div style="padding: .2rem;"></div>
            </form>
        </div>
    </div>
    <?php
    include("includes/script.php");
    include("includes/footer.php");
    ?>