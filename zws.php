<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
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

    <!-- Map -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <link rel="icon" href="assets/img/favicon.png" type="image/png">
    <link rel="image_src" href="assets/img/favicon.png">
    <script src="assets/js/svg-pan-zoom.js"></script>
    <script src="assets/js/hammer.js"></script>

    <title>Corona Myanmar Data Visualizer</title>
</head>
<body>
<div id="page-loader" style="position:fixed;z-index:20;top:0;left:0;width: 100%; height: 100%;background: #fff;">
    <img class="illustration" style="display:none;width:200px;" src="assets/img/favicon.png"/>
    <img class="illustration" style="width:200px;" src="assets/img/wash-hands.gif"/>
    <img class="text" style="width:200px;" src="assets/img/wash-hand-txt-mm.png"/>
</div>
<!-- NAVBAR
================================================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="index.php">
            <img src="assets/img/brand.png" class="navbar-brand-img" alt="..." style="width:100px;">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fe fe-x"></i>
            </button>

            <!-- Navigation -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLandings" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        About
                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarPages" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Contact Us
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDocumentation" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        API Documentation
                    </a>
                </li>
            </ul>

        </div>

    </div>
</nav>

<!-- WELCOME
================================================== -->
<div class="my-wrapper">
    <section class="map-section">
        <div class="container" style="height:100%;">
            <div class="row align-items-center"  style="height:100%;">
                <div id="map-container" class="col-12 col-md-6 col-lg-6 order-md-2" style="width: 100%;height:100%;">
                    <div id="detailMap" style="display:none;position:absolute;width:66px;left:20px;top:0px;" class="input-group" bis_skin_checked="1">
                        <div class="input-group-prepend" bis_skin_checked="1">
                      <span style="height: 42px;border-radius: 5px;padding: 0px 10px 0px 10px;" class="input-group-text" id="basic-addon1">
                          <span><!--?xml version="1.0" encoding="UTF-8"?-->
                              <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                  <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                                  <title>Stockholm-icons / Map / Marker#1</title>
                                  <desc>Created with Sketch.</desc>
                                  <g id="Stockholm-icons-/-Map-/-Marker#1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                      <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                      <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" id="Combined-Shape" fill="#ff6666"></path>
                                  </g>
                              </svg>
                          </span>
                          အသေးစိတ်
                      </span>
                        </div>
                    </div>
                    <div id="searchBox" style="right:20px; top:0px;left:20px;position:absolute;" class="close" bis_skin_checked="1">
                        <div class="input-group">
                            <div id="search-icon" class="input-group-prepend" bis_skin_checked="1">
                        <span style="height: 42px;" class="input-group-text" id="basic-addon1">
                            <span><!--?xml version="1.0" encoding="UTF-8"?-->
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                                    <title>Stockholm-icons / General / Search</title>
                                    <desc>Created with Sketch.</desc>
                                    <g id="Stockholm-icons-/-General-/-Search" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#ff6666" opacity="0.4"></path>
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#ff6666"></path>
                                    </g>
                                </svg>
                            </span>
                        </span>
                            </div>
                            <input id="searchInput" type="text" class="form-control form-control-sm" placeholder="Search Divisions" aria-label="Username" aria-describedby="basic-addon1">
                            <div id="search-close-icon" class="input-group-append" bis_skin_checked="1">
                        <span style="height: 42px;" class="input-group-text" id="closeSearch">
                            <span><!--?xml version="1.0" encoding="UTF-8"?-->
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                                    <title>Stockholm-icons / Navigation / Angle-double-right</title>
                                    <desc>Created with Sketch.</desc>
                                    <g id="Stockholm-icons-/-Navigation-/-Angle-double-right" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#ff6666"></path>
                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#ffb3b3" opacity="0.8" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                    </g>
                                </svg>
                            </span>
                        </span>
                            </div>
                        </div>
                        <div id="searchFilter" style="display: none;">
                        </div>
                    </div>
                    <div id="searchBtnBox" style="position:absolute;width:66px;right:20px;top:0px;" class="input-group" bis_skin_checked="1">
                        <div class="input-group-prepend" bis_skin_checked="1">
                    <span style="height: 42px;border-radius: 5px;" class="input-group-text" id="basic-addon1">
                        <span><!--?xml version="1.0" encoding="UTF-8"?-->
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                                <title>Stockholm-icons / General / Search</title>
                                <desc>Created with Sketch.</desc>
                                <g id="Stockholm-icons-/-General-/-Search" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#ff6666" opacity="0.4"></path>
                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#ff6666"></path>
                                </g>
                            </svg>
                        </span>
                    </span>
                        </div>
                    </div>
                    <div id="color-bar-con" style="position:absolute; left:20px; bottom:0px;" class="btn-group-vertical" role="group" aria-label="Basic example" bis_skin_checked="1">
                        <button style="background: #000;" type="button" class="color-bar">
                        </button>
                        <button style="background: #000;" type="button" class="color-bar">
                        </button>
                        <button style="background: #000;" type="button" class="color-bar">
                        </button>
                        <button style="background: #000;" type="button" class="color-bar">
                        </button>
                        <button style="background: #000;" type="button" class="color-bar">
                        </button>
                        <button style="background: #000;" type="button" class="color-bar">
                        </button>
                        <button style="background: #000;" type="button" class="color-bar">
                        </button>
                        <button style="background: #000;" type="button" class="color-bar">
                        </button>
                        <button style="background: #000;" type="button" class="color-bar">
                        </button>
                        <button style="background: #000;" type="button" class="color-bar">
                        </button>
                    </div>
                    <div id="color-range-con" style="font-size: 15px;color:gray;position:absolute; left:40px; bottom:0px;" class="btn-group-vertical" role="group" aria-label="Basic example" bis_skin_checked="1">
                        <span class="color-range">10-20</span>
                        <span class="color-range">10-20</span>
                        <span class="color-range">10-20</span>
                        <span class="color-range">10-20</span>
                        <span class="color-range">10-20</span>
                        <span class="color-range">10-20</span>
                        <span class="color-range">10-20</span>
                        <span class="color-range">10-20</span>
                        <span class="color-range">10-20</span>
                        <span class="color-range">10-20</span>
                    </div>
                    <div style="position:absolute; right:20px; bottom:50px;" class="btn-group-vertical" role="group" aria-label="Basic example">
                        <button id="zoomIn" style="padding: 2px 5px 2px 5px;text-align:center;" type="button" class="btn btn-light">
                      <span><!--?xml version="1.0" encoding="UTF-8"?-->
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                              <title>Stockholm-icons / Code / Plus</title>
                              <desc>Created with Sketch.</desc>
                              <g id="Stockholm-icons-/-Code-/-Plus" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                  <circle id="Oval-5" fill="#ff9999" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                  <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" id="Combined-Shape" fill="#ff6666"></path>
                              </g>
                          </svg>
                      </span>
                        </button>
                        <button id="zoomReset" style="padding: 2px 5px 2px 5px;text-align:center;" type="button" class="btn btn-light">
                      <span><!--?xml version="1.0" encoding="UTF-8"?-->
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                              <title>Stockholm-icons / General / Update</title>
                              <desc>Created with Sketch.</desc>
                              <g id="Stockholm-icons-/-General-/-Update" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                  <path d="M8.43296491,7.17429118 L9.40782327,7.85689436 C9.49616631,7.91875282 9.56214077,8.00751728 9.5959027,8.10994332 C9.68235021,8.37220548 9.53982427,8.65489052 9.27756211,8.74133803 L5.89079566,9.85769242 C5.84469033,9.87288977 5.79661753,9.8812917 5.74809064,9.88263369 C5.4720538,9.8902674 5.24209339,9.67268366 5.23445968,9.39664682 L5.13610134,5.83998177 C5.13313425,5.73269078 5.16477113,5.62729274 5.22633424,5.53937151 C5.384723,5.31316892 5.69649589,5.25819495 5.92269848,5.4165837 L6.72910242,5.98123382 C8.16546398,4.72182424 10.0239806,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 L6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,8.6862915 15.3137085,6 12,6 C10.6885336,6 9.44767246,6.42282109 8.43296491,7.17429118 Z" id="Combined-Shape" fill="#ff6666"></path>
                              </g>
                          </svg>
                      </span>
                        </button>
                        <button id="zoomOut" style="padding: 2px 5px 2px 5px;text-align:center;" type="button" class="btn btn-light">
                      <span><!--?xml version="1.0" encoding="UTF-8"?-->
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                              <title>Stockholm-icons / Code / Minus</title>
                              <desc>Created with Sketch.</desc>
                              <g id="Stockholm-icons-/-Code-/-Minus" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                  <circle id="Oval-5" fill="#ff9999" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                  <rect id="Rectangle" fill="#ff6666" x="6" y="11" width="12" height="2" rx="1"></rect>
                              </g>
                          </svg>
                      </span>
                        </button>
                    </div>
                    <div id="resultBox" class="closed" style="z-index: 5;display: table; padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px; position: absolute; left: 20px; top: 50px;box-shadow: 1px 1px 5px 0px #cccccc;width: 200px; min-height: 30px; background: #fff; border-radius: 10px;">
                        <p id="resultName" class="font-weight-bold mb-1" style="width:150px;">
                            ayeyarwaddy
                        </p>
                        <span id="closeResult" style="position: absolute; right: 12px; top: 10px;" class=""><!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                            <title>Stockholm-icons / Code / Error-circle</title>
                            <desc>Created with Sketch.</desc>
                            <g id="Stockholm-icons-/-Code-/-Error-circle" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                <circle id="Oval-5" fill="#ff6666" opacity="0.2" cx="12" cy="12" r="10"></circle>
                                <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" id="Combined-Shape" fill="#ff6666"></path>
                            </g>
                        </svg>
                    </span>
                        <p class="font-size-sm text-muted mb-0">
                            စစ်ဆေး(တွေ့ရှိ)
                            <span id="resultLabconfirmed" class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">
                            3214
                        </span>
                        </p>
                        <p class="font-size-sm text-muted mb-0">
                            စောင့်ကြည့်/သံသယ
                            <span id="resultPuinsuspect" class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">
                            3214
                        </span>
                        </p>
                        <p class="font-size-sm text-muted mb-0">
                            သေဆုံး
                            <span id="resultDie" class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">
                            3214
                        </span>
                        </p>
                        <p class="font-size-sm text-muted mb-0">
                            စစ်ဆေး(စောင့်ဆိုင်း)
                            <span id="resultLabpending" class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">
                            3214
                        </span>
                        </p>
                        <p class="font-size-sm text-muted mb-0">
                            ပြန်လည်ကောင်းမွန်
                            <span id="resultRecovered" class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">
                            3214
                        </span>
                        </p>
                        <p class="font-size-sm text-muted mb-0">
                            စစ်ဆေး(မတွေ့)
                            <span id="resultLabnegative" class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">
                            3214
                        </span>
                        </p>
                    </div>

                    <div style="transform: rotate(-90deg);position:absolute; right:-40px; bottom:220px;color:gray;height:25px;" class="custom-control custom-switch" bis_skin_checked="1">

                        <input type="checkbox" class="custom-control-input" id="toggle-switch">
                        <label class="custom-control-label" for="toggle-switch" style="height:30px;width:110px;">စောင့်/သံသယ</label>
                    </div>
                    <div style="position:absolute; right:20px; bottom:0px;" class="btn-group" role="group" aria-label="Basic example">
                        <button id="mode-township" style="font-size: 13px;padding: 5px 10px 5px 10px;" type="button" class="btn-theme-color mode-btn btn">
                            မြို့နယ်
                        </button>
                        <button id="mode-khayine" style="font-size: 13px;padding: 5px 10px 5px 10px;" type="button" class="btn-theme-color mode-btn btn">
                            ခရိုင်
                        </button>
                        <button id="mode-tine" style="font-size: 13px;padding: 5px 10px 5px 10px;" type="button" class="btn-theme-color mode-btn btn active">
                            တိုင်း
                        </button>
                    </div>
                    <button id="scroll-down" style="position: absolute; bottom:0px;left:20px;font-size: 13px;padding: 5px 0px 5px 0px;" type="button" class="btn btn-light">
                        <a id="down-mobile-a" href="#down-mobile" style="color:#ff6666;width:100%;height:100%;padding: 10px 5px 10px 5px;">
                        <span><!--?xml version="1.0" encoding="UTF-8"?-->
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                                <title>Stockholm-icons / Navigation / Down-2</title>
                                <desc>Created with Sketch.</desc>
                                <g id="Stockholm-icons-/-Navigation-/-Down-2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                    <rect id="Rectangle" fill="#ff6666" opacity="0.4" x="11" y="4" width="2" height="10" rx="1"></rect>
                                    <path d="M6.70710678,19.7071068 C6.31658249,20.0976311 5.68341751,20.0976311 5.29289322,19.7071068 C4.90236893,19.3165825 4.90236893,18.6834175 5.29289322,18.2928932 L11.2928932,12.2928932 C11.6714722,11.9143143 12.2810586,11.9010687 12.6757246,12.2628459 L18.6757246,17.7628459 C19.0828436,18.1360383 19.1103465,18.7686056 18.7371541,19.1757246 C18.3639617,19.5828436 17.7313944,19.6103465 17.3242754,19.2371541 L12.0300757,14.3841378 L6.70710678,19.7071068 Z" id="Path-94" fill="#ff6666" transform="translate(12.000003, 15.999999) scale(1, -1) translate(-12.000003, -15.999999) "></path>
                                </g>
                            </svg>
                        </span>
                            အောက်သို့
                        </a>
                    </button>
                    <!-- Image -->
                    <!-- <img src="assets/img/illustrations/illustration-2.png" class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0" alt="..." data-aos="fade-up" data-aos-delay="100"> -->
                    <div class="myanmar-map" id="mobile-div" style="min-height: 350px;min-width: 260px;width:100%;height:100%;">

                        <svg id="mobile-svg" data-name="Layer 1" style="display: inline; width: inherit; min-width: inherit; max-width: inherit; height: inherit; min-height: inherit; max-height: inherit;" ><defs></defs><title>myanmar-townships4</title><path id="div-sshan" title="" class="tooltipster cls-1" d="M594.51,418.32V418l-.29-.29-.3-.3-.58-.29H593v-.3h-.59l-.29-.29-.3-.3h-.29l-.29-.29H591v-.29l-.29-.3-.3-.59-.29-.29v-2.06l.29-.3V411l-.29-.3v-.59h-.3v-.58l-.29-.3v-.29h-.29v-.59l-.3-.3-.29-.29v-.29h-.3V406l.3-.29V404.2l-.3-.3-.29-.29v-.29h-.59l-.29-.3h-.59l-.3-.59H586v-.88l-.29-.29-.3-.3v-.29l-.29-.3-.3-.29v-.3l-.29-.29-.3-.29v-.3h-.29v-.59l-.29-.29v-1.18l.29-.29.29-.3h1.48l.58-.29h.59l.3-.3.29-.58v-.59l.3-.59-.3-.59v-.59l-.29-.29-.3-.3-.59-.59L586,391l-.29-.59-.3-.3-.59-.59-.29-.58-.3-.59-.29-.59V386l-.29-.88-.59-.59V383.3l-.88-.29-1.18-.88-1.18-.89-.29-.58-.3-.59v-2.36l-.29-.59-.3-.29-.29-.29-1.18-.59-.29-.3-.29-.59v-1.17l-.59-.59-.89-.59h-.58l-1.48-.59h-.58l-.3-.59-.29-.29-.88-.88-.59-.3h-.3l-.59.3h-1.76l-.59.29-.59.29-.88.59-.59.3-.88.29-.59.59v.88l-.88-.88-1.18-1.47-.88-.88-.89-.3-1.47-.29h-1.47l-.59.88-.58.59-1.77.59-2.65,1.47-.59.59-.88.59-.29.58h-.59l-.88.59-.59.59-1.18.88-.88.3h-3.24l-1.47-.59-1.47-.59-.59-.59-.88-.88-.3-.88-.29-.3-.29-.59-.89-.29-1.17-.29-2.36.29-2.94.59-.88.29-.59-.29-.59-.3-.29-.29h-.89l-.58-.29-1.47.58-.59-.29-.59-.59-.59-.88v-.88l-.29-.59-.3-.59-.29-.59-.3-.29L521,368l-1.18-.88-.59-.59v-.59l-.29-.88-.29-.29-.3-.3-.29-.29-.3-.3-.29-.29-.59-.3H516l-.3.3h-1.47l-.59-.3h-.29l-.59-.29h-3.24l-.29-.29h-.59l-.29-.3h-.59l-.29.3v1.76l.29.3v.58l.29.3.3.29v.59l.29.29v.89l.3.59v.88l.29.59v.59l.29.58v.89l-.29.88-.59.88-.29.59-.3.3v.29l.3.29v.3l.29.59v.29l-.29.59-.3.59-.58.29h-1.18l-.3-.29-.88-.3-.29-.29-.59.29h-.3l-.29.3H503l-.59-.3-.29-.29-.88-.59L501,376h-.59l-.29-.3-.59-.29-.29-.59-.3-.29v.58l.3.59.29.59.59.59.29.29.59.59v.3l.3.59.29.29v.59l.59.59.29.29.3.3.29.29.3.88v.59l-.3.59.59.29.29.3.59.29v1.18l.3.59.29.59v1.17l-.59.3h-.88l-.59-.3-.59-.29-.29-.59-.59-.29-.29.29-.3.3-.29.58-.3.3-.29.29-.59.3-.29.29-.59.3h-1.18l-.29-.59h-.89v.29l-.58.3-.59.58-.3.59-.29.3-.59.59-.29.29-.3.29-.29.59-.3.3-.58.59-.59.29h-.3l-.29.59-.3.29-.58.3h-.59l-.59-.3-.59.3-.29.29-.59.3-.3.29h-.58l-.59.29-.59.3-.59.29h-.59l-.59-.29-.58.29h-.3l-.59.3h-2.65l-.29.29-.29.3-.3.58v.3l.59.59v.59l-.59.29-.59.59h-.88l-.29.29.29.59v1.18l.3.59v2.35l.58.59v.59l.3.59v.29l.29.88v1.18l.3.3v.58l.29.59.29.3.3.59.29.29.3.59.29.29v.59l.3.59v.29l-.59.3h-.3l-.29-.3h-.88l-.59.3h-.59l-.59-.3h-1.18l-.58.3-.59.29-.3.3-.29.29-.3.3v.88l.3.59V418l-.59.29-.29.59v1.47l.29.59v.59l.59.59.59.29.29.59.3.3h.58l.59.29h.59l.88.3.59.29h.59l.59.59h.59l.59.29.58.3.59.29.3-.29h1.17l.3.29.29.59h.59l.29.29.89.3.59-.59.58-.29.59.29v.29l.3.59.29.3h1.47l.3.29.58.59.3.29v.89l-.3.59-.29.29-.29.88.29.59v.59l-.29.29-.89.3h-.58l-.89-.3h-.29l-.59.3-.29.29-.3.59-.59.3-.59.29-.29.59.29.59.3.29-.3.59-.29.29v.59l.29.3.59.29.3.3.29.58.3.3v.29l.29.59.59.3.29.29.3.59.59-.3h.29l.29.3v.59l-.29.59v1.17l.29.59-.29.59-.59.29h-1.47l-.29.3V446l.29.29v.3l-.29.29v.29h-.3l-.29.3v1.18l-.3.29v1.18l.3.29v1.18l.29.29v.3l.3.29v.3l.29.29v.29l.29.3v.59l.3.29v.3l.29.29v.29l.3.3V456l.29.3v.29l.3.3v.29l.29.29v.3l.29.29v.3l-.29.59v.29h-.29l-.3.29-.29.3h-.3l-.29.29-.3.3h-.29l-.29.29v.3l-.3.29-.29.29v.3h-.3l-.29.29h-.3l-.29.3-.29.29v.29l.29.3v1.18l.29.29h.3l.29.3.3.29v.29l-.3.3v.29h-.59v.3l-.29.29v.29l-.29.3-.3.29-.29.3-.59-.3H483l-.3-.29-.29.29v.3h-.59l-.3-.3H481v.89l.29.29v.59l.29.29.3.3.29.29.3.3V471l.29.29.3.3h.29v.29l.29.3.3.29.29.3.3.29.29.29h.29l.3.3v.29l-.59.3v.29l-.29.3v.58l.29.3.29.29h1.18l.3-.29h1.76l.3.29.29.3h.29l.3.29v.3l.29.29v.88l.3.3.29.59h.29l.3.29.29.29v.3l.3.29.29.3v.29l.3.3v.29l.29.29H493l.29.3h.3l.29.29.3.3v.29l.29.3V484l-.29.29h-.59l-.3.3H493l-.3.29v.88h-.29l-.29.3h-.59l-.3.29h-1.17l-.3.3-.29.29v1.18h.59l.29.29h.29l.3.3h.59l.29.29h2.65v.3l.29.58v.3l.3.29v.3l.29.29v.59l-.29.29v.59l.29.3v.59l.3.29.29.29.29.3-.29.29.29.3h1.18l.59.29h.59l.29.3.3.29.29.29.3.3v.29h.29l.29.3H501l.3.29h.29l.3.3.29.29v.59l.29.29.3.3v.29l.29.3v.58l-.29.3v1.47l.59-.29.29-.3,1.18-1.18L506,499l.3-.59.29-.59.3-.88v-2.06l-.3-.59-.59-.59-.29-.29-.29-.59V491.6l.29-.59.29-.88.89-1.18.29-.59.88-1.17.59-.3,2.36-2.35.88-.59,2.94-1.47,1.18-.3.29-.29.3-.3.29-.58v-4.42l.29-1.47h.3l.29-.29v-1.77l.3-.29-.3-.3v-.29l.3-.3V471l-.3-.59v-.59l.3-.29v-.29h1.47l.29.29h.88l.3.29v.89l.29.29v2.35h.3l.29.3h.3l.29.29h1.47l.59-.29h2.06l.29-.3v-1.47l.3-.29h.29v-.3l.3-.29h.88v.59l.29.29.3.59h.29v.3h.3l.29.29.29.29.3.3v.29H531v.3h.3l.58.29h.3l.59-.29H533l.3-.3v-.29h.29l.29-.3h.59l.3.3.29.29.3.3v.29l-.3.3v.29l.3.29.29.3V476l.29.3v.29h1.47l.3.3v.58l-.3.3v.59l-.29.29v.3l-.29.29v.29l-.3.3v1.47l.3.29h.29l.59.3H538v.29l.3.3v.29l.29.3v.29l.3.29h.29l.29.3h.3l.29.29.59-.29.3.29h.29l.29.3.3.29h.59l.29-.29h.59l.29.29.3.3h.88l.29-.3v-.29l.3-.3h.88l.3.3v.29l.29.3v.29h1.47l.29-.29h.3l.59.29h.29l.3.29.29.59v1.18l.29.29v.89h.3l.29-.3H553l1.76-.59h.59l.3-.29.29-.29v-.89l.29-.29.3-.3h1.76l.3-.29.59-.59-.59-.59v-1.76l-.3-.59v-.3l.3-.29v-.88l.29-.3v-.59l.3-1.47v-.29h.29l.29.29.89-.29.59.59.58.59.3.29L563,479h.59l.59.58h.88l.3.59.58.59.59.59.59.29h.59l.59.89-.3.29v.3l.3.29v.29l.29.3h.3l.29-.3H571l.88-.58h1.76l.89.29.58-.29.3-.3H576l.59.3h2.64l.59-.3.59-.29.29-.3h.59l.59.3.3.59h.29l1.18,1.17.29-.88.29-.88h2.06l-.29-.59-1.18-1.47h-.29v-2.65l-.3-.88v-.3l-.58-.59-1.18-1.47-.59-.59v-2.35l-.29-.3-.59-1.17-.3-.88-.29-.59-.59-1.48V466l.3-.3v-.58l.29-.3h.29l.3-.29v-.3h.29v-.29l.3-.3v-.29l.29-.3.3-.29h.58l.3-.29.29-.3.3-.29h.58l.3.29h1.18l.29-.29.59-.3.29-.29h.3l.29-.29.3-.3H588l.29-.29h.3l.29-.3h.3l.29-.29v-2.65h.29v-2.35l-.58-.3h-.3l-.29-.29-.3-.3H588l-.29-.59v-.29l-.3-.29v-.89l-.29-.29V450.4h.29v-.88l.3-.3v-1.47l-.3-.29v-.88l-.29-.3v-.59l-.3-.29-.29-.3v-.58h-.3v-.3l-.29-.29v-.3l-.29-.29v-1.47l-.3-.3v-.88h-.29l-.3-.59-.29-.29-.3-.3v-.29l-.29-.3-.29-.29v-.29l-.3-.3v-.59H583v-.59l-.3-.29v-.29l-.29-.3-.29-.29-.3-.3-.29-.29-.3-.3v-.58l-.29-.3v-.29l-.3-.3v-1.47l-.29-.29v-3.24l-.29-.29v-2.36l.29-.29v-.3l.29-.88.3-.29.88-.3h.3l.29.3h.29l.3.29h1.47l.29-.29h.89l.29-.3v-.29l.29-.3.3-.29.29-.3h2.36l.29.3h2.06l.29-.3.3-.29.59-.29.29-.59.3-.3.29-.29.29-.3.59-.29v-.59h.3v-1.18ZM516.84,446v.29l-.29.3Zm-2.94,12.65.29.59-.29-.29Zm-1.18-3.53.3.59.29.88L513,456l-.3-.29Zm-.59-50.62v.3l-.29-.89Zm-.59,47.09.3,1.18-.3-.89Zm-7.81-3,.16.33-.29-.29-2.35-.59Zm-11,2.1V451l-.29.29Zm24.42,7.65-.29-.59.29.29Zm1.18,3.23-.29.3.29-.59Zm0-19.12L518,443l.29-.88Zm3.24-42.68h-.44l.44-.29.59-.29Zm8.82,38.85-.29.29.29-.58Zm1.18-6.18h-.15l.15-.29Zm13-9.42-.59-.59.88.59Zm4.7-3.82-.59.29.89-.59.19,0Zm1.18-23.84-.29-.29-.59-.89.88.89Zm1.77,25.6h0l.88.89Zm3.23,1.77h-.59l-.88-.3,1.18.3.59-.15Zm1.18-.3h-.3l.59-.58ZM558,419.5l-.29.3.29-1.18Zm-.88-19.72,1.17.59.09.17Zm1.76,7.66v-.3l.3.59.29.59Zm9.42.29-.3-.88.3.59Zm6.76-8.24-.29.29.29-.58Z" transform="translate(-284.88 -68.59)"/><polygon id="div-chin" title="" class="tooltipster cls-2" points="92.51 225.54 91.92 224.96 91.63 224.37 91.33 223.49 91.33 221.43 91.33 220.54 91.04 220.54 90.74 220.25 90.15 219.66 90.15 219.37 89.86 219.07 89.86 218.78 89.57 218.19 89.27 218.19 88.98 218.19 88.39 218.19 88.09 218.19 87.51 218.19 87.21 217.89 86.92 217.31 86.62 217.01 86.03 216.72 86.03 216.42 85.74 216.42 84.86 216.42 84.56 216.13 83.98 216.42 83.39 216.42 83.09 216.13 82.8 215.83 82.5 215.54 81.62 215.25 81.03 215.25 80.44 215.25 79.56 215.54 78.39 215.83 77.21 216.42 76.62 216.42 76.33 216.13 76.03 216.13 75.74 215.83 75.15 214.95 74.27 213.77 73.97 213.19 73.68 212.89 70.74 212.89 66.91 212.89 66.91 213.48 66.62 213.77 66.62 214.07 66.32 214.36 65.73 214.66 65.44 214.66 65.15 214.36 65.15 214.07 64.85 213.77 64.56 213.77 64.26 214.07 63.97 214.36 63.67 214.95 63.38 214.95 62.79 215.25 62.5 215.25 61.62 215.25 60.44 214.66 60.14 214.36 59.85 214.07 59.85 213.77 59.85 212.89 58.97 212.6 58.09 211.42 57.79 210.83 57.79 210.24 57.5 209.65 56.91 209.36 56.02 209.06 54.85 208.77 54.55 209.06 53.67 208.77 53.67 209.06 53.67 209.36 53.67 209.95 53.38 210.83 53.67 211.42 53.97 211.71 53.38 212.3 53.67 212.89 53.67 213.19 53.67 213.48 53.67 213.77 53.67 214.07 53.97 214.07 54.26 214.36 54.26 214.66 54.55 214.95 54.55 215.25 54.85 215.54 55.14 216.13 55.44 216.13 56.02 216.13 56.32 216.42 56.61 216.72 56.61 217.31 56.32 217.6 56.32 218.19 56.32 219.95 56.32 220.84 56.61 221.43 56.91 221.72 56.91 222.01 56.91 222.31 56.91 223.19 56.61 224.07 56.91 224.66 57.2 225.25 57.2 226.43 57.5 226.72 58.09 227.02 58.38 227.6 58.67 227.9 58.38 228.19 58.38 228.49 58.09 228.78 57.79 229.37 57.79 229.66 57.79 230.25 57.79 230.84 58.09 231.72 58.09 232.61 57.5 233.49 57.5 233.78 57.79 234.37 57.5 234.67 57.2 235.55 56.91 236.14 56.61 236.43 56.61 237.32 56.91 237.9 56.61 238.2 56.61 238.49 56.32 239.38 56.32 239.96 56.91 241.73 56.91 242.02 56.32 242.32 56.32 242.91 56.02 242.91 54.85 243.2 54.85 243.5 55.44 244.38 55.44 244.97 55.14 245.26 55.14 245.56 55.44 246.44 55.14 246.73 55.44 247.32 55.44 247.62 55.44 247.91 55.73 248.2 55.73 248.79 56.02 249.09 56.02 249.38 56.02 249.68 55.73 249.97 55.73 250.26 55.73 251.15 55.73 251.44 55.44 252.91 55.73 253.21 56.02 253.21 56.32 253.5 56.02 253.5 54.85 254.38 54.85 254.68 54.85 254.97 54.55 255.27 54.26 255.86 54.26 256.15 54.55 256.44 53.67 257.33 53.08 258.21 52.79 258.8 52.2 259.09 51.91 259.68 51.32 259.68 50.44 259.68 49.85 259.68 49.26 259.68 48.96 259.39 48.96 259.09 48.38 258.8 48.08 258.21 47.79 257.33 47.49 257.33 46.91 257.03 46.32 257.33 46.02 257.33 45.43 257.62 45.14 257.33 44.84 257.33 44.84 257.03 44.55 257.03 44.26 257.33 44.26 257.62 44.26 258.21 43.96 258.8 43.96 259.68 44.26 259.98 44.55 260.27 45.14 261.15 44.84 261.15 44.55 261.74 44.84 262.33 45.14 262.92 45.43 263.51 45.73 263.8 45.73 264.1 45.43 264.1 44.84 264.1 44.55 264.1 44.55 264.39 44.55 264.68 44.84 265.27 44.84 265.57 44.55 265.57 43.96 265.57 43.67 265.86 43.67 266.15 43.67 266.45 43.67 267.33 43.37 267.63 43.37 268.21 43.37 268.51 43.08 268.8 43.08 269.1 43.08 269.39 42.79 269.98 42.79 270.86 43.08 271.75 43.08 272.04 42.79 272.63 42.49 273.22 42.79 273.51 42.79 274.1 42.79 275.57 43.08 276.16 43.08 276.45 43.96 277.34 43.96 277.63 44.55 278.22 44.55 278.81 44.55 279.1 43.96 280.28 43.37 280.87 43.37 281.46 43.37 281.75 43.37 282.05 43.67 282.05 43.96 282.63 43.96 283.22 44.55 283.52 44.55 283.81 44.55 284.11 44.26 284.69 44.26 284.99 44.55 285.28 44.84 285.58 45.43 285.58 45.73 285.87 46.02 286.17 46.32 286.75 46.61 287.34 46.61 288.23 46.61 288.52 46.91 288.81 46.61 289.11 46.91 289.7 46.91 289.99 46.91 290.58 46.91 291.17 47.2 291.17 47.2 291.46 47.2 292.05 47.49 292.35 47.49 292.64 47.49 293.23 47.49 293.82 47.2 294.11 47.49 294.41 47.2 294.7 46.61 295 46.32 295 46.02 295 45.73 295 45.43 295 44.84 295 44.84 295.58 44.84 295.88 45.14 296.17 45.14 296.47 45.43 296.76 45.73 297.35 45.73 297.64 46.02 297.94 45.14 297.94 44.55 298.23 43.67 297.94 43.67 297.35 43.08 297.06 42.49 297.06 41.61 297.06 41.31 296.76 41.31 297.06 41.02 297.06 40.43 297.35 40.14 297.35 40.14 297.64 40.43 298.23 40.43 298.82 40.14 299.12 40.14 299.7 40.14 300 40.43 300.29 40.73 300.59 40.73 300.88 40.73 301.47 40.73 301.76 39.55 301.76 38.96 301.47 38.37 301.76 38.37 302.35 38.37 302.65 38.08 302.65 37.78 303.53 37.78 304.12 37.78 304.71 38.08 305.59 38.37 306.77 38.08 307.36 37.78 307.36 37.2 307.06 36.9 306.77 36.61 306.18 36.02 305.3 35.73 305.3 35.43 305.59 35.14 305.88 34.55 305.88 34.84 306.47 34.55 306.77 34.25 307.36 34.25 307.94 33.96 308.83 33.66 309.12 33.37 308.83 33.08 308.24 33.08 307.94 33.08 307.36 33.08 306.47 32.78 306.18 32.49 305.59 32.19 305 31.9 304.71 31.61 303.82 31.31 303.53 31.02 303.82 30.72 303.53 30.14 303.24 29.84 303.24 29.55 302.94 29.25 302.35 28.96 302.06 28.66 302.06 28.37 301.76 28.07 301.47 27.78 301.47 27.49 301.18 26.9 300.88 25.72 300.59 25.43 300 25.13 299.7 24.25 299.41 23.66 299.7 23.66 300 23.66 301.76 23.66 302.06 23.37 302.35 23.37 302.65 23.07 302.94 23.07 303.24 23.07 304.12 23.07 305 22.78 305.88 22.48 305.88 21.9 305.88 21.31 305.88 21.01 306.77 20.72 307.06 20.43 307.36 20.13 307.65 19.84 307.65 19.84 307.94 19.84 308.24 19.84 309.42 20.43 310.89 20.43 312.06 20.43 312.65 20.13 313.54 19.84 314.12 20.13 314.71 20.13 315.01 19.84 315.3 19.84 315.6 19.84 316.48 19.84 317.65 19.54 318.54 19.54 319.42 19.54 320.01 19.25 320.6 19.54 321.48 19.54 322.66 19.54 323.54 19.84 325.89 20.13 327.95 20.13 328.54 20.13 330.31 20.72 332.37 21.31 334.13 21.31 334.72 21.6 336.49 22.19 338.55 22.78 339.14 22.78 339.73 22.48 340.02 23.96 341.79 24.84 342.96 25.13 343.26 26.02 344.43 27.78 345.91 28.07 346.2 28.07 346.49 28.66 347.08 28.96 347.38 29.25 348.85 29.55 349.44 29.55 349.73 29.84 350.32 30.14 350.61 31.02 351.5 31.61 351.79 32.19 351.79 32.49 351.79 33.08 351.5 33.66 350.61 34.25 350.03 34.55 349.73 35.14 349.73 36.31 349.73 39.84 350.61 42.2 351.2 43.08 351.2 43.96 350.91 44.26 350.91 44.55 351.2 44.84 351.5 45.14 352.67 45.14 353.56 45.14 353.85 45.14 354.73 45.43 355.32 45.43 355.91 45.43 357.38 45.73 357.97 46.02 358.56 47.49 359.15 48.08 359.44 48.38 359.74 48.67 360.33 48.96 361.21 48.96 361.8 48.96 362.09 49.26 362.09 50.14 362.97 51.61 363.86 52.79 364.45 54.55 365.92 56.91 367.09 57.5 367.39 57.5 367.68 58.38 367.98 59.85 368.56 60.73 368.86 61.32 368.86 61.91 368.86 62.5 368.27 63.09 368.27 63.67 368.27 64.26 368.27 65.44 369.15 65.73 369.45 66.32 369.45 66.91 369.15 67.5 368.86 67.79 367.98 68.09 367.68 68.38 367.68 68.68 367.68 69.56 367.68 69.85 367.68 70.15 367.39 70.15 366.8 69.85 365.92 69.85 365.62 69.27 365.03 69.27 364.74 68.97 364.45 68.68 364.15 68.68 363.86 68.38 363.27 68.68 362.39 68.68 360.91 68.68 360.03 68.68 359.74 68.97 359.15 69.27 358.85 70.44 358.56 71.33 358.27 71.62 358.27 72.21 358.56 72.5 358.85 73.09 359.44 73.38 359.74 73.97 360.62 73.97 360.91 74.27 361.21 74.27 361.5 74.56 361.8 74.86 362.39 75.15 362.97 75.44 364.15 75.44 364.74 75.74 365.03 76.33 364.74 77.21 364.74 77.8 364.74 78.39 365.03 78.97 365.62 80.44 367.09 80.44 367.39 81.03 367.39 81.62 367.98 82.5 368.86 83.39 369.45 84.27 370.04 85.15 370.04 87.8 369.15 91.04 368.56 91.33 368.56 91.33 368.27 91.33 367.68 91.33 367.39 91.04 367.09 90.74 366.5 90.45 366.21 89.57 365.33 89.27 364.74 88.98 363.86 88.98 363.27 88.98 361.8 88.39 360.91 87.51 359.15 87.21 358.85 86.92 357.97 86.62 357.38 86.62 356.5 86.92 355.91 86.92 355.32 87.21 354.73 87.51 354.44 88.39 353.56 88.68 352.97 88.68 352.38 88.98 351.79 89.86 350.91 90.45 350.32 90.45 349.44 90.45 347.97 90.45 347.38 90.45 346.49 90.45 344.73 90.15 344.14 89.86 343.55 89.57 343.26 88.68 342.67 86.92 341.79 86.33 341.49 86.33 341.2 86.33 340.9 86.62 340.02 87.51 339.14 87.8 338.84 87.8 338.55 87.8 338.25 88.09 337.96 88.09 334.43 88.09 333.84 88.39 332.96 88.68 332.66 88.68 332.37 89.27 331.49 89.27 331.19 89.57 330.6 89.86 330.31 90.15 330.01 90.74 328.84 90.74 328.25 91.04 327.66 91.04 327.37 91.04 326.48 91.04 326.19 90.15 325.01 89.86 324.72 89.27 323.54 88.98 322.95 88.39 322.36 88.39 322.07 88.09 321.77 87.8 321.48 87.8 321.19 87.51 320.89 87.21 320.3 86.92 319.71 86.62 319.42 86.62 319.13 86.03 318.54 85.74 317.65 85.15 316.77 85.15 316.18 84.86 315.01 85.15 312.65 85.15 312.06 85.15 311.77 85.45 311.18 85.45 310.89 85.74 310 85.74 309.71 86.03 309.71 87.51 309.42 87.8 309.12 87.51 308.83 87.21 308.53 87.21 307.94 86.92 307.65 86.92 307.36 86.62 306.77 86.62 306.47 86.33 306.18 86.03 305.3 86.03 305 86.03 304.71 85.74 304.12 85.74 303.53 86.03 302.94 86.33 302.65 87.21 301.76 87.51 301.47 87.51 300.88 87.51 299.7 87.21 298.53 86.92 298.23 86.62 297.35 86.62 296.76 86.62 296.47 86.03 294.41 86.03 293.52 85.74 293.23 85.74 292.05 85.74 291.76 86.03 291.46 86.03 291.17 87.21 289.99 87.51 289.7 87.51 289.4 87.51 288.81 87.21 288.52 86.92 288.52 85.74 288.52 85.74 288.23 86.33 287.34 86.62 287.05 86.62 286.17 86.62 285.87 86.33 284.99 86.33 283.81 86.03 282.93 85.74 282.05 85.74 281.16 86.03 280.57 86.33 280.28 86.33 279.69 86.33 278.81 85.74 277.93 85.45 277.63 85.45 277.04 85.15 275.87 85.15 274.69 84.86 274.1 84.86 273.51 84.56 272.33 84.56 272.04 84.27 271.75 84.27 271.45 84.56 270.86 85.15 270.27 85.45 269.69 85.45 269.39 85.45 268.51 85.45 267.04 85.45 266.45 85.45 265.86 85.45 264.98 84.86 264.1 84.27 263.8 84.27 263.51 84.56 262.92 84.86 262.04 84.86 261.45 85.15 260.56 85.15 260.27 85.74 259.39 85.74 259.09 85.74 258.5 86.03 258.21 86.03 257.03 85.74 256.15 85.74 255.56 85.45 254.68 85.15 254.09 84.86 253.8 84.86 251.74 84.86 251.44 84.86 249.68 84.86 249.38 84.86 248.79 85.15 248.5 85.74 247.91 85.74 247.62 85.74 246.44 85.45 245.85 84.86 244.38 84.86 243.79 85.15 243.79 85.74 243.79 86.62 244.38 86.92 244.08 87.21 243.79 87.21 243.5 87.21 242.91 87.21 242.02 87.51 241.73 87.51 240.55 87.51 239.67 87.51 239.08 87.21 238.79 86.92 238.2 86.92 237.02 86.92 236.73 86.92 236.43 87.21 236.14 87.8 236.14 88.09 236.43 89.27 237.32 89.86 237.61 90.74 237.61 91.33 237.02 91.63 236.73 91.63 235.84 91.92 234.08 91.92 233.49 91.92 232.9 92.21 232.02 92.21 231.72 92.51 230.55 92.51 229.08 92.51 228.49 92.51 227.9 92.8 227.31 92.8 226.72 92.8 226.43 92.8 226.13 92.51 225.54"/><polygon id="div-kachin" title="" class="tooltipster cls-3" points="307.87 84.88 307.87 83.11 307.87 82.52 308.17 81.64 308.17 81.35 307.87 80.46 306.99 79.29 306.69 78.7 306.69 78.4 306.99 77.81 307.58 76.93 307.58 76.34 307.58 76.05 307.28 74.87 306.4 72.22 306.69 71.64 306.99 71.34 307.58 71.05 307.87 70.46 307.87 69.87 307.87 69.28 307.28 68.69 306.99 68.4 305.52 67.81 305.22 67.52 304.93 67.22 304.93 66.93 305.22 65.45 305.52 64.57 305.22 64.28 304.64 63.1 304.34 62.22 304.64 61.34 305.22 60.75 305.52 60.45 305.81 58.98 306.11 58.39 306.4 57.51 306.4 56.33 306.4 56.04 306.4 55.16 305.81 54.86 305.22 54.86 304.93 54.57 304.93 53.98 304.93 52.21 304.64 51.33 304.34 50.74 304.34 50.45 304.34 50.15 304.64 49.86 304.64 49.27 304.34 48.98 304.34 48.39 304.34 48.09 305.22 46.33 305.22 45.74 304.93 45.15 304.64 44.86 304.05 44.27 303.75 43.68 303.46 43.68 302.87 43.38 302.58 43.97 302.28 44.27 300.22 44.27 299.93 43.97 299.34 43.68 298.75 42.8 298.46 41.91 298.16 41.62 297.87 41.32 297.57 41.32 297.28 41.91 297.57 42.21 297.28 42.5 296.99 42.5 296.4 42.21 295.51 41.62 294.04 40.15 292.28 40.15 291.98 40.44 292.28 41.32 292.28 42.8 292.28 43.68 291.98 44.86 291.69 45.44 291.1 45.74 290.51 46.62 290.22 46.92 289.63 47.5 289.34 47.8 288.16 47.8 287.87 47.8 287.28 47.21 286.98 46.92 286.39 44.86 286.39 43.68 286.1 42.5 285.81 41.91 285.22 41.03 284.33 40.44 283.75 39.85 283.45 39.56 283.16 38.97 282.86 38.68 282.57 38.09 282.57 37.5 283.16 36.91 283.16 36.62 282.27 36.03 282.27 35.73 281.98 35.44 282.27 34.85 282.86 34.26 282.86 33.67 281.39 32.79 280.51 32.79 280.22 32.2 279.92 31.91 279.92 31.32 279.92 31.02 280.22 30.73 280.51 30.44 281.39 30.44 281.69 30.44 281.98 29.85 281.39 28.96 280.8 28.38 279.33 27.79 278.75 27.2 278.75 26.9 278.75 23.67 279.04 22.2 279.04 21.9 279.33 21.31 279.33 20.72 279.33 20.14 279.04 19.55 278.16 18.08 277.27 17.78 276.98 17.78 276.69 17.49 276.39 17.19 276.39 16.61 275.8 16.02 275.51 15.72 274.63 15.72 273.74 16.02 273.45 16.02 272.86 16.02 272.27 15.43 272.57 14.54 272.86 13.96 273.15 13.66 273.15 13.37 273.15 13.07 272.86 12.78 272.27 12.48 271.68 11.9 270.8 11.31 270.51 11.01 269.92 10.13 269.62 9.54 268.74 9.25 268.45 8.66 267.86 8.07 267.27 8.07 266.98 8.07 266.39 8.37 266.09 8.66 264.92 8.66 264.92 8.95 264.92 9.54 264.62 9.84 263.15 10.13 262.86 9.84 262.27 9.54 261.98 8.66 261.68 8.07 261.09 7.19 260.5 6.6 260.21 6.01 259.92 4.54 259.03 1.89 258.74 1.6 258.44 1.3 257.86 1.6 257.56 1.6 256.68 2.48 255.8 3.07 255.5 3.36 254.91 3.36 254.32 3.07 254.32 2.19 253.74 1.3 252.85 0.42 252.27 0.13 251.97 0.13 251.38 0.13 251.09 0.42 251.09 1.01 251.09 2.19 251.09 2.48 250.5 3.07 250.5 3.36 249.91 3.66 249.91 4.54 249.62 5.13 249.03 6.01 248.74 6.89 247.85 7.48 247.85 7.78 247.56 8.37 247.85 8.66 248.15 9.54 248.15 9.84 248.15 10.43 247.56 11.6 247.26 11.9 247.56 12.78 247.26 13.07 246.97 13.07 246.38 12.78 246.09 12.48 246.09 12.19 245.79 11.9 245.2 11.9 244.91 11.9 244.62 12.48 244.62 13.66 244.32 13.96 244.03 14.25 243.73 14.25 242.56 14.25 242.26 14.54 241.97 14.84 241.67 15.13 241.67 15.72 242.26 16.31 242.26 16.9 241.09 17.78 240.79 18.37 241.09 19.25 241.09 19.55 240.79 19.84 240.2 20.43 240.2 20.72 240.5 21.31 240.5 21.9 240.79 22.2 241.67 22.2 241.97 22.49 242.56 23.37 242.85 23.67 243.73 23.96 244.03 24.26 244.32 24.84 244.03 25.43 243.73 25.73 243.44 26.02 243.15 26.61 242.85 27.2 242.56 28.08 242.56 29.55 242.85 30.14 243.15 30.44 242.85 30.73 241.97 30.44 241.67 30.73 240.79 31.02 240.5 31.02 240.2 30.73 240.2 29.85 240.2 29.55 239.91 29.26 239.61 29.26 239.03 29.55 237.56 29.85 236.97 30.14 236.08 31.32 234.32 32.2 234.32 32.79 233.73 33.08 233.14 33.67 232.85 34.26 232.26 34.55 231.97 34.55 231.08 35.44 230.79 35.44 229.61 35.73 229.32 36.03 229.61 36.62 229.32 37.2 229.32 37.79 229.02 37.79 228.43 37.5 228.14 37.5 226.96 37.5 226.67 37.5 226.08 37.79 226.08 38.09 225.79 38.97 225.49 39.26 225.2 39.56 224.9 39.85 224.61 40.15 224.61 40.44 224.31 41.03 223.73 41.32 222.84 41.32 222.26 41.32 221.96 41.62 221.96 42.8 221.37 42.8 221.08 43.09 220.2 43.38 220.2 43.97 220.2 44.27 220.49 44.56 220.49 44.86 220.49 45.44 220.49 45.74 221.08 46.03 221.08 47.21 221.08 47.5 221.37 48.09 221.67 48.39 221.96 48.68 221.67 48.98 220.78 50.15 220.78 50.45 220.78 51.03 221.37 51.62 221.67 52.21 222.26 52.8 222.55 53.39 223.43 53.39 223.73 53.68 223.73 53.98 223.73 54.86 223.73 55.16 224.31 55.74 224.9 56.63 225.49 57.22 226.08 58.1 226.96 58.39 226.96 58.98 227.85 59.57 227.85 60.45 228.14 60.45 229.02 61.04 229.32 61.34 229.61 61.63 229.61 61.92 229.61 62.51 229.61 62.81 230.2 63.1 230.79 63.1 231.08 63.4 231.08 64.28 231.38 64.57 231.67 64.57 232.26 64.87 232.55 65.16 232.85 65.75 233.14 66.04 233.14 66.34 232.85 66.93 232.26 67.52 231.97 68.1 231.67 68.1 231.38 68.1 230.2 67.52 228.43 67.81 228.14 67.81 227.85 67.52 226.96 69.58 226.96 69.87 226.38 70.46 226.08 71.05 225.49 71.64 224.9 72.52 224.61 72.52 223.73 72.81 223.14 72.81 222.55 72.81 221.08 72.52 219.31 72.52 218.43 72.52 216.96 72.81 216.37 72.81 214.9 72.52 214.02 72.81 213.43 73.11 212.55 73.69 211.08 74.28 210.19 74.28 209.02 73.99 208.43 73.69 207.54 73.69 206.07 74.28 203.43 74.87 202.54 74.87 201.37 74.87 200.78 74.87 199.9 74.87 199.01 75.17 198.72 75.17 197.84 74.87 197.54 74.58 196.37 74.58 195.19 73.99 194.01 73.69 193.13 73.69 192.25 73.99 189.89 73.99 189.3 73.99 189.3 74.28 189.6 74.58 190.19 75.17 191.36 75.46 192.54 76.05 192.54 76.64 191.95 76.93 191.66 77.52 191.66 77.81 191.36 78.11 191.36 78.7 191.66 78.99 191.66 79.58 191.36 79.58 190.78 79.58 190.19 79.58 189.6 79.58 188.72 79.58 188.42 79.88 188.13 80.46 188.13 81.05 188.13 81.94 188.13 83.11 187.54 83.7 186.36 84.29 185.19 84.88 184.3 85.17 183.71 85.76 181.36 86.94 180.48 87.53 180.48 87.82 181.07 88.7 181.65 89.29 182.54 89.88 183.71 90.76 184.3 91.35 184.89 91.94 185.19 92.82 185.19 93.71 185.48 94 185.48 94.88 185.77 96.36 185.48 96.65 184.89 97.24 183.71 97.83 181.95 98.42 180.18 98.71 179.59 98.71 179.3 99 179.01 99.3 178.71 99.59 178.71 100.18 179.01 100.77 179.59 101.65 180.18 102.24 181.95 104.01 182.24 104.3 182.24 104.59 182.54 105.18 182.54 106.07 182.24 106.66 182.24 107.24 182.54 107.54 183.13 107.83 183.42 108.13 183.71 108.42 184.01 108.71 184.3 108.71 184.3 110.48 184.6 111.36 185.19 111.66 185.48 111.95 185.77 111.95 185.77 112.54 185.77 113.13 186.07 113.42 186.07 114.01 186.07 114.31 186.36 114.89 186.66 114.89 186.66 115.78 186.66 116.07 186.66 116.66 186.66 116.95 186.07 117.84 186.07 118.43 185.48 118.72 184.89 119.02 184.6 119.31 184.01 120.19 183.71 121.37 183.42 121.66 183.13 122.25 182.83 122.84 182.54 123.13 182.54 123.43 182.24 123.72 182.24 124.02 181.95 124.9 181.95 125.49 182.24 125.78 182.24 126.08 182.83 126.67 183.13 126.96 183.42 127.55 183.42 128.14 183.42 129.31 183.71 129.9 184.01 130.49 184.3 130.79 185.77 132.26 186.95 132.85 187.25 133.44 187.54 133.73 187.54 134.32 187.54 134.91 187.25 135.49 186.36 136.38 185.19 137.55 184.89 137.85 183.71 138.73 182.54 139.32 181.95 139.61 181.95 140.2 181.65 140.5 181.36 140.79 181.07 141.09 180.48 141.09 180.18 141.09 179.89 140.5 179.59 140.2 179.3 139.91 178.71 139.32 178.12 139.32 177.54 139.32 177.24 139.61 177.24 141.09 176.95 142.26 176.95 143.44 176.95 143.73 176.95 144.32 176.95 146.09 176.95 148.74 176.95 151.39 176.95 151.68 176.95 152.56 177.24 153.44 177.24 154.03 177.54 154.62 177.54 155.21 177.83 156.09 177.83 156.39 178.12 156.68 178.12 156.98 178.71 157.56 180.18 159.04 181.36 160.51 181.36 160.8 181.95 161.69 182.24 161.98 182.24 164.33 182.24 164.92 181.95 165.81 181.65 166.98 181.65 167.28 181.07 167.57 181.07 167.87 180.48 168.16 179.89 168.16 179.59 168.16 179.3 167.87 179.01 167.57 179.01 166.98 179.59 165.81 179.89 165.81 179.89 165.51 179.89 164.92 180.18 164.33 180.18 164.04 180.18 163.75 180.18 163.45 179.89 163.45 179.3 163.45 179.3 163.75 179.01 164.04 179.01 164.33 178.12 164.92 177.24 165.51 176.06 165.81 175.18 166.1 173.71 166.39 172.83 166.69 171.94 166.98 171.36 167.28 171.06 167.57 171.06 167.87 171.06 168.45 171.65 169.34 171.94 169.63 172.24 169.93 172.53 170.51 172.53 171.1 173.12 171.69 173.42 172.57 173.71 174.34 174 174.93 174 175.22 174.3 176.4 174.59 176.69 174.59 177.28 174.89 177.87 174.89 178.16 175.18 179.05 175.18 179.34 175.48 179.34 175.77 179.93 176.06 180.52 176.36 181.11 177.24 181.4 178.12 181.7 179.3 181.99 180.77 182.28 182.54 182.58 183.13 182.58 183.42 183.17 183.71 183.46 183.71 184.05 184.01 184.34 184.3 184.93 184.3 185.23 184.6 185.52 184.6 186.11 184.89 186.7 184.89 186.99 185.19 187.29 185.19 187.58 185.48 187.88 186.07 188.47 188.13 189.94 188.72 190.23 189.01 190.82 189.3 191.7 189.6 191.7 190.19 191.7 190.48 191.11 190.78 190.82 191.07 190.53 191.66 190.23 191.95 190.23 193.13 190.23 194.6 189.94 195.48 189.64 196.66 189.35 196.95 189.05 198.43 189.35 200.48 189.94 202.84 191.11 204.6 192 206.07 192.29 206.37 192.29 206.96 192.29 207.25 192.29 207.54 192.29 208.13 192.59 208.43 192.88 209.31 193.47 209.31 194.35 208.72 194.65 207.84 194.65 207.54 195.23 207.25 195.23 206.96 195.23 206.96 195.82 206.96 196.71 207.25 197 207.25 198.47 207.25 200.53 206.96 201.71 206.66 202.3 206.96 202.59 207.25 202.88 208.43 203.77 209.31 204.36 210.19 204.94 210.19 205.24 210.19 206.12 210.19 206.42 210.49 206.71 211.08 207 211.37 207.3 211.37 207.89 211.08 208.18 210.78 208.77 210.78 209.36 211.08 209.95 211.37 210.24 211.96 210.83 212.55 211.13 212.84 211.71 214.02 212.6 214.61 212.89 215.19 213.19 215.49 213.48 216.08 213.77 217.25 214.36 217.55 214.66 218.14 214.66 218.43 214.36 218.72 213.77 219.31 213.48 219.31 213.19 220.2 213.19 220.49 213.48 220.78 213.77 220.78 214.07 220.78 215.54 220.78 215.83 221.37 216.13 221.67 217.01 221.67 217.89 221.96 218.19 221.96 219.07 221.67 219.37 221.08 219.95 220.78 220.25 220.78 220.54 220.49 221.13 219.9 221.72 219.31 222.01 218.43 222.31 217.84 222.6 216.96 222.9 216.37 222.9 215.78 223.19 215.19 223.49 214.9 223.49 214.9 223.78 214.9 224.37 215.19 224.66 215.49 224.66 215.78 224.66 216.08 224.66 216.37 224.96 216.67 224.96 216.96 224.96 217.55 224.96 217.84 224.96 218.14 225.25 218.43 225.25 218.72 225.25 219.31 225.54 219.31 225.84 219.61 225.84 219.9 226.13 220.2 225.84 220.49 225.54 221.08 225.54 221.37 225.84 221.67 225.84 221.96 226.13 222.26 226.13 222.55 226.13 223.14 226.13 223.43 226.13 223.73 226.13 224.02 226.13 224.31 226.13 224.61 226.13 224.9 226.13 225.2 226.43 225.49 226.72 225.49 227.02 225.49 227.6 225.49 227.9 225.49 228.19 225.49 228.49 225.49 228.78 225.79 229.08 226.08 229.37 226.38 229.37 226.67 229.37 226.96 229.66 227.26 229.66 227.85 229.66 228.14 229.37 228.43 229.37 228.73 229.37 229.32 229.66 229.61 229.66 229.91 229.66 230.2 229.66 230.49 229.37 230.49 229.08 230.79 228.78 231.08 228.49 231.38 228.49 231.97 228.49 232.26 228.19 232.55 228.19 232.85 228.19 233.14 227.9 233.73 227.9 234.02 227.9 234.32 227.9 234.61 227.9 235.2 228.19 235.79 227.9 236.08 227.9 236.38 227.6 236.67 227.6 236.67 227.31 236.97 227.02 237.26 226.72 237.85 226.72 238.14 226.72 238.44 226.72 238.73 226.43 239.03 226.72 239.32 226.72 239.91 226.72 240.2 226.13 240.2 225.84 240.5 225.84 240.79 225.84 241.09 225.84 241.67 226.13 241.67 225.84 241.97 225.54 242.26 225.25 242.26 224.96 242.56 224.66 242.85 224.66 243.15 224.66 243.44 224.66 243.73 224.96 244.03 224.96 244.32 224.96 244.62 224.66 244.91 224.66 245.2 224.37 245.5 224.07 245.79 224.07 246.09 223.78 246.38 223.78 246.38 223.49 246.68 223.19 246.97 222.9 247.56 222.6 247.85 222.6 249.91 222.6 252.27 222.31 253.44 222.01 255.21 221.13 255.8 219.66 255.5 218.78 255.5 218.48 254.91 217.89 254.32 217.89 253.74 217.6 253.15 217.31 252.56 217.01 252.27 216.72 251.97 216.72 251.68 216.42 250.79 216.13 250.5 215.83 250.5 215.54 250.5 215.25 251.09 214.95 251.97 214.36 252.27 214.36 252.85 213.19 253.15 212.89 253.74 212.89 255.21 212.89 255.21 212.6 254.91 212.01 255.21 211.71 255.21 211.42 255.5 211.13 255.8 210.83 256.09 210.83 256.38 209.95 256.68 209.95 256.97 209.65 257.56 209.65 258.15 208.77 258.74 208.48 259.03 207.89 259.62 207.59 259.62 207.3 259.92 206.42 260.21 206.12 260.5 205.53 260.8 204.94 260.8 204.36 260.21 204.36 259.62 204.06 259.33 203.77 259.62 203.47 259.62 202.88 259.92 202.59 260.21 202 260.8 201.12 261.09 200.82 261.09 200.53 261.09 199.94 260.5 199.35 260.21 199.35 259.62 199.35 258.74 199.06 257.27 199.06 256.97 198.76 256.68 198.47 256.38 197.29 256.38 197 256.97 196.71 257.27 196.71 258.15 196.71 258.44 196.71 258.74 196.71 259.03 196.41 259.03 195.82 258.74 195.53 257.56 194.35 257.56 194.06 257.27 193.76 257.56 193.47 257.56 193.17 257.27 192.59 257.27 192 256.68 191.7 254.62 192.29 254.03 192.29 253.15 192.59 252.85 192.29 251.97 192.29 251.38 192.59 250.5 192.59 250.5 192 251.09 190.53 251.38 190.23 251.38 189.64 251.68 188.17 251.68 187.58 251.97 186.99 252.27 183.46 252.27 181.11 252.27 179.93 252.27 179.34 251.97 178.75 251.68 178.75 251.38 178.46 251.38 178.16 251.38 177.87 251.97 177.58 251.97 177.28 252.27 177.28 253.15 177.28 253.74 177.28 254.32 176.69 254.91 176.69 255.5 176.4 256.09 175.81 256.68 175.22 256.97 174.93 257.56 174.34 257.86 174.04 258.15 174.34 258.44 174.34 258.44 173.75 258.74 173.75 259.62 174.34 260.21 174.04 260.5 174.34 261.09 174.34 261.39 174.34 261.98 173.75 262.27 173.16 262.27 172.87 261.98 172.28 261.68 171.69 260.8 171.69 260.5 171.4 259.92 170.51 259.92 169.93 259.62 168.75 259.03 167.87 259.03 167.28 259.03 166.98 259.33 166.1 259.62 164.92 259.62 162.86 259.62 162.57 260.21 162.27 260.8 162.27 261.09 161.69 261.39 160.8 261.98 160.21 263.15 157.86 263.45 156.39 264.03 155.21 264.92 153.44 265.21 153.44 265.5 153.44 266.09 153.74 266.39 154.03 266.68 154.03 266.98 154.33 267.27 154.92 267.56 155.5 267.56 155.8 267.86 156.09 268.45 156.09 268.74 155.8 269.04 155.8 269.92 155.5 270.21 155.21 271.68 153.44 272.27 153.15 272.86 151.97 273.15 151.68 273.74 151.68 274.33 151.68 275.21 151.68 275.51 151.09 275.8 150.5 276.1 150.21 276.69 149.33 276.98 148.15 277.27 147.85 277.57 147.56 278.45 147.85 278.75 147.85 278.75 147.56 278.75 147.27 278.75 146.38 278.75 145.79 279.04 144.62 279.04 143.73 278.75 143.15 278.16 142.26 278.16 141.97 278.16 141.67 278.45 141.67 279.33 141.67 279.63 141.38 279.92 141.09 279.92 140.5 280.51 140.2 280.51 138.73 279.92 137.26 280.22 136.97 280.51 136.67 280.8 136.67 281.1 136.97 282.27 137.85 284.04 138.14 284.92 138.73 285.51 139.03 286.39 140.2 286.69 140.5 287.28 140.5 287.87 139.91 288.16 139.61 288.75 139.91 289.04 139.61 289.34 139.32 290.22 137.55 290.51 136.97 290.51 136.38 290.51 135.79 291.1 134.61 291.69 134.02 292.87 133.73 292.87 133.14 293.16 132.85 292.87 131.96 293.16 131.67 293.45 131.37 293.45 130.79 293.75 130.49 294.34 130.2 294.34 129.9 294.34 129.31 294.34 128.73 294.93 128.14 295.51 127.84 296.1 127.25 296.4 126.96 296.99 126.67 298.16 126.37 298.46 126.37 298.75 126.96 299.34 126.96 300.22 127.84 300.81 127.84 301.4 128.43 301.99 128.43 302.87 127.25 304.64 126.67 305.22 126.08 305.22 125.19 305.22 124.61 305.52 124.02 305.52 123.72 305.52 123.43 304.34 123.43 304.05 123.13 304.05 122.25 303.75 121.66 303.16 121.37 302.87 121.08 302.87 120.49 302.58 120.19 302.28 120.19 301.4 120.49 301.11 120.19 300.81 119.6 300.22 116.95 300.22 116.66 299.93 116.37 299.34 115.48 299.34 114.31 299.05 113.72 299.34 113.13 299.63 112.54 299.93 112.54 300.22 112.83 300.52 112.83 301.11 112.83 301.4 112.54 302.28 112.25 302.58 112.25 302.87 112.83 303.16 113.42 302.87 114.31 303.16 114.6 303.46 114.89 303.75 114.89 304.05 114.31 304.64 113.72 304.93 113.42 305.52 113.13 305.81 112.83 305.81 112.54 305.52 111.95 305.52 111.66 306.11 111.36 306.4 110.48 306.11 109.6 306.11 109.3 305.81 108.71 305.22 107.83 304.05 107.83 303.75 107.83 303.75 107.54 303.75 105.18 303.75 104.59 303.75 104.3 304.05 104.01 305.52 103.12 306.4 102.24 306.4 101.36 306.69 101.06 306.99 99.89 306.99 97.83 306.99 96.94 307.28 96.65 307.28 95.77 307.58 95.18 307.58 94 307.58 92.82 307.87 91.94 308.75 90.17 308.75 88.7 308.75 88.41 308.75 87.53 307.87 84.88"/><path id="div-sagaing" title="" class="tooltipster cls-4" d="M511.25,134.93l-.59-.29-.88-.59h-1.47l-.59-.59H506l-1.17-.59-.59-.59-.59-.29-.29-.59v-.29l.29-.3.29-.29h.3l.59-.59.29-.3v-.58l-.59-.3h-.88l-.29-.29-.59-.59-.59-1.18-.29-.59-.59-.29-.3-.3-.59-.58-.29-.3-1.18-.29h-.29l-1.77-.59-.59.29-.58.59-.59.3-.88.29-.3-.59-1.18-.88h-.88l-.29.29v.59l-.3.88-.88.89-.59.29-.59.29h-.58l-.3.3h-.88l-.3-.3H486l-.89.3-1.17-.59-.59.29-.88.3-.59.29h-1.18l-.59-.29h-.29v.29h-.59l-.88-.29h-.88l-.3.29-1.18.59-.29.3-.59-.3h-.88l-1.18.59h-.59l-.58.3-2.06.58-2.06.89-1.18,1.17h-.59l-.88.59-.59.3-.29.58-.89,1.48-.59,1.17-.88.59-.59.59-.88,1.77-.59.59-.88.58-1.47.3-.88.29-.89.3-.29-.3h-1.18l-.29.3-.3.88-.29.29-.88.59v.3l-.3.29-.29.59-.3,1.47-.58.88-.59.3h-.3l-.88-.3h-.29l-.59-.29h-.88l-.3.29-.59.59-.29.59-.3,1.18-.29.88-1.18.59-.58-.29-.89-.3h-1.76l-.59.3-.59.58-.59,1.18v.3l-.29.58-.59.89-.29.29H438l-.59,1.18-.59.59h-.88l-.59.29h-.29l-1.18.59-2.06.59h-.59l-.58.29-1.18.59h-.59V157l-.29-.88-.59-.3-.59.59-.3.3-.58.29-.59.89-.59.29h-.59l-.59.29-.29.3-.59.29v.59l.29.88v.59l-.29.3-.29.29-.59.29-.3.3-.29.59v1.18l-.3.29-1.17.88-.3.59v.59l.59.88.59.88v.59l-.29,1.18-.59,1.47-.3.59v2.06l.3.59v.88l.29,1.18.59.88v.3l.59.29h.29l.3.3v.29l-.3.29h-.29l-.3.3v.29l.3.59.29.29v.3l-.29,1.18.29.58.3.59,1.17.59,1.18.3.3.29V185l-.59.59-.3.88-.29.59-2.06,1.76-.88,1.18-.59.3-.59.29-.59.59H418l-.29.29-.29,2.06v.59l.58.3V195l.3.89V197l.29,1.77v.88l-.29.59v.3h-.59l-1.18.29h-.29l-.3.29-.88,1.48-.59.58-1.17,1.18-.59.88-.59,1.48-.59.29-.59.29.59.59v.3h-1.76l-.3.29-.29.3-.88,1.47-.59.88-.89.29-.58.59h-.89l-.29-.29-.3-.3h-.29l-.59.89H403l-.88.59-.59.29v.59l-.3.59v.29l-.58.88-.89.3-.29.29v.3l-.3.59v.88l-.58,1.47-.59,1.18-.59,1.17-.29,1.18-.3,1.77.3.59.58.58.59.89.88.29h1.77l.88.59h.59l.59.29.59.3.59.29.29.59v4.42l-.29.88-.3.29-.29.3-.3.29-.88.59v.29l-.29.59.59,1.47-.59.89-.3.59V240l-.59.88-.88.89-.29.58-.3.59-.59,1.18-.29.59v1.47l-.59.88-.29,1.18-.3.29h-.58l-.89-.29-.59.29-.29.3V250l-.29.88v.88l-1.18,1.47-.59.59-.29.3-.59.58h-.3l-1.17.59-.59,1.77-.88,1.47-.89.29-.29.59v2.36l-.3.58-.29.3h-.59l-.29.29-.3.3.89.88-.89.88-.88.59-.88.88v1.77l-.3,1.18-1.17,1.76-.3,1.18V273l-.29.59-.3.29-.29.3-.29.29v.29l-.3.59.3,2.36-.3.59-.29.29-.59.29v.3h-.29l.29.88v.59l-.29.29-.3.59-.29.59-.59.59-.3.29v1.18l-.29.3h-.88l-.3.29.3,1.18v1.17l-.3,1.18-.29.3-.59.29-.29.29v2.95l.29.88.29.59.59.59.3.59v1.17l-.3.59v2.65l-.29,1.18v.29l-.3.88v1.18l-.29,1.77v.88l-.29.29-.59.59h-.89l-.58-.29L373,305l-.29-.3h-.59l-.3.3v1.76l.3.59.29.29v2.65l-.29.3v1.76l-.3.3-.29.29-.88-.59h-.89V313l.59,1.47.3.59v1.47l-.59.59-.3.3v5l.3.29.29.59.3.88v.59l.29.89v1.17l-.29.3V328l-.59.88v.3l-.3.88v.59l-.29.88-.3.59v.29l.59.3.59.88v4.71l-.29.59-.59.59-.3.59v.29l.3.29v.3l.29,1.18v.58l.3.59h2.65l.88-.59.29-.29.3-.29.29-.3.59-.29.29.29v.59l.3.29v.89l-.3.29.3.3h.29v.29h.3v.59l.29.29v.59l.29.3.89.29,1.17,1.18,1.18,1.17v.3l.3.59.29.29.29.59.3.29.88,1.77.29.59.3.59.59.88v.29l.29.59.3.59-.3.88-.59,1.48-.59,1.17-.88,1.47-.29.59v.3l-.3.59.3,1.17v1.18l.29.59v1.76l.3,1.18.29.88.29.3.59.59h.3l.29.29h.59l.29-.29.59-.3.3-.29h.29l.59.29.29.3.3,1.17.29.3.88.29h.59l.3.3v.29l.29.59v.59l.3,1.76-.3,1.47v1.77l-.29.59v.88l-.3.88-.29,1.18v1.47l.29.3.89.88,1.76.88.88.3H393l.29-.3.29-.29.3-.3.59-.58h.29l.3-.3,1.47-.29.88-.3.29-.29.59-.3h1.18l1.18.3.58.59h1.18l.88-.3,1.18-.29h1.18l.29.29.59-.29.59-.59H408l1.18.29h.29l1.47.3,1.47.59,2.65-.3,2.94.3h.59l.59-.3h.59l.59-.59.59-.29.88-.29.59.29h.88l.29.59v.29l.3.3.29.29.3.3.59.29.29.59.29.29v.59l.3.3.29.29.3.29.29.3.59.29v1.77l.29.29.3.59.59.59.29.29.29.3h.3l.29.29.3.3.29.29.3.3h.58v.29h.59l.59.59,1.18.29-.3-.88V393l-.29-.3.29-.29.3-.89.29-.29v-1.18l.3-.88v-.29l.29-.3v-.29l.29-.59.59-.3.59-.58.3-.3.58-.29.3-.3.29-.29.3-.3.29-.29v-.29l.3-.3V383l.29-.29v-.59l.29-.59.3-.3.29-.29.3-.29v-.3l.58-.59.3-.59.29-.29H443l.89-.29h1.76l.29-.3h1.48l0,.06,0,.24h6.76l.59.29.3.29h.58l.3.3.59.29h.29l.59.3.29.29.3.3.29.58.59.3.59.59h.59l.88-.3h.59l.59-.29L463,381l.59-.29h.29l.3-.3.29-.29.29-.3.3-.29v-.59l.29-.59V378l.3-.59.29-.3.59-.58v-.3l.29-.29-.29-.59h-.88v-.88l-.3-.3.3-.29v-.3l.29-.59v-.29l-.29-.29h-.59l-.3-.3-.58-.29-.3-.59-.29-.88v-1.48l-.3-.88-.29-.59v-1.76l-.3-.59v-3.53l.3-.3.29-.29h.59l.3-.59v-.59l-.3-.29h-.29l-.3-.3-.29-.29-.59-.59-.59-.59-.29-.29v-.59l-.3-.29v-.59l.3-.3V353l.29-.29.3-.29v-.3l.29-.59.29-.29.3-.59-.3-.59v-.29l-.29-.59-.29-.59-.3-.29-.59-.89-.29-.29-.29-.3-.3-.58v-.89l-.29-.29-.3-.3-.29-.58-.3-.3V342.4l-.29-.59-.29-.29v-.3l.29-.29.59-.3h.88l.59-.29.29-.29.3-.3.29-.59v-5.88l-.29-.59v-1.18l.29-.29v-.89l.3-.29.29-.29v-2.06l-.29-.3v-3.82l.29-.59v-.89l-.29-.58v-.59l-.3-.89v-.58l-.29-.3v-.88l-.3-.88-.58-.89-.3-.59-.29-1.17-.3-.59-.29-1.18-.3-.59v-.59l-.29-1.17.29-.3.3-.88.59-1.18.29-.59.59-.58.29-.3.3-.59.88-.88.88-.88.59-.59v-.3l.3-.29v-.88l.29-.89.29-.29.3-.59.29-.29,1.18-.89.29-.29h.3l.59-.59h1.17l.59.3h.3v2.35l-.59.88v1.18l.29.29.3.3.88.59.88.29,1.77.3h.58l.59-.3.89-.88.58-.3.59-.29h.89l.58.59.3.29.29.3h.3l.29-.3h.29v-.29l.3-.3v-.29l.29-.29.3-.3.29-.29h.3l.29-.3h.29l.3-.29v-.3l.29-.29v-.59l.3-.29.29-.3.3-.29h.29v-.3l-.29-.29.29-.29.29-.3v-1.18l.3-.29v-.29l.29-.3-.29-.29.29-.59h.3v-.3l.29-.29.29-.29v-.3h.59l.59-.29h.3l.29-.3v-.29l.29-.3V293h.3l.29-.59v-.29l.3-.3v-.59h.29v-.88l.3-.29.29-.3.29-.29.3-.3v-.29l.29-.29V288l-.29-.3v-.29l-.3-.3-.29-.29-.29-.29-.3-.3v-.29l-.29-.3v-.88l-.3-.29v-.3h-.29v-2.94l-.3-.3-.29-.29-.29-.29h-1.77l-.29.29-.3.29-.29.3-.3.29-.29.3v.29l-.29.3h-.3l-.29.29-.59-.59-.3-.29-.29-.3v-.88l.29-.59.59-.59.59-.29.88-.3,1.18-.58,1.18-.59,1.17-.59,1.77-.59.88-.29.59-.3.29-.29h1.48L493,275h1.18l.88-.3v-1.17l-.88-.59-.89-.59-1.17-.88-.3-.3-.29-.29.29-.59.3-1.18v-3.53l-.3-.29v-1.47h.59l.29-.59h.89l.59-.3v-.88l-.89-.59-.29-.29-.59-.3H491l-1.47-.29-1.77-.88-2.35-1.18-2.06-.59-1.47-.29-.3.29-1.17.3-.89.29-1.47.29h-1.47l-.59.3-.29.29-.29.3-.3.58h-.88l-.3-.88-.29-.59-.59-.29-2.06-1.47-.59-.59-.29-.29v-.3l-.29-.29v-.3l-.3-.59v-.58l-.29-.3v-.29l-.3-.59-.29-.3v-.58l-.3-.3-.29-.59h-.59l-1.76-.29-1.47-.3-1.18-.29-.88-.29-.89-.3-.29-.59-.29-.59-.3-.58h-.29v-.3l-.3-.88v-.3l-.29-.58v-.59l-.3-.3-.29-1.17v-.3l-.29-.59-.3-1.76-.29-.89-.59-.58v-.59l-.3-.59-.29-.3-.29-.29-.59-.88v-.89l.29-.29.59-.29.88-.3.89-.29,1.47-.3.88-.29,1.18-.3.88-.58.88-.59v-.3l.3-.29V232h.88v.89l-.3.59v.88h-.29l-.59,1.18v.58l.3.3.29.29h.88l.59-.29v-.3l.59-.29v-.29l.29-1.18.3-.88v-3l-.3-.29-.58-.88v-.3l-1.18-1.47-1.47-1.47-.59-.59v-.29l-.3-.3v-.29l-.29-.89v-.58l-.29-.59V222l-.3-.88v-10.3l.3-1.18v-1.47l.29-.3h1.18l.59.59.29.3.29.29.3.59h.88l.3-.3.29-.29.29-.29v-.59l.59-.3,1.18-.59,1.18-.88.29-.29,1.18-1.18.88-.88.29-.59v-1.18l-.29-.29-.29-.59-1.18-.59-1.47-1.47-.3-.3-.29-.58-.3-.59v-1.77l-.29-.59-.29-.29-.59-.59v-.29l-.3-.3v-.59l.3-.88v-.29l.29-.3v-.29l.3-.3.29-.59.29-.58.3-.3.29-1.18.59-.88.3-.29.58-.3.59-.29v-.59l.59-.88v-2.06h-.29l-.3-.59V182l-.29-.3v-1.18h-.3l-.29-.29-.59-.29-.29-.89v-1.76h-.3l-.29-.3-.3-.29-.29-.3-.59-.29-.29-.29v-.59l.29-.59v-.88l-.29-.59v-.3l-.3-.29-1.76-1.77-.59-.59-.59-.88-.29-.59v-.59l.29-.29.3-.29.29-.3h.59l1.76-.29,1.77-.59,1.18-.59.58-.59.3-.29-.3-1.47v-.89l-.29-.29v-.88l-.29-.89-.59-.59-.59-.58-1.18-.89-.88-.58-.59-.59-.59-.89v-.29l.89-.59,2.35-1.18.59-.59.88-.29,1.18-.59,1.17-.59.59-.58v-2.65l.3-.59.29-.3h2.94v-.59l-.29-.29v-.59l.29-.29v-.3l.3-.58.59-.3v-.59l-1.18-.59-1.18-.29-.59-.59-.29-.29v-.3h2.94l.88-.29h.89l1.17.29,1.18.59h1.18l.29.3.88.29h.3l.88-.29h3.53l2.65-.59,1.47-.59h.88l.59.29,1.18.3H496l1.47-.59.88-.59.59-.3.89-.29,1.47.29h.59l1.47-.29H506l1.48.29h1.17l.88-.29h.3l.59-.88.59-.59.29-.59.59-.59v-.29l.88-2.06ZM410.92,330.33l-.59.59.3-.29Zm29.13-15.89v.3l-.29.59v-.59ZM411.66,324.6l-.15-.15v-.3Zm17.21-9h.29l.59.29ZM406.22,335v-.29l.29-.3Zm4.41,9.42H410l.59-.29h.29Zm10.3,2.35h-.3l.59-.29h.29Zm7.65,7.95v-.29l.29.58Zm.29,9.42v-.3l.29.59Zm.29-7.65v-.3l.15.44Zm15.3-59.45.3.59-.3-.3Zm.59,71.51h-.59l-.29.29h-.29l.58-.29.59-.29h.3Zm5.3-72.1-.3-.59.3.3ZM461.23,303l.3.29-.59-.29Z" transform="translate(-284.88 -68.59)"/>
                            <g id="div-rakhine">
                                <polygon title="" class="tooltipster cls-5" points="42.79 377.39 42.49 377.1 42.2 376.51 41.9 376.51 41.61 377.1 40.43 379.45 39.84 380.34 39.55 380.93 39.55 381.81 39.84 382.69 39.84 383.57 40.14 383.87 40.73 383.57 41.02 383.57 41.61 383.28 41.9 382.99 41.61 381.51 41.9 380.93 42.49 380.63 42.79 380.63 43.08 380.63 43.08 380.04 42.79 379.16 42.79 378.28 42.79 377.69 42.79 377.39"/>
                                <polygon title="" class="tooltipster cls-5" points="72.5 407.12 72.21 407.12 71.62 407.12 71.33 407.41 71.33 407.7 70.15 408.29 70.15 408.59 70.15 408.88 70.15 409.18 69.85 409.76 69.85 410.06 70.15 409.76 71.03 409.18 71.91 408.88 71.62 409.18 71.33 409.18 70.74 409.76 71.03 410.06 71.33 410.35 71.62 410.35 71.33 410.65 71.03 410.65 71.33 411.24 71.62 411.24 71.91 411.24 72.5 411.24 72.8 411.24 73.09 411.53 73.97 411.24 74.27 411.24 74.56 411.24 74.56 410.94 74.56 409.76 74.56 409.18 74.86 408.88 75.15 408.29 75.15 408 75.15 407.7 74.86 407.7 74.56 407.41 74.56 407.12 74.27 407.12 74.27 406.82 73.68 406.53 73.68 406.82 74.46 408.2 74.27 408 73.97 407.7 73.68 407.12 73.68 406.82 73.38 407.41 72.8 407.41 72.8 407.7 73.38 408.29 73.38 408.59 73.38 409.18 73.09 410.06 72.5 410.35 71.91 410.35 72.5 410.06 72.8 409.76 73.09 409.18 72.8 408.88 73.09 408.29 72.8 408 72.5 408.59 72.21 408 72.5 407.41 72.5 407.12"/>
                                <polygon title="" class="tooltipster cls-5" points="63.38 412.71 63.09 413 62.5 413.3 62.2 413.3 62.2 413.59 62.2 413.88 62.5 415.06 62.5 415.36 62.79 415.36 63.38 415.06 63.67 414.77 63.38 414.47 63.67 414.18 63.97 413.88 64.85 413.88 65.15 413.59 65.15 413 65.73 412.12 65.44 411.53 65.44 410.94 64.85 411.53 64.56 411.82 64.26 411.82 63.67 412.12 63.38 412.41 63.38 412.71"/>
                                <polygon title="" class="tooltipster cls-5" points="67.5 413.59 68.38 413.59 68.97 413.3 69.56 413.59 70.15 413.88 70.44 413.59 70.44 413.3 70.44 412.12 70.74 411.82 71.03 411.53 70.44 410.06 70.15 410.06 69.85 410.35 69.27 411.53 68.97 411.53 69.27 410.94 68.97 410.65 68.68 410.65 68.38 410.94 67.79 412.12 68.09 412.41 67.5 412.71 67.5 413.59"/>
                                <polygon title="" class="tooltipster cls-5" points="70.74 416.53 70.74 416.24 70.15 416.24 70.74 416.53"/>
                                <polygon title="" class="tooltipster cls-5" points="65.15 415.65 64.56 415.94 64.56 416.53 64.56 416.83 64.85 416.83 65.15 416.53 65.44 416.24 65.73 415.94 65.44 415.65 65.15 415.65"/>
                                <polygon title="" class="tooltipster cls-5" points="76.03 413 75.74 413.59 76.03 413.88 76.03 413"/>
                                <polygon title="" class="tooltipster cls-5" points="63.67 416.83 63.09 416.53 63.38 416.83 63.67 416.83"/>
                                <polygon title="" class="tooltipster cls-5" points="60.73 411.53 61.03 411.53 61.32 411.82 61.62 411.82 61.91 412.71 62.2 412.41 62.2 411.82 62.5 411.82 62.5 411.53 62.5 411.24 62.2 411.24 61.91 410.65 61.91 410.06 61.62 409.47 61.32 408.59 60.73 408 60.14 408.29 60.44 408 60.73 407.7 61.03 408 61.62 408 61.91 407.7 61.91 407.41 61.91 406.82 61.32 406.23 61.62 405.64 61.32 405.35 61.32 405.06 61.03 404.76 60.44 404.76 60.14 404.76 59.56 404.47 58.97 403.58 58.67 403.29 58.38 402.7 58.09 402.41 57.79 402.41 57.2 402.41 56.91 402.11 56.61 402.11 56.32 402.7 56.61 403 56.91 403.58 56.61 403.88 56.91 404.17 57.2 404.17 57.2 404.76 57.5 405.06 58.38 406.53 58.09 407.41 58.09 407.7 58.38 408.29 58.67 409.47 58.67 409.76 58.97 410.06 58.97 410.65 59.85 410.94 60.14 411.24 60.73 411.53"/>
                                <polygon title="" class="tooltipster cls-5" points="68.09 406.82 67.79 408.29 67.5 408.88 67.21 409.47 66.03 410.06 65.73 410.65 65.73 410.94 66.32 411.53 66.03 411.82 66.03 412.12 65.73 412.41 66.03 413 66.03 413.3 66.03 413.59 66.03 413.88 66.62 413.59 66.91 413.59 67.21 411.82 67.5 411.53 68.09 410.94 68.68 410.35 68.97 410.06 69.56 409.47 69.85 409.18 69.56 409.18 69.56 408.88 69.56 408.59 70.15 408 70.15 407.7 70.74 407.41 71.03 407.12 70.44 407.12 70.15 407.12 69.85 407.12 69.56 407.12 68.97 407.12 68.38 406.82 68.09 406.82"/>
                                <polygon title="" class="tooltipster cls-5" points="61.91 405.64 61.91 405.94 61.91 406.23 62.2 406.53 62.5 406.53 62.79 406.23 62.79 405.64 62.79 405.35 62.79 404.76 62.79 404.47 62.79 404.17 62.5 404.17 62.2 404.17 61.32 405.06 61.62 405.35 61.91 405.64"/>
                                <polygon title="" class="tooltipster cls-5" points="53.67 397.11 53.67 397.4 53.67 397.7 53.97 397.7 53.97 397.11 53.67 396.82 53.67 397.11"/>
                                <polygon title="" class="tooltipster cls-5" points="60.14 403.58 60.73 403.58 61.32 403.58 61.32 403.29 61.62 402.7 61.32 402.11 61.32 402.41 61.03 402.41 60.44 402.11 60.14 402.11 59.85 402.7 59.85 403 60.14 403.29 59.85 403.29 60.14 403.58"/>
                                <polygon title="" class="tooltipster cls-5" points="61.03 403.88 61.32 404.17 61.62 404.17 61.91 403.58 61.62 403.58 61.32 403.88 61.03 403.88"/>
                                <polygon title="" class="tooltipster cls-5" points="66.62 406.82 67.21 406.23 68.68 405.35 68.97 405.06 68.97 404.76 68.09 404.76 67.79 404.76 67.21 404.76 66.91 404.76 66.32 405.35 66.32 405.94 65.73 406.23 64.85 406.53 63.97 406.53 63.67 406.53 63.67 407.12 63.38 407.7 63.67 408.29 63.97 408.29 64.26 407.7 65.15 407.7 65.44 407.7 65.73 407.7 66.03 407.7 66.62 406.82"/>
                                <polygon title="" class="tooltipster cls-5" points="65.44 409.18 65.73 408.88 66.03 408 65.44 408 64.56 408 64.26 408.29 63.67 408.88 63.67 409.47 63.97 409.47 64.26 409.47 64.56 409.47 65.44 409.47 65.44 409.18"/>
                                <polygon title="" class="tooltipster cls-5" points="63.97 410.06 63.67 410.06 63.67 410.65 63.67 411.24 63.97 411.53 64.26 411.24 64.56 410.65 64.85 410.65 65.15 410.35 65.15 410.06 65.15 409.76 64.56 409.47 64.26 409.76 63.97 410.06"/>
                                <polygon title="" class="tooltipster cls-5" points="64.85 405.64 64.85 405.94 65.44 405.94 66.32 405.06 66.32 404.76 65.73 404.76 64.85 405.64"/>
                                <polygon title="" class="tooltipster cls-5" points="71.33 403.88 71.33 404.17 72.21 403.88 71.91 403.58 71.33 403.88"/>
                                <polygon title="" class="tooltipster cls-5" points="71.91 405.35 71.33 405.35 71.03 405.35 70.74 405.06 70.44 405.06 70.15 405.06 69.56 405.35 69.27 405.35 68.68 405.94 68.68 406.23 68.68 406.53 68.97 406.53 68.97 407.12 69.85 406.82 69.85 406.53 70.15 406.23 70.44 405.94 70.74 405.94 71.33 406.23 71.62 406.23 71.91 406.53 72.21 406.23 72.5 406.23 72.8 405.94 72.5 405.64 71.91 405.64 71.91 405.35"/>
                                <polygon title="" class="tooltipster cls-5" points="44.55 407.7 44.26 407.12 44.55 406.82 44.26 406.53 44.26 406.23 43.96 405.64 43.67 405.35 43.67 404.47 43.08 403.58 43.08 403.29 42.79 402.7 43.08 401.52 43.37 401.23 43.96 400.94 44.55 400.35 44.55 400.05 44.26 399.46 43.67 398.29 43.37 398.29 43.37 397.99 42.2 396.82 41.61 396.82 41.61 396.52 42.2 396.52 42.2 396.23 41.9 395.93 41.9 395.64 41.61 395.05 41.31 394.76 40.73 394.46 39.55 394.46 38.96 394.46 38.67 394.76 38.08 394.76 37.78 395.05 37.49 394.46 37.2 394.46 36.9 394.46 36.9 394.76 36.9 395.05 37.2 395.64 37.2 396.23 37.2 396.82 37.2 397.11 37.49 397.4 37.78 397.7 38.37 397.99 38.37 398.29 38.96 398.58 38.96 398.88 39.55 399.46 40.14 400.05 40.14 400.35 40.43 400.94 40.43 402.11 40.73 402.41 41.31 403.29 41.61 403.88 42.2 404.47 42.49 405.06 43.37 406.53 43.96 407.12 44.26 408 44.55 408 44.84 408.59 45.14 408.88 46.02 410.35 46.32 410.06 45.14 408 44.55 407.7"/>
                                <polygon title="" class="tooltipster cls-5" points="49.26 408 48.96 408 48.67 407.41 48.67 407.12 48.08 406.23 47.49 405.06 47.49 404.76 47.2 404.17 47.2 403.88 46.61 403 46.61 402.7 46.32 402.11 46.32 401.82 46.02 401.52 46.02 401.23 46.02 400.94 45.73 400.64 45.73 400.35 45.73 399.76 45.43 398.88 45.14 398.58 44.26 397.7 43.96 397.7 43.96 397.99 44.55 398.88 44.84 399.76 44.84 400.35 44.84 400.64 44.84 400.94 45.43 401.23 45.43 401.52 45.43 401.82 45.43 402.41 45.73 402.7 46.02 403 46.32 403.88 46.61 404.47 46.61 404.76 47.2 405.35 47.49 406.23 47.49 406.53 48.08 407.12 48.08 408 48.67 408.29 48.67 408.88 48.96 408.88 49.85 408.88 49.85 408.59 49.55 408.29 49.26 408"/>
                                <polygon title="" class="tooltipster cls-5" points="35.73 391.52 36.02 391.81 36.31 392.4 36.61 392.11 36.9 391.81 37.2 391.23 36.9 390.34 35.73 390.93 35.73 391.52"/>
                                <polygon title="" class="tooltipster cls-5" points="36.9 389.46 36.61 390.05 36.31 390.05 36.31 390.34 36.9 390.05 36.9 389.46"/>
                                <polygon title="" class="tooltipster cls-5" points="38.96 403.88 38.67 403.29 38.37 403 37.78 401.23 37.2 400.64 37.2 400.35 36.9 399.76 37.2 399.46 36.9 399.17 36.61 398.88 36.31 398.29 36.31 397.99 36.31 397.4 36.02 397.11 35.73 396.82 35.14 396.82 34.84 396.82 34.55 396.23 34.25 396.52 34.25 397.7 34.55 397.99 34.84 398.29 34.84 398.58 34.84 398.88 35.14 399.17 35.43 400.35 36.02 400.94 36.31 401.82 37.49 403.29 37.78 403.88 38.37 404.76 38.67 405.06 38.67 405.35 38.67 405.64 38.67 405.94 39.26 407.7 39.26 408.29 39.55 408.59 39.55 408.29 39.55 407.7 39.55 407.12 39.84 406.23 38.96 404.47 38.96 403.88"/><polygon title="" class="tooltipster cls-5" points="43.96 397.4 43.67 397.11 43.67 397.7 43.96 397.4"/>
                                <polygon title="" class="tooltipster cls-5" points="27.19 378.28 26.9 378.28 26.6 378.28 26.9 378.87 26.9 379.45 27.19 379.75 27.78 379.45 28.07 379.45 27.78 379.16 27.78 378.87 28.07 378.28 28.37 378.28 28.66 377.98 28.96 377.69 28.96 377.39 28.66 377.1 28.66 376.81 28.07 377.39 27.49 377.39 27.49 377.69 27.19 378.28"/>
                                <polygon title="" class="tooltipster cls-5" points="25.72 389.75 25.72 389.17 25.43 389.46 25.72 389.75"/><polygon title="" class="tooltipster cls-5" points="27.19 381.22 27.19 382.4 27.19 383.28 26.9 383.87 26.9 384.16 26.9 384.46 26.9 384.75 26.9 385.34 27.49 386.22 27.49 386.81 27.49 387.11 27.78 387.11 28.07 386.81 28.37 386.52 28.37 387.11 28.37 387.4 28.96 386.81 29.84 386.81 30.14 386.81 30.72 386.81 30.72 386.52 31.31 386.22 31.9 385.63 31.9 385.34 31.61 385.05 31.61 384.46 30.72 383.28 30.43 382.99 30.14 382.4 30.14 381.81 29.84 381.51 30.14 381.51 29.84 380.93 29.55 380.93 29.25 381.22 29.25 380.93 29.55 380.63 29.55 380.34 29.25 380.34 28.96 380.04 28.66 379.75 28.07 379.75 27.78 380.04 26.9 380.04 27.19 380.63 27.19 380.93 27.19 381.22"/><polygon title="" class="tooltipster cls-5" points="26.31 383.87 26.31 383.28 26.02 383.57 26.31 383.87"/>
                                <polygon title="" class="tooltipster cls-5" points="4.54 355.62 4.54 355.91 4.54 356.21 5.13 356.79 5.71 355.32 5.42 355.03 5.42 354.73 5.13 354.44 4.54 355.62"/><polygon title="" class="tooltipster cls-5" points="1.01 348.26 1.3 348.55 1.6 348.26 1.3 348.26 1.01 348.26"/><polygon title="" class="tooltipster cls-5" points="68.68 417.12 68.68 417.42 68.68 417.71 68.97 417.71 68.68 417.12"/><polygon title="" class="tooltipster cls-5" points="69.27 420.06 68.97 420.06 69.27 420.65 69.56 420.36 69.27 420.06"/>
                                <polygon title="" class="tooltipster cls-5" points="71.03 418.89 71.03 419.18 71.62 419.18 71.03 418.89"/><polygon title="" class="tooltipster cls-5" points="67.79 421.54 68.09 421.83 68.38 421.54 68.68 421.24 68.97 421.54 68.97 420.95 69.27 420.65 68.68 420.65 68.38 420.65 67.79 420.65 68.09 420.95 68.09 421.24 67.79 421.54"/><polygon title="" class="tooltipster cls-5" points="78.68 433.9 78.39 433.01 78.09 433.31 77.8 433.31 77.8 434.19 77.8 434.49 78.09 434.49 78.68 433.9"/>
                                <polygon title="" class="tooltipster cls-5" points="68.68 427.13 68.68 427.42 68.97 427.42 69.27 427.42 69.27 427.13 68.97 427.13 68.68 427.13"/><polygon title="" class="tooltipster cls-5" points="69.85 428.89 70.15 428.89 70.44 428.6 70.44 428.31 69.27 428.01 68.97 428.01 69.27 428.31 69.56 428.6 69.56 428.89 69.85 428.89"/><polygon title="" class="tooltipster cls-5" points="68.09 429.78 68.09 430.37 68.68 430.95 68.68 431.25 68.97 431.25 69.27 431.25 69.56 430.95 69.56 430.37 69.85 430.37 70.15 430.07 70.15 429.78 69.56 429.48 69.27 429.48 68.97 429.78 68.68 429.48 68.09 429.78"/><polygon title="" class="tooltipster cls-5" points="67.5 426.83 67.5 427.13 67.79 428.31 68.09 427.72 68.09 427.13 67.79 426.83 67.5 426.83"/><polygon title="" class="tooltipster cls-5" points="76.92 435.37 77.21 434.78 76.92 434.78 76.62 434.78 76.33 434.78 76.62 435.37 76.92 435.37"/><polygon title="" class="tooltipster cls-5" points="73.68 433.9 73.38 433.6 72.8 433.9 73.38 434.19 73.68 433.9"/>
                                <polygon title="" class="tooltipster cls-5" points="63.09 425.07 63.67 424.77 62.79 424.77 62.79 425.07 63.09 425.36 63.09 425.07"/><polygon title="" class="tooltipster cls-5" points="62.2 424.48 62.5 424.77 62.79 424.48 63.09 424.19 62.79 423.89 62.5 423.89 62.5 424.19 62.2 424.48"/><polygon title="" class="tooltipster cls-5" points="62.5 422.13 62.79 422.42 63.09 422.13 62.5 422.13"/><polygon title="" class="tooltipster cls-5" points="63.97 424.77 64.56 424.77 64.85 424.77 65.15 424.77 64.85 424.48 64.26 424.48 63.97 424.48 63.67 423.89 63.38 423.6 62.2 422.71 62.5 423.3 63.09 423.89 63.38 424.19 63.67 424.48 63.97 424.77"/><polygon title="" class="tooltipster cls-5" points="77.8 424.19 78.09 423.6 77.8 423.3 77.5 423.3 77.21 423.3 76.03 422.42 75.44 422.13 74.56 422.13 74.27 422.13 73.97 422.42 74.27 422.42 75.74 423.6 76.03 423.89 76.33 424.19 76.92 424.48 77.21 424.48 77.8 424.19"/><polygon title="" class="tooltipster cls-5" points="67.5 424.19 66.91 423.89 66.32 424.19 66.03 424.77 66.32 425.07 66.32 425.36 66.62 425.36 67.21 425.07 67.5 425.07 67.5 425.66 67.79 425.95 68.09 425.95 68.38 425.95 68.09 425.36 67.5 424.19"/><polygon title="" class="tooltipster cls-5" points="66.91 417.71 66.62 417.71 66.32 418 66.03 418.3 66.32 418.59 66.62 418.3 66.91 418 67.21 418 67.79 418.3 67.5 417.71 66.91 417.71"/><polygon title="" class="tooltipster cls-5" points="65.44 420.95 66.32 421.24 66.03 420.95 65.44 420.95"/>
                                <polygon title="" class="tooltipster cls-5" points="65.44 425.07 65.73 425.07 66.03 425.36 66.03 425.07 65.73 424.77 65.44 425.07"/><polygon title="" class="tooltipster cls-5" points="62.2 423.6 61.91 423.89 62.5 423.89 62.5 423.6 62.2 423.6"/><polygon title="" class="tooltipster cls-5" points="66.62 426.83 66.91 426.54 66.91 426.25 66.91 425.95 66.62 425.95 66.32 426.25 66.03 426.25 66.62 426.83"/><rect title="" class="tooltipster cls-5" x="76.03" y="460.09" width="0.29" height="0.29"/>
                                <polygon title="" class="tooltipster cls-5" points="63.09 451.85 62.79 451.85 63.09 452.14 63.09 451.85"/><polygon title="" class="tooltipster cls-5" points="75.44 463.91 75.15 462.74 74.86 463.03 75.15 463.32 75.15 463.91 74.86 464.21 74.56 464.21 74.27 464.8 74.86 465.68 75.15 465.68 75.74 465.38 75.44 464.8 75.74 464.5 75.44 463.91"/><polygon title="" class="tooltipster cls-5" points="72.8 457.73 72.8 457.14 72.8 456.56 72.8 455.67 72.8 455.38 73.09 455.38 72.8 455.08 72.8 454.79 72.8 454.2 72.8 453.91 72.8 453.61 72.8 453.02 72.5 452.73 72.21 452.73 71.62 453.02 71.33 453.32 71.03 453.32 70.44 453.32 69.56 453.32 69.27 453.02 68.68 453.02 68.09 452.73 67.21 451.85 67.21 451.26 66.91 450.96 66.62 451.26 66.03 452.14 65.44 452.44 65.15 452.44 64.26 452.44 63.67 453.02 63.38 453.02 63.09 453.02 61.91 453.02 60.73 453.02 60.73 453.32 61.62 455.08 62.2 455.97 62.5 456.26 62.5 456.56 62.5 456.85 63.38 457.73 63.67 458.03 63.97 458.32 64.26 458.32 64.85 458.91 66.03 459.79 66.32 460.09 67.5 461.26 67.79 461.85 68.38 461.85 68.68 461.85 69.27 462.44 70.15 462.44 70.44 462.74 71.33 462.44 71.62 462.44 71.91 462.15 72.21 461.56 73.09 460.09 73.38 458.91 73.09 458.32 72.8 457.73"/><polygon title="" class="tooltipster cls-5" points="84.27 456.85 83.98 456.56 83.68 456.26 83.98 456.26 83.68 455.38 83.39 454.79 83.09 455.08 82.5 455.08 81.92 455.67 82.21 456.26 82.21 456.56 82.21 456.85 82.8 457.14 83.09 457.44 83.39 457.44 84.56 457.14 84.27 456.85"/>
                                <polygon title="" class="tooltipster cls-5" points="87.51 430.66 86.62 430.95 86.92 431.25 87.51 430.66"/><polygon title="" class="tooltipster cls-5" points="84.56 458.91 84.27 458.91 83.98 459.2 84.56 459.79 85.15 459.79 84.86 459.2 84.56 458.91"/><polygon title="" class="tooltipster cls-5" points="96.33 468.62 96.04 468.62 95.74 468.92 96.33 469.21 96.63 468.92 96.33 468.62"/><polygon title="" class="tooltipster cls-5" points="102.51 477.45 102.22 477.74 102.51 477.74 102.81 477.74 102.51 477.45"/>
                                <polygon title="" class="tooltipster cls-5" points="86.33 445.96 86.62 445.96 86.92 445.96 87.51 445.37 86.92 445.37 86.33 445.67 86.33 445.96"/><polygon title="" class="tooltipster cls-5" points="85.74 442.14 85.45 441.84 84.86 442.14 85.15 442.72 85.45 442.43 85.74 442.43 85.74 442.14"/><polygon title="" class="tooltipster cls-5" points="86.62 444.49 86.92 444.2 86.62 444.2 85.74 445.08 86.03 445.08 86.62 445.08 86.62 444.49"/>
                        </svg>



                    </div>
                    <div id="down-mobile" style="position:absolute;bottom:0px;"></div>
                </div>

                <div style="display: none;" class="total-info-desktop main-left-info mt-7 col-12 col-md-6 col-lg-6 order-md-1 aos-init aos-animate" data-aos="fade-up">
                    <!-- Heading -->
                    <!-- <h1 class="display-3 text-center text-md-left">
                  Total Confirmed <span class="text-danger">2222222</span>. <br>
                  </h1><h3>Stay @ Home</h3> -->


                    <!-- Text -->
                    <h6 class="lead text-center text-sm-left text-muted mb-6 mb-lg-8">
                        (၂၃-၃-၂၀၂၀)ရက်နေ့မှ နောက်ဆုံး update လုပ်ထားသော (၈-၄-၂၀၂၀)ရက်နေ့၊ ည (၈:၀၀)အချိန်အထိ အချက်အလက်များ စုဆောင်းတင်ပြထားခြင်းဖြစ်ပါသည်.                 </h6>

                    <div class="container" style="padding:10px 0px 10px 0px">
                        <div class="flex-box">

                            <!--                  Lab_Confirmed-->
                            <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                                <div class="container-fluid" style="padding-left: 0px">
                                    <div class="card-danger">
                                        <h6 class="c19-tt1">စစ်ဆေး (တွေ့ရှိ)</h6>
                                        <h2 class="c19-tt3" style="color:#df4759;">38</h2>
                                    </div>
                                </div>
                            </div>

                            <!--                  PUI + Suspected-->
                            <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                                <div class="container-fluid" style="padding-left: 0px">
                                    <div class="card-warning">
                                        <h6 class="c19-tt1">စောင့်ကြည့် / သံသယ</h6>
                                        <h2 class="c19-tt3" style="color:#b37700;">889</h2>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="container" style="padding:10px 0px 10px 0px">
                        <div class="flex-box">
                            <!--                  Death -->
                            <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                                <div class="container-fluid" style="padding-left: 0px">
                                    <div class="card-primary">
                                        <h6 class="c19-tt1">သေဆုံး လူနာ</h6>
                                        <h2 class="c19-tt3" style="color:#2b354f;">3</h2>
                                    </div>
                                </div>
                            </div>

                            <!--                  Lab Pending-->
                            <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                                <div class="container-fluid" style="padding-left: 0px">
                                    <div class="card-pending">
                                        <h6 class="c19-tt1">အဖြေ စောင့်ဆိုင်းဆဲ</h6>
                                        <h2 class="c19-tt3" style="color:#335eea;">80</h2>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="container" style="padding:10px 0px 10px 0px">
                        <div class="flex-box">

                            <!--                  Recovered-->
                            <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                                <div class="container-fluid" style="padding-left: 0px">
                                    <div class="card-recovered">
                                        <h6 class="c19-tt1">ပြန်လည်ကောင်းမွန်</h6>
                                        <h2 class="c19-tt3" style="color:#506690;">0</h2>
                                    </div>
                                </div>
                            </div>
                            <!--                  Lab Negative-->
                            <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                                <div class="container-fluid" style="padding-left: 0px">
                                    <div class="card-negative">
                                        <h6 class="c19-tt1">စစ်ဆေး (မတွေ့)</h6>
                                        <h2 class="c19-tt3" style="color:#27ae60 ;">777</h2>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>


                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>



    <!-- FEATURES
    ================================================== -->

    <section class="gapper" style="height:100px;width:100%;">

    </section>


    <!-- FOOTER
    ================================================== -->

