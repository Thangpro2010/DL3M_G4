<?php
session_start();
include("includes/header.php");
include("includes/navbar-user.php");
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
        $sevice_id = $_POST["id"];
        $topic = $_POST["topic"];
        $address = $_POST["address"];
        $path = $_FILES["file"]["name"];
        if ((isset($_FILES["file"])) && (!$_FILES["file"]["error"])) {
            if (move_uploaded_file($file, "../admin/uploads/" . $path)) {
                $e = new service($sevice_id, $topic, $path, $address);
                service::createService($e);
                echo "<script type='text/javascript'>
                        alert('Đã Thêm Dịch Vụ Thành Công.');
                        window.location = 'service-view-user.php';
                    </script>";
            }
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
            <h6 style="font-weight: 800; font-size: 1.2rem; color: tomato;"><i class="fas fa-plus-square" style="font-weight: 500;"></i> THÊM THÔNG TIN DỊCH VỤ</h6><br>
            <form action="" method="POST" enctype="multipart/form-data" style="font-size: 14px;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>ID:</b></label>
                            <input class="form-control" type="text" name="id" id="id" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>Đề Tài:</b></label>
                            <input class="form-control" type="text" name="topic" id="topic" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><b>Địa Chỉ:</b></label>
                    <input class="form-control" type="text" name="address" id="address" required>
                </div><br>
                <input class="form-control-file" type="file" name="file" style="font-size: 16px;" required>
                <div style="padding: .4rem;"></div>
                <div class="form-group">
                    <div class="container">
                        <input type="submit" value="Thêm Dịch Vụ" class="btn btn-info" name="submit" style="font-size: 16px; float: right;">
                    </div>
                </div>
                <div style="padding: 2rem;"></div>
                <br>
            </form>
        </div>
    </div>
    <?php
    include("includes/script.php");
    include("includes/footer.php");
    ?>
    </body>

    </html>