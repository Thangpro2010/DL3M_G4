<?php
session_start();
include("includes/header.php");
include("includes/navbar-user.php");
// include("includes/topbar-user.php");
include_once("DAO.php");
if (isset($_POST["submit"])) {
    // form da duoc submit
    $schedule_id = $_POST['schedule_id'];
    $start_date = $_POST['start_date'];
    $notes = $_POST['notes'];
    editSchedule($schedule_id, $start_date, $notes);
    echo "<script type='text/javascript'>
            alert('Đã Cập Nhật Lịch Trình Thành Công.');
            window.location = 'schedule-view-user.php';
        </script>";
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $ds = getListScheduleId($id);
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
        <div class="container-fluid">
            <h6 style="font-weight: 800; font-size: 1.2rem; color: tomato;"><i class="fas fa-plus-square" style="font-weight: 500;"></i> CẬP NHẬT LỊCH TRÌNH</h6><br>
            <form action="" method="POST" enctype="multipart/form-data" style="font-size: 14px;">
                <div class="row">
                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for=""><b>ID: </b></label>
                            <input class="form-control" type="text" name="schedule_id" id="schedule_id" readonly value="<?php echo $ds['schedule_id'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for=""><b>Ngày Bắt Đầu:</b></label>
                            <input class="form-control" type="text" name="start_date" id="start_date" placeholder="dd-mm-YY" value="<?php echo $ds['start_date'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>Phần Còn Lại:</b></label>
                            <input class="form-control" type="number" value="<?php echo $ds['remanders'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for=""><b>ID Tour:</b></label>
                            <input class="form-control" type="text" value="<?php echo $ds['tour_id'] ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>ID Feedback:</b></label>
                            <input class="form-control" type="text" value="<?php ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><b>Ghi Chú:</b></label>
                    <textarea class="form-control" name="notes" id="notes" rows="6" cols="30"><?php echo $ds['notes'] ?></textarea>
                </div><br>
                <div style="padding: .4rem;"></div>
                <div class="form-group">
                    <div class="container">
                        <input type="submit" value="Cập Nhật" class="btn btn-info" name="submit" style="font-size: 16px; float: right;">
                    </div>
                </div>
                <div style="padding: 2rem;"></div>
            </form>
        </div>
        <?php
        include("includes/script.php");
        include("includes/footer.php");
        ?>
        </body>

        </html>