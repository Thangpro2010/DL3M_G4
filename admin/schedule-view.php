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
    <h5 style="font-weight: 800; color: tomato; padding-bottom: 1rem;">DANH SÁCH LỊCH TRÌNH</h5>
    <div class="table-responsive" style="font-size: 14.4px;">
        <table class="table table-hover">
            <thead>
                <tr style="background-color: #4e73df; color: white;">
                    <th scope="col">ID</th>
                    <th scope="col">Start_Date</th>
                    <th scope="col">Remanders</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Tour</th>
                    <th scope="col">FeedBack</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ds = schedule::getListSchedule();
                $sum_count = countSchedule();
                $pages = ceil($sum_count / 6);
                foreach ($ds as $row) {
                    echo "<tr>";
                    echo "<td> <b> {$row['schedule_id']} </b> </td>";
                    echo "<td>" . $row["start_date"] . "</td>";
                    echo "<td>" . $row['remanders'] . "</td>";
                    echo "<td>" . $row["notes"] . "  </td>";
                    echo "<td>" . $row["tour_id"] . "  </td>";
                    echo "<td>" . $row["feedback_id"] . "  </td>";
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
                <li class="page-item"><a class="page-link" href="schedule-view.php?pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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