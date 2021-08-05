<?php
include("includes/header.php");
include("includes/navbar.php");
include("includes/topbar.php");
include_once("DAO.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
<h5 style="font-weight: 800; color: tomato; padding-bottom: 1rem;">DANH SÁCH ĐÁNH GIÁ KHÁCH HÀNG</h5>
    <div class="table-responsive" style="font-size: 14.4px;">
        <table class="table table-hover">
            <thead>
                <tr style="background-color: #4e73df; color: white;">
                    <th>ID</th>
                    <th>FullName</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Promotion</th>
                    <th>Quality</th>
                    <th>Comments</th>
                    <th>Customer_id</th>
                    <th>Tour Name</th>
                    <th>Send Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ds = feedback::getListFeedback();
                $sum_count = countFeedback();
                $pages = ceil($sum_count / 6);
                foreach ($ds as $row) {
                    echo "<tr>";
                    echo "<td> <b> {$row['feedback_id']} </b> </td>";
                    echo "<td> {$row['fullname']} </td>";     
                    echo "<td>" . $row["phone"] . "  </td>";
                    echo "<td> {$row['email']} </td>";
                    echo "<td> {$row['promotion']} </td>";     
                    echo "<td>" . $row["quality"] . "  </td>";
                    echo "<td> {$row['comments']} </td>";
                    echo "<td> {$row['customer_id']} </td>";     
                    echo "<td>" . $row["tour_name"] . "  </td>";
                    echo "<td>" . $row["send_date"] . "  </td>";
                    echo "<tr>";
                    // echo "<td>";
                    // echo "<a href='service-edit-user.php?id={$row['sevice_id']}'><button type='edit' class='btn btn-info' name='edit' style='font-size:12px;'>Update</button></a>";
                    // echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example" style="float: right;">
        <ul class="pagination">
            <?php 
                for($i = 1; $i <= $pages; $i++){
            ?>
            <li class="page-item"><a class="page-link" href="feedback-view.php?pages=<?php echo $i;?>"><?php echo $i; ?></a></li>
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