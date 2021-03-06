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
        $event_id = $_POST["id"];
        $topic = $_POST["topic"];
        $content = $_POST["content"];
        $details = $_POST["details"];
        $date = $_POST["date"];
        $path = $_FILES["file"]["name"];
        if ((isset($_FILES["file"])) && (!$_FILES["file"]["error"])) {
            if (move_uploaded_file($file, "../admin/uploads/" . $path)) {
                editEvent($event_id, $topic, $path, $content, $details, $date);
                echo "<script type='text/javascript'>
                        alert('Đã Cập Nhật Sự Kiện Thành Công.');
                        window.location = 'events-view-user.php';
                    </script>";
            }
        }
    }
}
if (isset($_GET["id"]) == false) {
    header("location:events-view-user.php");
    exit();
}
$id = $_GET["id"];
$ds = getListEventByID($id);
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
            <h6 style="font-weight: 800; font-size: 1.2rem; color: tomato;"><i class="fas fa-edit" style="font-weight: 500;"></i> CẬP NHẬT SỰ KIỆN</h6><br>
            <form action="" method="POST" enctype="multipart/form-data" style="font-size: 14px;">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>ID:</b></label>
                            <input class="form-control" type="text" name="id" id="id" readonly value="<?php echo $ds['event_id'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>Đề Tài:</b></label>
                            <input class="form-control" type="text" name="topic" id="topic" required value="<?php echo $ds['topic'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for=""><b>Nội Dung Đề Tài:</b></label>
                            <textarea class="form-control" name="content" id="content" rows="5"><?php echo $ds['content'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for=""><b>Nội Dung Chi Tiết:</b></label>
                            <textarea class="form-control" name="details" id="details" rows="5"><?php echo $ds['details'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><b>Ngày:</b></label>
                    <input class="form-control" type="date" name="date" id="date" required value="<?php echo $ds['date'] ?>">
                </div>
                <br>
                <div class="form-group">
                    <span>Ảnh Trước: </span><br>
                    <?php echo "<img src='uploads/{$ds['image']}' alt='' width=300px;> <br><br>" ?>
                    <input class="form-control-file" type="file" name="file" style="font-size: 16px;" required>
                </div><br>
                <div class="form-group">
                    <input type="submit" value="Cập Nhật Sự Kiện" class="btn btn-info" name="submit" style="font-size: 16px; float: right;">
                </div>
                <br>
            </form>
        </div>
        <?php
        include("includes/script.php");
        include("includes/footer.php");
        ?>

        </body>

        </html>