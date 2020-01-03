<?php
include_once("functions.php");
include_once(functions::$private_directory."/header.php");
 functions::homeBanner("About Us","about-us.php");
 ?>
<!--================Home Banner Area =================-->
<section class="profile_area">
    <div class="container">
        <div class="profile_inner p_120">
            <div class="row">
                <div class="col-lg-5">
                    <img class="img-fluid" src="img/profile.png" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="personal_text">
                        <h6>Hello Everybody, i am</h6>
                        <h3>Zaw Wai Soe</h3>
                        <h4>Android/PHP Developer</h4>
                        <p>Sometimes later becomes never. Do it now.</p>
                        <ul class="list basic_info">
                            <li><i class="lnr lnr-calendar-full"></i> 7th May, 1998</li>
                            <li><i class="lnr lnr-phone-handset"></i> +95 (944) 3452 655</li>
                            <li><i class="lnr lnr-envelope"></i> info@zawwaisoe.me</li>
                            <li><i class="lnr lnr-home"></i> Mandalay,Myanmar</li>
                        </ul>
                        <ul class="list personal_social">
                            <li><a href="https://www.facebook.com/zaw.waisoe.33"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/ZawWaiSoe2"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/mg-zawwaisoe-435aa2189/"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
<?php
include_once(functions::$private_directory."/welcome.php");
include_once(functions::$private_directory."/footer.php");


