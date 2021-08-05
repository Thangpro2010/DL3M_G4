<?php
session_start();
include("includes/header.php");
include("includes/navbar-user.php");
// include("includes/topbar-user.php");
include_once("DAO.php");
function checkfile($imagefile)
{
    $extension = pathinfo($imagefile, PATHINFO_EXTENSION);
    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
    foreach ($allowtypes as $a) {
        if ($a == $extension) {
            return true;
        }
    }
    return false;
}
if (isset($_POST["submit"])) {
    // form da duoc submit
    if ((isset($_POST["submit"])) && (checkfile($_FILES["file"]["name"]))) {
        $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $file = $_FILES["file"]["tmp_name"];
        $tour_id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $days = $_POST["days"];
        $content = $_POST["content"];
        $nos = $_POST["nos"];
        $region = $_POST["region"];
        $path = $_FILES["file"]["name"];
        $TT = '/^TT[0-9]{4}$/';
        $TN = '/^TN[0-9]{4}$/';
        $TB = '/^TB[0-9]{4}$/';
        if (preg_match($TT, $tour_id) || preg_match($TN, $tour_id) || preg_match($TB, $tour_id)) {
            if ((isset($_FILES["file"])) && (!$_FILES["file"]["error"])) {
                if (move_uploaded_file($file, "../admin/uploads/" . $path)) {
                    $b = new tour($tour_id, $name, $price, $days, $content, $path, $nos, $region);
                    tour::createTour($b);
                    echo "<script type='text/javascript'>
                        alert('Đã Thêm Tour Thành Công.');
                        window.location = 'tour-view-user.php';
                    </script>";
                }
            }
        } else {
            echo "<script type='text/javascript'>
                    alert('Mã Tour Phải Là (TT,TN,TB) Và 4 Ký Số - Từ Chối Thêm');
                    window.location = 'tour-create-user.php';
                </script>";
        }
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
        <div class="container-fluid">
            <h6 style="font-weight: 800; font-size: 1.2rem; color: tomato;"><i class="fas fa-plus-square" style="font-weight: 500;"></i> THÊM THÔNG TIN TOUR</h6><br>
            <form action="" method="POST" enctype="multipart/form-data" style="font-size: 14px;">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for=""><b>ID:</b></label>
                            <input class="form-control" type="text" name="id" id="id" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for=""><b>Giá Tiền:</b></label>
                            <input class="form-control" type="number" name="price" id="price" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7"">
                <div class=" form-group">
                        <label for=""><b>Tên Tour:</b></label>
                        <input class="form-control" type="text" name="name" required>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for=""><b>Số Ngày:</b></label>
                        <input class="form-control" type="number" name="days" required>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label for=""><b>Khu Vực:</b></label>
                    <input class="form-control" type="text" name="region" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for=""><b>Số Chỗ Ngồi:</b></label>
                    <input class="form-control" type="number" name="nos" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for=""><b>Nội Dung:</b></label>
            <textarea class="form-control" name="content" id="content" rows="8" cols="30"></textarea>
        </div><br>
        <input class="form-control-file" type="file" name="file" style="font-size: 16px;" required>
        <div style="padding: .4rem;"></div>
        <div class="form-group">
            <div class="container">
                <input type="submit" value="Thêm Tour Mới" class="btn btn-info" name="submit" style="font-size: 16px; float: right;">
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