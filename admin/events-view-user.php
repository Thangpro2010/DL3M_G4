<?php
session_start();
include("includes/header.php");
include("includes/navbar-user.php");
// include("includes/topbar-user.php");
include_once("DAO.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    event::deleteEvent($id);
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
            <h5 style="font-weight: 800; color: tomato; padding-bottom: .6rem;">DANH SÁCH SỰ KIỆN</h5>
            <a href="events-create-user.php"><button type="add" class="btn btn-warning" style='font-size:14px;'><i class="fas fa-plus-square"></i></button></a><br><br>
            <div class="table-responsive" style="font-size: 14.4px;">
                <table class="table table-hover">
                    <thead>
                        <tr style="background-color: #4e73df; color: white;">
                            <th>ID</th>
                            <th>Topic</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Details</th>
                            <th>Date</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ds = event::getListEvent();
                        $sum_count = countEvent();
                        $pages = ceil($sum_count / 4);
                        foreach ($ds as $row) {
                            echo "<tr>";
                            echo "<td> <b> {$row['event_id']} </b> </td>";
                            echo "<td> {$row['topic']} </td>";
                            echo "<td> <img src='../admin/uploads/" . $row['image'] . "' alt='' style='width:140px;'></td>";
                            echo "<td>" . substr($row["content"], 0, 120)  . "... </td>";
                            echo "<td>" . substr($row["details"], 0, 120)  . "... </td>";
                            echo "<td>" . $row["date"] . "  </td>";
                            echo "<td>";
                            echo "<a href='events-edit-user.php?id={$row['event_id']}'><button type='edit' class='btn btn-info' name='edit' style='font-size:12px;'><i class='fas fa-edit'></i></button></a>";
                            echo "<td>";
                            echo "<a href='events-view-user.php?id={$row['event_id']}'><button type='delete' class='btn btn-danger' onclick='return confirm(\"Bạn Có Chắc Muốn Xóa Sự Kiện Này ?\")' style='font-size:12px;'><i class='fas fa-trash-alt'></i></button></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example" style="float: right;">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                    ?>
                        <li class="page-item"><a class="page-link" href="events-view-user.php?pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
    </body>
    </html>