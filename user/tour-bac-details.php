<?php
session_start();
include_once("../admin/DAO.php");
$id = $_GET['id'];
$persons = getListTourById($id);
$a = getTourDate($id);
if ($persons['price'] > 500000 && $persons['price'] < 2000000) {
    $children = '510000';
} else if ($persons['price'] >= 2000000 && $persons['price'] < 4000000) {
    $children = '724000';
} else if ($persons['price'] >= 4000000 && $persons['price'] < 6500000) {
    $children = '928000';
} else if ($persons['price'] >= 6500000 && $persons['price'] < 10000000) {
    $children = '1190000';
}

$price = $persons['price'] - $children;
$sum = $price + $persons['price'];
if (isset($_POST['booking'])) {
    $booking = header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<title>Miền Trung</title>
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
    <section>
        <div class="w3-padding-48"></div>
        <div class="w3-container">
            <div class="w3-container">
                <div class="w3-container w3-padding-32" style="background-color: #f5f6fa;">
                    <p class="w3-text-black w3-left w3-padding"><span><b style="font-size: 2.1rem;"><?php echo $persons['name'] ?></b></span></p>
                    <div class="w3-row">
                        <div class="w3-col l6 w3-padding-16">
                            <?php echo "<img class='w3-center w3-padding' src='../admin/uploads/" . $persons["image"] . "' alt='' style='width: 100%;'>"; ?>
                        </div>
                        <div class="w3-col l6 w3-padding" style="font-size: 1.66rem; margin-top: 1.2rem;">
                            <i class="fa fa-th-large" aria-hidden="true"> Mã Tour: <?php echo $persons['tour_id'] ?></i>
                            <div class="w3-padding"></div>
                            <i class="fa fa-calendar-alt" aria-hiden="true"> Ngày Bắt Đầu: <?php
                                                                                            foreach ($a as $row) {
                                                                                                echo $row['start_date'] .  " | ";
                                                                                            }
                                                                                            ?></i>
                            <div class="w3-padding"></div>
                            <i class="fa fa-calendar-o" aria-hidden="true"> Số Ngày: <?php echo $persons['days'] ?></i>
                            <div class="w3-padding"></div>
                            <i class="fa fa-location-arrow" aria-hidden="true"> Nơi Khởi Hành: <?php echo $persons['region'] ?></i>
                            <div class="w3-padding"></div>
                            <i class="fa fa-users" aria-hidden="true"> Số Chỗ: <?php echo $persons['nos'] ?></i>
                            <div class="w3-padding-16"></div>
                            <form action="" method="POST">
                                <table class="table table-borderless" style="font-size: 1.5rem;">
                                    <thead>
                                        <tr class="thead-dark">
                                            <th scope="col">Loại Khách</th>
                                            <th scope="col">Đơn Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Giá Người Lớn</td>
                                            <td style="color: red;"><?php echo "<p>" . number_format($persons['price'], 0, ',', ',') . "đ/người</p>" ?></td>
                                        </tr>
                                        <tr>
                                            <td>Giá Trẻ Em</td>
                                            <td style="color: red;"><?php echo "<p>" . number_format($price, 0, ',', ',') . "đ/người</p>" ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="<?php echo $booking ?>"><input type="submit" value="Đặt Tour" name="booking" class="btn btn-primary" style="float: right; font-size: 1.5rem;"></a>
                            </form>
                            <br><br>
                        </div>
                    </div>
                    <div class="w3-large w3-text-black w3-padding"><b>NỘI DUNG NGẮN</b>
                        <p class="w3-medium"><?php echo $persons['content'] ?></p>
                    </div>
                </div>
            </div>
            <div class="w3-padding-32"></div>
        </div>
        <div class="w3-padding-48"></div>
    </section>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>