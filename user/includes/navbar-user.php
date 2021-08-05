<div class="w3-top">
    <div class="w3-bar w3-card" id="myNavbar">
        <a class="w3-bar-item w3-wide logo-name" style="font-family: 'Seaweed Script', cursive; font-weight: 500; font-size: 2.26rem; padding: 0 6px">DL3M</a>
        <!-- Right-sided navbar links -->
        <div class="w3-right w3-hide-small">
            <a style="text-decoration: none; font-weight: 600;" href="index-user.php" class="w3-bar-item w3-button w3-hover-red"><i class="fa fa-home"></i> Trang Chủ</a>
            <a style="text-decoration: none; font-weight: 600;" href="service-user.php" class="w3-bar-item w3-button w3-hover-red"><i class="fa fa-th" aria-hidden="true"></i> Dịch Vụ</a>
            <a style="text-decoration: none; font-weight: 600;" href="event-user.php" class="w3-bar-item w3-button w3-hover-red"><i class="fa fa-calendar-o"></i> Sự Kiện</a>
            <div class="w3-dropdown-hover">
                <a style="text-decoration: none; font-weight: 600;" class="w3-button w3-hover-red">
                    <?php
                    if (isset($_SESSION["user"])) {
                        $user = $_SESSION["user"];
                        echo "Hi, " . $user['name'];
                    }
                    ?>
                </a>
                <div class="w3-dropdown-content w3-bar-block w3-border">
                    <a style="text-decoration: none; font-weight: 600;" href="profile.php" class="w3-bar-item w3-button w3-hover-red"><i class="fa fa-user"></i> Thông Tin</a>
                    <a style="text-decoration: none; font-weight: 600;" href="feedback.php" class="w3-bar-item w3-button w3-hover-red"><i class="fa fa-commenting-o" aria-hidden="true"></i> Đánh Giá</a>
                    <a style="text-decoration: none; font-weight: 600;" href="logout.php" class="w3-bar-item w3-button w3-hover-red"><i class="fa fa-sign-out" aria-hidden="true"></i>
                        Đăng Xuất</a>
                </div>
            </div>
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
    <a style="text-decoration: none;" href="service-user.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-th" aria-hidden="true"></i> Dịch Vụ</a>
    <a style="text-decoration: none;" href="event-user.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-calendar-o"></i> Sự Kiện</a>
    <a style="text-decoration: none;" href="profile.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Thông Tin</a>
    <a style="text-decoration: none;" href="profile.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-commenting-o" aria-hidden="true"></i> Đánh Giá</a>
    <a style="text-decoration: none;" href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Đăng Xuất</a>
    <a style="text-decoration: none;" href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-medium"><i class="fa fa-times" aria-hidden="true"></i> Đóng</a>
</nav>