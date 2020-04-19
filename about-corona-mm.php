<?php
require_once 'admin/core/init.php';

$token = hash("sha256", time());
$_SESSION['token'] = $token;

?>
<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from landkit.goodthemes.co/career-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jan 2020 16:53:28 GMT -->
  <!-- Added by HTTrack --><meta
    http-equiv="content-type"
    content="text/html;charset=UTF-8"
  /><!-- /Added by HTTrack -->
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta property="og:image" content="assets/img/thumbnailicon.png" />
      <!-- Libs CSS -->
      <link rel="stylesheet" href="assets/fonts/Feather/feather.css">
      <link rel="stylesheet" href="assets/libs/flickity/dist/flickity.min.css">
      <link rel="stylesheet" href="assets/libs/flickity-fade/flickity-fade.css">
      <link rel="stylesheet" href="assets/libs/aos/dist/aos.css">
      <link rel="stylesheet" href="assets/libs/jarallax/dist/jarallax.css">
      <link rel="stylesheet" href="assets/libs/highlightjs/styles/vs2015.css">
      <link rel="stylesheet" href="assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
      <link rel="stylesheet" href="assets/css/sps.css?v1">
      <link rel="stylesheet" href="assets/css/tooltipster.bundle.min.css">
      <link rel="stylesheet" href="assets/css/zws.css">
          <link rel="stylesheet" href="assets/css/hsn.css">
          <!-- MDBootstrap Datatables  -->
          <link href="assets/css/datatables.min.css" rel="stylesheet">
          <!-- <link href="assets/css/theme0.min.css" rel="stylesheet"> -->
          <link
            rel="stylesheet"
            href="assets/css/theme0.min.css"
            id="stylesheetLight"
          />
          <link
            rel="stylesheet"
            href="assets/css/theme-dark.min.css"
            id="stylesheetDark"
          />

      <!-- Map -->
      <link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

      <!-- Theme CSS -->
      <link rel="stylesheet" href="assets/css/theme.min.css">
      <link rel="icon" href="assets/img/favicon.png" type="image/png">
      <link rel="image_src" href="assets/img/favicon.png">
      <script src="assets/js/svg-pan-zoom.js"></script>
      <script src="assets/js/hammer.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
      <script src="assets/js/jquery.min.js"></script>
      <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js"></script>
      <link
        href="https://api.tiles.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css"
        rel="stylesheet"
      />
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <script type="text/javascript" src="assets/js/js.js"></script>
      <script type="text/javascript" src="assets/js/geojson.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
      <script type="text/javascript" src="assets/js/datatables.min.js"></script>
      <!-- MDBootstrap Datatables  -->
      <title>Corona Myanmar Data Visualizer</title>
  </head>
  <body>
    <!-- NAVBAR
    ================================================== -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand logo-icon-btn">
                <img src="assets/img/corona-mm-logo.png" class="navbar-brand-img" alt="..." style="width:100px;">
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler about-link-btn" type="button" data-toggle="collapse" data-target=""
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""><!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg width="35px" height="35px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                            <title>Stockholm-icons / Communication / Chat-error</title>
                            <desc>Created with Sketch.</desc>
                            <g id="Stockholm-icons-/-Communication-/-Chat-error" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" id="Combined-Shape" fill="#ff6666"></path>
                                <path d="M6,14 C6.55228475,14 7,14.4477153 7,15 L7,17 C7,17.5522847 6.55228475,18 6,18 C5.44771525,18 5,17.5522847 5,17 L5,15 C5,14.4477153 5.44771525,14 6,14 Z M6,21 C5.44771525,21 5,20.5522847 5,20 C5,19.4477153 5.44771525,19 6,19 C6.55228475,19 7,19.4477153 7,20 C7,20.5522847 6.55228475,21 6,21 Z" id="Combined-Shape" fill="#ff6666" opacity="0.3"></path>
                            </g>
                        </svg>
                    </span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <!-- Toggler -->
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-x"></i>
                </button> -->

                <!-- Navigation -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mb-0 about-link-btn" id="navbarLandings" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                           <span class="">
                               <svg width="35px" height="35px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                   <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                                   <title>Stockholm-icons / Communication / Chat-error</title>
                                   <desc>Created with Sketch.</desc>
                                   <g id="Stockholm-icons-/-Communication-/-Chat-error" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                       <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                       <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" id="Combined-Shape" fill="#ff6666"></path>
                                       <path d="M6,14 C6.55228475,14 7,14.4477153 7,15 L7,17 C7,17.5522847 6.55228475,18 6,18 C5.44771525,18 5,17.5522847 5,17 L5,15 C5,14.4477153 5.44771525,14 6,14 Z M6,21 C5.44771525,21 5,20.5522847 5,20 C5,19.4477153 5.44771525,19 6,19 C6.55228475,19 7,19.4477153 7,20 C7,20.5522847 6.55228475,21 6,21 Z" id="Combined-Shape" fill="#ff6666" opacity="0.3"></path>
                                   </g>
                               </svg>
                           </span>
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>


    <!-- CONTENT
    ================================================== -->
    <section class="pt-8 pt-md-11 pb-8">
      <div class="container">
        <!-- / .row -->
        <div class="row">
          <div class="col-12 col-md-6 col-lg-7">
            <img
              src="assets/img/favicon.png"
              style="width: 4rem;height: 4rem;display: none"
              alt="..."
            />
            <!-- Heading -->
            <h2 class="mt-4">
              We are here to help!
            </h2>

            <!-- Text -->
            <p class="text-gray-800 mb-6 mb-md-8">
              We always want to hear from you! Let us know how we can best help you and we'll do our very best.
            </p>

            <!-- Heading -->
            <h3>
              Why we developed Laydio?
            </h3>

            <!-- Text -->
            <p class="text-gray-800 mb-5 pr-3">
              Nowadays, 48% of people are using Internet for diffreent purposes.
              And so we decided to create a solution for people to use their
              time on social media in more efficiently instead of using too much
              time on watching daily entertainments and reading news. Sometimes,
              news and entertainments on social media can give people
              distrations. So, they missed important resources of news and
              knowledge. And so, we decided to develop an application that can
              help user to focus only on daily news and entertainments by
              listening. They can download audio files for listen later.
            </p>

            <!-- List -->
            <div class="d-flex">
              <!-- Badge -->
              <div
                class="badge badge-rounded-circle badge-success-soft mt-1 mr-4"
              >
                <i class="fe fe-check"></i>
              </div>

              <!-- Text -->
              <p class="text-gray-800">
                We provide Laydio to listen news when people are doing their
                daily works and activities like driving, taking a bus or cooking
                at home
              </p>
            </div>
            <div class="d-flex">
              <!-- Badge -->
              <div
                class="badge badge-rounded-circle badge-success-soft mt-1 mr-4"
              >
                <i class="fe fe-check"></i>
              </div>

              <!-- Text -->
              <p class="text-gray-800">
                Allow the news media to manage daily news and entertainments
                with admin panel dashboard before uploading.
              </p>
            </div>

            <div class="d-flex">
              <!-- Badge -->
              <div
                class="badge badge-rounded-circle badge-success-soft mt-1 mr-4"
              >
                <i class="fe fe-check"></i>
              </div>

              <!-- Text -->
              <p class="text-gray-800 mb-6 mb-md-0">
                Support Laydio application for different platforms such as
                Android, iOS and web
              </p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-5">
            <!-- Card -->
            <div class="card shadow-sm mb-5">
              <div class="card-body">
                <!-- Heading -->
                <h4>
                  Contact us
                </h4>
                <span class="text-muted text-sm"
                  >We are happy to contact you to have a better
                  communication</span
                >
                <!-- Heading -->
                <h6
                  class="font-weight-bold mt-8 text-uppercase text-gray-700 mb-2"
                >
                  Call anytime
                </h6>

                <!-- Text -->
                <p class="font-size-sm mb-5">
                  <a href="tel:555-123-4567" class="text-reset"
                    >(959) 751-133-553</a
                  >
                </p>

                <!-- Heading -->
                <h6 class="font-weight-bold text-uppercase text-gray-700 mb-2">
                  Email us
                </h6>

                <!-- Text -->
                <p class="font-size-sm mb-0">
                  <a href="mailto:support@goodthemes.co" class="text-reset"
                    >developer.coronamm@gmail.com</a
                  >
                </p>
              </div>
            </div>

            <div class="card shadow-sm mb-5" bis_skin_checked="1">
              <div class="card-body" bis_skin_checked="1">
                <!-- Heading -->
                <h4>
                  အကြံပေးချက်ထည့်ရန်
                </h4>

                <!-- Heading -->
                <form action="admin/process/add_message.php" method="POST">
                    <div class="form-group" bis_skin_checked="1">

                    <!-- Label -->
                    <label for="contactMessage" style="font-size:15px; color:grey;">
                      အကြံပေးချက်များကို ကျွန်တော်တို့စောင့်မျှော်နေပါတယ် ခင်ဗျာ
                    </label>

                        <?php if(isset($_SESSION['status'])) { ?>
                        <span class="text-success text-sm">ကျေးဇူးတင်ပါသည်</span>
                        <br><br>
                        <?php unset($_SESSION['status']);}  ?>
                    <!-- Input -->
                    <textarea class="form-control" id="contactMessage" rows="5" name="msg_txt" placeholder=""></textarea>

                    </div>
                    <input type="hidden" name ="token" value="<?php echo $token; ?>">
                    <button type="submit" class="btn btn-danger-soft btn-sm" name="btnSubmit">ပေးပို့ရန်</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- / .row -->
      </div>
      <!-- / .container -->
    </section>

    <section style="display: none;" class="pt-8 pt-md-11">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8 text-center">
            <!-- Badge -->
            <span class="badge badge-pill badge-success-soft mb-3">
              <span class="h6 text-uppercase">Members</span>
            </span>

            <!-- Heading -->
            <h2 class="font-weight-bold">
              Who are involved?
            </h2>
          </div>
        </div>
        <!-- / .row -->
        <div class="row pt-8">
          <div class="col-12 col-md-6 col-lg-4 text-center" data-aos="fade-up">
            <!-- Icon -->
            <div class="icon icon-lg mb-4">
              <img
                src="assets/img/avatars/zws.png"
                style="width: 4rem;height:4rem;border:2px solid  #ddd;border-radius: 50%;"
                alt=""
              />
            </div>

            <!-- Heading -->
            <h3 class="font-weight-bold">
              Zaw Wai Soe
            </h3>

            <!-- Text -->
            <p class="text-muted mb-8">
              Project leader
            </p>
          </div>
          <div class="col-12 col-md-6 col-lg-4 text-center" data-aos="fade-up">
            <!-- Icon -->
            <div class="icon icon-lg mb-4">
              <img
                src="assets/img/avatars/knpt.jpg"
                style="width: 4rem;height:4rem;border:2px solid  #ddd;border-radius: 50%;"
                alt=""
              />
            </div>

            <!-- Heading -->
            <h3 class="font-weight-bold">
              Khun Naing Pyae Htun
            </h3>
            <p class="text-muted mb-8">
              Project Manager
            </p>

            <!-- Text -->
          </div>
          <div class="col-12 col-md-6 col-lg-4 text-center" data-aos="fade-up">
            <!-- Icon -->
            <div class="icon icon-lg mb-4">
              <img
                src="assets/img/avatars/sps.jpg"
                style="width: 4rem;height:4rem;border:2px solid  #ddd;border-radius: 50%;"
                alt=""
              />
            </div>

            <!-- Heading -->
            <h3 class="font-weight-bold">
              Shwe Pyi Soe
            </h3>

            <!-- Text -->
            <p class="text-muted mb-8 mb-lg-0">
              iOS developer
            </p>
          </div>
          <div class="col-12 col-md-6 col-lg-4 text-center" data-aos="fade-up">
            <!-- Icon -->
            <div class="icon icon-lg mb-4">
              <img
                src="assets/img/avatars/kbm.jpg"
                style="width: 4rem;height:4rem;border:2px solid  #ddd;border-radius: 50%;"
                alt=""
              />
            </div>

            <!-- Heading -->
            <h3 class="font-weight-bold">
              Kywe Phone Myint
            </h3>

            <!-- Text -->
            <p class="text-muted mb-8 mb-md-0">
              Node js developer
            </p>
          </div>
          <div class="col-12 col-md-6 col-lg-4 text-center" data-aos="fade-up">
            <!-- Icon -->
            <div class="icon icon-lg mb-4">
              <img
                style="width: 4rem;height:4rem;border:2px solid  #ddd;border-radius: 50%;"
                src="assets/img/avatars/pst.jpg"
              />
            </div>

            <!-- Heading -->
            <h3 class="font-weight-bold">
              Phyae Sone Thwim
            </h3>

            <!-- Text -->
            <p class="text-muted mb-8">
              UI/UX Designer
            </p>
          </div>
        </div>
        <!-- / .row -->
      </div>
      <!-- / .container -->
    </section>


    <footer class="py-6 py-md-8 border-bottom ">
      <div class="container">
        <div class="row" >
          <div class="col-12 col-sm-12 col-md-6 mb-4 mb-md-0">
            <!-- Brand -->
            <a class="navbar-brand logo-icon-btn" href="index.html">
              <img src="assets/img/corona-mm-logo.png" class="navbar-brand-img" alt="..." style="width: 100px">
            </a>
            <br>
            <div class="sp-only">
              <div class="logo-conatiner">
                <a>
                  <img src="assets/img/mohs.jpg" class="my-4" alt="..." style="width: 100px; height: 100px;">
                </a>
              </div>
              <div class="para-container">
              <!-- Heading -->
                <h3 class=" text-gray-900">
                  <strong>Data from</strong>
                </h3>
                <!-- Text -->
                <p class="text-muted text-gray-900 mt-3">
                  Central Epidemiology Unit,<br>
                  Department of Public Health,<br>
                  Ministry of Health and Sports, Myanmar
                </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-6 mb-4 mb-md-0" >
            <div class="sp-only right-txt">
              <div class="para-container">
                <!-- Heading -->
                <h3 class="text-gray-900">
                  <strong>Developed by</strong>
                </h3>
                <!-- Text -->
                <p class="text-muted mb-3 text-gray-900 ">
                  University of Technology<br>
                  ( Yatanarpon Cyber City )<br>
                  Student Union
                </p>
                <!-- Text -->
                <p class="text-muted text-gray-900 ">
                  Ethereal Tech - Group<br>
                from UTYCC
                </p>
              </div>
              <div class="logo-container">
              <a>
                <img src="assets/img/yccsu.jpg" class="su-logo" alt="..." style="width: 95px; height: 95px;">
              </a>
              <a>
                <img src="assets/img/ethereal-tech.png" class="" alt="..." style="width: 100px; height: 100px;">
              </a>
              </div>
            </div>
          </div>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </footer>
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/flickity/dist/flickity.pkgd.min.js"></script>
    <script src="assets/libs/flickity-fade/flickity-fade.js"></script>
    <script src="assets/libs/aos/dist/aos.js"></script>
    <script src="assets/libs/smooth-scroll/dist/smooth-scroll.min.js"></script>
    <script src="assets/libs/jarallax/dist/jarallax.min.js"></script>
    <script src="assets/libs/jarallax/dist/jarallax-video.min.js"></script>
    <script src="assets/libs/jarallax/dist/jarallax-element.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="assets/libs/countup.js/dist/countUp.min.js"></script>
    <script src="assets/libs/highlightjs/highlight.pack.min.js"></script>
    <script src="assets/libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="assets/libs/imagesloaded/imagesloaded.pkgd.min.js"></script>


    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>
    <script type="text/javascript" src="assets/js/sps.js"></script>
  </body>

  <!-- Mirrored from landkit.goodthemes.co/career-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jan 2020 16:53:28 GMT -->
</html>
