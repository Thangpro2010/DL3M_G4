<?php
session_start();
include_once("../admin/DAO.php");


?>
<?php
//ham lay danh sach sinh vien trong bang [tbstudent]
function getfblist($id)
{
    $cn = connectDB();  //ket noi voi DB [db2008A0]

    //doc het du lieu trong bang [tbStudent] -> $result
    $sql = "select * from tbfeedback where customer_id='$id'";
    $result = mysqli_query($cn, $sql);

    if ($result == false) {
        die("<h3>Not Found !<h3>");
    }

    //khai bao mang a[] chua cac dong du lieu trong result 
    $a = array();

    while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $a[] = $sv;
    }

    disconnectDB($cn);
    return $a;
}


?>
<!DOCTYPE html>
<html>
<title>Lịch Sử Đánh Giá</title>
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
    <div class="w3-container w3-padding-32">

        <p class="w3-text-black w3-center"><span><b class="w3-xlarge">LỊCH SỬ ĐÁNH GIÁ</b></span></p><br>
        <div class="w3-container">
            <p class="w3-large">
                Chân thành cảm ơn Quý khách đã tín nhiệm và sử dụng các dịch vụ của DL3M. Với mong muốn không ngừng nâng cao
                chất lượng sản phẩm để phục vụ khách hàng ngày càng tốt hơn, chúng tôi rất mong Quý khách dành ít thời gian đóng
                góp ý kiến theo bảng dưới đây, hoặc Quý khách cũng có thể góp ý trực tiếp bằng thư điện tử cho Phòng Chăm sóc
                Khách hàng qua email: DL3M@gmail.com.vn
            </p>
        </div>
        <div class="w3-padding-16"></div>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-borderless" style="font-size: 1.5rem;">
                    <thead>
                        <tr class="thead-dark">
                            <th>ID</th>
                            <th>Ngày</th>
                            <th>Khuyến Mãi</th>
                            <th>Đánh Giá</th>
                            <th>Ý Kiến Khác</th>
                            <th>Tour</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = $_GET["id"];
                        $ds = getfblist($id);
                        $so_sv = count($ds);

                        //doc tung dong -> [$sv]
                        foreach ($ds as $sv) {

                            echo "<tr>";
                            echo "<td> {$sv['feedback_id']} </td>";
                            echo "<td> {$sv['send_date']} </td>";
                            echo "<td>" . $sv["promotion"] . " </td>";
                            echo "<td>" . ($sv["quality"]) . "  </td>";
                            echo "<td>" . $sv["comments"] . "  </td>";
                            echo "<td>" . $sv["tour_name"] . "  </td>";

                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>

            </div>

        </div>
        <div class="w3-padding-24"></div>
    </div>
    <!-- Footer -->
    <?php
    include("includes/footer.php");
    ?>
</body>

</html>