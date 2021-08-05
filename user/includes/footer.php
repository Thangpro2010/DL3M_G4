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