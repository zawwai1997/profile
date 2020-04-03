<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="icon" href="stock-img/logo.ico" type="image/ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/master.css">
<body>
    <!---===========Start Navbar============== -->
    <header>
        <nav class="nav-fixed animate2">
            <div class="container">
                <a class="c19-tt0" href="index.html"> COVID-19 Surveillance Dashboard Myanmar</a>
                <a class="sp-only" href="index.html">COVID-19 Dashboard </a>
            </div>
        </nav>
    <header>
    <!---===========End Navbar============== -->
    <!---===========Start PC Status Section============== -->
    <section class="c19-status pc-only">
        <div class="c19-md-12x text-center">
                    <h6 class=" c19-tt1"> Last Updated On </h6>
                    <h5 class=" c19-tt2"> 23-4-2020, 10:30 A.M.</h5>
        <div>
        <div class="container">
            <div class="flex-box">
                <div class="flex-item c19-lg-3x c19-md-3x c19-sm-12x left animate3">
                    <div class="container-fluid">
                        <div class="card-warning">
                            <h6 class="c19-tt1">စောင့်ကြည့်/သံသယ</h6>
                            <h6 class="c19-tt1">(PUI/Suspected)</h6>
                            <h2 class="c19-tt3 text-warning">644</h2>
                        </div>
                    </div>
                </div>
                <div class="flex-item c19-lg-3x c19-md-3x c19-sm-12x right animate5">
                    <div class="container-fluid">
                        <div class="card-green">
                            <h6 class="c19-tt1">ပြန်လည်ကောင်းမွန်</h6>
                            <h6 class="c19-tt1">(Recover)</h6>
                            <h2 class="c19-tt3 text-warning">0</h2>
                        </div>
                    </div>
                </div>
                <div class="flex-item c19-lg-3x c19-md-3x c19-sm-12x right animate5">
                    <div class="container-fluid">
                        <div class="card-warning">
                            <h6 class="c19-tt1">(စောင့်ကြည့်)</h6>
                            <h6 class="c19-tt1">PUI</h6>
                            <h2 class="c19-tt3 text-warning">642</h2>
                        </div>
                    </div>
                </div>
                <div class="flex-item c19-lg-3x c19-md-3x c19-sm-12x right animate5">
                    <div class="container-fluid">
                        <div class="card-warning">
                            <h6 class="c19-tt1">သံသယ</h6>
                            <h6 class="c19-tt1">(Suspected)</h6>
                            <h2 class="c19-tt3 text-warning">2</h2>
                        </div>
                    </div>
                </div>
            </div>
         </div>
         <div class="container">
            <div class="flex-box">
                <div class="flex-item c19-lg-3x c19-md-3x c19-sm-12x left animate3">
                    <div class="container-fluid">
                        <div class="card-pink">
                            <h6 class="c19-tt1">ပိုးတွေ့</h6>
                            <h6 class="c19-tt1">(Lab Confirmed)</h6>
                            <h2 class="c19-tt3 text-danger">20</h2>
                        </div>
                    </div>
                </div>
                <div class="flex-item c19-lg-3x c19-md-3x c19-sm-12x right animate5">
                    <div class="container-fluid">
                        <div class="card-green">
                            <h6 class="c19-tt1">ပိုးမတွေ့</h6>
                            <h6 class="c19-tt1">(Lab Negative)</h6>
                            <h2 class="c19-tt3 text-primary">534</h2>
                        </div>
                    </div>
                </div>
                <div class="flex-item c19-lg-3x c19-md-3x c19-sm-12x right animate5">
                    <div class="container-fluid">
                        <div class="card-warning">
                            <h6 class="c19-tt1">ဓာတ်ခွဲအဖြေစောင့်ဆိုင်းဆဲ</h6>
                            <h6 class="c19-tt1">(Lab Pending)</h6>
                            <h2 class="c19-tt3 text-primary">90</h2>
                        </div>
                    </div>
                </div>
                <div class="flex-item c19-lg-3x c19-md-3x c19-sm-12x right animate5">
                    <div class="container-fluid">
                        <div class="card-pink">
                            <h6 class="c19-tt1">သေဆုံး</h6>
                            <h6 class="c19-tt1">(Death)</h6>
                            <h2 class="c19-tt3 text-primary">1</h2>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </section>
    <!---===========End PC Status Section============== -->
     <!---===========Start Ph Responsive Section============== -->
    <section class="sp-responsive">
        <?php 
        include('responsive.php');
        ?>
    </section>
    <!---===========End Ph Responsive Section============== -->
    <!---===========Start Map and Hospital Section============== -->
    <section>
    <?php 
        include('map_and_hospital/index.php');
        ?>
    </section>
    <!---===========End Map and Hospital Section============== -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/animate.js"></script>
</body>
</html>