<?php
session_start();
include("includes/header.php");
include("includes/navbar-user.php");
// include("includes/topbar-user.php");
include_once("DAO.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    tour::deleteTour($id);
}
?>
<!-- Begin Page Content -->
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
            <h5 style="font-weight: 800; color: tomato; padding-bottom: .6rem;">DANH SÁCH TOUR</h5>
            <a href="tour-create-user.php"><button type="add" class="btn btn-warning" style='font-size:14px;'><i class="fas fa-plus-square"></i></button></a>
            <br><br>
            <div class="table-responsive" style="font-size: 14.4px;">
                <table class="table table-hover">
                    <thead>
                        <tr style="background-color: #4e73df; color: white;">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Days</th>
                            <th scope="col">Content</th>
                            <th scope="col">Image</th>
                            <th scope="col">NOS</th>
                            <th scope="col">Region</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Schedule</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ds = tour::getListTourAdmin();
                        $sum_count = countTour();
                        $pages = ceil($sum_count / 4);
                        foreach ($ds as $row) {
                            echo "<tr>";
                            echo "<td> <b> {$row['tour_id']} </b> </td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . number_format($row["price"], 0, ',', ',') . 'đ' . "</td>";
                            echo "<td>" . $row["days"] . "  </td>";
                            echo "<td>" . substr($row["content"], 0, 90) . "...</td>";
                            echo "<td> <img src='../admin/uploads/" . $row['image'] . "' alt='' style='width:140px;'></td>";
                            echo "<td>" . $row["nos"] . "  </td>";
                            echo "<td>" . $row["region"] . "  </td>";
                            echo "<td>";
                            echo "<a href='tour-edit-user.php?id={$row['tour_id']}'><button type='edit' class='btn btn-info' name='edit' style='font-size:12px;'><i class='fas fa-edit'></i></button></a>";
                            echo "<td>";
                            echo "<a href='tour-view-user.php?id={$row['tour_id']}'><button type='delete' class='btn btn-danger' onclick='return confirm(\"Bạn Có Chắc Muốn Xóa Tour Này ?\")' style='font-size:12px;'><i class='fas fa-trash-alt'></i></button></a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a href='schedule-create-user.php?id={$row['tour_id']}'><button type='add' class='btn btn-success' style='font-size:14px;'><i class='fas fa-calendar-week'></i></button></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example" style="float: right; padding: 4px;">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                    ?>
                        <li class="page-item"><a class="page-link" href="tour-view-user.php?pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <?php
    include("includes/script.php");
    include("includes/footer.php");
    ?>