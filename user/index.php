<!DOCTYPE html>
<html>
<title>Trang Chủ</title>
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
    /* Full height image header */
    .bgimg-1 {
        background-position: center;
        background-size: cover;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.5)), url("images/background.jpg");
        min-height: 100%;
        height: 70px;
    }

    .w3-bar .w3-button {
        padding: 18px;
    }

    section .check {
        color: orange;
    }
</style>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-card" id="myNavbar">
            <a class="w3-bar-item w3-wide logo-name" style="font-family: 'Seaweed Script', cursive; font-weight: 500; font-size: 2.26rem; padding: 0 6px">DL3M</a>
            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <a style="text-decoration: none; font-weight: 600;" href="index.php" class="w3-bar-item w3-button w3-hover-red"><i class="fa fa-home"></i> Trang Chủ</a>
                <a style="text-decoration: none; font-weight: 600;" href="service.php" class="w3-bar-item w3-button w3-hover-red"><i class="fa fa-th" aria-hidden="true"></i> Dịch Vụ</a>
                <a style="text-decoration: none; font-weight: 600;" href="event.php" class="w3-bar-item w3-button w3-hover-red"><i class="fa fa-calendar-o"></i> Sự Kiện</a>
                <a style="text-decoration: none; font-weight: 600;" href="login.php" class="w3-bar-item w3-button w3-hover-red"><i class="fa fa-user"></i> Đăng Nhập</a>
            </div>
            <!-- Hide right-floated links on small screens and replace them with a menu icon -->
            <a href="javascript:void(0)" class="w3-bar-item w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                <i class="fa fa-bars navbar-menu"></i>
            </a>
        </div>
    </div>
    <!-- Sidebar on small screens when clicking the menu icon -->
    <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" id="mySidebar">
        <a style="text-decoration: none;" onclick="w3_close()" class="w3-bar-item w3-wide w3-padding-16 logo-name-navbar w3-center w3-text-white w3-xlarge">DL3M</a>
        <hr>
        <a style="text-decoration: none;" href="index.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Trang Chủ</a>
        <a style="text-decoration: none;" href="service.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-th" aria-hidden="true"></i> Dịch Vụ</a>
        <a style="text-decoration: none;" href="event.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-calendar-o"></i> Sự Kiện</a>
        <a style="text-decoration: none;" href="login.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Đăng Nhập</a>
        <a style="text-decoration: none;" href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-medium"><i class="fa fa-times" aria-hidden="true"></i> Đóng</a>
    </nav>
    <!-- Header with full-height image -->
    <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
        <div class="w3-display-left w3-text-white">
            <span style="font-size: 2.8rem;">THÁM HIỂM, MƠ MỘNG, KHÁM PHÁ</span><br>
            <span class="w3-medium"><i>CUỘC ĐỜI LÀ NHỮNG CHUYẾN ĐI, ĐI ĐỂ TÌM NGƯỜI KHIẾN MÌNH MUỐN DỪNG LẠI! </i><i class="fa fa-paper-plane" aria-hidden="true"></i></span><br>
            <!--search-->
        </div>
    </header>
    <section>
        <div class="w3-padding-24"></div>
        <!--tour 3 miền-->
        <div class="container w3-padding-48 w3-center">
            <!-- Project Section -->
            <p class="w3-center w3-padding-16"><span><b class="w3-xlarge">TOUR DU LỊCH 3 MIỀN</b></span></p><br>
            <div class="w3-row-padding w3-center">
                <div class="w3-col l4 w3-margin-bottom w3-padding-16">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-red w3-padding w3-medium">Miền Bắc</div>
                        <img src="images/Tour3Mien_PhiaBac.jpg" alt="" style="width:100%">
                    </div>
                    <div class="w3-padding-16">
                        <a href="tour-bac.php" class="w3-center w3-large" style="font-weight: 600; text-decoration: none;">Khám Phá Ngay <i class="fa fa-hand-o-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="w3-col l4 w3-margin-bottom w3-padding-16">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-red w3-padding w3-medium">Miền Trung</div>
                        <img src="images/Tour3Mien_PhiaTrung.jpg" alt="" style="width:100%">
                    </div>
                    <div class="w3-padding-16">
                        <a href="tour-trung.php" class="w3-center w3-large" style="font-weight: 600; text-decoration: none;">Khám Phá Ngay <i class="fa fa-hand-o-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="w3-col l4 w3-margin-bottom w3-padding-16">
                    <div class="w3-display-container">
                        <div class="w3-display-bottomleft w3-red w3-padding w3-medium">Miền Nam</div>
                        <img src="images/Tour3Mien_PhiaNam.jpg" alt="" style="width:100%">
                    </div>
                    <div class="w3-padding-16">
                        <a href="tour-nam.php" class="w3-center w3-large" style="font-weight: 600; text-decoration: none;">Khám Phá Ngay <i class="fa fa-hand-o-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="w3-padding-32"></div>
        <!--video DL3M-->
        <div class="w3-container background-video w3-padding-16">
            <!--title video travel-->
            <p class="w3-center w3-padding-16"><span><b class="w3-xlarge">VIDEO DL3M</b></span></p><br>
            <div class="row">
                <div class="w3-container">
                    <div class="w3-col l6 w3-center">
                        <!--video travel-->
                        <video class="w3-center w3-padding" width="100%" height="50%" src="video/VideoTravelAroundVietNam2.mp4" autoplay muted></video>
                    </div><br><br>
                    <div class="w3-col l6 w3-center w3-padding-32">
                        <img class="w3-circle" src="images/User.jpg" alt="" width="80px"><br><br>
                        <p class="w3-padding w3-medium">"Trong tâm trí tôi, phần thưởng và hạnh phúc lớn nhất của việc đi là ngày nào ta cũng có thể trải nghiệm những thứ như thể là lần đầu, để không có gì là thân thuộc đến mức ta nhìn nhận nó như điều hiển nhiên. - Bill Bryson"</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w3-padding-48"></div>
        <!-- Một Số Hình Ảnh -->
        <div class="container">
            <p class="w3-center w3-padding-16"><span><b class="w3-xlarge">MỘT SỐ HÌNH ẢNH</b></span></p>
            <div class="w3-row">
                <div class="w3-container">
                    <div class="w3-col l4 w3-padding-32">
                        <img class="w3-padding" src="images/motsohinhanh.jpg" alt="" width="100%" height="auto">
                    </div>
                    <div class="w3-col l4 w3-padding-16">
                        <img class="w3-padding" src="images/motsohinhanh3.jpg" alt="" width="100%" height="auto">
                        <img class="w3-padding" src="images/motsohinhanh4.jpg" alt="" width="100%" height="auto">
                    </div>
                    <div class="w3-col l4 w3-padding-32">
                        <img class="w3-padding" src="images/motsohinhanh2.jpg" alt="" width="100%" height="auto">
                    </div>
                </div>
            </div>
        </div>
        <div class="w3-padding-32"></div>
        <!--Lý Do Chọn DL3M-->
        <div class="container w3-padding-48">
            <p class="w3-center w3-padding-16"><span><b class="w3-xlarge">VÌ SAO PHẢI CHỌN DL3M ?</b></span></p><br>
            <div class="w3-row">
                <div class="w3-col l3 m6 w3-center w3-container w3-padding-16">
                    <div class="w3-col w3-padding-16 w3-border w3-card">
                        <b>1.</b>
                        <hr>
                        <i class="fa fa-balance-scale w3-text-red w3-large" aria-hidden="true"></i><span class="w3-text-black w3-medium"> GIÁ TỐT, NHIỀU ƯU ĐÃI</span>
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-center w3-container w3-padding-16">
                    <div class="w3-col w3-padding-16 w3-border w3-card">
                        <b>2.</b>
                        <hr>
                        <i class="fa fa-credit-card w3-text-red w3-large" aria-hidden="true"></i><span class="w3-text-black w3-medium"> THANH TOÁN AN TOÀN</span>
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-center w3-container w3-padding-16">
                    <div class="w3-col w3-padding-16 w3-border w3-card">
                        <b>3.</b>
                        <hr>
                        <i class="fa fa-user w3-text-red w3-large" aria-hidden="true"></i><span class="w3-text-black w3-medium"> HOẠT ĐỘNG 24/7</span>
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-center w3-container w3-padding-16">
                    <div class="w3-col w3-padding-16 w3-border w3-card">
                        <b>4.</b>
                        <hr>
                        <i class="fa fa-thumbs-up w3-text-red w3-large" aria-hidden="true"></i><span class="w3-text-black w3-medium"> THƯƠNG HIỆU UY TÍN</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w3-padding-48"></div>
    </section>
    <!--footer-->
    <footer class="w3-padding-16">
        <!--footer w3-third-->
        <div class="container">
            <div class="w3-row">
                <div class="w3-third w3-container">
                    <div class="w3-col w3-padding w3-medium">
                        <h5 class="w3-large"><b>Liên Hệ</b></h5><br>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> 590 CMT8, Phường 10, Quận 3, TP HCM
                        <div class="w3-padding"></div>
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i> Hotline: 0987654321 - 0987654321
                        <div class="w3-padding"></div>
                        <i class="fa fa-headphones" aria-hidden="true"></i> Tổng Đài: 1900 1726
                        <div class="w3-padding"></div>
                        <i class="fa fa-envelope" aria-hidden="true"></i> Email: DL3M@gmail.com.vn
                    </div>
                </div>
                <div class="w3-third w3-container">
                    <div class="w3-col w3-padding w3-medium">
                        <h5 class="w3-large"><b>Góc Khách Hàng</b></h5>
                        <ul class="footer-customer">
                            <li><a href="#">Chính Sách Đặt Tour</a></li>
                            <li><a href="#">Cẩm Nang Du Lịch</a></li>
                            <li><a href="#">Kinh Nghiệm Du Lịch</a></li>
                            <li><a href="#">Phiếu Góp Ý</a></li>
                            <li><a href="#">Thỏa Thuận Sử Dụng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="w3-third w3-container">
                    <div class="w3-col w3-padding">
                        <h5 class="w3-large"><b>Mạng Xã Hội</b></h5>
                        <div class="w3-xlarge w3-section social-network">
                            <i class="fa fa-facebook-official w3-text-indigo"></i>
                            <i class="fa fa-instagram w3-text-pink"></i>
                            <i class="fa fa-twitter w3-text-blue"></i>
                            <i class="fa fa-google w3-text-red"></i>
                        </div>
                        <hr>
                        <h5 class="w3-large"><b>Chấp Nhận Thanh Toán</b></h5>
                        <div class="w3-xlarge w3-section payment">
                            <img src="images/visa.png" alt="" width="44px">
                            <img src="images/master-card.jpg" alt="" width="44px">
                            <img src="images/vib.png" alt="" width="44px">
                            <img src="images/dollar.jpg" alt="" width="44px">
                        </div>
                    </div>
                </div>
            </div>
            <!--Copyright-->
            <div class="w3-center copyright">
                <p class="w3-wide w3-xlarge" style="font-family: 'Seaweed Script', cursive; font-weight: 600;">DL3M</p>
                <p class="w3-small">Copyright &copy; by DL3M ghi rõ nguồn người khác trước khi sử dụng trang website này</p>
            </div>
        </div>
    </footer>
    <script>
        // Modal Image Gallery
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }


        // Toggle between showing and hiding the sidebar when clicking the menu icon
        var mySidebar = document.getElementById("mySidebar");

        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
            } else {
                mySidebar.style.display = 'block';
            }
        }
        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
        }
    </script>
</body>
</html>