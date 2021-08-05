<?php
session_start();
include_once("../admin/DAO.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $persons = getListTourById($id);
    $a = getTourDate($id);
}
if ($_SESSION["user"]) {
    $user = $_SESSION["user"];
}

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
if (isset($_POST["btOK"])) {
    // booking
    $booking_id = booking::getBookingID();
    $people = $_POST['persons'];
    $chil = $_POST['children'];
    $date = $_POST['date'];
    $amount = $chil + $people;
    $payment_term = $_POST['tongtien'];
    $status = 'Chờ Duyệt';
    $note = $_POST['note'];
    $schedule_id = $_POST['schedule_id'];
    $customer_id = $user['customer_id'];
    $soluong = $persons['nos'];
    if ($amount > $soluong) {
        echo "<script type='text/javascript'>
                alert('Số Lượng Phải Bé Hơn Số Chỗ Ngồi, Vui Lòng Nhập Lại');
                window.location = 'booking-trung.php?id={$persons['tour_id']}';
            </script>";
    } else {
    }
    $create = new booking($booking_id, $people, $chil, $date, $amount, $payment_term, $status, $note, $schedule_id, $customer_id);
    booking::createBooking($create);
    echo "<script type='text/javascript'>
                alert('Đã Đặt Thành Công - Vui Lòng Kiểm Tra Gmail Trong 24 Giờ, Cảm Ơn Quý Khách Đã Sử Dụng Dịch Vụ DL3M.');
                window.location = 'tour-trung-user.php';
            </script>";
    // var_dump($create);
    // exit();
}

?>
<!DOCTYPE html>
<html>
<title>Booking</title>
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
    <div class="w3-padding-48"></div>
    <div class="container">
        <form action="" method="POST">
            <p style="font-weight: 600; font-size: 2rem;" class="w3-text-red">THÔNG TIN ĐẶT</p>
            <div class="w3-medium">
                <label for="">Tên Khách Hàng: </label><span><input type="text" style="border: none; outline: none; padding-left: .6rem; width: 200px;" name="" id="" value="<?php echo $user['name'] ?>" readonly></span><br>
                <label for="">Số Điện Thoại: </label><span><input type="text" style="border: none; outline: none; padding-left: .6rem; width: 200px;" name="" id="" value="<?php echo $user['phone'] ?>" readonly></span><br>
                <label for="">Email: </label><span><input type="text" style="border: none; outline: none; padding-left: .6rem; width: 320px;" name="" id="" value="<?php echo $user['email'] ?>" readonly></span><br>
                <label for="">Mã Tour: </label><span><input type="text" style="border: none; outline: none; padding-left: .6rem; width: 200px;" name="" id="" value="<?php echo $persons['tour_id'] ?>" readonly></span><br>
                <label for="">Tên Tour: </label><span><input type="text" style="border: none; outline: none; padding-left: .6rem; width: 320px;" name="" id="" value="<?php echo $persons['name'] ?>" readonly></span>
            </div>
            <div class="w3-padding"></div>
            <div class="table-responsive">
                <table class="table table-borderless" style="font-size: 1.5rem;">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">Loại Khách</th>
                            <th scope="col">Đơn Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Tổng Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Giá Người Lớn</td>
                            <td><input style="border: none; outline: none;" type="number" name="price1" id="price1" value="<?php echo $persons['price'] ?>" readonly></td>
                            <td><input style="border: none; outline: none;" type="number" name="persons" id="persons" value="1" min="1" max="100"></td>
                            <td>
                                <input style="border: none; outline: none;" name="price_sum1" id="price_sum1" value="<?php echo $persons['price'] ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Giá Trẻ Em</td>
                            <td><input style="border: none; outline: none;" type="number" name="price2" id="price2" value="<?php echo $price ?>" readonly></td>
                            <td><input style="border: none; outline: none;" type="number" name="children" id="children" value="0" min="0" max="100"></td>
                            <td>
                                <input style="border: none; outline: none;" type="number" name="price_sum2" id="price_sum2" value="0" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="w3-medium w3-padding-16 w3-text-red">
                                    <span style="font-size: 1.8rem;">Tổng Tiền: </span><input style="border: none; outline: none; font-size: 1.8rem;" type="number" name="tongtien" id="tongtien" readonly value="<?php echo $persons['price'] ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="w3-row" style="font-size: 1.5rem;">
                <div class="w3-col l6 w3-padding">
                    <label for="">Ghi Chú:</label>
                    <textarea class="form-control" name="note" id="note" cols="30" rows="6"></textarea>
                    <div class="w3-padding-16"></div>
                </div>
                <div class="w3-col l6 w3-padding">
                    <label for="">Chọn Ngày Khởi Hành:</label>
                    <select class="form-control" name="schedule_id" id="schedule_id">
                        <option value="" disabled>dd-mm-YY</option>
                        <?php
                        foreach ($a as $row) {

                            echo "<option value='{$row['schedule_id']}'>{$row['start_date']}</option>";
                        }
                        ?>
                    </select>
                    <input type="hidden" name="date" id="date">
                </div>
            </div>
            <div class="container">
                <input type="submit" value="Đặt Tour" name="btOK" class="btn btn-primary" style="font-size: 14px; float: right;">
            </div>
        </form>
    </div>
    <div class="w3-padding-48"></div>
    <script>
        $(document).ready(function() {
            $("#children, #persons").change(function() {
                let soluong1 = $("#persons").val();
                let soluong2 = $("#children").val();
                let price1 = $("#price1").val();
                let price2 = $("#price2").val();
                $("#price_sum1").val(price1 * soluong1);
                $("#price_sum2").val(price2 * soluong2);
                $("#tongtien").val((price1 * soluong1) + (price2 * soluong2));
            });
            $("#schedule_id").change(function() {
                var text = $("select[name='schedule_id'] option:selected").text();
                $("#date").val(text);
            });
            var text = $("select[name='schedule_id'] option:selected").text();
            $("#date").val(text);
        });
    </script>
    <?php
    include("includes/footer.php");
    ?>
</body>

</html>