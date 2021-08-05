<?php
session_start();
include_once("../admin/DAO.php");

// $booking = booking::getListBooking();
// // var_dump($booking);
// // exit();

?>
<!DOCTYPE html>
<html>
<title>Đánh Giá</title>
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
        <p class="w3-text-black w3-center"><span><b class="w3-xlarge">ĐÁNH GIÁ CHẤT LƯỢNG</b></span></p><br>
        <div class="w3-container">
            <p class="w3-large">
                Chân thành cảm ơn Quý khách đã tín nhiệm và sử dụng các dịch vụ của DL3M. Với mong muốn không ngừng nâng cao
                chất lượng sản phẩm để phục vụ khách hàng ngày càng tốt hơn, chúng tôi rất mong Quý khách dành ít thời gian đóng
                góp ý kiến theo bảng dưới đây, hoặc Quý khách cũng có thể góp ý trực tiếp bằng thư điện tử cho Phòng Chăm sóc
                Khách hàng qua email: DL3M@gmail.com.vn
            </p>
        </div>
        <div class="w3-padding-16"></div>
        <div class="w3-container w3-large">
            <div id="content_gopy">
                <div class="form-group">
                    <div><b>Thông tin cá nhân (Personal information)</b></div>
                    <div style="color: #F00">*Thông tin cần có (Required field)</div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Họ và tên: </label>
                            <input type="text" class="form-control" id="name" placeholder="Họ và tên">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="diachi">Địa chỉ:</label>
                            <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="dienthoai">Điện thoại:* </label>
                            <input type="text" class="form-control" id="dienthoai" placeholder="Điện thoại">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Thư điện tử: </label>
                            <input type="email" class="form-control" id="email" placeholder="Thư điện tử">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tuoi">Tuổi: </label>
                            <input type="text" class="form-control" id="tuoi" placeholder="Tuổi">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="diachi">Tuyến du lịch:* </label>
                            <input type="text" class="form-control" id="tuyen_dulich" placeholder="Tuyến du lịch">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-padding-16"></div>
            <div class="form-group">
                <label style="display: block;"><b>Quý khách mong muốn chương trình khuyến mãi nào nhất (Which promotion do you expect)?</b></label><div class="w3-padding"></div>
                <input type="radio" name="khuyenmai" value="quà tặng"> Quà Tặng <input type="radio" name="khuyenmai" value="Giảm Giá" style="margin-left: 5rem;"> Giảm Giá
            </div>
            <div class="w3-padding-16"></div>
            <div class="row">
                <div class="col-lg-12"><b>Đánh giá dịch vụ:</b></div><br><br>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">Chi tiết<br>(Details)</th>
                                    <th class="text-center">Xuất sắc<br>(Excellent)</th>
                                    <th class="text-center">Tốt<br>(Good)</th>
                                    <th class="text-center">Trung bình<br>(Fair)</th>
                                    <th class="text-center">Kém<br>(Bad)</th>
                                    <th class="text-center">Ý kiến cụ thể<br>(Your comment/ Suggestions)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">Đánh Giá</td>
                                    <td class="text-center"><input type="radio" name="danhgia" value="Xuất sắc"></td>
                                    <td class="text-center"><input type="radio" name="danhgia" value="Tốt"></td>
                                    <td class="text-center"><input type="radio" name="danhgia" value="Trung bình"></td>
                                    <td class="text-center"><input type="radio" name="danhgia" value="Kém"></td>
                                    <td><textarea class="form-control" name="orther_danhgia" id="orther_danhgia"></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LcLuVsUAAAAAMskyU79Vd20sa2lt_OatyHJBXAI"></div>
                <div id="g-recaptcha-error"></div>
            </div>
            <div class="form-group"><button id="dk_daily" type="submit" class="btn btn-primary" style="font-size: 1.6rem; float: right;"> Gửi ý kiến</button></div>
        </div>
    </div>
    <div class="w3-padding-24"></div>
    <!-- Footer -->
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>