</div>
<section class="total-info-mobile mt-8">
    <div class="container" bis_skin_checked="1">
        <div class="row justify-content-between" bis_skin_checked="1">
            <div class="main-left-info col-12 col-md-12 col-lg-12 order-md-1 aos-init aos-animate" data-aos="fade-up">
                <!-- Heading -->
                <!-- <h1 class="display-3 text-center text-md-left">
              Total Confirmed <span class="text-danger">2222222</span>. <br>
              </h1><h3>Stay @ Home</h3> -->


                <!-- Text -->
                <h6 class="lead text-center text-sm-left text-muted mb-6 mb-lg-8">
                    (၂၃-၃-၂၀၂၀)ရက်နေ့မှ နောက်ဆုံး update လုပ်ထားသော (၈-၄-၂၀၂၀)ရက်နေ့၊ ည (၈:၀၀)အချိန်အထိ အချက်အလက်များ စုဆောင်းတင်ပြထားခြင်းဖြစ်ပါသည်.                 </h6>

                <div class="container" style="padding:10px 0px 10px 0px">
                    <div class="flex-box">

                        <!--                  Lab_Confirmed-->
                        <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                            <div class="container-fluid" style="padding-left: 0px">
                                <div class="card-danger">
                                    <h6 class="c19-tt1">စစ်ဆေး (တွေ့ရှိ)</h6>
                                    <h2 class="c19-tt3" style="color:#df4759;">38</h2>
                                </div>
                            </div>
                        </div>

                        <!--                  PUI + Suspected-->
                        <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                            <div class="container-fluid" style="padding-left: 0px">
                                <div class="card-warning">
                                    <h6 class="c19-tt1">စောင့်ကြည့် / သံသယ</h6>
                                    <h2 class="c19-tt3" style="color:#b37700;">889</h2>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="container" style="padding:10px 0px 10px 0px">
                    <div class="flex-box">
                        <!--                  Death -->
                        <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                            <div class="container-fluid" style="padding-left: 0px">
                                <div class="card-primary">
                                    <h6 class="c19-tt1">သေဆုံး လူနာ</h6>
                                    <h2 class="c19-tt3" style="color:#2b354f;">3</h2>
                                </div>
                            </div>
                        </div>

                        <!--                  Lab Pending-->
                        <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                            <div class="container-fluid" style="padding-left: 0px">
                                <div class="card-pending">
                                    <h6 class="c19-tt1">အဖြေ စောင့်ဆိုင်းဆဲ</h6>
                                    <h2 class="c19-tt3" style="color:#335eea;">80</h2>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="container" style="padding:10px 0px 10px 0px">
                    <div class="flex-box">

                        <!--                  Recovered-->
                        <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                            <div class="container-fluid" style="padding-left: 0px">
                                <div class="card-recovered">
                                    <h6 class="c19-tt1">ပြန်လည်ကောင်းမွန်</h6>
                                    <h2 class="c19-tt3" style="color:#506690;">0</h2>
                                </div>
                            </div>
                        </div>
                        <!--                  Lab Negative-->
                        <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                            <div class="container-fluid" style="padding-left: 0px">
                                <div class="card-negative">
                                    <h6 class="c19-tt1">စစ်ဆေး (မတွေ့)</h6>
                                    <h2 class="c19-tt3" style="color:#27ae60 ;">777</h2>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>


            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>



