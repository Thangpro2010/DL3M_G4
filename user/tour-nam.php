<?php
include_once("../admin/DAO.php");
?>
<!DOCTYPE html>
<html>
<title>Miền Nam</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--w3 css-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--css-->
<link rel="stylesheet" href="css/index.css">
<!--font logo -->
<link href="https://fonts.googleapis.com/css2?family=Seaweed+Script&display=swap" rel="stylesheet">
<!--font-->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
<!--font awesome cdn search-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!--bootstrap css 5-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .w3-bar .w3-button {
        padding: 18px;
    }

    section .check {
        color: orange;
    }
</style>
<body>
    <?php
    include("includes/navbar.php");
    ?>
    <br><br>
    <div class="container address-to w3-padding-top-64">
        <a href="index.php" class="w3-text-black w3-hover-text-red" style="text-decoration: none;">Trang Chủ</a> ><a href="tour-nam.php" class="w3-text-black w3-hover-text-red" style="text-decoration: none;"> Miền Nam</a>
        <hr>
    </div>
    <!--Tour-->
    <div class="container w3-padding">
        <div class="w3-row">
            <?php
            $ds = tour::getListTourUser();
            foreach ($ds as $row) {
                if (substr($row['tour_id'], 0, 2) == "TN") {
            ?>
                    <div class="w3-col l3 m6 w3-container w3-padding-32">
                        <?php echo "<img src='../admin/uploads/" . $row["image"] . "' alt='' style='width: 100%; height:100%;'>"; ?>
                        <div class="w3-col w3-padding w3-border w3-card">
                            <h5><b style="font-size: 1.7rem;"><?php echo $row["name"] ?></b></h5><br>
                            <i class="fa fa-window-maximize w3-medium" aria-hidden="true"> Mã Tour: <span><?php echo $row["tour_id"] ?></span></i><br>
                            <i class="fa fa-usd w3-medium" aria-hidden="true"> Giá: <span class="w3-text-red"><?php echo number_format($row['price'],0,',',',') ?>đ</span></i><br>
                            <i class="fa fa-map-marker w3-medium" aria-hidden="true"> Nơi Đến: <span><?php echo $row["region"] ?></span></i><br><br>
                            <?php echo " <a href='tour-nam-details.php?id={$row['tour_id']}'><input class='submit-details w3-medium w3-right' type='submit' value='Xem Chi Tiết'></a>"?>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="w3-padding-48"></div>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>