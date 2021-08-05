<?php
include("includes/header.php");
include("includes/navbar.php");
include("includes/topbar.php");
include_once("DAO.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // tour::deleteTour($id);
}
?>
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