<footer class="py-6 py-md-8 border-bottom ">
    <div class="container">
        <div class="row" >
            <div class="col-12 col-sm-12 col-md-6 mb-4 mb-md-0">
                <!-- Brand -->
                <a class="navbar-brand" href="index.html">
                    <img src="assets/img/brand.png" class="navbar-brand-img" alt="..." style="width: 100px">
                </a>
                <br>
                <div class="sp-only">
                    <div class="logo-conatiner">
                        <a  href="#">
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
                        <a  href="#">
                            <img src="assets/img/yccsu.jpg" class="su-logo" alt="..." style="width: 95px; height: 95px;">
                        </a>
                        <a  href="#">
                            <img src="assets/img/ethereal-tech.png" class="" alt="..." style="width: 100px; height: 100px;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- / .row -->
    </div> <!-- / .container -->
</footer>

<!-- JAVASCRIPT
    ================================================== -->
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
<script src="assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>

<!-- Map -->
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
<script>
    window.onload = function () {
        var eventsHandler;

        eventsHandler = {
            haltEventListeners: ['touchstart', 'touchend', 'touchmove', 'touchleave', 'touchcancel']
            , init: function (options) {
                var instance = options.instance
                    , initialScale = 1
                    , pannedX = 0
                    , pannedY = 0

                // Init Hammer
                // Listen only for pointer and touch events
                this.hammer = Hammer(options.svgElement, {
                    inputClass: Hammer.SUPPORT_POINTER_EVENTS ? Hammer.PointerEventInput : Hammer.TouchInput
                })

                // Enable pinch
                this.hammer.get('pinch').set({enable: true})

                // Handle double tap
                this.hammer.on('doubletap', function (ev) {
                    instance.zoomIn()
                })

                // Handle pan
                this.hammer.on('panstart panmove', function (ev) {
                    // On pan start reset panned variables
                    if (ev.type === 'panstart') {
                        pannedX = 0
                        pannedY = 0
                    }

                    // Pan only the difference
                    instance.panBy({x: ev.deltaX - pannedX, y: ev.deltaY - pannedY})
                    pannedX = ev.deltaX
                    pannedY = ev.deltaY
                })

                // Handle pinch
                this.hammer.on('pinchstart pinchmove', function (ev) {
                    // On pinch start remember initial zoom
                    if (ev.type === 'pinchstart') {
                        initialScale = instance.getZoom()
                        instance.zoomAtPoint(initialScale * ev.scale, {x: ev.center.x, y: ev.center.y})
                    }

                    instance.zoomAtPoint(initialScale * ev.scale, {x: ev.center.x, y: ev.center.y})
                })

                // Prevent moving the page on some devices when panning over SVG
                options.svgElement.addEventListener('touchmove', function (e) {
                    e.preventDefault();
                });
            }

            , destroy: function () {
                this.hammer.destroy()
            }
        }


        var cv_pos = [
            "#ea6861",
            "#e8524a",
            "#e53d34",
            "#e2271d",
            "#cb231a",
            "#b51f17",
            "#9e1b15",
            "#871712",
            "#71140f",
            "#5a100c"
        ];

        var cv_pos_sus = [
            "#ffd480",
            "#ffcc66",
            "#ffc34d",
            "#ffbb33",
            "#ffb31a",
            "#ffaa00",
            "#e69900",
            "#cc8800",
            "#b37700",
            "#996600",
        ]

        var cv_pos2 = [
            "fce9e8",
            "f9d4d2",
            "f6bebb",
            "f3a9a5",
            "f0938e",
            "ed7d78",
            "ea6861",
            "e8524a",
            "e74c44",
            "e53d34"
        ];

        var cv_pos_sus2 = [
            "ffd480",
            "ffcc66",
            "ffc34d",
            "ffbb33",
            "ffb31a",
            "ffaa00",
            "e69900",
            "cc8800",
            "b37700",
            "cc96600",
        ]

        var territories = [
            {
                'div': 'div-kachin',
                'data':
                    [
                        {
                            'ky': 'ky-puta-o',
                            'data':
                                {
                                    'ts': ['nogmung', 'kawnglanghpu', 'puta-o', 'machanbaw', 'sumprabum']
                                }
                        },
                        {
                            'ky': 'ky-myitkyina',
                            'data':
                                {
                                    'ts': ['tanai', 'injangyang', 'tsawlaw', 'chipwi', 'myitkyina', 'waingmaw']
                                }
                        },
                        {
                            'ky': 'ky-mohnyin',
                            'data':
                                {
                                    'ts': ['hpakan', 'mohnyin', 'mogaung']
                                }
                        },
                        {
                            'ky': 'ky-bhamo',
                            'data':
                                {
                                    'ts': ['momauk', 'shwegu', 'bhamo', 'mansi']
                                }
                        },
                    ],
            },
            {
                'div': 'div-sagaing',
                'data':
                    [
                        {
                            'ky': 'ky-hkamti',
                            'data':
                                {
                                    'ts': ['nanyun', 'lahe', 'hkamti', 'layshi', 'homalin']
                                }
                        },
                        {
                            'ky': 'ky-mawlaik',
                            'data':
                                {
                                    'ts': ['tamu', 'paungbyin', 'mawlaik']
                                }
                        },
                        {
                            'ky': 'ky-katha',
                            'data':
                                {
                                    'ts': ['banmauk', 'indaw', 'katha', 'tigyaing', 'pinlebu', 'wuntho', 'kawlin']
                                }
                        },
                        {
                            'ky': 'ky-kanbalu',
                            'data':
                                {
                                    'ts': ['kyunhla', 'kanbalu']
                                }
                        },
                        {
                            'ky': 'ky-kale',
                            'data':
                                {
                                    'ts': ['kalewa', 'mingin', 'kale']
                                }
                        },
                        {
                            'ky': 'ky-shwebo',
                            'data':
                                {
                                    'ts': ['taze', 'ye-u', 'khin-u', 'shwebo', 'tabayin', 'wetlet']
                                }
                        },
                        {
                            'ky': 'ky-yinmabin',
                            'data':
                                {
                                    'ts': ['kani', 'yinmabin', 'pale', 'salingyi']
                                }
                        },
                        {
                            'ky': 'ky-monywa',
                            'data':
                                {
                                    'ts': ['budalin', 'ayadaw', 'monywa', 'chaung-u']
                                }
                        },
                        {
                            'ky': 'ky-sagaing',
                            'data':
                                {
                                    'ts': ['sagaing', 'myinmu', 'myaung']
                                }
                        },
                    ],
            },
            {
                'div': 'div-tanintharyi',
                'data':
                    [
                        {
                            'ky': 'ky-dawei',
                            'data':
                                {
                                    'ts': ['dawei', 'launglon', 'thayetchaung', 'yebyu']
                                },
                        },
                        {
                            'ky': 'ky-kawthoung',
                            'data':
                                {
                                    'ts': ['bokpyin', 'kawthoung']
                                },
                        },
                        {
                            'ky': 'ky-myeik',
                            'data':
                                {
                                    'ts': ['kyunsu', 'myeik', 'palaw', 'tanintharyi']
                                },
                        },
                    ],
            },
            {
                'div': 'div-magway',
                'data':
                    [
                        {
                            'ky': 'ky-gangaw',
                            'data':
                                {
                                    'ts': ['gangaw', 'saw', 'tilin']
                                },
                        },
                        {
                            'ky': 'ky-magway',
                            'data':
                                {
                                    'ts': ['chauk', 'magway', 'myothit', 'natmauk', 'taungdwingyi', 'yenangyaung']
                                },
                        },
                        {
                            'ky': 'ky-minbu',
                            'data':
                                {
                                    'ts': ['minbu', 'ngape', 'pwintbyu', 'salin', 'sidoktaya']
                                },
                        },
                        {
                            'ky': 'ky-pakokku',
                            'data':
                                {
                                    'ts': ['myaing', 'pakokku', 'pauk', 'seikphyu', 'yesagyo']
                                },
                        },
                        {
                            'ky': 'ky-thayet',
                            'data':
                                {
                                    'ts': ['aunglan', 'kamma', 'mindon', 'minhla', 'sinbaungwe', 'thayet']
                                },
                        },
                    ],
            },
            {
                'div': 'div-mandalay',
                'data':
                    [
                        {
                            'ky': 'ky-kyaukse',
                            'data':
                                {
                                    'ts': ['kyaukse', 'myittha', 'sintgaing', 'tada-u']
                                },
                        },
                        {
                            'ky': 'ky-mandalay',
                            'data':
                                {
                                    'ts': ['amarapura', 'm-aungmyaythazan', 'm-chanayethazan', 'm-chanmyathazi', 'm-mahaaungmyay', 'patheingyi', 'm-pyigyitagon']
                                },
                        },
                        {
                            'ky': 'ky-meiktila',
                            'data':
                                {
                                    'ts': ['mahlaing', 'meiktila', 'thazi', 'wundwin']
                                },
                        },
                        {
                            'ky': 'ky-myingyan',
                            'data':
                                {
                                    'ts': ['myingyan', 'natogyi', 'ngazun', 'taungtha']
                                },
                        },
                        {
                            'ky': 'ky-nyaung-u',
                            'data':
                                {
                                    'ts': ['nyaung-u', 'kyaukpadaung']
                                },
                        },
                        {
                            'ky': 'ky-pyinoolwin',
                            'data':
                                {
                                    'ts': ['madaya', 'mogoke', 'pyinoolwin', 'singu', 'thabeikkyin']
                                },
                        },
                        {
                            'ky': 'ky-yamethin',
                            'data':
                                {
                                    'ts': ['pyawbwe', 'yamethin']
                                },
                        },
                        {
                            'ky': 'ky-naypyitaw',
                            'data':
                                {
                                    'ts': ['lewe', 'pyinmana', 'tatkon']
                                },
                        },
                    ],
            },
            {
                'div': 'div-ayeyarwaddy',
                'data':
                    [
                        {
                            'ky': 'ky-hinthada',
                            'data':
                                {
                                    'ts': ['hinthada', 'lemyethna', 'zalun', 'ingapu', 'kyangin', 'myanaung']
                                },
                        },
                        {
                            'ky': 'ky-labutta',
                            'data':
                                {
                                    'ts': ['labutta', 'mawlamyinegyun']
                                },
                        },
                        {
                            'ky': 'ky-maubin',
                            'data':
                                {
                                    'ts': ['danubyu', 'maubin', 'nyaungdon', 'pantanaw']
                                },
                        },
                        {
                            'ky': 'ky-myaungmya',
                            'data':
                                {
                                    'ts': ['einme', 'myaungmya', 'wakema']
                                },
                        },
                        {
                            'ky': 'ky-pathein',
                            'data':
                                {
                                    'ts': ['kangyidaunt', 'ngapudaw', 'pathein', 'thabaung', 'kyaunggon', 'kyonpyaw', 'yegyi']
                                },
                        },
                        {
                            'ky': 'ky-pyapon',
                            'data':
                                {
                                    'ts': ['bogale', 'dedaye', 'kyaiklat', 'pyapon']
                                },
                        },
                    ],
            },
            {
                'div': 'div-ebago',
                'data':
                    [
                        {
                            'ky': 'ky-bago',
                            'data':
                                {
                                    'ts': ['bago', 'daik-u', 'kawa', 'tanatpin', 'waw', 'kyauktaga', 'nyaunglebin', 'shwegyin']
                                },
                        },
                        {
                            'ky': 'ky-taungoo',
                            'data':
                                {
                                    'ts': ['kyaukkyi', 'oktwin', 'phyu', 'tantabin', 'taungoo', 'yedashe']
                                },
                        },

                    ],
            },
            {
                'div': 'div-wbago',
                'data':
                    [
                        {
                            'ky': 'ky-pyay',
                            'data':
                                {
                                    'ts': ['padaung', 'paukkaung', 'paungde', 'pyay', 'shwedaung', 'thegon']
                                },
                        },
                        {
                            'ky': 'ky-thayarwady',
                            'data':
                                {
                                    'ts': ['gyobingauk', 'letpadan', 'minhla-2', 'monyo', 'okpho', 'thayarwady', 'nattalin', 'zigon']
                                },
                        },
                    ],
            },
            {
                'div': 'div-chin',
                'data':
                    [
                        {
                            'ky': 'ky-falam',
                            'data':
                                {
                                    'ts': ['falam', 'tiddim', 'tonzang']
                                },
                        },
                        {
                            'ky': 'ky-hakha',
                            'data':
                                {
                                    'ts': ['hakha', 'htantlang']
                                },
                        },
                        {
                            'ky': 'ky-mindat',
                            'data':
                                {
                                    'ts': ['mindat', 'kanpetlet', 'madupi', 'paletwa']
                                },
                        },
                    ],
            },
            {
                'div': 'div-kayar',
                'data':
                    [
                        {
                            'ky': 'ky-bawlakhe',
                            'data':
                                {
                                    'ts': ['bawlakhe', 'hpasaung', 'mese']
                                },
                        },
                        {
                            'ky': 'ky-loikaw',
                            'data':
                                {
                                    'ts': ['demoso', 'hpruso', 'loikaw', 'shadaw']
                                },
                        },
                    ],
            },
            {
                'div': 'div-kayin',
                'data':
                    [
                        {
                            'ky': 'ky-hpa-an',
                            'data':
                                {
                                    'ts': ['hlaingbwe', 'hpa-an', 'thandaung']
                                },
                        },
                        {
                            'ky': 'ky-hpapun',
                            'data':
                                {
                                    'ts': ['hpapun']
                                },
                        },
                        {
                            'ky': 'ky-kawkareik',
                            'data':
                                {
                                    'ts': ['kawkareik', 'kyainseikgyi',]
                                },
                        },
                        {
                            'ky': 'ky-myawaddy',
                            'data':
                                {
                                    'ts': ['myawaddy']
                                },
                        },
                    ],
            },
            {
                'div': 'div-mon',
                'data':
                    [
                        {
                            'ky': 'ky-mawlamyine',
                            'data':
                                {
                                    'ts': ['mawlamyine', 'chaungzon', 'kyaikmaraw', 'mudon', 'thanbyuzayat', 'ye']
                                },
                        },
                        {
                            'ky': 'ky-thaton',
                            'data':
                                {
                                    'ts': ['bilin', 'thaton', 'kyaikto', 'paung']
                                },
                        },
                    ],
            },
            {
                'div': 'div-rakhine',
                'data':
                    [
                        {
                            'ky': 'ky-kyaukpyu',
                            'data':
                                {
                                    'ts': ['ann', 'kyaukpyu', 'munaung', 'ramree']
                                },
                        },
                        {
                            'ky': 'ky-maungdaw',
                            'data':
                                {
                                    'ts': ['maungdaw', 'buthidaung']
                                },
                        },
                        {
                            'ky': 'ky-sittwe',
                            'data':
                                {
                                    'ts': ['pauktaw', 'sittwe', 'ponnagyun', 'rathedaung']
                                },
                        },
                        {
                            'ky': 'ky-thandwe',
                            'data':
                                {
                                    'ts': ['gwa', 'thandwe', 'toungup']
                                },
                        },
                        {
                            'ky': 'ky-mrauk-u',
                            'data':
                                {
                                    'ts': ['maruk-u', 'kyauktaw', 'minbya', 'myebon']
                                },
                        },
                    ],
            },
            {
                'div': 'div-yangon',
                'data':
                    [
                        {
                            'ky': 'ky-eyangon',
                            'data':
                                {
                                    'ts': ['y-botahtaung', 'y-pazundaung', 'y-northokkalapa', 'y-dawbon', 'y-mingalartaungnyunt', 'y-yankin', 'y-thaketa', 'y-southokkalapa', 'y-tamwe', 'y-thingangkuun', 'y-dagonmyothitea', 'y-dagonmyothitno', 'y-dagonmyothitse', 'y-dagonmyothitso']
                                },
                        },
                        {
                            'ky': 'ky-nyangon',
                            'data':
                                {
                                    'ts': ['y-hlaingtharya', 'y-insein', 'y-mingaladon', 'y-shwepyithar', 'hlegu', 'htantabin', 'taikkyi', 'hmawbi']
                                },
                        },
                        {
                            'ky': 'ky-syangon',
                            'data':
                                {
                                    'ts': ['y-dala', 'y-seikgyikanaungto', 'y-cocokyun', 'kawhmu', 'kayan', 'kungyangon', 'kyauktan', 'thanlyin', 'thongwa', 'twantay']
                                },
                        },
                        {
                            'ky': 'ky-wyangon',
                            'data':
                                {
                                    'ts': ['y-ahlone', 'y-bahan', 'y-dagon', 'y-kyeemyindaing', 'y-lanmadaw', 'y-latha', 'y-pabedan', 'y-sanchaung', 'y-seikkan', 'y-hlaing', 'y-kamaryut', 'y-mayangone']
                                },
                        },
                    ],
            },
            {
                'div': 'div-eshan',
                'data':
                    [
                        {
                            'ky': 'ky-kengtung',
                            'data':
                                {
                                    'ts': ['kengtung', 'mongkhet', 'mongla', 'mongyang']
                                },
                        },
                        {
                            'ky': 'ky-monghpyak',
                            'data':
                                {
                                    'ts': ['monghpyak', 'mongyawng']
                                },
                        },
                        {
                            'ky': 'ky-monghsat',
                            'data':
                                {
                                    'ts': ['monghsat', 'mongping', 'mongton']
                                },
                        },
                        {
                            'ky': 'ky-tachileik',
                            'data':
                                {
                                    'ts': ['tachileik']
                                },
                        },
                    ],
            },
            {
                'div': 'div-nshan',
                'data':
                    [
                        {
                            'ky': 'ky-kunlong',
                            'data':
                                {
                                    'ts': ['kunlong', 'laukkaing', 'konkyan']
                                },
                        },
                        {
                            'ky': 'ky-kyaukme',
                            'data':
                                {
                                    'ts': ['hsipaw', 'kyaukme', 'namtu', 'nawnghkio', 'mabein', 'namhsan', 'mongmit']
                                },
                        },
                        {
                            'ky': 'ky-lashio',
                            'data':
                                {
                                    'ts': ['hseni', 'lashio', 'mongyai', 'tangyan']
                                },
                        },
                        {
                            'ky': 'ky-muse',
                            'data':
                                {
                                    'ts': ['kutkai', 'muse', 'nanhkan', 'manton']
                                },
                        },
                        {
                            'ky': 'ky-hopang',
                            'data':
                                {
                                    'ts': ['hopang', 'mongmao', 'pangwaun']
                                },
                        },
                        {
                            'ky': 'ky-matman',
                            'data':
                                {
                                    'ts': ['matman', 'pangsang', 'namphan']
                                },
                        },
                    ],
            },
            {
                'div': 'div-sshan',
                'data':
                    [
                        {
                            'ky': 'ky-langkho',
                            'data':
                                {
                                    'ts': ['mawkmai', 'mongnai', 'langkho', 'mongpan']
                                },
                        },
                        {
                            'ky': 'ky-loilen',
                            'data':
                                {
                                    'ts': ['loilen', 'kunhing', 'kyethi', 'laihka', 'monghsu', 'mongkaung', 'nansang']
                                },
                        },
                        {
                            'ky': 'ky-taunggyi',
                            'data':
                                {
                                    'ts': ['hopong', 'hsihseng', 'kalaw', 'lawksawk', 'nyaungshwe', 'pekon', 'pindaya', 'pinlaung', 'taunggyi', 'ywangan']
                                },
                        },
                    ],
            },
        ];


        var townships = [
            "thanatpin",
            "bogale",
            "danubyu",
            "dedaye",
            "einme",
            "hinthada",
            "ingapu",
            "kangyidaunt",
            "kyaiklat",
            "kyangin",
            "kyaunggon",
            "kyonpyaw",
            "labutta",
            "lemyethna",
            "maubin",
            "mawlamyinegyun",
            "myanaung",
            "myaungmya",
            "ngapudaw",
            "nyaungdon",
            "pantanaw",
            "pathein",
            "pyapon",
            "thabaung",
            "wakema",
            "yegyi",
            "zalun",


            "bago",
            "daik-u",
            "kawa",
            "kyaukkyi",
            "kyauktaga",
            "nyaunglebin",
            "oktwin",
            "phyu",
            "shwegyin",
            "tantabin",
            "taungoo",
            "tanatpin",
            "waw",
            "yedashe",
            "gyobingauk",
            "letpadan",
            "minhla-2",
            "monyo",
            "nattalin",
            "okpho",
            "padaung",
            "paukkaung",
            "paungde",
            "pyay",
            "shwedaung",
            "thayarwady",
            "thegon",
            "zigon",


            "falam",
            "hakha",
            "htantlang",
            "kanpetlet",
            "madupi",
            "mindat",
            "paletwa",
            "tiddim",
            "tonzang",


            "bhamo",
            "chipwi",
            "hpakan",
            "injangyang",
            "kawnglanghpu",
            "machanbaw",
            "mansi",
            "mogaung",
            "mohnyin",
            "momauk",
            "myitkyina",
            "nogmung",
            "puta-o",
            "shwegu",
            "sumprabum",
            "tanai",
            "tsawlaw",
            "waingmaw",


            "bawlakhe",
            "demoso",
            "hpasawng",
            "hpruso",
            "loikaw",
            "mese",
            "shadaw",


            "hlaingbwe",
            "hpa-an",
            "hpapun",
            "kawkareik",
            "kyainseikgyi",
            "myawaddy",
            "thandaung",


            "aunglan",
            "chauk",
            "gangaw",
            "kamma",
            "magway",
            "minbu",
            "mindon",
            "minhla",
            "myaing",
            "myothit",
            "natmauk",
            "ngape",
            "pakokku",
            "pauk",
            "pwintbyu",
            "salin",
            "saw",
            "seikphyu",
            "sidoktaya",
            "sinbaungwe",
            "taungdwingyi",
            "thayet",
            "tilin",
            "yenangyaung",
            "yesagyo",


            "amarapura",
            "m-aungmyaythazan",
            "m-chanayethazan",
            "m-chanmyathazi",
            "kyaukpadaung",
            "kyaukse",
            "lewe",
            "madaya",
            "m-mahaaungmyay",
            "mahlaing",
            "meiktila",
            "mogoke",
            "myingyan",
            "myittha",
            "natogyi",
            "ngazun",
            "nyaung-u",
            "patheingyi",
            "pyawbwe",
            "m-pyigyitagon",
            "pyinmana",
            "pyinoolwin",
            "singu",
            "sintgaing",
            "tada-u",
            "tatkon",
            "taungtha",
            "thabeikkyin",
            "thazi",
            "wundwin",
            "yamethin",


            "bilin",
            "chaungzon",
            "kyaikmaraw",
            "kyaikto",
            "mawlamyine",
            "mudon",
            "paung",
            "thanbyuzayat",
            "thaton",
            "ye",


            "ann",
            "buthidaung",
            "gwa",
            "kyaukpyu",
            "kyauktaw",
            "maungdaw",
            "minbya",
            "mrauk-u",
            "munaung",
            "myebon",
            "pauktaw",
            "ponnagyun",
            "ramree",
            "rathedaung",
            "sittwe",
            "thandwe",
            "toungup",


            "ayadaw",
            "banmauk",
            "budalin",
            "chaung-u",
            "hkamti",
            "homalin",
            "indaw",
            "kale",
            "kalewa",
            "kanbalu",
            "kani",
            "katha",
            "kawlin",
            "khin-u",
            "kyunhla",
            "lahe",
            "layshi",
            "mawlaik",
            "mingin",
            "monywa",
            "myaung",
            "myinmu",
            "nanyun",
            "pale",
            "paungbyin",
            "pinlebu",
            "sagaing",
            "salingyi",
            "shwebo",
            "tabayin",
            "tamu",
            "taze",
            "tigyaing",
            "wetlet",
            "wuntho",
            "ye-u",
            "yinmabin",


            "kengtung",
            "matman",
            "monghpyak",
            "monghsat",
            "mongkhet",
            "mongla",
            "mongping",
            "mongton",
            "mongyang",
            "mongyawng",
            "tachileik",


            "hopang",
            "hseni",
            "hsipaw",
            "konkyan",
            "kunlong",
            "kutkai",
            "kyaukme",
            "lashio",
            "laukkaing",
            "mabein",
            "manton",
            "mongmao",
            "mongmit",
            "mongyai",
            "muse",
            "namhsan",
            "namphan",
            "namtu",
            "nanhkan",
            "nawnghkio",
            "pangsang",
            "pangwaun",
            "tangyan",


            "hopong",
            "hsihseng",
            "kalaw",
            "kunhing",
            "kyethi",
            "laihka",
            "langkho",
            "lawksawk",
            "loilen",
            "mawkmai",
            "monghsu",
            "mongkaung",
            "mongnai",
            "mongpan",
            "nansang",
            "nyaungshwe",
            "pekon",
            "pindaya",
            "pinlaung",
            "taunggyi",
            "ywangan",


            "bokpyin",
            "dawei",
            "kawthoung",
            "kyunsu",
            "launglon",
            "myeik",
            "palaw",
            "tanintharyi",
            "thayetchaung",
            "yebyu",


            "y-ahlone",
            "y-bahan",
            "y-botahtaung",
            "y-cocokyun",
            "y-dagon",
            "y-dagonmyothitea",
            "y-dagonmyothitno",
            "y-dagonmyothitse",
            "y-dagonmyothitso",
            "y-dala",
            "y-dawbon",
            "y-hlaing",
            "y-hlaingtharya",
            "hlegu",
            "hmawbi",
            "htantabin",
            "y-insein",
            "y-kamaryut",
            "kawhmu",
            "kayan",
            "kungyangon",
            "kyauktan",
            "y-kyeemyindaing",
            "y-lanmadaw",
            "y-latha",
            "y-mayangone",
            "y-mingaladon",
            "y-mingalartaungnyunt",
            "y-northokkalapa",
            "y-pabedan",
            "y-pazundaung",
            "y-sanchaung",
            "y-seikgyikanaungto",
            "y-seikkan",
            "y-shwepyithar",
            "y-southokkalapa",
            "taikkyi",
            "y-tamwe",
            "y-thaketa",
            "thanlyin",
            "y-thingangkuun",
            "thongwa",
            "twantay",
            "y-yankin",
        ]

        var khayines = [
            "ky-loikaw",
            "ky-bawlakhe",
            "ky-kawthoung",
            "ky-myeik",
            "ky-dawei",
            "ky-kawkareik",
            "ky-myawaddy",
            "ky-hpa-an",
            "ky-hpapun",
            "ky-mawlamyine",
            "ky-thaton",
            "ky-syangon",
            "ky-wyangon",
            "ky-eyangon",
            "ky-nyangon",
            "ky-pathein",
            "ky-myaungmya",
            "ky-hinthada",
            "ky-maubin",
            "ky-labutta",
            "ky-pyapon",
            "ky-bago",
            "ky-taungoo",
            "ky-thayarwady",
            "ky-pyay",
            "ky-nyaung-u",
            "ky-yamethin",
            "ky-naypyitaw",
            "ky-meiktila",
            "ky-myingyan",
            "ky-kyaukse",
            "ky-mandalay",
            "ky-pyinoolwin",
            "ky-thayet",
            "ky-magway",
            "ky-minbu",
            "ky-pakokku",
            "ky-gangaw",
            "ky-thandwe",
            "ky-kyaukpyu",
            "ky-mrauk-u",
            "ky-sittwe",
            "ky-maungdaw",
            "ky-mindat",
            "ky-hakha",
            "ky-falam",
            "ky-tachileik",
            "ky-monghpyak",
            "ky-kengtung",
            "ky-monghsat",
            "ky-langkho",
            "ky-loilen",
            "ky-taunggyi",
            "ky-matman",
            "ky-hopang",
            "ky-lashio",
            "ky-kunlong",
            "ky-muse",
            "ky-kyaukme",
            "ky-kale",
            "ky-yinmabin",
            "ky-shwebo",
            "ky-monywa",
            "ky-sagaing",
            "ky-kanbalu",
            "ky-mawlaik",
            "ky-katha",
            "ky-hkamti",
            "ky-puta-o",
            "ky-myitkyina",
            "ky-mohnyin",
            "ky-bhamo"
        ]

        var khayines_pos = [
            ["ky-loikaw", "400", "450"],
            ["ky-bawlakhe", "400", "450"],
            ["ky-kawthoung", "400", "450"]
        ]

        var divisions = [
            "div-mandalay",
            "div-magway",
            "div-eshan",
            "div-sshan",
            "div-nshan",
            "div-kayar",
            "div-kayin",
            "div-tanintharyi",
            "div-mon",
            "div-ebago",
            "div-wbago",
            "div-yangon",
            "div-ayeyarwaddy",
            "div-rakhine",
            "div-sagaing",
            "div-kachin",
            "div-chin"
        ]


        //var divisions_mm = //;
        //
        //var khayines_mm = //;
        //
        //var townships_mm = //;

        var divisions_mm = [
            [
                "div-ayeyarwaddy",
                "Ayeyarwaddy Region",
                "ဧရာဝတီ တိုင်းဒေသကြီး",
                "ဧရာဝတီ တိုင္းေဒသႀကီး"
            ],
            [
                "div-ebago",
                "East Bago Region",
                "ပဲခူးအရှေ့ပိုင်း တိုင်းဒေသကြီး",
                "ပဲခူးအေရွ႕ပိုင္း တိုင္းေဒသႀကီး"
            ],
            [
                "div-chin",
                "Chin State",
                "ချင်း ပြည်နယ်",
                "ခ်င္း ျပည္နယ္"
            ],
            [
                "div-kachin",
                "Kachin State",
                "ကချင် ပြည်နယ်",
                "ကခ်င္ ျပည္နယ္"
            ],
            [
                "div-kayar",
                "Kayah State",
                "ကယား ပြည်နယ်",
                "ကယား ျပည္နယ္"
            ],
            [
                "div-kayin",
                "Kayin State",
                "ကရင် ပြည်နယ်",
                "ကရင္ ျပည္နယ္"
            ],
            [
                "div-magway",
                "Magway Region",
                "မကွေး တိုင်းဒေသကြီး",
                "မေကြး တိုင္းေဒသႀကီး"
            ],
            [
                "div-mandalay",
                "Mandalay Region",
                "မန္တလေး တိုင်းဒေသကြီး",
                "မႏၲေလး တိုင္းေဒသႀကီး"
            ],
            [
                "div-mon",
                "Mon State",
                "မွန်ပြည်နယ်",
                "မြန္ ျပည္နယ္"
            ],
            [
                "div-rakhine",
                "Rakhine State",
                "ရခိုင် ပြည်နယ်",
                "ရခိုင္ ျပည္နယ္"
            ],
            [
                "div-eshan",
                "East Shan State",
                "အရှေ့ပိုင်း ရှမ်းပြည်နယ်",
                "အေရွ႕ပိုင္း ရွမ္းျပည္နယ္"
            ],
            [
                "div-sagaing",
                "Sagaing Region",
                "စစ်ကိုင်း တိုင်းဒေသကြီး",
                "အေရွ႕ပိုင္း ရွမ္းျပည္နယ္"
            ],
            [
                "div-tanintharyi",
                "Tanintharyi Region",
                "တနင်္သာရီ တိုင်းဒေသကြီး",
                "တနသၤာရီ တိုင္းေဒသႀကီး"
            ],
            [
                "div-yangon",
                "Yangon Region",
                "ရန်ကုန် တိုင်းဒေသကြီး",
                "ရန္ကုန္ တိုင္းေဒသႀကီး"
            ],
            [
                "div-sshan",
                "South Shan State",
                "တောင်ပိုင်း ရှမ်းပြည်နယ်",
                "ေတာင္ပိုင္း ရွမ္းျပည္နယ္"
            ],
            [
                "div-nshan",
                "North Shan State",
                "မြောက်ပိုင်း ရှမ်းပြည်နယ်",
                "ေျမာက္ပိုင္း ရွမ္းျပည္နယ္"
            ],
            [
                "div-wbago",
                "West Bago State",
                "ပဲခူးအနောက်ပိုင်း တိုင်းဒေသကြီး",
                "ပဲခူးအေနာက္ပိုင္း တိုင္းေဒသႀကီး"
            ]
        ];

        var khayines_mm = [
            [
                "ky-gangaw",
                "Gangaw",
                "ဂန့်ဂေါ",
                "ဂန႔္ေဂါ"
            ],
            [
                "ky-magway",
                "Magway",
                "မကွေး",
                "မေကြး"
            ],
            [
                "ky-minbu",
                "Minbu",
                "မင်းဘူး",
                "မင္းဘူး"
            ],
            [
                "ky-pakokku",
                "Pakokku",
                "ပခုက္ကူ",
                "ပခုကၠဴ"
            ],
            [
                "ky-thayet",
                "Thayet",
                "သရက်",
                "သရက္"
            ],
            [
                "ky-kyaukse",
                "Kyaukse",
                "ကျောက်ဆည်",
                "ေက်ာက္ဆည္"
            ],
            [
                "ky-mandalay",
                "Mandalay",
                "မန္တလေး",
                "မႏၲေလး"
            ],
            [
                "ky-meiktila",
                "Meiktila",
                "မိတ္ထီလာ",
                "မိတၳီလာ"
            ],
            [
                "ky-myingyan",
                "Myingyan",
                "မြင်းခြံ",
                "ျမင္းၿခံ"
            ],
            [
                "ky-nyaung-u",
                "Nyaung-U",
                "ညောင်ဦး",
                "ေညာင္ဦး"
            ],
            [
                "ky-pyinoolwin",
                "Pyinoolwin",
                "ပြင်ဦးလွင်",
                "ျပင္ဦးလြင္"
            ],
            [
                "ky-yamethin",
                "Yamethin",
                "ရမည်းသင်း",
                "ရမည္းသင္း"
            ],
            [
                "ky-hinthada",
                "Hinthada",
                "ဟင်္သာတ",
                "ဟသၤာတ"
            ],
            [
                "ky-labutta",
                "Labutta",
                "လပွတ္တာ",
                "လပြတၱာ"
            ],
            [
                "ky-maubin",
                "Maubin",
                "မအူပင်",
                "မအူပင္"
            ],
            [
                "ky-myaungmya",
                "Myaungmya",
                "မြောင်းမြ",
                "ေျမာင္းျမ"
            ],
            [
                "ky-pathein",
                "Pathein",
                "ပုသိမ်",
                "ပုသိမ္"
            ],
            [
                "ky-pyapon",
                "Pyapon",
                "ဖျာပုံ",
                "ဖ်ာပုံ"
            ],
            [
                "ky-bago",
                "Bago",
                "ပဲခူး",
                "ပဲခူး"
            ],
            [
                "ky-taungoo",
                "Taungoo",
                "တောင်ငူ",
                "ေတာင္ငူ"
            ],
            [
                "ky-pyay",
                "Pyay",
                "ပြည်",
                "ျပည္"
            ],
            [
                "ky-thayarwady",
                "Thayarwaddy",
                "သာယာဝတီ",
                "သာယာဝတီ"
            ],
            [
                "ky-hakha",
                "Hakha",
                "ဟားခါး",
                "ဟားခါး"
            ],
            [
                "ky-mindat",
                "Mindat",
                "မင်းတပ်",
                "မင္းတပ္"
            ],
            [
                "ky-bhamo",
                "Bhamo",
                "ဗန်းမော်",
                "ဗန္းေမာ္"
            ],
            [
                "ky-mohnyin",
                "Mohnyin",
                "မိုးညှင်း",
                "မိုးညႇင္း"
            ],
            [
                "ky-myitkyina",
                "Myitkyina",
                "မြစ်ကြီးနား",
                "ျမစ္ျကီးနား"
            ],
            [
                "ky-puta-o",
                "Puta-O",
                "ပူတာအို",
                "ပူတာအို"
            ],
            [
                "ky-bawlakhe",
                "Bawlakhe",
                "ဘော်လခဲ",
                "ေဘာ္လခဲ"
            ],
            [
                "ky-loikaw",
                "Loikaw",
                "လွိုင်ကော်",
                "လြိုင္ေကာ္"
            ],
            [
                "ky-hpa-an",
                "Hpa-An",
                "ဘားအံ",
                "ဘားအံ"
            ],
            [
                "ky-hpapun",
                "Hpapun",
                "ဖာပွန်",
                "ဖာပြန္"
            ],
            [
                "ky-kawkareik",
                "Kawkareik",
                "ကော့ကရိတ်",
                "ေကာ့ကရိတ္"
            ],
            [
                "ky-myawaddy",
                "Myawaddy",
                "မြဝတီ",
                "ျမ၀တီ"
            ],
            [
                "ky-mawlamyine",
                "Mawlamyine",
                "မော်လမြိုင်",
                "ေမာ္လျမိုင္"
            ],
            [
                "ky-thaton",
                "Thaton",
                "သထုံ",
                "သထံု"
            ],
            [
                "ky-kyaukpyu",
                "Kyaukpyu",
                "ကျောက်ဖြူ",
                "ေက်ာက္ျဖူ"
            ],
            [
                "ky-sittwe",
                "Sittwe",
                "စစ်တွေ",
                "စစ္ေတြ"
            ],
            [
                "ky-thandwe",
                "Thandwe",
                "သံတွဲ",
                "သံတြဲ"
            ],
            [
                "ky-mrauk-u",
                "Mrauk-U",
                "မြောက်ဦး",
                "ေျမာက္ဦး"
            ],
            [
                "ky-kengtung",
                "Kengtung",
                "ကျိုင်းတုံ",
                "က်ိုင္းတံု"
            ],
            [
                "ky-tachileik",
                "Tachileik",
                "တာချီလိတ်",
                "တာခ်ီလိတ္"
            ],
            [
                "ky-kunlong",
                "Kunlong",
                "ကွမ်းလုံ",
                "ကြမ္းလုံ"
            ],
            [
                "ky-kyaukme",
                "Kyaukme",
                "ကျောက်မဲ",
                "ေက်ာက္မဲ"
            ],
            [
                "ky-lashio",
                "Lashio",
                "လားရှိုး",
                "လားရွိဳး"
            ],
            [
                "ky-langkho",
                "Langkho",
                "လင်းခေး",
                "လင္းေခး"
            ],
            [
                "ky-loilen",
                "Loilen",
                "လွိုင်လင်",
                "လြိုင္လင္"
            ],
            [
                "ky-taunggyi",
                "Taunggyi",
                "တောင်ကြီး",
                "ေတာင္ျကီး"
            ],
            [
                "ky-kanbalu",
                "Kanbalu",
                "ကန့်ဘလူ",
                "ကန့္ဘလူ"
            ],
            [
                "ky-kale",
                "Kale",
                "ကလေး",
                "ကေလး"
            ],
            [
                "ky-katha",
                "Katha",
                "ကသာ",
                "ကသာ"
            ],
            [
                "ky-mawlaik",
                "Mawlaik",
                "မော်လိုက်",
                "ေမာ္လိုက္"
            ],
            [
                "ky-monywa",
                "Monywa",
                "မုံရွာ",
                "မံုရြာ"
            ],
            [
                "ky-sagaing",
                "Sagaing",
                "စစ်ကိုင်း",
                "စစ္ကိုင္း"
            ],
            [
                "ky-shwebo",
                "Shwebo",
                "ရွှေဘို",
                "ေရြွဘို"
            ],
            [
                "ky-myeik",
                "Myeik",
                "မြိတ်",
                "ျမိတ္"
            ],
            [
                "ky-kawthoung",
                "Kawthoung",
                "ကော့သောင်း",
                "ေကာ့ေသာင္း"
            ],
            [
                "ky-dawei",
                "Dawei",
                "ထားဝယ်",
                "ထား၀ယ္"
            ],
            [
                "ky-syangon",
                "South Yangon",
                "ရန်ကုန်တောင်ပိုင်း",
                "ရန္ကုန္ေတာင္ပိုင္း"
            ],
            [
                "ky-wyangon",
                "West Yangon",
                "ရန်ကုန်အနောက်ပိုင်း",
                "ရန္ကုန္အေနာက္ပိုင္း"
            ],
            [
                "ky-eyangon",
                "East Yangon",
                "ရန်ကုန်အရှေ့ပိုင်း",
                "ရန္ကုန္အေရွ့ပိုင္း"
            ],
            [
                "ky-nyangon",
                "North Yangon",
                "ရန်ကုန်မြောက်ပိုင်း",
                "ရန္ကုန္ေျမာက္ပိုင္း"
            ],
            [
                "ky-naypyitaw",
                "Naypyidaw",
                "နေပြည်တော်",
                "ေနျပည္ေတာ္"
            ],
            [
                "ky-maungdaw",
                "Maungdaw",
                "မောင်းတော",
                "ေမာင္းေတာ"
            ],
            [
                "ky-falam",
                "Falam",
                "ဖလမ်း",
                "ဖလမ္း"
            ],
            [
                "ky-monghpyak",
                "Monghpyak",
                "မိုင်းဖြတ်",
                "မိုင္းျဖတ္"
            ],
            [
                "ky-monghsat",
                "Monghsat",
                "မိုင်းဆတ်",
                "မိုင္းဆတ္"
            ],
            [
                "ky-matman",
                "Matman",
                "မက်မန်း",
                "မက္မန္း"
            ],
            [
                "ky-hopang",
                "Hopang",
                "ဟိုပင်",
                "ဟိုပင္"
            ],
            [
                "ky-muse",
                "Muse",
                "မူဆယ်",
                "မူဆယ္"
            ],
            [
                "ky-yinmabin",
                "Yinmabin",
                "ယင်းမာပင်",
                "ယင္းမာပင္"
            ],
            [
                "ky-hkamti",
                "Hkamti",
                "ခန္တီး",
                "ခႏၲီး"
            ]
        ];

        var townships_mm = [
            [
                "yangon-gp",
                "Yangon",
                "ရန်ကုန်",
                "ဂန႔္ေဂါ"
            ],
            [
                "mandalay-gp",
                "Mandalay",
                "မန္တလေး",
                "မန္တလေး"
            ],
            [
                "gangaw",
                "Gangaw",
                "ဂန့်ဂေါ",
                "ဂန႔္ေဂါ"
            ],
            [
                "saw",
                "Saw",
                "ဆော",
                "ေဆာ"
            ],
            [
                "tilin",
                "Tilin",
                "ထီးလင်း",
                "ထီးလင္း"
            ],
            [
                "chauk",
                "Chauk",
                "ချောက်",
                "ေခ်ာက္"
            ],
            [
                "magway",
                "Magway",
                "မကွေး",
                "မေကြး"
            ],
            [
                "myothit",
                "Myothit",
                "မြို့သစ်",
                "ၿမိဳ႕သစ္"
            ],
            [
                "natmauk",
                "Natmauk",
                "နတ်မောက်",
                "နတ္ေမာက္"
            ],
            [
                "taungdwingyi",
                "Taungdwingyi",
                "တောင်တွင်းကြီး",
                "ေတာင္တြင္းႀကီး"
            ],
            [
                "yenangyaung",
                "Yenangyaung",
                "ရေနံချောင်း",
                "ေရနံေခ်ာင္း"
            ],
            [
                "minbu",
                "Minbu",
                "မင်းဘူး",
                "မင္းဘူး"
            ],
            [
                "ngape",
                "Ngape",
                "ငဖဲ",
                "ငဖဲ"
            ],
            [
                "pwintbyu",
                "Pwintbyu",
                "ပွင့်ဖြူ",
                "ပြင့္ျဖဴ"
            ],
            [
                "salingyi",
                "Salingyi",
                "ဆာလင်းကြီး",
                "ဆာလင္းႀကီး"
            ],
            [
                "sidoktaya",
                "Sidoktaya",
                "စေတ္တုတရာ",
                "ေစတၱဳတရာ"
            ],
            [
                "myaing",
                "Myaing",
                "မြိုင်",
                "ၿမိဳင္"
            ],
            [
                "pakokku",
                "pakokku",
                "ပခုက္ကူ",
                "ပခုကၠဴ"
            ],
            [
                "pauk",
                "pauk",
                "ပေါက်",
                "ေပါက္"
            ],
            [
                "seikphyu",
                "seikphyu",
                "ဆိပ်ဖြူ",
                "ဆိပ္ျဖဴ"
            ],
            [
                "yesagyo",
                "Yesagyo",
                "ရေစကြို",
                "ေရစႀကိဳ"
            ],
            [
                "aunglan",
                "Aunglan",
                "အောင်လံ",
                "ေအာင္လံ"
            ],
            [
                "kamma",
                "Kamma",
                "ကမ္မ",
                "ကမၼ"
            ],
            [
                "mindon",
                "Mindon",
                "မင်းတုန်း",
                "မင္းတုန္း"
            ],
            [
                "minhla",
                "Minhla",
                "မင်းလှ",
                "မင္းလွ"
            ],
            [
                "sinbaungwe",
                "Sinbaungwe",
                "ဆင်ပေါင်ဝဲ",
                "ဆင္ေပါင္ဝဲ"
            ],
            [
                "thayet",
                "Thayet",
                "သရက်",
                "သရက္"
            ],
            [
                "kyaukse",
                "Kyaukse",
                "ကျောက်ဆညိ",
                "ေက်ာက္ဆညိ"
            ],
            [
                "myittha",
                "Myittha",
                "မြစ်သား",
                "ျမစ္သား"
            ],
            [
                "sintgaing",
                "Sintgaing",
                "စဉ့်ကိုင်",
                "စဥ့္ကိုင္"
            ],
            [
                "tada-u",
                "Tada-u",
                "တံတားဦး",
                "တံတားဦး"
            ],
            [
                "amarapura",
                "Amarapura",
                "အမရပူရ",
                "အမရပူရ"
            ],
            [
                "patheingyi",
                "Patheingyi",
                "ပုသိမ်ကြီး",
                "ပုသိမ္ႀကီး"
            ],
            [
                "mahlaing",
                "Mahlaing",
                "မလှိုင်",
                "မလႈိင္"
            ],
            [
                "meiktila",
                "Meiktila",
                "မိတ္ထီလာ",
                "မိတၳီလာ"
            ],
            [
                "thazi",
                "Thazi",
                "သာစည်",
                "သာစည္"
            ],
            [
                "wundwin",
                "Wundwin",
                "ဝမ်းတွင်း",
                "ဝမ္းတြင္း"
            ],
            [
                "myingyan",
                "Myingyan",
                "မြင်းခြံ",
                "ျမင္းၿခံ"
            ],
            [
                "natogyi",
                "Natogyi",
                "နွားထိုးကြီး",
                "ႏြားထိုးႀကီး"
            ],
            [
                "nyaung-u",
                "Nyaung-U",
                "ညောင်ဦး",
                "ေညာင္ဦး"
            ],
            [
                "kyaukpadaung",
                "Kyaukpadaung",
                "ကျောက်ပန်းတောင်း",
                "ေက်ာက္ပန္းေတာင္း"
            ],
            [
                "madaya",
                "Madaya",
                "မတ္တရာ",
                "မတၱရာ"
            ],
            [
                "mogoke",
                "Mogoke",
                "မိုးကုတ်",
                "မိုးကုတ္"
            ],
            [
                "pyinoolwin",
                "Pyinoolwin",
                "ပြင်ဦးလွင်",
                "ျပင္ဦးလြင္"
            ],
            [
                "singu",
                "Singu",
                "စဉ့်ကူး",
                "စဥ့္ကူး"
            ],
            [
                "thabeikkyin",
                "Thabeikkyin",
                "သပိတ်ကျင်း",
                "သပိတ္က်င္း"
            ],
            [
                "pyawbwe",
                "Pyawbwe",
                "ပျော်ဘွယ်",
                "ေပ်ာ္ဘြယ္"
            ],
            [
                "yamethin",
                "Yamethin",
                "ရမည်းသင်း",
                "ရမည္းသင္း"
            ],
            [
                "hinthada",
                "Hinthada",
                "ဟင်္သာတ",
                "ဟသၤာတ"
            ],
            [
                "lemyethna",
                "Lemyethna",
                "လေးမျက်နှာ",
                "ေလးမ်က္ႏွာ"
            ],
            [
                "zalun",
                "Zalun",
                "ဇလွန်",
                "ဇလြန္"
            ],
            [
                "ingapu",
                "Ingapu",
                "အင်္ဂပူ",
                "အဂၤပူ"
            ],
            [
                "kyangin",
                "Kyangin",
                "ကြံခင်း",
                "ႀကံခင္း"
            ],
            [
                "myanaung",
                "Myanaung",
                "မြန်အောင်",
                "ျမန္ေအာင္"
            ],
            [
                "labutta",
                "Labutta",
                "လပွတ္တာ",
                "လပြတၱာ"
            ],
            [
                "mawlamyinegyun",
                "Mawlamyinegyun",
                "မော်လမြိုင်ကျွန်း",
                "ေမာ္လၿမိဳင္ကြၽန္း"
            ],
            [
                "nyaungdon",
                "Nyaungdon",
                "ညောင်တုန်း",
                "ေညာင္တုန္း"
            ],
            [
                "pantanaw",
                "Pantanaw",
                "ပန်းတနော်",
                "ပန္းတေနာ္"
            ],
            [
                "einme",
                "Einme",
                "အိမ်မဲ",
                "အိမ္မဲ"
            ],
            [
                "wakema",
                "Wakema",
                "ဝါးခယ်မ",
                "ဝါးခယ္မ"
            ],
            [
                "ngapudaw",
                "Ngapudaw",
                "ငပုတော",
                "ငပုေတာ"
            ],
            [
                "pathein",
                "Pathein",
                "ပုသိမ်",
                "ပုသိမ္"
            ],
            [
                "thabaung",
                "Thabaung",
                "သာပေါင်း",
                "သာေပါင္း"
            ],
            [
                "kyaunggon",
                "Kyaunggon",
                "ကျောင်းကုန်း",
                "ေက်ာင္းကုန္း"
            ],
            [
                "kyonpyaw",
                "Kyonpyaw",
                "ကျုံပျော်",
                "က်ဳံေပ်ာ္"
            ],
            [
                "bogale",
                "Bogale",
                "ဘိုကလေး",
                "ဘိုကေလး"
            ],
            [
                "dedaye",
                "Dedaye",
                "ဒေးဒရဲ",
                "ေဒးဒရဲ"
            ],
            [
                "kyaiklat",
                "Kyaiklat",
                "ကျိုက်လတ်",
                "က်ိဳက္လတ္"
            ],
            [
                "pyapon",
                "Pyapon",
                "ဖျာပုံ",
                "ဖ်ာပုံ"
            ],
            [
                "bago",
                "Bago",
                "ပဲခူး",
                "ပဲခူး"
            ],
            [
                "daik-u",
                "Daik-u",
                "ဒိုက်ဦး",
                "ဒိုက္ဦး"
            ],
            [
                "kawa",
                "Kawa",
                "ကဝ",
                "ကဝ"
            ],
            [
                "nyaunglebin",
                "Nyaunglebin",
                "ညောင်လေးပင်",
                "ေညာင္ေလးပင္"
            ],
            [
                "shwegyin",
                "Shwegyin",
                "ရွှေကျင်",
                "ေ႐ႊက်င္"
            ],
            [
                "thanatpin",
                "Thanatpin",
                "သနပ်ပင်",
                "သနပ္ပင္"
            ],
            [
                "waw",
                "Waw",
                "ဝေါ",
                "ေဝါ"
            ],
            [
                "kyaukkyi",
                "Kyaukkyi",
                "ကျောက်ကြီး",
                "ေက်ာက္ႀကီး"
            ],
            [
                "oktwin",
                "Oktwin",
                "အုတ်တွင်း",
                "အုတ္တြင္း"
            ],
            [
                "tantabin",
                "Tantabin",
                "ထန်းတပင်",
                "ထန္းတပင္"
            ],
            [
                "taungoo",
                "Taungoo",
                "တောင်ငူ",
                "ေတာင္ငူ"
            ],
            [
                "yedashe",
                "Yedashe",
                "ရေတာရှည်",
                "ေရတာရွည္"
            ],
            [
                "padaung",
                "Padaung",
                "ပန်းတောင်း",
                "ပန္းေတာင္း"
            ],
            [
                "paukkaung",
                "Paukkaung",
                "ပေါက်ခေါင်း",
                "ေပါက္ေခါင္း"
            ],
            [
                "paungde",
                "Paungde",
                "ပေါင်းတည်",
                "ေပါင္းတည္"
            ],
            [
                "pyay",
                "Pyay",
                "ပြည်",
                "ျပည္"
            ],
            [
                "shwedaung",
                "Shwedaung",
                "ရွှေတောင်",
                "ေ႐ႊေတာင္"
            ],
            [
                "thegon",
                "Thegon",
                "သဲကုန်း",
                "သဲကုန္း"
            ],
            [
                "gyobingauk",
                "Gyobingauk",
                "ကြို့ပင်ကောက်",
                "ႀကိဳ႕ပင္ေကာက္"
            ],
            [
                "letpadan",
                "Letpadan",
                "လက်ပံတန်း",
                "လက္ပံတန္း"
            ],
            [
                "minhla-2",
                "Minhla-2",
                "မင်းလှ-2",
                "မင္းလွ-2"
            ],
            [
                "monyo",
                "Monyo",
                "မိုးညို",
                "မိုးညိဳ"
            ],
            [
                "okpho",
                "Okpho",
                "အုတ်ဖို",
                "အုတ္ဖို"
            ],
            [
                "thayarwady",
                "Thayarwady",
                "သာယာဝတီ",
                "သာယာဝတီ"
            ],
            [
                "nattalin",
                "Nattalin",
                "နတ်တလင်း",
                "နတ္တလင္း"
            ],
            [
                "zigon",
                "Zigon",
                "ဇီးကုန်း",
                "ဇီးကုန္း"
            ],
            [
                "falam",
                "Falam",
                "ဖလမ်း",
                "ဖလမ္း"
            ],
            [
                "tiddim",
                "Tiddim",
                "တီးတိန်",
                "တီးတိန္"
            ],
            [
                "hakha",
                "Hakha",
                "ဟားခါး",
                "ဟားခါး"
            ],
            [
                "htantlang",
                "Htantlang",
                "ထန်တလန်",
                "ထန္တလန္"
            ],
            [
                "kanpetlet",
                "Kanpetlet",
                "ကန်ပက်လက်",
                "ကန္ပက္လက္"
            ],
            [
                "mindat",
                "Mindat",
                "မင်းတပ်",
                "မင္းတပ္"
            ],
            [
                "paletwa",
                "Paletwa",
                "ပလက်ဝ",
                "ပလက္ဝ"
            ],
            [
                "bhamo",
                "Bhamo",
                "ဗန်းမော်",
                "ဗန္းေမာ္"
            ],
            [
                "mansi",
                "Mansi",
                "မံစီ",
                "မံစီ"
            ],
            [
                "momauk",
                "Momauk",
                "မိုးမောက်",
                "မိုးေမာက္"
            ],
            [
                "shwegu",
                "Shwegu",
                "ရွှေကူ",
                "ေ႐ႊကူ"
            ],
            [
                "hpakan",
                "Hpakan",
                "ဖားကန့်",
                "ဖားကန႔္"
            ],
            [
                "mogaung",
                "Mogaung",
                "မိုးကောင်း",
                "မိုးေကာင္း"
            ],
            [
                "mohnyin",
                "Mohnyin",
                "မိုးညှင်း",
                "မိုးညႇင္း"
            ],
            [
                "chipwi",
                "Chipwi",
                "ချီဗွေ",
                "ခ်ီေဗြ"
            ],
            [
                "injangyang",
                "Injangyang",
                "အင်ဂျန်းယန်",
                "အင္ဂ်န္းယန္"
            ],
            [
                "myitkyina",
                "Myitkyina",
                "မြစ်ကြီးနား",
                "ျမစ္ႀကီးနား"
            ],
            [
                "tanai",
                "Tanai",
                "တနိုင်း",
                "တႏိုင္း"
            ],
            [
                "waingmaw",
                "Waingmaw",
                "ဝိုင်းမော်",
                "ဝိုင္းေမာ္"
            ],
            [
                "kawnglanghpu",
                "Kawnglanghpu",
                "ခေါင်လန်ဖူး",
                "ေခါင္လန္ဖူး"
            ],
            [
                "machanbaw",
                "Machanbaw",
                "မချမ်းဘော",
                "မခ်မ္းေဘာ"
            ],
            [
                "nogmung",
                "Nogmung",
                "‌နောင်မွန်း",
                "‌ေနာင္မြန္း"
            ],
            [
                "puta-o",
                "Puta-O",
                "ပူတာအို",
                "ပူတာအို"
            ],
            [
                "sumprabum",
                "Sumprabum",
                "ဆွမ်ပရာဘွမ်",
                "ဆြမ္ပရာဘြမ္"
            ],
            [
                "bawlakhe",
                "Bawlakhe",
                "ဘော်လခဲ",
                "ေဘာ္လခဲ"
            ],
            [
                "mese",
                "Mese",
                "မယ်စဲ့",
                "မယ္စဲ့"
            ],
            [
                "demoso",
                "Demoso",
                "‌ဒီမောဆိုး",
                "‌ဒီေမာဆိုး"
            ],
            [
                "hpruso",
                "Hpruso",
                "ဖရူးဆိုး",
                "ဖ႐ူးဆိုး"
            ],
            [
                "loikaw",
                "Loikaw",
                "လွိုင်ကော်",
                "လြိဳင္ေကာ္"
            ],
            [
                "shadaw",
                "Shadaw",
                "ရှားတော",
                "ရွားေတာ"
            ],
            [
                "hpa-an",
                "Hpa-An",
                "ဘားအံ",
                "ဘားအံ"
            ],
            [
                "thandaung",
                "Thandaung",
                "သံတောင်ကြီး",
                "သံေတာင္ႀကီး"
            ],
            [
                "kawkareik",
                "Kawkareik",
                "ကော့ကရိတ်",
                "ေကာ့ကရိတ္"
            ],
            [
                "myawaddy",
                "Myawaddy",
                "မြဝတီ",
                "ျမဝတီ"
            ],
            [
                "chaungzon",
                "Chaungzon",
                "ချောင်းဆုံ",
                "ေခ်ာင္းဆုံ"
            ],
            [
                "kyaikmaraw",
                "Kyaikmaraw",
                "ကျိုက်မရော",
                "က်ိဳက္မေရာ"
            ],
            [
                "mawlamyine",
                "Mawlamyine",
                "မော်လမြိုင်",
                "ေမာ္လၿမိဳင္"
            ],
            [
                "mudon",
                "Mudon",
                "မုဒုံ",
                "မုဒုံ"
            ],
            [
                "thanbyuzayat",
                "Thanbyuzayat",
                "သံဖြူဇရပ်",
                "သံျဖဴဇရပ္"
            ],
            [
                "ye",
                "Ye",
                "ရေး",
                "ေရး"
            ],
            [
                "bilin",
                "Bilin",
                "ဘီးလင်း",
                "ဘီးလင္း"
            ],
            [
                "kyaikto",
                "Kyaikto",
                "ကျိုက်ထို",
                "က်ိဳက္ထို"
            ],
            [
                "paung",
                "Paung",
                "ပေါင်",
                "ေပါင္"
            ],
            [
                "thaton",
                "Thaton",
                "သထုံ",
                "သထုံ"
            ],
            [
                "ann",
                "Ann",
                "အမ်း",
                "အမ္း"
            ],
            [
                "kyaukpyu",
                "Kyaukpyu",
                "ကျောက်ဖြူ",
                "ေက်ာက္ျဖဴ"
            ],
            [
                "ramree",
                "Ramree",
                "ရမ်းဗြဲ",
                "ရမ္းၿဗဲ"
            ],
            [
                "buthidaung",
                "Buthidaung",
                "ဘူးသီးတောင်",
                "ဘူးသီးေတာင္"
            ],
            [
                "maungdaw",
                "Maungdaw",
                "မောင်တော",
                "ေမာင္ေတာ"
            ],
            [
                "pauktaw",
                "Pauktaw",
                "ပေါက်တော",
                "ေပါက္ေတာ"
            ],
            [
                "ponnagyun",
                "Ponnagyun",
                "ပုဏ္ဏားကျွန်း",
                "ပုဏၰားကြၽန္း"
            ],
            [
                "rathedaung",
                "Rathedaung",
                "ရသေ့တောင်",
                "ရေသ့ေတာင္"
            ],
            [
                "sittwe",
                "Sittwe",
                "စစ်တွေ",
                "စစ္ေတြ"
            ],
            [
                "thandwe",
                "Thandwe",
                "သံတွဲ",
                "သံတြဲ"
            ],
            [
                "toungup",
                "Toungup",
                "တောင်ကုတ်",
                "ေတာင္ကုတ္"
            ],
            [
                "kyauktaw",
                "Kyauktaw",
                "ကျောက်တော်",
                "ေက်ာက္ေတာ္"
            ],
            [
                "minbya",
                "Minbya",
                "မင်းပြား",
                "မင္းျပား"
            ],
            [
                "mrauk-u",
                "Mrauk-U",
                "မြောက်ဦး",
                "ေျမာက္ဦး"
            ],
            [
                "myebon",
                "Myebon",
                "မြေပုံ",
                "ေျမပုံ"
            ],
            [
                "kengtung",
                "Kengtung",
                "ကျိုင်းတုံ",
                "က်ိဳင္းတုံ"
            ],
            [
                "tachileik",
                "Tachileik",
                "တာချီလိတ်",
                "တာခ်ီလိတ္"
            ],
            [
                "kunlong",
                "Kunlong",
                "ကွမ်းလုံ",
                "ကြမ္းလုံ"
            ],
            [
                "hsipaw",
                "Hsipaw",
                "သီပေါ",
                "သီေပါ"
            ],
            [
                "kyaukme",
                "Kyaukme",
                "ကျောက်မဲ",
                "ေက်ာက္မဲ"
            ],
            [
                "namtu",
                "Namtu",
                "နမ္မတူ",
                "နမၼတူ"
            ],
            [
                "nawnghkio",
                "Nawnghkio",
                "နောင်ချို",
                "ေနာင္ခ်ိဳ"
            ],
            [
                "hseni",
                "Hseni",
                "သိန္ဓီ",
                "သိႏၶီ"
            ],
            [
                "lashio",
                "Lashio",
                "လားရှိုး",
                "လားရႈိး"
            ],
            [
                "mongyai",
                "Mongyai",
                "မိုင်းရယ်",
                "မိုင္းရယ္"
            ],
            [
                "tangyan",
                "Tangyan",
                "တန်ယန်း",
                "တန္ယန္း"
            ],
            [
                "kutkai",
                "Kutkai",
                "ကွတ်ခိုင်",
                "ကြတ္ခိုင္"
            ],
            [
                "muse",
                "Muse",
                "မူဆယ်",
                "မူဆယ္"
            ],
            [
                "mabein",
                "Mabein",
                "မဘိမ်း",
                "မဘိမ္း"
            ],
            [
                "mongmit",
                "Mongmit",
                "မိုးမိတ်",
                "မိုးမိတ္"
            ],
            [
                "laukkaing",
                "Laukkaing",
                "လောက်ကိုင်",
                "ေလာက္ကိုင္"
            ],
            [
                "konkyan",
                "Konkyan",
                "ကုန်းကြမ်း",
                "ကုန္းၾကမ္း"
            ],
            [
                "manton",
                "Manton",
                "မိုင်းတုံ",
                "မိုင္းတုံ"
            ],
            [
                "hopang",
                "Hopang",
                "ဟိုပန်",
                "ဟိုပန္"
            ],
            [
                "pangwaun",
                "Pangwaun",
                "ပန်ဝိုင်",
                "ပန္ဝိုင္"
            ],
            [
                "matman",
                "Matman",
                "မက်မန်း",
                "မက္မန္း"
            ],
            [
                "namphan",
                "Namphan",
                "နားဖန်း",
                "နားဖန္း"
            ],
            [
                "pangsang",
                "Panghsang",
                "ပန်ဆန်း",
                "ပၢင်သၢင်း"
            ],
            [
                "langkho",
                "Langkho",
                "လင်းခေး",
                "လင္းေခး"
            ],
            [
                "mawkmai",
                "Mawkmai",
                "မောက်မယ်",
                "ေမာက္မယ္"
            ],
            [
                "kunhing",
                "Kunhing",
                "ၵုၼ္ႁဵင္",
                "ၵုၼ်ႁဵင်"
            ],
            [
                "kyethi",
                "Kyethi",
                "ကျေးသီး",
                "ေက်းသီး"
            ],
            [
                "loilen",
                "Loilen",
                "လွိုင်လင်",
                "လြိဳင္လင္"
            ],
            [
                "monghsu",
                "Monghsu",
                "မိုင်းရှူး",
                "မိုင္းရႉး"
            ],
            [
                "nansang",
                "Namsang",
                "နမ့်စန်",
                "နမ့္စန္"
            ],
            [
                "kalaw",
                "Kalaw",
                "ကလော",
                "ကေလာ"
            ],
            [
                "lawksawk",
                "Lawksawk",
                "ရပ်စောက်",
                "ရပ္ေစာက္"
            ],
            [
                "nyaungshwe",
                "Nyaungshwe",
                "ညောင်ရွှေ",
                "ေညာင္ေ႐ႊ"
            ],
            [
                "pekon",
                "Pekon",
                "ဖယ်ခုံ",
                "ဖယ္ခုံ"
            ],
            [
                "taunggyi",
                "Taunggyi",
                "တောင်ကြီး",
                "ေတာင္ႀကီး"
            ],
            [
                "pindaya",
                "Pindaya",
                "ပင်းတယ",
                "ပင္းတယ"
            ],
            [
                "ywangan",
                "Ywangan",
                "ရွာငံ",
                "႐ြာငံ"
            ],
            [
                "hopong",
                "Hopong",
                "ဟိုပုံး",
                "ဟိုပုံး"
            ],
            [
                "pinlaung",
                "Pinlaung",
                "ပင်လောင်း",
                "ပင္ေလာင္း"
            ],
            [
                "hkamti",
                "Hkamti",
                "ခန်တီး",
                "ခန္တီး"
            ],
            [
                "homalin",
                "Homalin",
                "ဟုမ္မလင်း",
                "ဟုမၼလင္း"
            ],
            [
                "kanbalu",
                "Kanbalu",
                "ကန့်ဘလူ",
                "ကန႔္ဘလူ"
            ],
            [
                "kyunhla",
                "Kyun Hla",
                "ကျွန်းလှ",
                "ကြၽန္းလွ"
            ],
            [
                "kale",
                "Kale",
                "ကလေး",
                "ကေလး"
            ],
            [
                "kalewa",
                "Kalewa",
                "ကလေး၀",
                "ကေလး၀"
            ],
            [
                "mingin",
                "Mingin",
                "မင်းကင်း",
                "မင္းကင္း"
            ],
            [
                "banmauk",
                "Banmauk",
                "ဗန်းမောက်",
                "ဗန္းေမာက္"
            ],
            [
                "indaw",
                "Indaw",
                "အင်းတော်",
                "အင္းေတာ္"
            ],
            [
                "katha",
                "Katha",
                "ကသာ",
                "ကသာ"
            ],
            [
                "kawlin",
                "Kawlin",
                "ကောလင်း",
                "ေကာလင္း"
            ],
            [
                "pinlebu",
                "Pinlebu",
                "ပင်လည်ဘူး",
                "ပင္လည္ဘူး"
            ],
            [
                "tigyaing",
                "Tigyaing",
                "ထီးချိုင့်",
                "ထီးခ်ိဳင့္"
            ],
            [
                "wuntho",
                "Wuntho",
                "ဝန်းသို",
                "ဝန္းသို"
            ],
            [
                "mawlaik",
                "Mawlaik",
                "မော်လိုက်",
                "ေမာ္လိုက္"
            ],
            [
                "paungbyin",
                "Paungbyin",
                "ဖေါင်းပြင်",
                "ေဖါင္းျပင္"
            ],
            [
                "ayadaw",
                "Ayadaw",
                "အရာတော်",
                "အရာေတာ္"
            ],
            [
                "budalin",
                "Budalin",
                "ဘုတလင်",
                "ဘုတလင္"
            ],
            [
                "chaung-u",
                "Chaung-U",
                "ချောင်းဦး",
                "ေခ်ာင္းဦး"
            ],
            [
                "monywa",
                "Monywa",
                "မုံရွာ",
                "မံုရြာ"
            ],
            [
                "myaung",
                "Myaung",
                "မြောင်",
                "ေျမာင္"
            ],
            [
                "myinmu",
                "Myinmu",
                "မြင်းမူ",
                "ျမင္းမူ"
            ],
            [
                "sagaing",
                "Sagaing",
                "စစ်ကိုင်း",
                "စစ္ကိုင္း"
            ],
            [
                "khin-u",
                "Khin-U",
                "ခင်ဦး",
                "ခင္ဦး"
            ],
            [
                "shwebo",
                "Shwebo",
                "ရွှေဘို",
                "ေရြွဘို"
            ],
            [
                "wetlet",
                "Wetlet",
                "၀က်လက်",
                "၀က္လက္"
            ],
            [
                "tabayin",
                "Tabayin",
                "ဒီပဲယင်း",
                "ဒီပဲယင္း"
            ],
            [
                "tamu",
                "Tamu",
                "တမူး",
                "တမူး"
            ],
            [
                "kani",
                "Kani",
                "ကနီ",
                "ကနီ"
            ],
            [
                "pale",
                "Pale",
                "ပုလဲ",
                "ပုလဲ"
            ],
            [
                "yinmabin",
                "Yinmabin",
                "ယင်းမာပင်",
                "ယင္းမာပင္"
            ],
            [
                "lahe",
                "Lahe",
                "လဟယ်",
                "လဟယ္"
            ],
            [
                "nanyun",
                "Nanyun",
                "နန်းယွန်း",
                "နန္းယြန္း"
            ],
            [
                "dawei",
                "Dawei",
                "ထားဝယ်",
                "ထား၀ယ္"
            ],
            [
                "launglon",
                "Launglon",
                "လောင်းလုံ",
                "ေလာင္းလံု"
            ],
            [
                "thayetchaung",
                "Thayetchaung",
                "သရက်ချောင်း",
                "သရက္ေခ်ာင္း"
            ],
            [
                "yebyu",
                "Yebyu",
                "ရေဖြူ",
                "ေရျဖူ"
            ],
            [
                "bokpyin",
                "Bokpyin",
                "ဘုတ်ပြင်း",
                "ဘုတ္ျပင္း"
            ],
            [
                "kawthoung",
                "Kawthaung",
                "ကော့သောင်း",
                "ေကာ့ေသာင္း"
            ],
            [
                "kyunsu",
                "Kyunsu",
                "ကျွန်းစု",
                "က်ြန္းစု"
            ],
            [
                "myeik",
                "Myeik",
                "မြိတ်",
                "ျမိတ္"
            ],
            [
                "palaw",
                "Palaw",
                "ပုလော",
                "ပုေလာ"
            ],
            [
                "tanintharyi",
                "Tanintharyi",
                "တနင်္သာရီ",
                "တနသၤာရီ"
            ],
            [
                "hlegu",
                "Hlegu",
                "လှည်းကူး",
                "လွည္းကူး"
            ],
            [
                "hmawbi",
                "Hmawbi",
                "မှော်ဘီ",
                "ေမွာ္ဘီ"
            ],
            [
                "htantabin",
                "Htantabin",
                "ထန်းတပင်",
                "ထန္းတပင္"
            ],
            [
                "taikkyi",
                "Taikkyi",
                "တိုက်ကြီး",
                "တိုက္ျကီး"
            ],
            [
                "kawhmu",
                "Kawhmu",
                "ကော့မှူး",
                "ေကာ့မွဴး"
            ],
            [
                "kayan",
                "Kayan",
                "ခရမ်း",
                "ခရမ္း"
            ],
            [
                "kungyangon",
                "Kungyangon",
                "ကွမ်းခြံကုန်း",
                "ကြမ္းၿခံကုန္း"
            ],
            [
                "kyauktan",
                "Kyauktan",
                "ကျောက်တန်း",
                "ေက်ာက္တန္း"
            ],
            [
                "thanlyin",
                "Thanlyin",
                "သန်လျင်",
                "သန္လ်င္"
            ],
            [
                "thongwa",
                "Thongwa",
                "သုံးခွ",
                "သံုးခြ"
            ],
            [
                "tatkon",
                "Tatkon",
                "တပ်ကုန်း",
                "တပ္ကုန္း"
            ],
            [
                "lewe",
                "Lewe",
                "လယ်ဝေး",
                "လယ္ေ၀း"
            ],
            [
                "pyinmana",
                "Pyinmana",
                "ပျဉ်းမနား",
                "ပ်ဥ္းမနား"
            ],
            [
                "danubyu",
                "Danubyu",
                "ဓနုဖြူ",
                "ဓနုျဖူ"
            ],
            [
                "kangyidaunt",
                "Kangyidaunt",
                "ကန်ကြီးထောင့်",
                "ကန္ႀကီးေထာင့္"
            ],
            [
                "maubin",
                "Maubin",
                "မအူပင်",
                "မအူပင္"
            ],
            [
                "myaungmya",
                "Myaungmya",
                "မြောင်းမြ",
                "ေျမာင္းျမ"
            ],
            [
                "yegyi",
                "Yegyi",
                "ရေကြည်",
                "ေရၾကည္"
            ],
            [
                "kyauktaga",
                "Kyauktaga",
                "ကျောက်တံခါး",
                "ေက်ာက္တံခါး"
            ],
            [
                "phyu",
                "Phyu",
                "ဖြူး",
                "ျဖူး"
            ],
            [
                "madupi",
                "Madupi",
                "မတူပီ",
                "မတူပီ"
            ],
            [
                "tonzang",
                "Tonzang",
                "တွန်းဇံ",
                "တြန္းဇံ"
            ],
            [
                "tsawlaw",
                "Tsawlaw",
                "ဆော့လော်",
                "ေဆာ့ေလာ္"
            ],
            [
                "hpasawng",
                "Hpasawng",
                "ဖားဆောင်း",
                "ဖားေဆာင္း"
            ],
            [
                "hlaingbwe",
                "Hlaingbwe",
                "လှိုင်းဘွဲ့",
                "လွိုင္းဘဲြ့"
            ],
            [
                "kyainseikgyi",
                "Kyainseikgyi",
                "ကြာအင်းဆိပ်ကြီး",
                "ျကာအင္းဆိပ္ျကီး"
            ],
            [
                "ngazun",
                "Ngazun",
                "ငါန်းဇွန်",
                "ငါန္းဇြန္"
            ],
            [
                "taungtha",
                "Taungtha",
                "တောင်သာ",
                "ေတာင္သာ"
            ],
            [
                "gwa",
                "Gwa",
                "ဂွ",
                "ဂြ"
            ],
            [
                "munaung",
                "Munaung",
                "မာန်အောင်",
                "မာန္ေအာင္"
            ],
            [
                "layshi",
                "Layshi",
                "လေရှီး",
                "ေလရွီး"
            ],
            [
                "salin",
                "Salin",
                "စလင်း",
                "စလင္း"
            ],
            [
                "monghpyak",
                "Monghpyak",
                "မိုင်းဖြတ်",
                "မိုင္းျဖတ္"
            ],
            [
                "monghsat",
                "Mong Hsat",
                "မိုင်းဆတ်",
                "မိုင္းဆတ္"
            ],
            [
                "mongkhet",
                "Mongkhet",
                "မိုင်းခတ်",
                "မိုင္းခတ္"
            ],
            [
                "mongla",
                "Mongla",
                "မိုင်းလား",
                "မိုင္းလား"
            ],
            [
                "mongping",
                "Mongping",
                "မိုင်းပြင်း",
                "မိုင္းျပင္း"
            ],
            [
                "mongton",
                "Mongton",
                "မိုင်းတုံ",
                "မိုင္းတုံ"
            ],
            [
                "mongyang",
                "Mongyang",
                "မိူင်းယၢင်း",
                "မိူင္းယၢင္း"
            ],
            [
                "mongyawng",
                "Mongyawng",
                "မိုင်းယောင်း",
                "မိုင္းေယာင္း"
            ],
            [
                "mongmao",
                "Mongmao",
                "မိုင်းမော",
                "မိုင္းေမာ"
            ],
            [
                "namhsan",
                "Namhsan",
                "နမ့်ဆန်",
                "နမ့္ဆန္"
            ],
            [
                "nanhkan",
                "Nanhkan",
                "နမ့်ခမ်း",
                "နမ့္ခမ္း"
            ],
            [
                "hsihseng",
                "Hsihseng",
                "ဆီဆိုင်",
                "ဆီဆိုင္"
            ],
            [
                "laihka",
                "Laihka",
                "လဲချား",
                "လဲခ်ား"
            ],
            [
                "mongkaung",
                "Mongkaung",
                "မိုင်းကိုင်",
                "မိုင္းကိုင္"
            ],
            [
                "mongnai",
                "Mongnai",
                "မိူင်းၼၢႆး",
                "မိူင္းၼၢႆး"
            ],
            [
                "mongpan",
                "Mongpan",
                "မိူင်းပၼ်ႇ",
                "မိူင္းပၼ္ႇ"
            ],
            [
                "twantay",
                "Twantay",
                "တွံတေး",
                "တြံေတး"
            ],
            [
                "taze",
                "Taze",
                "တန့်ဆည်",
                "တန႔္ဆည္"
            ],
            [
                "ye-u",
                "Ye-U",
                "ရေဦး",
                "ေရဦး"
            ]
        ];

        var covids = {
            "positives": [
                {"type": "", "township": "tiddim"},
                {"type": "", "township": "y-thaketa"},
                {"type": "", "township": "y-seikkan"},
                {"type": "", "township": "y-shwepyithar"},
                {"type": "", "township": "y-shwepyithar"},
                {"type": "", "township": "y-shwepyithar"},
                {"type": "", "township": "y-shwepyithar"},
                {"type": "", "township": "m-chanayethazan"},
                {"type": "", "township": "pyinmana"},
                {"type": "", "township": "y-yankin"},
                {"type": "", "township": "kyaukme"},
                {"type": "", "township": "tonzang"}
            ],
            "quarantine": [
                {"type": "", "township": "y-"},
            ],
            "pos-travel": [
                {"type": "", "township": "y-"},
            ]
        }

        var covids_positives = []

        var covids_positives_combied = []

        var covids_positives_combied_color = []


        //ZawWaiSoe don't change variable names
        var zawvids_positives =[{"name":"gangaw","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"saw","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"magway","puinsuspect":20,"pui":"20","suspected":"0","lab_negative":"16","lab_pending":"4","die":"0","recovered":"0","lab_confirmed":"0","total_cases":40},{"name":"natmauk","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"minbu","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"pakokku","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"pauk","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"aunglan","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"kamma","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"mindon","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"minhla","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"thayet","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"myittha","puinsuspect":4,"pui":"4","suspected":"0","lab_negative":"4","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":8},{"name":"m-chanayethazan","puinsuspect":57,"pui":"54","suspected":"3","lab_negative":"51","lab_pending":"6","die":"0","recovered":"0","lab_confirmed":"0","total_cases":114},{"name":"m-chanmyathazi","puinsuspect":26,"pui":"26","suspected":"0","lab_negative":"25","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":52},{"name":"patheingyi","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"meiktila","puinsuspect":6,"pui":"6","suspected":"0","lab_negative":"6","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":12},{"name":"wundwin","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"nyaung-u","puinsuspect":4,"pui":"4","suspected":"0","lab_negative":"4","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":8},{"name":"kyaukpadaung","puinsuspect":5,"pui":"4","suspected":"1","lab_negative":"2","lab_pending":"2","die":"0","recovered":"0","lab_confirmed":"0","total_cases":9},{"name":"mogoke","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"pyinoolwin","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"pyawbwe","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":3},{"name":"yamethin","puinsuspect":4,"pui":"4","suspected":"0","lab_negative":"4","lab_pending":"2","die":"0","recovered":"0","lab_confirmed":"0","total_cases":10},{"name":"labutta","puinsuspect":6,"pui":"6","suspected":"0","lab_negative":"6","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":12},{"name":"einme","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"wakema","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"pathein","puinsuspect":4,"pui":"4","suspected":"0","lab_negative":"3","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":8},{"name":"bogale","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":5},{"name":"dedaye","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"pyapon","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"paukkaung","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"1","recovered":"0","lab_confirmed":"3","total_cases":4},{"name":"tiddim","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"3","total_cases":3},{"name":"hakha","puinsuspect":8,"pui":"8","suspected":"0","lab_negative":"5","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":13},{"name":"mindat","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"demoso","puinsuspect":9,"pui":"9","suspected":"0","lab_negative":"7","lab_pending":"2","die":"0","recovered":"0","lab_confirmed":"0","total_cases":18},{"name":"loikaw","puinsuspect":25,"pui":"25","suspected":"0","lab_negative":"24","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":50},{"name":"shadaw","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"2","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"hpa-an","puinsuspect":18,"pui":"18","suspected":"0","lab_negative":"15","lab_pending":"3","die":"0","recovered":"0","lab_confirmed":"0","total_cases":36},{"name":"kawkareik","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":3},{"name":"myawaddy","puinsuspect":5,"pui":"5","suspected":"0","lab_negative":"5","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":10},{"name":"kyaikmaraw","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"mawlamyine","puinsuspect":18,"pui":"18","suspected":"0","lab_negative":"17","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":35},{"name":"thanbyuzayat","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"ye","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"kyaikto","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"kyaukpyu","puinsuspect":8,"pui":"8","suspected":"0","lab_negative":"8","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":16},{"name":"maungdaw","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"ponnagyun","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"sittwe","puinsuspect":5,"pui":"5","suspected":"0","lab_negative":"5","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":10},{"name":"thandwe","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"minbya","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"kengtung","puinsuspect":9,"pui":"9","suspected":"0","lab_negative":"9","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":18},{"name":"tachileik","puinsuspect":31,"pui":"31","suspected":"0","lab_negative":"30","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":62},{"name":"hsipaw","puinsuspect":4,"pui":"4","suspected":"0","lab_negative":"3","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":8},{"name":"kyaukme","puinsuspect":11,"pui":"11","suspected":"0","lab_negative":"8","lab_pending":"2","die":"0","recovered":"0","lab_confirmed":"1","total_cases":22},{"name":"namtu","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"nawnghkio","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"hseni","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"lashio","puinsuspect":14,"pui":"14","suspected":"0","lab_negative":"14","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":28},{"name":"kutkai","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"muse","puinsuspect":19,"pui":"19","suspected":"0","lab_negative":"16","lab_pending":"3","die":"0","recovered":"0","lab_confirmed":"0","total_cases":38},{"name":"manton","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"hopang","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"langkho","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"mawkmai","puinsuspect":4,"pui":"4","suspected":"0","lab_negative":"4","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":8},{"name":"loilen","puinsuspect":7,"pui":"7","suspected":"0","lab_negative":"4","lab_pending":"3","die":"0","recovered":"0","lab_confirmed":"0","total_cases":14},{"name":"nyaungshwe","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"taunggyi","puinsuspect":12,"pui":"12","suspected":"0","lab_negative":"10","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"1","total_cases":24},{"name":"pindaya","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"dawei","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"kawthoung","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"myeik","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"2","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"y-dagonmyothitea","puinsuspect":5,"pui":"5","suspected":"0","lab_negative":"4","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":10},{"name":"y-northokkalapa","puinsuspect":172,"pui":"162","suspected":"10","lab_negative":"134","lab_pending":"8","die":"1","recovered":"0","lab_confirmed":"8","total_cases":323},{"name":"y-southokkalapa","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"3","total_cases":3},{"name":"y-thingangkuun","puinsuspect":37,"pui":"37","suspected":"0","lab_negative":"32","lab_pending":"5","die":"0","recovered":"0","lab_confirmed":"0","total_cases":74},{"name":"y-yankin","puinsuspect":10,"pui":"10","suspected":"0","lab_negative":"10","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":20},{"name":"y-hlaingtharya","puinsuspect":12,"pui":"12","suspected":"0","lab_negative":"10","lab_pending":"2","die":"0","recovered":"0","lab_confirmed":"0","total_cases":24},{"name":"y-insein","puinsuspect":87,"pui":"87","suspected":"0","lab_negative":"80","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"9","total_cases":176},{"name":"y-mingaladon","puinsuspect":5,"pui":"5","suspected":"0","lab_negative":"4","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"1","total_cases":11},{"name":"y-shwepyithar","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"1","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"hlegu","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":6},{"name":"htantabin","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"1","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"y-seikgyikanaungto","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"0","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"kayan","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"kyauktan","puinsuspect":4,"pui":"4","suspected":"0","lab_negative":"4","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":8},{"name":"thanlyin","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"y-kyeemyindaing","puinsuspect":5,"pui":"5","suspected":"0","lab_negative":"4","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"1","total_cases":11},{"name":"y-lanmadaw","puinsuspect":128,"pui":"128","suspected":"0","lab_negative":"97","lab_pending":"27","die":"1","recovered":"0","lab_confirmed":"4","total_cases":257},{"name":"y-sanchaung","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"2","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"pyinmana","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"myaungmya","puinsuspect":5,"pui":"5","suspected":"0","lab_negative":"5","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":10},{"name":"hlaingbwe","puinsuspect":6,"pui":"6","suspected":"0","lab_negative":"6","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":12},{"name":"kyainseikgyi","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"taungtha","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"monghpyak","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"mongkhet","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"mongyawng","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"hsihseng","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4}];

        var covid_khayines = [{"name":"ky-dawei","pui":"3","puinsuspect":3,"suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"ky-eyangon","pui":"457","puinsuspect":467,"suspected":"10","lab_negative":"378","lab_pending":"47","die":"2","recovered":"0","lab_confirmed":"27","total_cases":921},{"name":"ky-falam","pui":"0","puinsuspect":0,"suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"3","total_cases":3},{"name":"ky-gangaw","pui":"3","puinsuspect":3,"suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"ky-hakha","pui":"8","puinsuspect":8,"suspected":"0","lab_negative":"5","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":13},{"name":"ky-hopang","pui":"1","puinsuspect":1,"suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"ky-hpa-an","pui":"24","puinsuspect":24,"suspected":"0","lab_negative":"21","lab_pending":"3","die":"0","recovered":"0","lab_confirmed":"0","total_cases":48},{"name":"ky-kawkareik","pui":"3","puinsuspect":3,"suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":5},{"name":"ky-kawthoung","pui":"1","puinsuspect":1,"suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"ky-kengtung","pui":"10","puinsuspect":10,"suspected":"0","lab_negative":"10","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":20},{"name":"ky-kyaukme","pui":"19","puinsuspect":19,"suspected":"0","lab_negative":"15","lab_pending":"3","die":"0","recovered":"0","lab_confirmed":"1","total_cases":38},{"name":"ky-kyaukpyu","pui":"8","puinsuspect":8,"suspected":"0","lab_negative":"8","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":16},{"name":"ky-kyaukse","pui":"4","puinsuspect":4,"suspected":"0","lab_negative":"4","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":8},{"name":"ky-labutta","pui":"6","puinsuspect":6,"suspected":"0","lab_negative":"6","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":12},{"name":"ky-langkho","pui":"7","puinsuspect":7,"suspected":"0","lab_negative":"7","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":14},{"name":"ky-lashio","pui":"16","puinsuspect":16,"suspected":"0","lab_negative":"16","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":32},{"name":"ky-loikaw","pui":"37","puinsuspect":37,"suspected":"0","lab_negative":"33","lab_pending":"4","die":"0","recovered":"0","lab_confirmed":"0","total_cases":74},{"name":"ky-loilen","pui":"7","puinsuspect":7,"suspected":"0","lab_negative":"4","lab_pending":"3","die":"0","recovered":"0","lab_confirmed":"0","total_cases":14},{"name":"ky-magway","pui":"21","puinsuspect":21,"suspected":"0","lab_negative":"17","lab_pending":"4","die":"0","recovered":"0","lab_confirmed":"0","total_cases":42},{"name":"ky-mandalay","pui":"81","puinsuspect":84,"suspected":"3","lab_negative":"77","lab_pending":"6","die":"0","recovered":"0","lab_confirmed":"1","total_cases":168},{"name":"ky-maungdaw","pui":"1","puinsuspect":1,"suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"ky-mawlamyine","pui":"20","puinsuspect":20,"suspected":"0","lab_negative":"19","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":40},{"name":"ky-meiktila","pui":"7","puinsuspect":7,"suspected":"0","lab_negative":"7","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":14},{"name":"ky-minbu","pui":"1","puinsuspect":1,"suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"ky-mindat","pui":"1","puinsuspect":1,"suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"ky-monghpyak","pui":"4","puinsuspect":4,"suspected":"0","lab_negative":"4","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":8},{"name":"ky-mrauk-u","pui":"1","puinsuspect":1,"suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"ky-muse","pui":"22","puinsuspect":22,"suspected":"0","lab_negative":"19","lab_pending":"3","die":"0","recovered":"0","lab_confirmed":"0","total_cases":44},{"name":"ky-myaungmya","pui":"7","puinsuspect":7,"suspected":"0","lab_negative":"7","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":14},{"name":"ky-myawaddy","pui":"5","puinsuspect":5,"suspected":"0","lab_negative":"5","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":10},{"name":"ky-myeik","pui":"3","puinsuspect":3,"suspected":"0","lab_negative":"2","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"ky-myingyan","pui":"2","puinsuspect":2,"suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"ky-naypyitaw","pui":"0","puinsuspect":0,"suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"ky-nyangon","pui":"5","puinsuspect":5,"suspected":"0","lab_negative":"3","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"1","total_cases":10},{"name":"ky-nyaung-u","pui":"8","puinsuspect":9,"suspected":"1","lab_negative":"6","lab_pending":"2","die":"0","recovered":"0","lab_confirmed":"0","total_cases":17},{"name":"ky-pakokku","pui":"5","puinsuspect":5,"suspected":"0","lab_negative":"5","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":10},{"name":"ky-pathein","pui":"4","puinsuspect":4,"suspected":"0","lab_negative":"3","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":8},{"name":"ky-pyapon","pui":"4","puinsuspect":4,"suspected":"0","lab_negative":"4","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":9},{"name":"ky-pyay","pui":"0","puinsuspect":0,"suspected":"0","lab_negative":"0","lab_pending":"0","die":"1","recovered":"0","lab_confirmed":"3","total_cases":4},{"name":"ky-pyinoolwin","pui":"5","puinsuspect":5,"suspected":"0","lab_negative":"5","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":10},{"name":"ky-sittwe","pui":"8","puinsuspect":8,"suspected":"0","lab_negative":"8","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":16},{"name":"ky-syangon","pui":"9","puinsuspect":9,"suspected":"0","lab_negative":"9","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":18},{"name":"ky-tachileik","pui":"31","puinsuspect":31,"suspected":"0","lab_negative":"30","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":62},{"name":"ky-taunggyi","pui":"17","puinsuspect":17,"suspected":"0","lab_negative":"15","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"1","total_cases":34},{"name":"ky-thandwe","pui":"2","puinsuspect":2,"suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"ky-thaton","pui":"1","puinsuspect":1,"suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"ky-thayet","pui":"7","puinsuspect":7,"suspected":"0","lab_negative":"7","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":14},{"name":"ky-yamethin","pui":"5","puinsuspect":5,"suspected":"0","lab_negative":"5","lab_pending":"2","die":"0","recovered":"0","lab_confirmed":"1","total_cases":13}];

        var covid_tines = [{"name":"div-ayeyarwaddy","puinsuspect":21,"pui":"21","suspected":"0","lab_negative":"20","lab_pending":"2","die":"0","recovered":"0","lab_confirmed":"0","total_cases":43},{"name":"div-chin","puinsuspect":9,"pui":"9","suspected":"0","lab_negative":"6","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"3","total_cases":18},{"name":"div-kayar","puinsuspect":37,"pui":"37","suspected":"0","lab_negative":"33","lab_pending":"4","die":"0","recovered":"0","lab_confirmed":"0","total_cases":74},{"name":"div-kayin","puinsuspect":32,"pui":"32","suspected":"0","lab_negative":"28","lab_pending":"3","die":"0","recovered":"0","lab_confirmed":"0","total_cases":63},{"name":"div-magway","puinsuspect":37,"pui":"37","suspected":"0","lab_negative":"33","lab_pending":"4","die":"0","recovered":"0","lab_confirmed":"0","total_cases":74},{"name":"div-mandalay","puinsuspect":116,"pui":"112","suspected":"4","lab_negative":"106","lab_pending":"10","die":"0","recovered":"0","lab_confirmed":"3","total_cases":235},{"name":"div-mon","puinsuspect":21,"pui":"21","suspected":"0","lab_negative":"20","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":42},{"name":"div-rakhine","puinsuspect":20,"pui":"20","suspected":"0","lab_negative":"20","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":40},{"name":"div-eshan","puinsuspect":45,"pui":"45","suspected":"0","lab_negative":"44","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":90},{"name":"div-tanintharyi","puinsuspect":7,"pui":"7","suspected":"0","lab_negative":"6","lab_pending":"1","die":"0","recovered":"0","lab_confirmed":"0","total_cases":14},{"name":"div-yangon","puinsuspect":481,"pui":"471","suspected":"10","lab_negative":"390","lab_pending":"48","die":"2","recovered":"0","lab_confirmed":"28","total_cases":949},{"name":"div-sshan","puinsuspect":31,"pui":"31","suspected":"0","lab_negative":"26","lab_pending":"4","die":"0","recovered":"0","lab_confirmed":"1","total_cases":62},{"name":"div-nshan","puinsuspect":58,"pui":"58","suspected":"0","lab_negative":"51","lab_pending":"6","die":"0","recovered":"0","lab_confirmed":"1","total_cases":116},{"name":"div-wbago","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"1","recovered":"0","lab_confirmed":"3","total_cases":4}];

        var maxDivPos = 28;
        var maxKyPos = 27;
        var maxTsPos = 9;
        var maxDivSus = 481;
        var maxKySus = 467;
        var maxTsSus = 172;


        function tsModeConfirm(zawvids_positives) {

        }

        var toggle = false;


        function disKhayines() {
            for (i in khayines) {
                $('#' + khayines[i]).attr('style', 'display:none;');
            }
        }

        function showKhayines() {
            for (i in khayines) {
                $('#' + khayines[i]).attr('style', 'display:block;');
            }
        }

        function disTownships() {
            for (i in townships) {

                $('#' + townships[i]).attr('style', 'display:none');
            }
            $('#yangon-gp polyline').attr('style', 'display:none');
            $('#mandalay-gp polyline').attr('style', 'display:none');
            $('#yangon-gp path').attr('style', 'display:none');
            $('#mandalay-gp path').attr('style', 'display:none');
        }

        function showTownships() {
            for (i in townships) {
                $('#' + townships[i]).attr('style', 'display:block');
            }
            $('#yangon-gp polyline').attr('style', 'display:block');
            $('#mandalay-gp polyline').attr('style', 'display:block');
            $('#yangon-gp path').attr('style', 'display:block');
            $('#mandalay-gp path').attr('style', 'display:block');
        }


        function disDivisions() {
            for (i in divisions) {
                $('#' + divisions[i]).attr('style', 'display:none');
            }
        }

        function showDivisions() {
            for (i in divisions) {
                $('#' + divisions[i]).attr('style', 'display:block');
            }
        }

        var mode = '';

        function modeTownShips(covidsCombiedColor) {
            disKhayines();
            disTownships();
            disDivisions();
            showTownships();
            for (i in covidsCombiedColor) {
                if (covidsCombiedColor[i].name == 'yangon-gp') {
                    if (!toggle) {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + cv_pos[parseInt(covidsCombiedColor[i].color) - 1]);
                    } else {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + cv_pos_sus[parseInt(covidsCombiedColor[i].color) - 1]);
                    }
                } else if (covidsCombiedColor[i].name == 'mandalay-gp') {
                    if (!toggle) {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + cv_pos[parseInt(covidsCombiedColor[i].color) - 1]);
                    } else {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + cv_pos_sus[parseInt(covidsCombiedColor[i].color) - 1]);
                    }
                } else {
                    if (!toggle) {
                        $('#' + covidsCombiedColor[i].name).attr('style', 'fill:' + cv_pos[parseInt(covidsCombiedColor[i].color) - 1]);
                    } else {
                        $('#' + covidsCombiedColor[i].name).attr('style', 'fill:' + cv_pos_sus[parseInt(covidsCombiedColor[i].color) - 1]);
                    }
                }

            }
        }

        function modeKhayines(zawPosActKyColor) {
            disKhayines();
            disTownships();
            disDivisions();
            showKhayines();
            colorClassRemover();
            for (i in zawPosActKyColor) {
                var element = document.getElementById(zawPosActKyColor[i].name);
                if (!toggle) {
                    element.classList.add(cv_pos2[parseInt(zawPosActKyColor[i].color) - 1]);
                } else {
                    element.classList.add(cv_pos_sus2[parseInt(zawPosActKyColor[i].color) - 1]);
                }
                //$('#' + covids_positives_combied_color_kharines_color[i].name).attr('style', 'fill:' + cv_pos[parseInt(covids_positives_combied_color_kharines_color[i].color)-1]);
            }
        }

        function modeDivisions(zawPosActDivColor) {
            disKhayines();
            disTownships();
            disDivisions();
            showDivisions();
            colorClassRemover();
            for (i in zawPosActDivColor) {
                var element = document.getElementById(zawPosActDivColor[i].name);
                if (!toggle) {
                    element.classList.add(cv_pos2[parseInt(zawPosActDivColor[i].color) - 1]);
                } else {
                    element.classList.add(cv_pos_sus2[parseInt(zawPosActDivColor[i].color) - 1]);
                }
                //$('#' + covids_positives_combied_color_kharines_color[i].name).attr('style', 'fill:' + cv_pos[parseInt(covids_positives_combied_color_kharines_color[i].color)-1]);
            }
            // for (i in covids_positives_combied_color_divisions_mod_color) {
            //     var element = document.getElementById(covids_positives_combied_color_divisions_mod_color[i].name);
            //     element.classList.add(cv_pos2[parseInt(covids_positives_combied_color_divisions_mod_color[i].color)-1]);
            //     //$('#' + covids_positives_combied_color_kharines_color[i].name).attr('style', 'fill:' + cv_pos[parseInt(covids_positives_combied_color_kharines_color[i].color)-1]);
            // }
        }

        function colorClassRemover() {
            if (mode == 'ky') {
                for (i in khayines) {
                    element = document.getElementById(khayines[i]);
                    //elements[i].classList.removeClass('fce9e8');
                    element.classList.remove('fce9e8');
                    element.classList.remove('f9d4d2');
                    element.classList.remove('f6bebb');
                    element.classList.remove('f3a9a5');
                    element.classList.remove('f0938e');
                    element.classList.remove('ed7d78');
                    element.classList.remove('ea6861');
                    element.classList.remove('e8524a');
                    element.classList.remove('e74c44');
                    element.classList.remove('e53d34');

                    element.classList.remove('ffd480');
                    element.classList.remove('ffcc66');
                    element.classList.remove('ffc34d');
                    element.classList.remove('ffbb33');
                    element.classList.remove('ffb31a');
                    element.classList.remove('ffaa00');
                    element.classList.remove('e69900');
                    element.classList.remove('cc8800');
                    element.classList.remove('b37700');
                    element.classList.remove('cc96600');
                }
            } else if (mode == 'div') {
                for (i in divisions) {
                    element = document.getElementById(divisions[i]);
                    //elements[i].classList.removeClass('fce9e8');
                    element.classList.remove('fce9e8');
                    element.classList.remove('f9d4d2');
                    element.classList.remove('f6bebb');
                    element.classList.remove('f3a9a5');
                    element.classList.remove('f0938e');
                    element.classList.remove('ed7d78');
                    element.classList.remove('ea6861');
                    element.classList.remove('e8524a');
                    element.classList.remove('e74c44');
                    element.classList.remove('e53d34');

                    element.classList.remove('ffd480');
                    element.classList.remove('ffcc66');
                    element.classList.remove('ffc34d');
                    element.classList.remove('ffbb33');
                    element.classList.remove('ffb31a');
                    element.classList.remove('ffaa00');
                    element.classList.remove('e69900');
                    element.classList.remove('cc8800');
                    element.classList.remove('b37700');
                    element.classList.remove('cc96600');
                }
            }


        }


        $(document).ready(function () {

            //modeTownShips();
            var covidsCombied = [];
            $('.tooltipster').tooltipster({
                animation: 'fade',
                delay: 0,
                theme: ['tooltipster-noir', 'tooltipster-noir-customized'],
                trigger: 'click',
                functionAfter: function (instance, helper) {

                    // var x = document.getElementById("mobile-svg");
                    // var y = x.getElementsByClassName("hoveredShwe");
                    // var i;
                    // for (i = 0; i < y.length; i++) {
                    //   y[i].classList.remove("hoveredShwe");
                    // }
                }
            });
            var tempColor = '';
            var recentID = '';
            var clickedShwe = false;
            $('#closeResult').on('click', function () {
                $('#searchBox').removeClass('has');
                $('#resultBox').addClass('closed');
                if (recentID != '') {
                    document.getElementById(recentID).classList.remove("clickedShwe");
                }
            });

            $(document).on('click', '.search-filter', function () {
                $('#searchBox').removeClass('has');
                $('#resultBox').removeClass('closed');
                $('#searchInput').val($(this).find('span').html());
                $('#searchFilter').html('');
                if (recentID != '') {
                    document.getElementById(recentID).classList.remove("clickedShwe");
                }
                clickedShwe = true;
                var searchItem = $(this).attr("id2");
                window.panZoom.resetZoom();
                window.panZoom.resetPan();
                recentID = searchItem;
                var element = document.getElementById(searchItem);

                element.classList.add("clickedShwe");

                var info = takeInfo(searchItem);
                if (info.length == 0) {

                }
                if (mode == 'div') {
                    for (i in divisions_mm) {
                        if (divisions_mm[i][0].substr(4) == info[0]) {
                            info[0] = divisions_mm[i][2];
                            break;
                        }
                    }
                } else if (mode == 'ky') {
                    for (i in khayines_mm) {
                        if (khayines_mm[i][0].substr(3) == info[0]) {
                            info[0] = khayines_mm[i][2];
                            break;
                        }
                    }
                } else {
                    if (info[0] == 'yangon') {
                        info[0] = 'yangon-gp';
                    } else if (info[0] == 'mandalay') {
                        info[0] = 'mandalay-gp';
                    }
                    for (i in townships_mm) {
                        if (townships_mm[i][0] == info[0]) {
                            info[0] = townships_mm[i][2];
                            break;
                        }
                    }
                }
                $('#resultName').html(info[0]);
                $('#resultPuinsuspect').html(info[1]);
                $('#resultLabnegative').html(info[2]);
                $('#resultLabpending').html(info[3]);
                $('#resultDie').html(info[4]);
                $('#resultRecovered').html(info[5]);
                $('#resultLabconfirmed').html(info[6]);
            });

            function takeInfo(iD) {
                if (mode == 'ts') {
                    var info = [];
                    var found = false;
                    for (i in covidsCombined) {
                        if (iD == covidsCombined[i].name) {
                            if (iD == 'yangon-gp') {
                                iD = 'yangon';
                            } else if (iD == 'mandalay-gp') {
                                iD = 'mandalay';
                            }
                            info.push(iD);
                            info.push(covidsCombined[i].puinsuspect);
                            info.push(covidsCombined[i].lab_negative);
                            info.push(covidsCombined[i].lab_pending);
                            info.push(covidsCombined[i].die);
                            info.push(covidsCombined[i].recovered);
                            info.push(covidsCombined[i].lab_confirmed);
                            found = true;
                            break;
                        }
                    }
                    if (!found) {
                        if (iD == 'yangon-gp') {
                            iD = 'yangon';
                        } else if (iD == 'mandalay-gp') {
                            iD = 'mandalay';
                        }

                        info.push(iD);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                    }
                } else if (mode == 'ky') {
                    var info = [];
                    var found = false;
                    for (i in covid_khayines) {
                        if (iD == covid_khayines[i].name) {
                            var iD = iD.substr(3);
                            info.push(iD);
                            info.push(covid_khayines[i].puinsuspect);
                            info.push(covid_khayines[i].lab_negative);
                            info.push(covid_khayines[i].lab_pending);
                            info.push(covid_khayines[i].die);
                            info.push(covid_khayines[i].recovered);
                            info.push(covid_khayines[i].lab_confirmed);
                            found = true;
                            break;
                        }
                    }
                    if (!found) {
                        var iD = iD.substr(3);
                        info.push(iD);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                    }
                } else if (mode == 'div') {
                    var info = [];
                    var found = false;
                    for (i in covid_tines) {
                        if (iD == covid_tines[i].name) {
                            var iD = iD.substr(4);
                            info.push(iD);
                            info.push(covid_tines[i].puinsuspect);
                            info.push(covid_tines[i].lab_negative);
                            info.push(covid_tines[i].lab_pending);
                            info.push(covid_tines[i].die);
                            info.push(covid_tines[i].recovered);
                            info.push(covid_tines[i].lab_confirmed);
                            found = true;
                            break;
                        }
                    }
                    if (!found) {
                        var iD = iD.substr(4);
                        info.push(iD);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                    }
                }

                // if(!found) {
                //     info.push(covids_positives_combied_color[i].name);
                //     info.push(covids_positives_combied_color[i].number);
                //     info.push(covids_positives_combied_color[i].color);
                // }
                return info;
            }

            var recentTtip = 'div-yangon';
            $('.tooltipster').click(function () {
                //var x = document.getElementById("mobile-svg");
                //var y = document.getElementsByClassName("hoveredShwe");
                //var i;
                // for (i = 0; i < y.length; i++) {
                //   y[i].classList.remove("hoveredShwe");
                // }
                console.log(recentTtip);
                document.getElementById(recentTtip).classList.remove('hoveredShwe');

                var undefine = $(this).parent().attr('id');
                var iD = $(this).attr('id');


                setTimeout(function () {
                    if (iD == null) {
                        recentTtip = undefine;
                        var element = document.getElementById(undefine);
                        element.classList.add("hoveredShwe");
                    } else {
                        recentTtip = iD;
                        var element = document.getElementById(iD);
                        element.classList.add("hoveredShwe");
                    }
                    // if (recentID != '') {
                    //     $('.clickedShwe').tooltipster('close');
                    //
                    // }
                    // clickedShwe = false;
                    if (recentID != '') {
                        //document.getElementById(recentID).classList.remove("clickedShwe");
                    }
                    if (mode == "ts") {

                        if (iD == null) {

                            var info = takeInfo(undefine);

                            if (info[0] == 'yangon') {
                                info[0] = 'yangon-gp';
                            } else if (info[0] == 'mandalay') {
                                info[0] = 'mandalay-gp';
                            }

                            for (i in townships_mm) {
                                if (townships_mm[i][0] == info[0]) {
                                    info[0] = townships_mm[i][2];
                                    break;
                                }
                            }
                            if (info.length == 0) {

                                $('.tooltipster-content').html(
                                    '<p class="font-weight-bold mb-1">' +
                                    info[0] +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(တွေ့ရှိ)' +
                                    '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စောင့်ကြည့်/သံသယ' +
                                    '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'သေဆုံး လူနာ' +
                                    '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'အဖြေ စောင့်ဆိုင်းဆဲ' +
                                    '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'ပြန်လည်ကောင်းမွန်' +
                                    '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(မတွေ့)' +
                                    '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>'
                                );

                            } else {
                                if (info[1] == null) {
                                    info[1] = 0;
                                }
                                if (info[2] == null || info[2] == '#fff') {
                                    info[2] = 0;
                                }
                                if (info[3] == null) {
                                    info[3] = 0;
                                }
                                if (info[4] == null) {
                                    info[4] = 0;
                                }
                                if (info[5] == null) {
                                    info[5] = 0;
                                }
                                if (info[6] == null) {
                                    info[6] = 0;
                                }
                                $('.tooltipster-content').html(
                                    '<p class="font-weight-bold mb-1">' +
                                    info[0] +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(တွေ့ရှိ)' +
                                    '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                    info[6] +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စောင့်ကြည့်/သံသယ' +
                                    '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                    info[1] +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'သေဆုံး လူနာ' +
                                    '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                    info[4] +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'အဖြေ စောင့်ဆိုင်းဆဲ' +
                                    '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                    info[3] +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'ပြန်လည်ကောင်းမွန်' +
                                    '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                    info[5] +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(မတွေ့)' +
                                    '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                    info[2] +
                                    '</span>' +
                                    '</p>'
                                );
                            }


                        } else {

                            var info = takeInfo(iD);
                            for (i in townships_mm) {
                                if (townships_mm[i][0] == info[0]) {
                                    info[0] = townships_mm[i][2];
                                    break;
                                }
                            }

                            if (info.length == 0) {

                                $('.tooltipster-content').html(
                                    '<p class="font-weight-bold mb-1">' +
                                    info[0] +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(တွေ့ရှိ)' +
                                    '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စောင့်ကြည့်/သံသယ' +
                                    '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'သေဆုံး လူနာ' +
                                    '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'အဖြေ စောင့်ဆိုင်းဆဲ' +
                                    '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'ပြန်လည်ကောင်းမွန်' +
                                    '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(မတွေ့)' +
                                    '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                    '0' +
                                    '</span>' +
                                    '</p>'
                                );

                            } else {
                                if (info[1] == null) {
                                    info[1] = 0;
                                }
                                if (info[2] == null || info[2] == '#fff') {
                                    info[2] = 0;
                                }
                                if (info[3] == null) {
                                    info[3] = 0;
                                }
                                if (info[4] == null) {
                                    info[4] = 0;
                                }
                                if (info[5] == null) {
                                    info[5] = 0;
                                }
                                if (info[6] == null) {
                                    info[6] = 0;
                                }
                                $('.tooltipster-content').html(
                                    '<p class="font-weight-bold mb-1">' +
                                    info[0] +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(တွေ့ရှိ)' +
                                    '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                    info[6] +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စောင့်ကြည့်/သံသယ' +
                                    '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                    info[1] +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'သေဆုံး လူနာ' +
                                    '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                    info[4] +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'အဖြေ စောင့်ဆိုင်းဆဲ' +
                                    '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                    info[3] +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'ပြန်လည်ကောင်းမွန်' +
                                    '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                    info[5] +
                                    '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(မတွေ့)' +
                                    '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                    info[2] +
                                    '</span>' +
                                    '</p>'
                                );
                            }
                        }
                    } else if (mode == 'ky') {
                        if (iD == null) {

                            var info = takeInfo(undefine);
                            for (i in khayines_mm) {
                                if (khayines_mm[i][0].substr(3) == info[0]) {
                                    info[0] = khayines_mm[i][2];
                                    break;
                                }
                            }
                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စစ်ဆေး(တွေ့ရှိ)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                info[6] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စောင့်ကြည့်/သံသယ' +
                                '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                info[1] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'သေဆုံး လူနာ' +
                                '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                info[4] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'အဖြေ စောင့်ဆိုင်းဆဲ' +
                                '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                info[3] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပြန်လည်ကောင်းမွန်' +
                                '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                info[5] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စစ်ဆေး(မတွေ့)' +
                                '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                info[2] +
                                '</span>' +
                                '</p>'
                            );
                        } else {
                            var info = takeInfo(iD);
                            for (i in khayines_mm) {
                                if (khayines_mm[i][0].substr(3) == info[0]) {
                                    info[0] = khayines_mm[i][2];
                                    break;
                                }
                            }
                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စစ်ဆေး(တွေ့ရှိ)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                info[6] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စောင့်ကြည့်/သံသယ' +
                                '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                info[1] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'သေဆုံး လူနာ' +
                                '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                info[4] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'အဖြေ စောင့်ဆိုင်းဆဲ' +
                                '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                info[3] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပြန်လည်ကောင်းမွန်' +
                                '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                info[5] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စစ်ဆေး(မတွေ့)' +
                                '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                info[2] +
                                '</span>' +
                                '</p>'
                            );
                        }
                    } else if (mode == 'div') {
                        if (iD == null) {
                            var info = takeInfo(undefine);
                            for (i in divisions_mm) {
                                if (divisions_mm[i][0].substr(4) == info[0]) {
                                    info[0] = divisions_mm[i][2];
                                    break;
                                }
                            }
                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စစ်ဆေး(တွေ့ရှိ)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                info[6] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စောင့်ကြည့်/သံသယ' +
                                '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                info[1] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'သေဆုံး လူနာ' +
                                '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                info[4] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'အဖြေ စောင့်ဆိုင်းဆဲ' +
                                '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                info[3] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပြန်လည်ကောင်းမွန်' +
                                '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                info[5] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စစ်ဆေး(မတွေ့)' +
                                '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                info[2] +
                                '</span>' +
                                '</p>'
                            );
                        } else {
                            var info = takeInfo(iD);
                            for (i in divisions_mm) {
                                if (divisions_mm[i][0].substr(4) == info[0]) {
                                    info[0] = divisions_mm[i][2];
                                    break;
                                }
                            }
                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စစ်ဆေး(တွေ့ရှိ)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                info[6] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စောင့်ကြည့်/သံသယ' +
                                '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                info[1] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'သေဆုံး လူနာ' +
                                '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                info[4] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'အဖြေ စောင့်ဆိုင်းဆဲ' +
                                '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                info[3] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပြန်လည်ကောင်းမွန်' +
                                '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                info[5] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'စစ်ဆေး(မတွေ့)' +
                                '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                info[2] +
                                '</span>' +
                                '</p>'
                            );
                        }
                    }
                }, 0);
                //$('.tooltipster-content').html('WTF');


            });
            window.panZoom = svgPanZoom('#mobile-svg', {
                zoomEnabled: true
                , controlIconsEnabled: true
                , fit: 1
                , center: 1
                , minZoom: 0.7
                , maxZoom: 6
                , refreshRate: 'auto'
                , customEventsHandler: eventsHandler
                , onZoom: function () {
                    $('.tooltipster').tooltipster('close');
                    //$('#'+recentID).attr('style',tempColor);
                    document.getElementById(recentTtip).classList.remove("hoveredShwe");

                }
            });

            document.getElementById('mobile-svg').addEventListener('mousedown', start_drag);

            function start_drag() {
                //console.log(window.panZoom.getTransform());
                setTimeout(function () {
                    document.getElementById(recentTtip).classList.remove("hoveredShwe");
                }, 0);
            }

            function idToName(idAtt) {
                var newName;

                idAtt = idAtt.replace('div-', '');
                idAtt = idAtt.replace('ky-', '');
                idAtt = idAtt.replace('-gp', '');
                return idAtt;
            }

            function zoomAtKachin() {
                window.panZoom.zoomAtPoint(3, {x: 750, y: -40});
            }

            function zoomAtSagaingTop() {
                window.panZoom.zoomAtPoint(3, {x: 620, y: 0});
            }

            //zoomAtKachin();
            //zoomAtSagaingTop();
            //window.panZoom.pan({x: 50, y: 50})


            $('#zoomIn').on('click', function () {
                window.panZoom.zoomIn();
            });
            $('#zoomReset').on('click', function () {
                window.panZoom.resetZoom();
                window.panZoom.resetPan();
            });
            $('#zoomOut').on('click', function () {
                window.panZoom.zoomOut();
            });

            $('polyline').on('click', function () {
            });

            $('#svg-pan-zoom-controls').attr('style', 'display: none;');

            // $('#div-eshan').addClass('tooltipster');
            // function addTooltips() {
            //     for (i in divisions) {
            //         $('#' + divisions[i]).tooltipster({
            //            animation: 'fade',
            //            delay: 500,
            //            theme: ['tooltipster-noir', 'tooltipster-noir-customized'],
            //            trigger: 'hover'
            //         });
            //     }
            // }
            // addTooltips();

            $('#closeSearch').on('click', function () {
                $('#searchBtnBox').removeClass('close');
                $('#searchBox').addClass('close');
                $('#totalBoxm').removeClass('close');
            });
            $('#searchBtnBox').on('click', function () {
                $('#searchBtnBox').addClass('close');
                $('#searchBox').removeClass('close');
                if ($('#searchBox').hasClass('mobile')) {
                    $('#totalBoxm').addClass('close');
                }
            });
            var ttTownships = [];
            for (i in territories) {
                for (j in territories[i].data) {
                    for (k in territories[i].data[j].data.ts) {
                        ttTownships.push(territories[i].data[j].data.ts[k]);
                    }
                }
            }

            ttTownships.splice($.inArray('y-ahlone', ttTownships), 1);
            ttTownships.splice($.inArray('y-bahan', ttTownships), 1);
            ttTownships.splice($.inArray('y-botahtaung', ttTownships), 1);
            ttTownships.splice($.inArray('y-cocokyun', ttTownships), 1);
            ttTownships.splice($.inArray('y-dagon', ttTownships), 1);
            ttTownships.splice($.inArray('y-dagonmyothitea', ttTownships), 1);
            ttTownships.splice($.inArray('y-dagonmyothitno', ttTownships), 1);
            ttTownships.splice($.inArray('y-dagonmyothitse', ttTownships), 1);
            ttTownships.splice($.inArray('y-dagonmyothitso', ttTownships), 1);
            ttTownships.splice($.inArray('y-dala', ttTownships), 1);
            ttTownships.splice($.inArray('y-dawbon', ttTownships), 1);
            ttTownships.splice($.inArray('y-hlaing', ttTownships), 1);
            ttTownships.splice($.inArray('y-hlaingtharya', ttTownships), 1);
            ttTownships.splice($.inArray('y-kyeemyindaing', ttTownships), 1);
            ttTownships.splice($.inArray('y-mingaladon', ttTownships), 1);
            ttTownships.splice($.inArray('y-mingalartaungnyunt', ttTownships), 1);
            ttTownships.splice($.inArray('y-northokkalapa', ttTownships), 1);
            ttTownships.splice($.inArray('y-pabedan', ttTownships), 1);
            ttTownships.splice($.inArray('y-pazundaung', ttTownships), 1);
            ttTownships.splice($.inArray('y-seikgyikanaungto', ttTownships), 1);
            ttTownships.splice($.inArray('y-seikkan', ttTownships), 1);
            ttTownships.splice($.inArray('y-shwepyithar', ttTownships), 1);
            ttTownships.splice($.inArray('y-tamwe', ttTownships), 1);
            ttTownships.splice($.inArray('y-thingangkuun', ttTownships), 1);
            ttTownships.splice($.inArray('y-yankin', ttTownships), 1);
            ttTownships.splice($.inArray('y-mayangone', ttTownships), 1);
            ttTownships.splice($.inArray('y-insein', ttTownships), 1);
            ttTownships.splice($.inArray('y-kamaryut', ttTownships), 1);
            ttTownships.splice($.inArray('y-lanmadaw', ttTownships), 1);
            ttTownships.splice($.inArray('y-latha', ttTownships), 1);
            ttTownships.splice($.inArray('y-sanchaung', ttTownships), 1);
            ttTownships.splice($.inArray('y-southokkalapa', ttTownships), 1);
            ttTownships.splice($.inArray('y-thaketa', ttTownships), 1);
            ttTownships.push('yangon-gp');


            ttTownships.splice($.inArray('m-aungmyaythazan', ttTownships), 1);
            ttTownships.splice($.inArray('m-chanayethazan', ttTownships), 1);
            ttTownships.splice($.inArray('m-chanmyathazi', ttTownships), 1);
            ttTownships.splice($.inArray('m-mahaaungmyay', ttTownships), 1);
            ttTownships.splice($.inArray('m-pyigyitagon', ttTownships), 1);

            ttTownships.push('mandalay-gp');

            ttTownships.sort();
            ttTownships = townships_mm;
            console.log(ttTownships);
            var ttKhayines = [];
            for (i in territories) {
                for (j in territories[i].data) {
                    ttKhayines.push(territories[i].data[j].ky);
                }
            }
            ttKhayines.sort();

            var ttDivisions = [];
            for (i in territories) {
                ttDivisions.push(territories[i].div);
            }
            ttDivisions.sort();
            ttDivisions = divisions_mm;
            ttKhayines = khayines_mm;
            $('#searchInput').on('focus', function () {
                if ($(this).val() != '') {
                    $('#searchBox').addClass('has');
                } else {
                    $('#searchBox').removeClass('has');
                }
                $('#resultBox').addClass('closed');
                if (recentID != '') {
                    document.getElementById(recentID).classList.remove("clickedShwe");
                }

                if ($(this).val() != '') {
                    var tempSearch = [];
                    max = 0;
                    if (mode == 'ts') {
                        for (i in ttTownships) {
                            if ((ttTownships[i][1].indexOf($(this).val()) >= 0 && max < 5) || (ttTownships[i][2].indexOf($(this).val()) >= 0 && max < 5)) {
                                tempSearch.push(ttTownships[i]);
                                max++;
                            }
                        }
                    } else if (mode == 'ky') {
                        for (i in ttKhayines) {
                            if ((ttKhayines[i][1].indexOf($(this).val()) >= 0 && max < 5) || (ttKhayines[i][2].indexOf($(this).val()) >= 0 && max < 5)) {
                                tempSearch.push(ttKhayines[i]);
                                max++;
                            }
                        }
                    } else {
                        for (i in ttDivisions) {
                            if ((ttDivisions[i][1].indexOf($(this).val()) >= 0 && max < 5) || (ttDivisions[i][2].indexOf($(this).val()) >= 0 && max < 5)) {
                                tempSearch.push(ttDivisions[i]);
                                max++;
                            }
                        }
                    }
                    var searchDivs = ''
                    for (i in tempSearch) {
                        // searchDivs += '<div style="z-index:1;" class="shwe-button search-filter" id2="' + tempSearch[i] + '"><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;">' + idToName(tempSearch[i]) + '</span></div>'
                        searchDivs += '<div style="z-index:1;" class="shwe-button search-filter" id2="' + tempSearch[i][0] + '"><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;">' + tempSearch[i][2] + '</span></div>'
                    }
                    if (searchDivs == '') {
                        searchDivs = '<div style="z-index:1;" class=""><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;color: #8c8c8c">no result</span></div>';
                    }
                    $('#searchFilter').html(searchDivs);
                } else {
                    $('#searchFilter').html('');
                }
            });


            function myFunction1(x) {
                if (x.matches) { // If media query matches
                    $('.navbar').addClass('change');
                    if (navigator.userAgent.match(/(iPhone|iPod|iPad)/i)) {
                        $('.myanmar-map').addClass('iphone');
                    } else {
                        $('.myanmar-map').addClass('mobile');
                    }
                    $('#map-container').addClass('mobile');
                    $('#scroll-down').removeClass('not-mobile');
                    $('#color-bar-con').addClass('mobile');
                    $('#color-range-con').addClass('mobile');
                    $('body').addClass('body-mobile');
                    $('body').removeClass('body-not-mobile');
                    $('.my-wrapper').removeClass('not-mobile');
                } else {
                    $('.navbar').removeClass('change');
                    if (navigator.userAgent.match(/(iPhone|iPod|iPad)/i)) {
                        $('.myanmar-map').removeClass('iphone');
                    } else {
                        $('.myanmar-map').removeClass('mobile');
                    }
                    $('#map-container').removeClass('mobile');
                    $('#scroll-down').addClass('not-mobile');
                    $('#color-bar-con').removeClass('mobile');
                    $('#color-range-con').removeClass('mobile');
                    $('body').addClass('body-not-mobile');
                    $('body').removeClass('body-mobile');
                    $('.my-wrapper').addClass('not-mobile');
                }
            }

            var x = window.matchMedia("(max-width: 767px)")
            myFunction1(x) // Call listener function at run time
            x.addListener(myFunction1)

            function myFunction2(x) {
                if (x.matches) {
                    $('.myanmar-map').addClass('tablet');
                    $('#map-container').addClass('tablet');
                } else {
                    $('.myanmar-map').removeClass('tablet');
                    $('#map-container').removeClass('tablet');
                }
            }

            var x = window.matchMedia("(max-width: 991px)")
            myFunction2(x) // Call listener function at run time
            x.addListener(myFunction2)

            $('#searchInput').on('keyup', function () {
                if ($(this).val() != '') {
                    $('#searchBox').addClass('has');
                } else {
                    $('#searchBox').removeClass('has');
                }
                // $('#resultBox').
                $('#resultBox').addClass('closed');
                if ($(this).val() != '') {
                    var tempSearch = [];
                    max = 0;
                    if (mode == 'ts') {
                        for (i in ttTownships) {
                            if ((ttTownships[i][1].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max < 5) || (ttTownships[i][2].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max < 5)) {
                                tempSearch.push(ttTownships[i]);
                                max++;
                            }
                        }
                    } else if (mode == 'ky') {
                        for (i in ttKhayines) {
                            if ((ttKhayines[i][1].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max < 5) || (ttKhayines[i][2].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max < 5)) {
                                tempSearch.push(ttKhayines[i]);
                                max++;
                            }
                        }
                    } else {
                        for (i in ttDivisions) {
                            if ((ttDivisions[i][1].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max < 5) || (ttDivisions[i][2].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max < 5)) {
                                tempSearch.push(ttDivisions[i]);
                                max++;
                            }
                        }
                    }
                    console.log(tempSearch);
                    var searchDivs = ''
                    for (i in tempSearch) {
                        // searchDivs += '<div style="z-index:1;" class="shwe-button search-filter" id2="' + tempSearch[i] + '"><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;">' + idToName(tempSearch[i]) + '</span></div>'
                        searchDivs += '<div style="z-index:1;" class="shwe-button search-filter" id2="' + tempSearch[i][0] + '"><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;">' + tempSearch[i][2] + '</span></div>'
                    }
                    if (searchDivs == '') {
                        searchDivs = '<div style="z-index:1;" class=""><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;color: #8c8c8c">no result</span></div>';
                    }
                    $('#searchFilter').html(searchDivs);
                } else {
                    $('#searchFilter').html('');
                }
            });


            function triggerEvent(elem, event) {
                var clickEvent = new Event(event); // Create the event.
                elem.dispatchEvent(clickEvent);    // Dispatch the event.
            }

            //$('#pyinmana').trigger('mouseover');
            //$("ins[data-radio|='option5']").trigger('click');


            setTimeout(function () {
                $('#page-loader').addClass('close');
            }, 500);

        });

        function changeColorBar(number) {
            console.log('fuck');
            var x = document.getElementsByClassName("color-bar");
            var y = document.getElementsByClassName("color-range");
            var i, j;
            console.log(toggle);
            if (!toggle) {
                for (i = 0; i < x.length; i++) {
                    x[i].setAttribute('style', 'background:' + cv_pos[i] + ';');
                }
            } else {
                for (i = 0; i < x.length; i++) {
                    x[i].setAttribute('style', 'background:' + cv_pos_sus[i] + ';');
                }
            }
            var start = 0;
            var range = parseInt(number) / 10;
            for (i = 0; i < y.length; i++) {
                console.log(start);
                if (i == y.length - 1) {
                    y[i].innerHTML = Math.ceil(start) + '-' + (number + 1);
                } else {
                    y[i].innerHTML = Math.ceil(start) + '-' + Math.ceil(start + range);
                }
                start = start + range;
            }

        }

        changeColorBar(maxDivPos);


        $("#radios").radiosToSlider();
        $("#radios").radiosToSlider({
            size: 'medium',
            animation: true,
            fitContainer: true,
            isDisable: false,
            onSelect: 0
        });

        $('#mode-tine').on('click', function () {
            $('.mode-btn').removeClass('active');
            $(this).addClass('active');
            //modeDivisions();
            mode = 'div';
            changeAll();
            $('#searchInput').val('');
            $('#searchFilter').html('');
            $('#searchInput').attr("placeholder", "တိုင်းဒေသကြီး ရှာဖွေရန်");
        });
        $('#mode-khayine').on('click', function () {
            $('.mode-btn').removeClass('active');
            $(this).addClass('active');
            // modeKhayines(covids_khayines_color);
            mode = 'ky';
            changeAll();
            $('#searchInput').val('');
            $('#searchFilter').html('');
            $('#searchInput').attr("placeholder", "ခရိုင် ရှာဖွေရန်");
        });
        $('#mode-township').on('click', function () {
            $('.mode-btn').removeClass('active');
            $(this).addClass('active');
            //modeTownShips(covids_combied_color);
            mode = 'ts';
            changeAll();
            $('#searchInput').val('');
            $('#searchFilter').html('');
            $('#searchInput').attr("placeholder", "မြို့နယ် ရှာဖွေရန်");
        });
        var covids_combied = [];
        var covids_combied_color = [];

        var covids_khayines_color = [];
        $('#mode-tine').trigger('click');

        $('#toggle-switch').on('change', function () {
            toggle = $(this).prop('checked');
            if(!toggle) {
                $('.custom-control-label').html('စစ်ဆေး(တွေ့ရှိ)');
            } else {
                $('.custom-control-label').html('စောင့်/သံသယ');
            }
            changeAll();
        });

        $('#toggle-switch').trigger('click');
        $('#toggle-switch').trigger('click');

        function changeAll() {
            if (mode == 'div') {
                function info2MapDiv(covid_tines, toggle) {
                    if (!toggle) {
                        changeColorBar(maxDivPos);
                        covids_tines_color = [];
                        var posMax3 = parseInt(covid_tines[0].lab_confirmed);
                        for (i in covid_tines) {
                            if (posMax3 < parseInt(covid_tines[i].lab_confirmed)) {
                                posMax3 = covid_tines[i++].lab_confirmed;
                            }
                        }
                        //var zawPosActKyColor = [];
                        for (i in covid_tines) {
                            var colorCode = parseInt((covid_tines[i].lab_confirmed / posMax3) * 10);
                            if (colorCode == 0) {
                                colorCode = 1;
                            }
                            if (covid_tines[i].lab_confirmed != 0) {
                                covids_tines_color.push({
                                    "name": covid_tines[i].name,
                                    "number": covid_tines[i].lab_confirmed,
                                    "color": colorCode
                                })
                            }
                        }

                    } else {
                        changeColorBar(maxDivSus);
                        covids_tines_color = [];
                        var posMax3 = parseInt(covid_tines[0].puinsuspect);
                        for (i in covid_tines) {
                            if (posMax3 < parseInt(covid_tines[i].puinsuspect)) {
                                posMax3 = covid_tines[i++].puinsuspect;
                            }
                        }
                        //var zawPosActKyColor = [];
                        for (i in covid_tines) {
                            var colorCode = parseInt((covid_tines[i].puinsuspect / posMax3) * 10);
                            if (colorCode == 0) {
                                colorCode = 1;
                            }
                            if (covid_tines[i].puinsuspect != 0) {
                                covids_tines_color.push({
                                    "name": covid_tines[i].name,
                                    "number": covid_tines[i].puinsuspect,
                                    "color": colorCode
                                })
                            }

                        }
                    }
                    return covids_tines_color;
                }

                var covidsCombiedColorDiv = [];
                covidsCombiedColorDiv = info2MapDiv(covid_tines, toggle);
                modeDivisions(covidsCombiedColorDiv);
            } else if (mode == 'ky') {
                function info2MapKy(covid_khayines, toggle) {
                    if (!toggle) {
                        changeColorBar(maxKyPos);
                        covids_khayines_color = [];
                        var posMax2 = parseInt(covid_khayines[0].lab_confirmed);
                        for (i in covid_khayines) {
                            if (posMax2 < parseInt(covid_khayines[i].lab_confirmed)) {
                                posMax2 = covid_khayines[i++].lab_confirmed;
                            }
                        }
                        //var zawPosActKyColor = [];
                        for (i in covid_khayines) {
                            var colorCode = parseInt((covid_khayines[i].lab_confirmed / posMax2) * 10);
                            if (colorCode == 0) {
                                colorCode = 1;
                            }
                            if (covid_khayines[i].lab_confirmed != 0) {
                                covids_khayines_color.push({
                                    "name": covid_khayines[i].name,
                                    "number": covid_khayines[i].lab_confirmed,
                                    "color": colorCode
                                })
                            }
                        }

                    } else {
                        changeColorBar(maxKySus);
                        covids_khayines_color = [];
                        var posMax2 = parseInt(covid_khayines[0].puinsuspect);
                        for (i in covid_khayines) {
                            if (posMax2 < parseInt(covid_khayines[i].puinsuspect)) {
                                posMax2 = covid_khayines[i++].puinsuspect;
                            }
                        }
                        //var zawPosActKyColor = [];
                        for (i in covid_khayines) {
                            var colorCode = parseInt((covid_khayines[i].puinsuspect / posMax2) * 10);
                            if (colorCode == 0) {
                                colorCode = 1;
                            }
                            if (covid_khayines[i].puinsuspect != 0) {
                                covids_khayines_color.push({
                                    "name": covid_khayines[i].name,
                                    "number": covid_khayines[i].puinsuspect,
                                    "color": colorCode
                                })
                            }

                        }
                    }
                    return covids_khayines_color;
                }

                var covidsCombiedColorKy = [];
                covidsCombiedColorKy = info2MapKy(covid_khayines, toggle);
                modeKhayines(covidsCombiedColorKy);
            } else {
                function info2MapTs(zawvids_positives, toggle) {
                    var covids_combied = [];
                    var covids_combied_color = [];
                    if (!toggle) {
                        changeColorBar(maxTsPos);
                        for (i in zawvids_positives) {
                            if (!(zawvids_positives[i].name.indexOf("m-") >= 0) && !(zawvids_positives[i].name.indexOf("y-") >= 0)) {
                                covids_combied.push({
                                    "name": zawvids_positives[i].name,
                                    "number": zawvids_positives[i].lab_confirmed,
                                    "puinsuspect": zawvids_positives[i].puinsuspect,
                                    "pui": zawvids_positives[i].pui,
                                    "suspected": zawvids_positives[i].suspected,
                                    "lab_negative": zawvids_positives[i].lab_negative,
                                    "lab_pending": zawvids_positives[i].lab_pending,
                                    "die": zawvids_positives[i].die,
                                    "recovered": zawvids_positives[i].recovered,
                                    "lab_confirmed": zawvids_positives[i].lab_confirmed
                                });
                            }
                        }

                        var mpuinsuspect = 0;
                        var mpui = 0;
                        var msuspected = 0;
                        var mlab_negative = 0;
                        var mlab_pending = 0;
                        var mdie = 0;
                        var mrecovered = 0;
                        var mlab_confirmed = 0;
                        for (i in zawvids_positives) {
                            if (zawvids_positives[i].name.indexOf("m-") >= 0) {
                                mpuinsuspect += parseInt(zawvids_positives[i].puinsuspect);
                                mpui += parseInt(zawvids_positives[i].pui);
                                msuspected += parseInt(zawvids_positives[i].suspected);
                                mlab_negative += parseInt(zawvids_positives[i].lab_negative);
                                mlab_pending += parseInt(zawvids_positives[i].lab_pending);
                                mdie += parseInt(zawvids_positives[i].die);
                                mrecovered += parseInt(zawvids_positives[i].recovered);
                                mlab_confirmed += parseInt(zawvids_positives[i].lab_confirmed);
                            }
                        }
                        covids_combied.push({
                            "name": "mandalay-gp",
                            "number": mlab_confirmed,
                            "puinsuspect": mpuinsuspect,
                            "pui": mpui,
                            "suspected": msuspected,
                            "lab_negative": mlab_negative,
                            "lab_pending": mlab_pending,
                            "die": mdie,
                            "recovered": mrecovered,
                            "lab_confirmed": mlab_confirmed
                        });
                        // if(mnum > 0) {
                        //
                        // }

                        var ypuinsuspect = 0;
                        var ypui = 0;
                        var ysuspected = 0;
                        var ylab_negative = 0;
                        var ylab_pending = 0;
                        var ydie = 0;
                        var yrecovered = 0;
                        var ylab_confirmed = 0;
                        for (i in zawvids_positives) {
                            if (zawvids_positives[i].name.indexOf("y-") >= 0) {
                                ypuinsuspect += parseInt(zawvids_positives[i].puinsuspect);
                                ypui += parseInt(zawvids_positives[i].pui);
                                ysuspected += parseInt(zawvids_positives[i].suspected);
                                ylab_negative += parseInt(zawvids_positives[i].lab_negative);
                                ylab_pending += parseInt(zawvids_positives[i].lab_pending);
                                ydie += parseInt(zawvids_positives[i].die);
                                yrecovered += parseInt(zawvids_positives[i].recovered);
                                ylab_confirmed += parseInt(zawvids_positives[i].lab_confirmed);
                            }
                        }
                        covids_combied.push({
                            "name": "yangon-gp",
                            "number": ylab_confirmed,
                            "puinsuspect": ypuinsuspect,
                            "pui": ypui,
                            "suspected": ysuspected,
                            "lab_negative": ylab_negative,
                            "lab_pending": ylab_pending,
                            "die": ydie,
                            "recovered": yrecovered,
                            "lab_confirmed": ylab_confirmed
                        });
                    } else {
                        changeColorBar(maxTsSus);
                        for (i in zawvids_positives) {
                            if (!(zawvids_positives[i].name.indexOf("m-") >= 0) && !(zawvids_positives[i].name.indexOf("y-") >= 0)) {
                                covids_combied.push({
                                    "name": zawvids_positives[i].name,
                                    "number": zawvids_positives[i].puinsuspect,
                                    "puinsuspect": zawvids_positives[i].puinsuspect,
                                    "pui": zawvids_positives[i].pui,
                                    "suspected": zawvids_positives[i].suspected,
                                    "lab_negative": zawvids_positives[i].lab_negative,
                                    "lab_pending": zawvids_positives[i].lab_pending,
                                    "die": zawvids_positives[i].die,
                                    "recovered": zawvids_positives[i].recovered,
                                    "lab_confirmed": zawvids_positives[i].lab_confirmed
                                });
                            }
                        }

                        var mpuinsuspect = 0;
                        var mpui = 0;
                        var msuspected = 0;
                        var mlab_negative = 0;
                        var mlab_pending = 0;
                        var mdie = 0;
                        var mrecovered = 0;
                        var mlab_confirmed = 0;
                        for (i in zawvids_positives) {
                            if (zawvids_positives[i].name.indexOf("m-") >= 0) {
                                mpuinsuspect += parseInt(zawvids_positives[i].puinsuspect);
                                mpui += parseInt(zawvids_positives[i].pui);
                                msuspected += parseInt(zawvids_positives[i].suspected);
                                mlab_negative += parseInt(zawvids_positives[i].lab_negative);
                                mlab_pending += parseInt(zawvids_positives[i].lab_pending);
                                mdie += parseInt(zawvids_positives[i].die);
                                mrecovered += parseInt(zawvids_positives[i].recovered);
                                mlab_confirmed += parseInt(zawvids_positives[i].lab_confirmed);
                            }
                        }
                        covids_combied.push({
                            "name": "mandalay-gp",
                            "number": mpuinsuspect,
                            "puinsuspect": mpuinsuspect,
                            "pui": mpui,
                            "suspected": msuspected,
                            "lab_negative": mlab_negative,
                            "lab_pending": mlab_pending,
                            "die": mdie,
                            "recovered": mrecovered,
                            "lab_confirmed": mlab_confirmed
                        });
                        // if(mnum > 0) {
                        //
                        // }

                        var ypuinsuspect = 0;
                        var ypui = 0;
                        var ysuspected = 0;
                        var ylab_negative = 0;
                        var ylab_pending = 0;
                        var ydie = 0;
                        var yrecovered = 0;
                        var ylab_confirmed = 0;
                        for (i in zawvids_positives) {
                            if (zawvids_positives[i].name.indexOf("y-") >= 0) {
                                ypuinsuspect += parseInt(zawvids_positives[i].puinsuspect);
                                ypui += parseInt(zawvids_positives[i].pui);
                                ysuspected += parseInt(zawvids_positives[i].suspected);
                                ylab_negative += parseInt(zawvids_positives[i].lab_negative);
                                ylab_pending += parseInt(zawvids_positives[i].lab_pending);
                                ydie += parseInt(zawvids_positives[i].die);
                                yrecovered += parseInt(zawvids_positives[i].recovered);
                                ylab_confirmed += parseInt(zawvids_positives[i].lab_confirmed);
                            }
                        }
                        covids_combied.push({
                            "name": "yangon-gp",
                            "number": ypuinsuspect,
                            "puinsuspect": ypuinsuspect,
                            "pui": ypui,
                            "suspected": ysuspected,
                            "lab_negative": ylab_negative,
                            "lab_pending": ylab_pending,
                            "die": ydie,
                            "recovered": yrecovered,
                            "lab_confirmed": ylab_confirmed
                        });
                    }
                    covidsCombined = covids_combied;
                    console.log(covids_combied);
                    var posMax = parseInt(covids_combied[0].number);
                    for (i in covids_combied) {
                        if (posMax < parseInt(covids_combied[i].number)) {
                            posMax = parseInt(covids_combied[i++].number);
                        }
                    }
                    for (i in covids_combied) {
                        var colorCode = parseInt((parseInt(covids_combied[i].number) / posMax) * 10);
                        if (colorCode == 0) {
                            colorCode = 1;
                        }
                        if (parseInt(covids_combied[i].number) != 0) {
                            covids_combied_color.push({
                                "name": covids_combied[i].name,
                                "number": parseInt(covids_combied[i].number),
                                "color": colorCode
                            });
                        }
                    }
                    return covids_combied_color;
                }

                var covidsCombiedColor = info2MapTs(zawvids_positives, toggle);
                console.log(covidsCombiedColor);
                modeTownShips(covidsCombiedColor);
            }
        }

    };

</script>
<script src='assets/js/tooltipster.bundle.min.js'></script>
<script src='assets/js/jquery.radios-to-slider.js'></script>
<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>

</body>
</html>