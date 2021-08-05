<?php
include("includes/header.php");
include("includes/navbar.php");
include("includes/topbar.php");
include_once("DAO.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    service::deleteService($id);
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
<h5 style="font-weight: 800; color: tomato; padding-bottom: 1rem;">DANH SÁCH DỊCH VỤ</h5>
    <div class="table-responsive" style="font-size: 14.4px;">
        <table class="table table-hover">
            <thead>
                <tr style="background-color: #4e73df; color: white;">
                    <th>ID</th>
                    <th>Topic</th>
                    <th>Image</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ds = service::getListService();
                $sum_count = countService();
                $pages = ceil($sum_count / 4);
                foreach ($ds as $row) {
                    echo "<tr>";
                    echo "<td> <b> {$row['service_id']} </b> </td>";
                    echo "<td> {$row['topic']} </td>";     
                    echo "<td> <img src='../admin/uploads/" . $row['path'] . "' alt='' style='width:140px;'></td>";
                    echo "<td>" . $row["address"] . "  </td>";
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
            <li class="page-item"><a class="page-link" href="service-view.php?pages=<?php echo $i;?>"><?php echo $i; ?></a></li>
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