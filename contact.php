<?php
include_once("functions.php");
include_once(functions::$private_directory."/header.php");
functions::homeBanner("Contact Us","contact.php");
?>

<!--================Contact Area =================-->
<section class="contact_area p_120">
    <div class="container">
<!--        <div id="mapBox" class="mapBox"-->
<!--             data-lat="40.701083"-->
<!--             data-lon="-74.1522848"-->
<!--             data-zoom="13"-->
<!--             data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."-->
<!--             data-mlat="40.701083"-->
<!--             data-mlon="-74.1522848">-->
<!--        </div>-->-->
        <div id='map' class="mapBox"></div>
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoibWd6YXd3YWlzb2UiLCJhIjoiY2p4YmlwbjNqMGRlcDN4cWhpbDI4NDgwNCJ9.OUw01K06JXrPse24LNeKVA';
            var map = new mapboxgl.Map({
                container: 'map', // container id
                style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
                center: [96.35370254516602, 21.879341082799026], // starting position [lng, lat]
                zoom: 13 // starting zoom
            });
        </script>
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>Mandalay, Myanmar</h6>
                        <p>Patheingyi Township</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6><a href="#">+95 (944) 3452 655</a></h6>
                        <p>Mon to Fri 9am to 6 pm</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6><a href="#">support@zawwaisoe.me</a></h6>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->
<?php
include_once(functions::$private_directory."/footer.php");
