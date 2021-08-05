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
        $path = $_FILES["file"]["name"];
        $tour_id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $days = $_POST["days"];
        $content = $_POST["content"];
        $nos = $_POST["nos"];
        $region = $_POST["region"];
        if ((isset($_FILES["file"])) && (!$_FILES["file"]["error"])) {
            if (move_uploaded_file($file, "../admin/uploads/" . $path)) {
                editTour($tour_id, $name, $price, $days, $content, $path, $nos, $region);
                // echo "<h4 style='color: green; padding:24px;'>Đã Thay Đổi Thành Công !!!</h4>";
                echo "<script type='text/javascript'>
                        alert('Đã Cập Nhật Tour Thành Công.');
                        window.location = 'tour-view-user.php';
                    </script>";
            }
        }
    }
}
if (isset($_GET["id"]) == false) {
    header("location:tour-view-user.php");
    exit();
}
$id = $_GET["id"];
$ds = getListTourById($id);
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
            <h6 style="font-weight: 800; font-size: 1.2rem; color: tomato;"><i class="fas fa-edit" style="font-weight: 500;"></i> CẬP NHẬT TOUR</h6><br>
            <form action="" method="POST" enctype="multipart/form-data" style="font-size: 14px;">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for=""><b>ID:</b></label>
                            <input class="form-control" type="text" name="id" id="id" readonly value="<?php echo $ds['tour_id'] ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for=""><b>Giá Tiền:</b></label>
                            <input class="form-control" type="number" name="price" id="price" required value="<?php echo $ds['price'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7"">
                <div class=" form-group">
                        <label for=""><b>Tên Tour:</b></label>
                        <input class="form-control" type="text" name="name" required value="<?php echo $ds['name'] ?>">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for=""><b>Số Ngày:</b></label>
                        <input class="form-control" type="number" name="days" required value="<?php echo $ds['days'] ?>">
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label for=""><b>Khu Vực:</b></label>
                    <input class="form-control" type="text" name="region" required value="<?php echo $ds['region'] ?>">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for=""><b>Số Chỗ Ngồi:</b></label>
                    <input class="form-control" type="number" name="nos" required value="<?php echo $ds['nos'] ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for=""><b>Nội Dung:</b></label>
            <textarea class="form-control" name="content" id="content" rows="8"><?php echo $ds['content'] ?></textarea>
        </div><br>

        <div class="form-group">
            <span><b>Ảnh Trước: </b></span><br><br>
            <?php echo "<img src='uploads/{$ds['image']}' alt='' width=280px;> <br><br>" ?>
            <input class="form-control-file" type="file" name="file" style="font-size: 16px;" required>
        </div><br>
        <div class="form-group">
            <div class="container">
                <input type="submit" value="Cập Nhật Tour" class="btn btn-info" name="submit" style="font-size: 16px; float: right;">
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