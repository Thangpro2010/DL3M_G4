<?php
include("includes/header.php");
include("includes/navbar.php");
include("includes/topbar.php");
include_once("DAO.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // booking::deleteBooking($id);
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h5 style="font-weight: 800; color: tomato; padding-bottom: 1rem;">THÔNG TIN ĐẶT TOUR</h5>
    <div class="table-responsive" style="font-size: 14.4px;">
        <table class="table table-hover">
            <thead>
                <tr style="background-color: #4e73df; color: white;">
                    <!-- <th scope="col">Status</th> -->
                    <th scope="col">ID</th>
                    <th scope="col">Persons</th>
                    <th scope="col">Children</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Note</th>
                    <th scope="col">Customer_id</th>
                    <th scope="col">Schedule_id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ds = booking::getListBooking();
                // $sum_count = countTour();
                // $pages = ceil($sum_count / 6);
                foreach ($ds as $row) {
                    echo "<tr>";
                    // echo "<td> <div style='background-color: red; padding: ; color: white; text-align: center; padding:7px; font-size:12px'><b> {$row['status']} </b></div> </td>";
                    echo "<td>" . $row["booking_id"] . "</td>";
                    echo "<td>" . $row["persons"] . "</td>";
                    echo "<td>" . $row["children"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["amount"] . "</td>";
                    echo "<td>" . number_format($row["payment_term"], 0, ',', ',') . 'đ' ."</td>";
                    echo "<td>" . $row["note"] . "  </td>";
                    echo "<td>" . $row["customer_id"] . "</td>";
                    echo "<td>" . $row["schedule_id"] . "</td>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- <nav aria-label="Page navigation example" style="float: right; padding: 4px;">
        <ul class="pagination">
            <?php
            // for ($i = 1; $i <= $pages; $i++) {
            ?>
                <li class="page-item"><a class="page-link" href="tour-view.php?pages=<?php // echo $i; 
                                                                                        ?>"><?php //echo $i; 
                                                                                                            ?></a></li>
            <?php
            // }
            ?>
        </ul>
    </nav> -->
</div>
</div>
<?php
include("includes/script.php");
include("includes/footer.php");
?>