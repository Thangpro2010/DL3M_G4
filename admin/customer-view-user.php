<?php
session_start();

include("includes/header.php");
include("includes/navbar-user.php");
// include("includes/topbar-user.php");
include_once "DAO.php";
function getCountBooking($id)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]

    //lay du lieu trong bang [tbStudent] co ma so id -> $result
    $sql = "select * from tbbooking where customer_id= '$id' ";
    $a = mysqli_query($cn, $sql);
    $n = $a->num_rows;
    disconnectDB($cn);
    return $n;
}
if (isset($_GET["id"])) {
    // neu link delete da duoc nhap
    $id = $_GET["id"];
    if (getCountBooking($id) > 0) {
        echo "<script type='text/javascript'>
        alert('Không Thể Xóa Khách Hàng Này');
        window.location = 'customer-view-user.php';
    </script>";
    } else {
        user::deleteUser($id); // xoa sinh vien theo ma so id
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
            <h5 style="font-weight: 800; color: tomato; padding-bottom: 1rem;">DANH SÁCH KHÁCH HÀNG</h5>
            <div class="table-responsive" style="font-size: 14.4px;">
                <table class="table table-hover">
                    <thead>
                        <tr style="background-color: #4e73df; color: white;">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Ngày Sinh</th>
                            <th>Phone</th>
                            <th>Password</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ds = user::getListUser();
                        // $so_sv = count($ds);
                        foreach ($ds as $sv) {
                            echo "<tr>";
                            echo "<td> {$sv['customer_id']} </td>";
                            echo "<td> {$sv['name']} </td>";
                            echo "<td>" . ($sv["gender"] ? "Nam" : "Nu") . "  </td>";
                            echo "<td>" . $sv["email"] . "  </td>";
                            echo "<td>" . $sv["dob"] . "  </td>";
                            echo "<td>" . $sv["phone"] . "  </td>";
                            echo "<td> {$sv['password']} </td>";
                            echo "<td>";
                            echo "<a href='customer-view-user.php?id={$sv['customer_id']}'><button type='delete' class='btn btn-danger' onclick='return confirm(\"Bạn Có Chắc Muốn Xóa Khách Hàng Này ?\")' style='font-size:12px;'><i class='fas fa-trash-alt'></i></button></a>";
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
            for ($i = 1; $i <= $pages; $i++) {
            ?>
                <li class="page-item"><a class="page-link" href="tour-view.php?pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>
        </ul>
    </nav> -->
        </div>
    </div>
    <?php
    include("includes/script.php");
    include("includes/footer.php");
    ?>