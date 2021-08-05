<?php
session_start();
include_once("../admin/DAO.php");
?>
<!DOCTYPE html>
<html>
<title>Dịch Vụ</title>
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
    include("includes/navbar-user.php");
    ?>
    <section>
        <div class="w3-padding-48"></div>
        <div class="w3-container w3-padding-32">
            <?php
            $conection = mysqli_connect("localhost", "root", "", "db2008a0");
            $query = "SELECT service_id FROM tbservice ORDER BY service_id";
            $query_run = mysqli_query($conection, $query);
            $row = mysqli_num_rows($query_run);
            echo '<p class="w3-text-black w3-center"><span><b class="w3-xlarge">TOP ' . $row . ' KHÁCH SẠN HÀNG ĐẦU TẠI VIỆT NAM</b></span></p><br>';
            ?>
            <!-- Photo Grid -->
            <div class="w3-row-padding-16">
                <?php
                $dsa = service::getListServiceUser();
                foreach ($dsa as $row) {
                ?>
                    <div class="w3-col l3 m6 w3-margin-bottom zoom">
                        <div class="w3-display-container">
                            <div class="w3-display-topleft w3-text-white w3-padding" style="font-weight: 700; font-size: 14px;">
                                <span style="text-shadow:1px 1px 0 #444"> <?php echo $row["topic"] ?> </span>
                            </div>
                            <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                                <i class="fa fa-star check"></i>
                                <i class="fa fa-star check"></i>
                                <i class="fa fa-star check"></i>
                                <i class="fa fa-star check"></i>
                                <i class="fa fa-star"></i>
                                <br>
                                <i class="fa fa-map-marker w3-medium" aria-hidden="true""><span style=" font-family: Arial, Helvetica, sans-serif; text-shadow:1px 1px 0 #444; font-weight: 700;" class="w3-small"> <?php echo $row["address"] ?></span> </i>
                            </div>
                            <?php echo "<img src='../admin/uploads/" . $row["path"] . "' alt='' style='width: 100%; height: 200px'>"; ?>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- <div class="w3-col l3 m6 w3-margin-bottom zoom">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <br>
                            Khách sạn Sheraton Hà Nội
                        </div>
                        <img src="images/hotel2.jpg" alt="" style="width:100%">
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom zoom">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <br>
                            Sherwood Suites
                        </div>
                        <img src="images/hotel03.jpg" alt="" style="width:100%">
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom zoom">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <br>
                            Chicland Hotel Da Nang Beach
                        </div>
                        <img src="images/hotel04.jpg" alt="" style="width:100%">
                    </div>
                </div>
            </div>
            <div class="w3-row-padding-16">
                <div class="w3-col l3 m6 w3-margin-bottom zoom">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <br>
                            Sunbay Park Hotel & Resort Phan Rang
                        </div>
                        <img src="images/hotel05.jpg" alt="" style="width:100%">
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom zoom">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <br>
                            Azerai La Residence Hue
                        </div>
                        <img src="images/hotel06.jpg" alt="" style="width:100%">
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom zoom">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star"></i>
                            <br>
                            Khu nghỉ dưỡng Salinda Phú Quốc
                        </div>
                        <img src="images/hotel07.jpg" alt="" style="width:100%">
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom zoom">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <br>
                            Dalat Edensee Resort & Spa
                        </div>
                        <img src="images/hotel08.jpg" alt="" style="width:100%">
                    </div>
                </div>
            </div>
            <div class="w3-row-padding-16">
                <div class="w3-col l3 m6 w3-margin-bottom zoom">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star"></i>
                            <br>
                            Khu nghỉ dưỡng MerPerle Hòn Tằm
                        </div>
                        <img src="images/hotel09.jpg" alt="" style="width:100%">
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom zoom">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <br>
                            The Reverie Saigon
                        </div>
                        <img src="images/hotel10.jpg" alt="" style="width:100%">
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom zoom">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <br>
                            Khu Nghỉ Dưỡng JW Marriott Phu Quoc Emerald Bay
                        </div>
                        <img src="images/hotel11.jpg" alt="" style="width:100%">
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom zoom">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-text-white w3-padding" style="font-weight: 600; font-size: 14px;">
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <i class="fa fa-star check"></i>
                            <br>
                            L'Alya Ninh Vân Bay
                        </div>
                        <img src="images/hotel12.jpg" alt="" style="width:100%">
                    </div>
                </div> -->
            </div>
        </div>
        <div class="w3-padding-48"></div>
    </section>
    <?php
    include("includes/footer.php");
    ?>
</body>

</html>