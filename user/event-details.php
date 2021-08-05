<?php
include_once("../admin/DAO.php");
session_start();
if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $ev = getListEventByID($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<title>Xem Chi Tiết</title>
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
        <div class="container-fluid">
            <div class="container">
                <p class="w3-text-black w3-center"><span><b class="w3-xlarge"><?php echo $ev["topic"] ?></b></span></p><br>
                <i class="fa fa-calendar w3-large" aria-hidden="true"> Thời Gian: <span><?php echo $ev["date"] ?></span></i><br><br>
                <p class="w3-large w3-text-left"> <?php echo $ev["content"] ?> </p>
                <div class="w3-center w3-padding-16 w3-small">
                    <?php echo "<img src='../admin/uploads/" . $ev["image"] . "' alt='' style='width: 100%; max-width:520px;'>"; ?>
                </div>
                <br>
                <p class="w3-large w3-text-left"> <?php echo $ev["details"] . "<br>" ?> </p>
            </div>
        </div>
    </section>
    <div class="w3-padding-48"></div>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>