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
    <h5 style="font-weight: 800; color: tomato; padding-bottom: 1rem;">DANH SÁCH TOUR</h5>
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
                    echo "<td>" . substr($row["content"], 0,90) . "...</td>";
                    echo "<td> <img src='../admin/uploads/" . $row['image'] . "' alt='' style='width:140px;'></td>";
                    echo "<td>" . $row["nos"] . "  </td>";
                    echo "<td>" . $row["region"] . "  </td>";
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
                <li class="page-item"><a class="page-link" href="tour-view.php?pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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