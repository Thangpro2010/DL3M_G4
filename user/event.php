<?php
include_once("../admin/DAO.php");
$sum_count = countEvent();
$pages = ceil($sum_count / 4);
?>
<!DOCTYPE html>
<html>
<title>Sự Kiện</title>
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
        <div class="w3-container w3-padding-32">
            <p class="w3-text-black w3-center"><span><b class="w3-xlarge">NHỮNG SỰ KIỆN KHÔNG THỂ BỎ LỠ</b></span></p><br>
        </div>
        <?php
        $ds = event::getListEvent();
        foreach ($ds as $sv) {
        ?>
            <div class="container-fluid">
                <div class="container w3-padding" style="background-color: #f5f6fa;">
                    <div class="w3-row w3-padding-16">
                        <div class="w3-col l4 w3-center w3-padding">
                            <?php echo "<img src='../admin/uploads/" . $sv["image"] . "' alt='' style='width: 100%;'>"; ?>
                        </div>
                        <div class="w3-col l8 w3-padding">
                            <h5 style="font-family: sans-serif;"><b class="w3-large"> <?php echo $sv["topic"] ?> </b></h5>
                            <i class="fa fa-calendar w3-medium" aria-hidden="true"> Thời Gian: <span><?php echo $sv["date"] ?></span></i><br><br>
                            <p class="w3-medium"> <?php echo $sv["content"] ?> </p>
                        </div>
                        <a href="<?php echo "event-details.php?id={$sv['event_id']}" ?>"><input class="submit-details w3-xsmall w3-right" type="submit" value="Xem Chi Tiết"></a>
                    </div>
                </div>
            </div>
            <div class="w3-padding-32"></div>
        <?php
        }
        ?>
        <div class="container">
            <nav aria-label="Page navigation example" style="float: right;">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                    ?>
                        <li class="page-item"><a class="page-link" href="event.php?pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <div class="w3-padding-48"></div>
    </section>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>