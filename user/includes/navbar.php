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