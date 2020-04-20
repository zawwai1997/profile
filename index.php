<?php
require_once 'admin/core/init.php';

$districtData = array();
$hospitalData = array();
$townshipData = array();
$stateData = array();

$townshipAry = array();
$districtAry = array();
$regionAry = array();

$Hospitals = $user->get('Hospitals');
$Districts = $user->get('District');
$Townships = $user->get('Townships');
$States = $user->get('States');
$Status = $user->get('Status');
$Status = $Status[0]['status_name'];


$townshipJson = $user->getTownshipJson();
$districtJson = $user->getDistrictJson();
$regionJson = $user->getRegionJson();

$dailyChart = $user->get('Chart');
$query = "SELECT id,name,age,gender,suffer_type_id FROM `Patients` WHERE (Patients.suffer_type_id = 5 or Patients.suffer_type_id = 6 or Patients.suffer_type_id = 7) ";
$dountChart = $user->getData($query);

$maxDivPos = 0;
$maxDivSus = 0;
$maxKyPos = 0;
$maxKySus = 0;
$maxTsPos = 0;
$maxTsSus = 0;

$total_pending = 0;
$total_die = 0;
$total_puinsus = 0;
$total_recovered = 0;
$total_negative = 0;
$total_confirmed = 0;


foreach ($Districts as $district => $dist) {
    $oneDisrict = array(
        $dist['name'], $dist['real_name'], "unicode", "zawgyi"
    );
    array_push($districtData, $oneDisrict);
}

foreach ($Townships as $township => $town) {
    $oneTownship = array(
        $town['name'], $town['real_name'], "unicode", "zawgyi"
    );
    array_push($townshipData, $oneTownship);
}

foreach ($States as $state => $sta) {
    $oneState = array(
        $sta['name'], $sta['real_name'], "unicode", "zawgyi"
    );
    array_push($stateData, $oneState);
}

foreach ($townshipJson as $key => $value) {
    if($value['state_id']!=14){
        if ($maxTsPos < $value['lab_confirmed']) {
            $maxTsPos = $value['lab_confirmed'];
        }
        if ($maxTsSus < $value['suspected'] + $value['pui']) $maxTsSus = $value['suspected'] + $value['pui'];
    }
    $oneTownship = array(
        "name" => $value['db_name'],
        "puinsuspect" => $value['pui'] + $value['suspected'],
        "pui" => $value['pui'],
        "suspected" => $value['suspected'],
        "lab_negative" => $value['lab_negative'],
        "lab_pending" => $value['lab_pending'],
        "die" => $value['death'],
        "recovered" => $value['recovered'],
        "lab_confirmed" => $value['lab_confirmed'],
        "lab_confirmed_now" => $value['lab_confirmed_now'],
        "total_cases" => $value['pui'] + $value['suspected'] + $value['lab_negative'] + $value['lab_pending'] +
            $value['death'] + $value['recovered'] + $value['lab_confirmed_now']
    );
    array_push($townshipAry, $oneTownship);
}

foreach ($districtJson as $key => $value) {
    if($value['state_id']!=14){
        if ($maxKyPos < $value['lab_confirmed']) {
            $maxKyPos = $value['lab_confirmed'];
        }
        if ($maxKySus < $value['suspected'] + $value['pui']) $maxKySus = $value['suspected'] + $value['pui'];
    }


    $oneDistrict = array(
        "name" => $value['db_name'],
        "pui" => $value['pui'],
        "puinsuspect" => $value['pui'] + $value['suspected'],
        "suspected" => $value['suspected'],
        "lab_negative" => $value['lab_negative'],
        "lab_pending" => $value['lab_pending'],
        "die" => $value['death'],
        "recovered" => $value['recovered'],
        "lab_confirmed" => $value['lab_confirmed'],
        "lab_confirmed_now" => $value['lab_confirmed_now'],
        "total_cases" => $value['pui'] + $value['suspected'] + $value['lab_negative'] + $value['lab_pending'] +
            $value['death'] + $value['recovered'] + $value['lab_confirmed_now']
    );
    array_push($districtAry, $oneDistrict);
}

foreach ($regionJson as $key => $value) {
    $total_pending += $value['lab_pending'];
    $total_die += $value['death'];
   // $total_puinsus += $value['pui'] + $value['suspected'];
    $total_puinsus += $value['puinsus'];
    $total_recovered += $value['recovered'];
    $total_negative += $value['lab_negative'];
    $total_confirmed += $value['lab_confirmed_now'] + $value['death'] + $value['recovered'];

    if($value['s_id']!=14){
        if ($maxDivPos < $value['lab_confirmed']) {
            $maxDivPos = $value['lab_confirmed'];
        }
        if ($maxDivSus < $value['suspected'] + $value['pui']) {
            $maxDivSus = $value['suspected'] + $value['pui'];

        }
    }

    $oneRegion = array(
        "name" => $value['db_name'],
        "puinsuspect" => $value['puinsus'],
        "pui" => $value['pui'],
        "suspected" => $value['suspected'],
        "lab_negative" => $value['lab_negative'],
        "lab_pending" => $value['lab_pending'],
        "die" => $value['death'],
        "recovered" => $value['recovered'],
        "lab_confirmed" => $value['lab_confirmed'],
        "lab_confirmed_now" => $value['lab_confirmed_now'],
        "total_cases" => $value['pui'] + $value['suspected'] + $value['lab_negative'] + $value['lab_pending'] +
            $value['death'] + $value['recovered'] + $value['lab_confirmed_now']
    );
    array_push($regionAry, $oneRegion);
}

//die(json_encode($townshipAry));

$dailyCaseAry = array();
$dateAry = array();
$dieCaseAry = array();
$confirmCaseAry = array();



$deathAgeNumAry = array();
$deathGenderNumAry = array();
$confirmAgeNumAry = array();
$confirmGenderNumAry = array();

$ageLabelAry = ["0-17နှစ်", "18နှစ်-44နှစ်", "45နှစ်-64နှစ်", "65နှစ်-74နှစ်", "75နှစ်အထက်"];
$genderLabelAry =  ["ကျား","မ"];
foreach($dailyChart as $key => $value){
    $date = $value['date'];
    $date = strtotime($date);
    $day = intval(date('d',$date));
    $month=date("F",$date);
    $month = substr($month,0,3);
    $result = $month." ".$day;
    array_push($dateAry,$result);
    array_push($confirmCaseAry,$value['confirmed']);
    array_push($dieCaseAry,$value['die']);
}

$dead = array("date"=>$dateAry,"num"=>$dieCaseAry);
$positive = array("date"=>$dateAry,"num"=>$confirmCaseAry);
$dailyResult =array("dead"=>$dead,"positive"=>$positive);

$maleDeath= 0;$femaleDeath = 0; $maleConfirmed = 0 ;$femaleConfirmed = 0;
$d_gp1 = 0 ; $d_gp2 = 0 ; $d_gp3 = 0; $d_gp4 = 0; $d_gp5 = 0;
$c_gp1 = 0 ; $c_gp2 = 0 ; $c_gp3 = 0; $c_gp4 = 0; $c_gp5 = 0;


foreach($dountChart as $key => $value){

    if($value['gender'] == 1)  $maleConfirmed++; else $femaleConfirmed++;

    if     ($value['age'] < 18 ) $c_gp1++;
    else if($value['age'] < 45 ) $c_gp2++;
    else if($value['age'] < 65 ) $c_gp3++;
    else if($value['age'] < 75)  $c_gp4++;
    else                         $c_gp5++;


    if($value['suffer_type_id'] == 5){      //die
        if     ($value['age'] < 18 ) $d_gp1++;
        else if($value['age'] < 45 ) $d_gp2++;
        else if($value['age'] < 65 ) $d_gp3++;
        else if($value['age'] < 75)  $d_gp4++;
        else                         $d_gp5++;

        if($value['gender'] == 1)  $maleDeath++; else  $femaleDeath++;

    }



}



$donutResult =array(
    "dead" => array(
        "age" => array(
            "label" => $ageLabelAry,
            "num"   => [$d_gp1,$d_gp2,$d_gp3,$d_gp4,$d_gp5]
        ),
        "gender" => array(
            "label" => $genderLabelAry,
            "num"   =>[$maleDeath,$femaleDeath]
        )
    ),
    "positive" => array(
        "age" => array(
            "label" => $ageLabelAry,
            "num"   => [$c_gp1,$c_gp2,$c_gp3,$c_gp4,$c_gp5]
        ),
        "gender" => array(
            "label" => $genderLabelAry,
            "num"   =>[$maleConfirmed,$femaleConfirmed]
        )
    )

);

// die(json_encode($donutResult));
// die(json_encode($dailyResult));

//echo "var maxDivPos = ".$maxDivPos."<br>";
//echo "var maxKyPos = ".$maxKyPos."<br>";
//echo "var maxTsPos = ".$maxTsPos."<br>";
//echo "var maxDivSus = ".$maxDivSus."<br>";
//echo "var maxKySus = ".$maxKySus."<br>";
//echo "var maxTsSus = ".$maxTsSus."<br>";
//die();




$total_negative = 3786;
$total_puinsus = 1754;
?>
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

    <style>
        body {
            margin: 0;
            padding: 0;
        }
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

        .mapboxgl-popup-content {
            font: 400 15px/22px "Source Sans Pro", "Helvetica Neue", Sans-serif;
            padding: 0;
            width: 180px;
            padding-bottom: 10px;
        }
        .mapboxgl-popup-content-wrapper {
            padding: 1%;
        }
        .mapboxgl-popup-content h3 {
            background: #33adff;
            color: #fff;
            margin: 0;
            display: block;
            padding: 10px;
            border-radius: 3px 3px 0 0;
            font-weight: 700;
            margin-top: -5px;
            text-align: center;
        }

        .mapboxgl-popup-content h4 {
            margin: 0;
            display: block;
            padding: 2px 10px;
            font-weight: 400;
        }

        .mapboxgl-container .leaflet-marker-icon {
            cursor: pointer;
        }

        .mapboxgl-popup-anchor-top > .mapboxgl-popup-content {
            margin-top: 5px;
        }
        .mapboxgl-popup-close-button {
            color: #fff;
            font-size: large;
            top: -9px;
            padding-right: 2px;
        }
        .mapboxgl-compact {
            display: none;
        }
        .mapboxgl-ctrl-attrib {
            display: none;
        }
        .mapboxgl-ctrl-bottom-left {
            display: none;
        }
        .marker {
            color: red;
            font-weight: bold;
            font-size: 25px;
            cursor: pointer;
        }

        .autocomplete {
            background: #fff;
            position: relative;
            width: 400px;
            float: right;
            /* box-shadow: 0 0 2px rgba(0, 0, 0, 0.12), 0 2px 2px rgba(0, 0, 0, 0.24); */
        }
        .autocomplete .close {
            position: absolute;
            font-size: 13px;
            z-index: 10;
            top: 10px;
            left: calc(100% - 50px);
            color: #aaa;
            cursor: pointer;
            display: none;
        }
        .autocomplete .close.visible {
            display: block;
        }
        input {
            padding: 12px 0 12px 10px;
            font-weight: 300;
            width: 90%;
            border: none;
            outline: none;
            font-size: 14px;
            color: #666;
        }
        .dialog {
            width: 100%;
            display: none;
            min-height: 40px;
            max-height: 330px;
            overflow: scroll;
            border-top: 1px solid #f4f4f4;
        }
        .dialog.open {
            display: block;
        }
        .dialog div {
            padding: 14px 10px;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .dialog div:hover {
            background: #f2f2f2;
        }
        .initialBtn {
            background-color: #fff;
            position: absolute;
            bottom: 120px;
            right: 12px;
            cursor: pointer;
            padding: 5px 5px 0 5px;
            border-radius: 4px;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        }
        .colorDescription {
            position: absolute;
            left: 5px;
            bottom: 10px;
            background-color: #fff;
            font-size: 18px;
            padding: 10px;
            border-radius: 4px;
        }
        .colorItem {
            vertical-align: middle;
        }
        .colorItem i {
            position: relative;
            top: 4px;
            left: 0;
            font-size: 25px;
        }
        .descriptionText {
            padding-left: 10px;
            opacity: 0.7;
        }







    </style>
</head>
<body ng-app="myApp">
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

<div class="my-wrapper">
    <section class="map-section">
        <div class="container" style="height:100%;">
            <div class="row align-items-center"  style="height:100%;">
                <div id="map-container" class="col-12 col-md-6 col-lg-6 order-md-2" style="width: 100%;height:100%;">
                    <a href="#!detail" id="detailMap" style="display: none;position:absolute;width:66px;left:20px;top:0px;" class="input-group" bis_skin_checked="1">
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
                    </a>
                    <ng-view></ng-view>
                </div>

                <div style="display: none;" class="total-info-desktop main-left-info mt-7 col-12 col-md-6 col-lg-6 order-md-1 aos-init aos-animate" data-aos="fade-up">


                    <!-- Text -->
                    <h6 class="lead text-center text-sm-left text-muted mb-6 mb-lg-8">
                        <?php echo $Status; ?>
                    </h6>

                    <div class="container" style="padding:10px 0px 10px 0px">
                        <div class="flex-box">

                            <!--                  Lab_Confirmed-->
                            <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                                <div class="container-fluid" style="padding-left: 0px">
                                    <div class="card-danger">
                                        <h6 class="c19-tt1">စစ်ဆေး (တွေ့ရှိ)</h6>
                                        <h2 class="c19-tt3" style="color:#df4759;"><?php echo $total_confirmed ?></h2>
                                    </div>
                                </div>
                            </div>

                            <!--                  PUI + Suspected-->
                            <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                                <div class="container-fluid" style="padding-left: 0px">
                                    <div class="card-warning">
                                        <h6 class="c19-tt1">စောင့်ကြည့် / သံသယ</h6>
                                        <h2 class="c19-tt3" style="color:#b37700;"><?php echo $total_puinsus ?></h2>
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
                                        <h2 class="c19-tt3" style="color:#2b354f;"><?php echo $total_die; ?></h2>
                                    </div>
                                </div>
                            </div>

                            <!--                  Lab Pending-->
                            <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                                <div class="container-fluid" style="padding-left: 0px">
                                    <div class="card-pending">
                                        <h6 class="c19-tt1">အဖြေ စောင့်ဆိုင်းဆဲ</h6>
                                        <h2 class="c19-tt3" style="color:#335eea;"><?php echo $total_pending; ?></h2>
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
                                        <h2 class="c19-tt3" style="color:#506690;"><?php echo $total_recovered; ?></h2>
                                    </div>
                                </div>
                            </div>
                            <!--                  Lab Negative-->
                            <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                                <div class="container-fluid" style="padding-left: 0px">
                                    <div class="card-negative">
                                        <h6 class="c19-tt1">စစ်ဆေး (မတွေ့)</h6>
                                        <h2 class="c19-tt3" style="color:#27ae60 ;"><?php echo $total_negative; ?></h2>
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
                    <?php echo $Status; ?>
                </h6>

                <div class="container" style="padding:10px 0px 10px 0px">
                    <div class="flex-box">

                        <!--                  Lab_Confirmed-->
                        <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                            <div class="container-fluid" style="padding-left: 0px">
                                <div class="card-danger">
                                    <h6 class="c19-tt1">စစ်ဆေး (တွေ့ရှိ)</h6>
                                    <h2 class="c19-tt3" style="color:#df4759;"><?php echo $total_confirmed ?></h2>
                                </div>
                            </div>
                        </div>

                        <!--                  PUI + Suspected-->
                        <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                            <div class="container-fluid" style="padding-left: 0px">
                                <div class="card-warning">
                                    <h6 class="c19-tt1">စောင့်ကြည့် / သံသယ</h6>
                                    <h2 class="c19-tt3" style="color:#b37700;"><?php echo $total_puinsus ?></h2>
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
                                    <h2 class="c19-tt3" style="color:#2b354f;"><?php echo $total_die; ?></h2>
                                </div>
                            </div>
                        </div>

                        <!--                  Lab Pending-->
                        <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                            <div class="container-fluid" style="padding-left: 0px">
                                <div class="card-pending">
                                    <h6 class="c19-tt1">အဖြေ စောင့်ဆိုင်းဆဲ</h6>
                                    <h2 class="c19-tt3" style="color:#335eea;"><?php echo $total_pending; ?></h2>
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
                                    <h2 class="c19-tt3" style="color:#506690;"><?php echo $total_recovered; ?></h2>
                                </div>
                            </div>
                        </div>
                        <!--                  Lab Negative-->
                        <div class="flex-item c19-lg-6x c19-md-6x c19-sm-12x left animate3">
                            <div class="container-fluid" style="padding-left: 0px">
                                <div class="card-negative">
                                    <h6 class="c19-tt1">စစ်ဆေး (မတွေ့)</h6>
                                    <h2 class="c19-tt3" style="color:#27ae60 ;"><?php echo $total_negative; ?></h2>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>


            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>


<section class="mt-8">
    <div class="container" bis_skin_checked="1">
        <div class="row justify-content-between" bis_skin_checked="1">
            <div id="regionTable" class="col-12 col-md-12 col-lg-12 order-md-1 aos-init aos-animate" data-aos="fade-up">
                <div style="position:absolute;z-index:10;left:35px; top:10px;" class="dropdown mr-1 mb-1" bis_skin_checked="1">
                    <button class="btn btn-sm btn-danger-soft dropdown-toggle" type="button" id="tableChangeMode" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        တိုင်း/နယ်
                    </button>
                    <div class="dropdown-menu" aria-labelledby="tableChangeMode" bis_skin_checked="1">
                        <a class="dropdown-item tableTsMode">မြို့နယ်</a>
                        <a class="dropdown-item tableKyMode">ခရိုင်</a>
                        <a class="dropdown-item tableDivMode">တိုင်း/နယ်</a>
                    </div>
                </div>
                <div style="position:absolute;z-index:10;left:35px; top:10px;" class="dropdown mr-1 mb-1" bis_skin_checked="1">
                    <button style="display:none;" class="btn btn-sm btn-danger-soft dropdown-toggle" type="button" id="tableChangeModeMobile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <span><!--?xml version="1.0" encoding="UTF-8"?-->
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                                <title>Stockholm-icons / General / Other#1</title>
                                <desc>Created with Sketch.</desc>
                                <g id="Stockholm-icons-/-General-/-Other#1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                    <circle id="Oval-67" fill="#ff6666" cx="12" cy="5" r="2"></circle>
                                    <circle id="Oval-67-Copy" fill="#ff6666" cx="12" cy="12" r="2"></circle>
                                    <circle id="Oval-67-Copy-2" fill="#ff6666" cx="12" cy="19" r="2"></circle>
                                </g>
                            </svg>
                        </span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="tableChangeModeMobile" bis_skin_checked="1">
                        <a class="dropdown-item tableTsMode">မြို့နယ်</a>
                        <a class="dropdown-item tableKyMode">ခရိုင်</a>
                        <a class="dropdown-item tableDivMode">တိုင်း/နယ်</a>
                    </div>
                </div>
                <div style="height: 0px;padding-top: 0px;padding-bottom: 0px;margin-top:0px; margin-bottom: 0px;" id="sps-table-ts" class="table-responsive" bis_skin_checked="1">
                    <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th scope="col">မြို့နယ်များ</th>
                            <th scope="col">ပိုးတွေ့(နယ်တွင်း)</th>
                            <th scope="col">ပြန်လည်ကောင်းမွန်</th>
                            <th scope="col">သေဆုံး</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($townshipJson as $key => $value){ ?>
                            <tr class="tableDivEle">
                                <th><?php echo $value['unicode'] ?></th>
                                <td><?php echo $value['lab_confirmed'] ?></td>
                                <td><?php echo $value['recovered'] ?></td>
                                <td><?php echo $value['death'] ?></td>

                            </tr>
                        <?php } ?>


                        </tbody>
                    </table>
                </div>

                <div style="height: 0px;padding-top: 0px;padding-bottom: 0px;margin-top:0px; margin-bottom: 0px;" id="sps-table-ky" class="table-responsive" bis_skin_checked="1">
                    <table id="dtHorizontalVerticalKy" class="table table-striped table-bordered table-sm " cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th scope="col">ခရိုင်များ</th>
                            <th scope="col">ပိုးတွေ့(နယ်တွင်း)</th>
                            <th scope="col">ပြန်လည်ကောင်းမွန်</th>
                            <th scope="col">သေဆုံး</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($districtJson as $key => $value){ ?>
                            <tr class="tableDivEle">
                                <th><?php echo $value['unicode'] ?></th>
                                <td><?php echo $value['lab_confirmed'] ?></td>
                                <td><?php echo $value['recovered'] ?></td>
                                <td><?php echo $value['death'] ?></td>

                            </tr>
                        <?php } ?>


                        </tbody>
                    </table>
                </div>

                <div style="" id="sps-table-div" class="table-responsive" bis_skin_checked="1">
                    <table id="dtHorizontalVerticalDiv" class="table table-striped table-bordered table-sm " cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th scope="col">တိုင်း/နယ်များ</th>
                            <th scope="col">ပိုးတွေ့(နယ်တွင်း)</th>
                            <th scope="col">ပြန်လည်ကောင်းမွန်</th>
                            <th scope="col">သေဆုံး</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($regionJson as $key => $value){ ?>
                            <tr class="tableDivEle">
                                <th><?php echo $value['unicode'] ?></th>
                                <td><?php echo $value['lab_confirmed'] ?></td>
                                <td><?php echo $value['recovered'] ?></td>
                                <td><?php echo $value['death'] ?></td>

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- <table class="table table-nowrap">
                    <thead>
                      <tr>
                        <th scope="col">တိုင်း/ပြည်နယ်</th>
                        <th scope="col">ပိုးတွေ့(နယ်တွင်း)</th>
                        <th scope="col">ပြန်လည်ကောင်းမွန်</th>
                        <th scope="col">သေဆုံး</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>ရန်ကုန်</th>
                        <td>3</td>
                        <td>6</td>
                        <td>5</td>
                      </tr>
                      <tr>
                        <th>မန်းတလေး</th>
                        <td>3</td>
                        <td>2</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <th>ချင်းပြည်နယ်</th>
                        <td>2</td>
                        <td>1</td>
                        <td>0</td>
                      </tr>
                    </tbody>
                </table> -->
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>


<section class="">
    <div class="container" bis_skin_checked="1">
        <div class="row justify-content-between" bis_skin_checked="1">
            <div class="shwe-chart col-12 col-md-12 col-lg-12 order-md-1 aos-init aos-animate" data-aos="fade-up">
                <div class="card shadow-lift">
                    <div class="card-header">
                        <!-- Title -->
                        <!-- Switch -->


                        <!-- Tabs -->
                        <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
                            <li
                                    class="nav-item"
                                    data-toggle="chart"
                                    data-target="#trafficChart"
                                    data-trigger="click"
                                    data-action="toggle"
                                    data-dataset="1"
                            >
                                <div class="dropdown mr-1 mb-1" bis_skin_checked="1">
                                    <button class="btn btn-sm btn-danger-soft dropdown-toggle" type="button" id="donutChangeMode" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                        အသက်
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="donutChangeMode" bis_skin_checked="1">
                                        <a class="dropdown-item" id="groupAge">အသက်</a>
                                        <a class="dropdown-item" id="groupGender">ကျား/မ</a>
                                    </div>
                                </div>
                            </li>
                        </ul>


                        <div class="row toggle-grey">
                            <a id="customSwitch5Text" class="nav-link active" data-toggle="tab">
                                ပိုးတွေ့လူနာ
                            </a>
                            <div class="custom-control custom-switch custom-switch-dark mt-2">
                                <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                <label class="custom-control-label text-white" for="customSwitch5"></label>
                            </div>
                            <div class="pl-4"></div>
                            <!-- <h4 class="card-header-title">
                        Gender
                      </h4> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart chart-appended" id="chartContainer">
                            <canvas
                                    id="trafficChart"
                                    class="chart-canvas"
                                    data-toggle="legend"
                                    data-target="#trafficChartLegend"
                            ></canvas>
                        </div>

                        <!-- Legend -->
                        <div id="trafficChartLegend" class="chart-legend">
                            <div style="display: block;" class="donutModeLabel" id="donutAgePosModeLabel">
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #fceae9"></i>0-17နှစ်</span>
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #f0948f"></i>18နှစ်-44နှစ်</span>
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #e0281f"></i>45နှစ်-64နှစ</span>
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #70140f"></i>65နှစ်-74နှစ်</span>
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #000000"></i>75နှစ်အထက်</span>
                            </div>
                            <div style="display: none;" class="donutModeLabel" id="donutAgeDieModeLabel">
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #f2f2f2"></i>0-17နှစ်</span>
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #bfbfbf"></i>18နှစ်-44နှစ်</span>
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #808080"></i>45နှစ်-64နှစ</span>
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #404040"></i>65နှစ်-74နှစ်</span>
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #000000"></i>75နှစ်အထက်</span>
                            </div>

                            <div style="display: none;" class="donutModeLabel" id="donutGenPosModeLabel">
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #f0948f"></i>ကျား</span>
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #70140f"></i>မ</span>
                            </div>
                            <div style="display: none;" class="donutModeLabel" id="donutGenDieModeLabel">
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #bfbfbf"></i>ကျား</span>
                                <span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #404040"></i>မ</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card shadow-lift">
                    <div class="card-header">
                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
                            <li class="nav-item">
                                <!-- <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Dropdown link
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div> -->


                                <button class="btn btn-sm btn-danger-soft" type="button">
                                    ဦးရေ
                                </button>
                            </li>
                            <!-- <li class="nav-item" data-toggle="chart" data-target="#salesChart" data-trigger="click" data-action="toggle" data-dataset="1">
                        <a class="nav-link active" data-toggle="tab">
                          Die
                        </a>
                      </li> -->
                        </ul>


                        <div class="row toggle-grey">
                            <a id="dayByDayToggleText" class="nav-link active" data-toggle="tab">
                                ပိုးတွေ့လူနာ
                            </a>
                            <div class="custom-control custom-switch custom-switch-dark mt-2">
                                <input type="checkbox" class="custom-control-input" id="dayByDayToggle">
                                <label class="custom-control-label text-white" for="dayByDayToggle"></label>
                            </div>
                            <div class="pl-4"></div>
                            <!-- <h4 class="card-header-title">
                        Gender
                      </h4> -->
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="salesChart" class="chart-canvas"></canvas>
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


<!-- JAVASCRIPT
    ================================================== -->
<!-- Libs JS -->
<!-- <script src="assets/libs/jquery/dist/jquery.min.js"></script> -->
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
<!-- <script src='assets/js/sps.js?v1'></script> -->
<script src='assets/js/tooltipster.bundle.min.js'></script>
<script src='assets/js/jquery.radios-to-slider.js'></script>
<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>
<script>


    function myfunction() {

        var eventsHandler;

        eventsHandler = {
            haltEventListeners: ['touchstart', 'touchend', 'touchmove', 'touchleave', 'touchcancel']
            , init: function(options) {
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
                this.hammer.on('doubletap', function(ev){
                    instance.zoomIn()
                })

                // Handle pan
                this.hammer.on('panstart panmove', function(ev){
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
                this.hammer.on('pinchstart pinchmove', function(ev){
                    // On pinch start remember initial zoom
                    if (ev.type === 'pinchstart') {
                        initialScale = instance.getZoom()
                        instance.zoomAtPoint(initialScale * ev.scale, {x: ev.center.x, y: ev.center.y})
                    }

                    instance.zoomAtPoint(initialScale * ev.scale, {x: ev.center.x, y: ev.center.y})
                })

                // Prevent moving the page on some devices when panning over SVG
                options.svgElement.addEventListener('touchmove', function(e){ e.preventDefault(); });
            }

            , destroy: function(){
                this.hammer.destroy()
            }
        }





        var cv_pos = [
            "#fceae9",
            "#f6bfbc",
            "#f0948f",
            "#ea6962",
            "#e33e35",
            "#ca241c",
            "#9d1c15",
            "#70140f",
            "#430c09",
            "#160403"
        ];

        var cv_pos_sus = [
            "#fff6e6",
            "#ffe4b3",
            "#ffd280",
            "#ffc14d",
            "#ffaf1a",
            "#e69500",
            "#b37400",
            "#805300",
            "#4d3200",
            "#1a1100",
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
                'div' : 'div-tanintharyi',
                'data' :
                    [
                        {
                            'ky' : 'ky-dawei',
                            'data' :
                                {
                                    'ts' : ['dawei', 'launglon', 'thayetchaung', 'yebyu']
                                },
                        },
                        {
                            'ky' : 'ky-kawthoung',
                            'data' :
                                {
                                    'ts' : ['bokpyin', 'kawthoung']
                                },
                        },
                        {
                            'ky' : 'ky-myeik',
                            'data' :
                                {
                                    'ts' : ['kyunsu', 'myeik', 'palaw', 'tanintharyi']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-magway',
                'data' :
                    [
                        {
                            'ky' : 'ky-gangaw',
                            'data' :
                                {
                                    'ts' : ['gangaw', 'saw', 'tilin']
                                },
                        },
                        {
                            'ky' : 'ky-magway',
                            'data' :
                                {
                                    'ts' : ['chauk', 'magway', 'myothit', 'natmauk', 'taungdwingyi', 'yenangyaung']
                                },
                        },
                        {
                            'ky' : 'ky-minbu',
                            'data' :
                                {
                                    'ts' : ['minbu', 'ngape', 'pwintbyu', 'salin', 'sidoktaya']
                                },
                        },
                        {
                            'ky' : 'ky-pakokku',
                            'data' :
                                {
                                    'ts' : ['myaing', 'pakokku', 'pauk', 'seikphyu', 'yesagyo']
                                },
                        },
                        {
                            'ky' : 'ky-thayet',
                            'data' :
                                {
                                    'ts' : ['aunglan', 'kamma', 'mindon', 'minhla', 'sinbaungwe', 'thayet']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-mandalay',
                'data' :
                    [
                        {
                            'ky' : 'ky-kyaukse',
                            'data' :
                                {
                                    'ts' : ['kyaukse', 'myittha', 'sintgaing', 'tada-u']
                                },
                        },
                        {
                            'ky' : 'ky-mandalay',
                            'data' :
                                {
                                    'ts' : ['amarapura', 'm-aungmyaythazan', 'm-chanayethazan', 'm-chanmyathazi', 'm-mahaaungmyay', 'patheingyi', 'm-pyigyitagon']
                                },
                        },
                        {
                            'ky' : 'ky-meiktila',
                            'data' :
                                {
                                    'ts' : ['mahlaing', 'meiktila', 'thazi', 'wundwin']
                                },
                        },
                        {
                            'ky' : 'ky-myingyan',
                            'data' :
                                {
                                    'ts' : ['myingyan', 'natogyi', 'ngazun', 'taungtha']
                                },
                        },
                        {
                            'ky' : 'ky-nyaung-u',
                            'data' :
                                {
                                    'ts' : ['nyaung-u', 'kyaukpadaung']
                                },
                        },
                        {
                            'ky' : 'ky-pyinoolwin',
                            'data' :
                                {
                                    'ts' : ['madaya', 'mogoke', 'pyinoolwin', 'singu', 'thabeikkyin']
                                },
                        },
                        {
                            'ky' : 'ky-yamethin',
                            'data' :
                                {
                                    'ts' : ['pyawbwe', 'yamethin']
                                },
                        },
                        {
                            'ky' : 'ky-naypyitaw',
                            'data' :
                                {
                                    'ts' : ['lewe', 'pyinmana', 'tatkon']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-ayeyarwaddy',
                'data' :
                    [
                        {
                            'ky' : 'ky-hinthada',
                            'data' :
                                {
                                    'ts' : ['hinthada', 'lemyethna', 'zalun', 'ingapu', 'kyangin', 'myanaung']
                                },
                        },
                        {
                            'ky' : 'ky-labutta',
                            'data' :
                                {
                                    'ts' : ['labutta', 'mawlamyinegyun']
                                },
                        },
                        {
                            'ky' : 'ky-maubin',
                            'data' :
                                {
                                    'ts' : ['danubyu', 'maubin', 'nyaungdon', 'pantanaw']
                                },
                        },
                        {
                            'ky' : 'ky-myaungmya',
                            'data' :
                                {
                                    'ts' : ['einme', 'myaungmya', 'wakema']
                                },
                        },
                        {
                            'ky' : 'ky-pathein',
                            'data' :
                                {
                                    'ts' : ['kangyidaunt', 'ngapudaw', 'pathein', 'thabaung', 'kyaunggon', 'kyonpyaw', 'yegyi']
                                },
                        },
                        {
                            'ky' : 'ky-pyapon',
                            'data' :
                                {
                                    'ts' : ['bogale', 'dedaye', 'kyaiklat', 'pyapon']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-ebago',
                'data' :
                    [
                        {
                            'ky' : 'ky-bago',
                            'data' :
                                {
                                    'ts' : ['bago', 'daik-u', 'kawa', 'tanatpin', 'waw', 'kyauktaga', 'nyaunglebin', 'shwegyin']
                                },
                        },
                        {
                            'ky' : 'ky-taungoo',
                            'data' :
                                {
                                    'ts' : ['kyaukkyi', 'oktwin', 'phyu', 'tantabin', 'taungoo', 'yedashe']
                                },
                        },

                    ],
            },
            {
                'div' : 'div-wbago',
                'data' :
                    [
                        {
                            'ky' : 'ky-pyay',
                            'data' :
                                {
                                    'ts' : ['padaung', 'paukkaung', 'paungde', 'pyay', 'shwedaung', 'thegon']
                                },
                        },
                        {
                            'ky' : 'ky-thayarwady',
                            'data' :
                                {
                                    'ts' : ['gyobingauk', 'letpadan', 'minhla-2', 'monyo', 'okpho', 'thayarwady', 'nattalin', 'zigon']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-chin',
                'data' :
                    [
                        {
                            'ky' : 'ky-falam',
                            'data' :
                                {
                                    'ts' : ['falam', 'tiddim', 'tonzang']
                                },
                        },
                        {
                            'ky' : 'ky-hakha',
                            'data' :
                                {
                                    'ts' : ['hakha', 'htantlang']
                                },
                        },
                        {
                            'ky' : 'ky-mindat',
                            'data' :
                                {
                                    'ts' : ['mindat', 'kanpetlet', 'madupi', 'paletwa']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-kayar',
                'data' :
                    [
                        {
                            'ky' : 'ky-bawlakhe',
                            'data' :
                                {
                                    'ts' : ['bawlakhe', 'hpasaung', 'mese']
                                },
                        },
                        {
                            'ky' : 'ky-loikaw',
                            'data' :
                                {
                                    'ts' : ['demoso', 'hpruso', 'loikaw', 'shadaw']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-kayin',
                'data' :
                    [
                        {
                            'ky' : 'ky-hpa-an',
                            'data' :
                                {
                                    'ts' : ['hlaingbwe', 'hpa-an', 'thandaung']
                                },
                        },
                        {
                            'ky' : 'ky-hpapun',
                            'data' :
                                {
                                    'ts' : ['hpapun']
                                },
                        },
                        {
                            'ky' : 'ky-kawkareik',
                            'data' :
                                {
                                    'ts' : ['kawkareik', 'kyainseikgyi',]
                                },
                        },
                        {
                            'ky' : 'ky-myawaddy',
                            'data' :
                                {
                                    'ts' : ['myawaddy']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-mon',
                'data' :
                    [
                        {
                            'ky' : 'ky-mawlamyine',
                            'data' :
                                {
                                    'ts' : ['mawlamyine', 'chaungzon', 'kyaikmaraw', 'mudon', 'thanbyuzayat', 'ye']
                                },
                        },
                        {
                            'ky' : 'ky-thaton',
                            'data' :
                                {
                                    'ts' : ['bilin', 'thaton', 'kyaikto', 'paung']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-rakhine',
                'data' :
                    [
                        {
                            'ky' : 'ky-kyaukpyu',
                            'data' :
                                {
                                    'ts' : ['ann', 'kyaukpyu', 'munaung', 'ramree']
                                },
                        },
                        {
                            'ky' : 'ky-maungdaw',
                            'data' :
                                {
                                    'ts' : ['maungdaw', 'buthidaung']
                                },
                        },
                        {
                            'ky' : 'ky-sittwe',
                            'data' :
                                {
                                    'ts' : ['pauktaw', 'sittwe', 'ponnagyun', 'rathedaung']
                                },
                        },
                        {
                            'ky' : 'ky-thandwe',
                            'data' :
                                {
                                    'ts' : ['gwa', 'thandwe', 'toungup']
                                },
                        },
                        {
                            'ky' : 'ky-mrauk-u',
                            'data' :
                                {
                                    'ts' : ['maruk-u', 'kyauktaw', 'minbya', 'myebon']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-yangon',
                'data' :
                    [
                        {
                            'ky' : 'ky-eyangon',
                            'data' :
                                {
                                    'ts' : ['y-botahtaung', 'y-pazundaung', 'y-northokkalapa', 'y-dawbon', 'y-mingalartaungnyunt', 'y-yankin', 'y-thaketa', 'y-southokkalapa', 'y-tamwe', 'y-thingangkuun', 'y-dagonmyothitea', 'y-dagonmyothitno', 'y-dagonmyothitse', 'y-dagonmyothitso']
                                },
                        },
                        {
                            'ky' : 'ky-nyangon',
                            'data' :
                                {
                                    'ts' : ['y-hlaingtharya', 'y-insein', 'y-mingaladon', 'y-shwepyithar', 'hlegu', 'htantabin', 'taikkyi', 'hmawbi']
                                },
                        },
                        {
                            'ky' : 'ky-syangon',
                            'data' :
                                {
                                    'ts' : ['y-dala', 'y-seikgyikanaungto', 'y-cocokyun', 'kawhmu', 'kayan', 'kungyangon', 'kyauktan', 'thanlyin', 'thongwa', 'twantay']
                                },
                        },
                        {
                            'ky' : 'ky-wyangon',
                            'data' :
                                {
                                    'ts' : ['y-ahlone', 'y-bahan', 'y-dagon', 'y-kyeemyindaing', 'y-lanmadaw', 'y-latha', 'y-pabedan', 'y-sanchaung', 'y-seikkan', 'y-hlaing', 'y-kamaryut', 'y-mayangone']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-eshan',
                'data' :
                    [
                        {
                            'ky' : 'ky-kengtung',
                            'data' :
                                {
                                    'ts' : ['kengtung', 'mongkhet', 'mongla', 'mongyang']
                                },
                        },
                        {
                            'ky' : 'ky-monghpyak',
                            'data' :
                                {
                                    'ts' : ['monghpyak', 'mongyawng']
                                },
                        },
                        {
                            'ky' : 'ky-monghsat',
                            'data' :
                                {
                                    'ts' : ['monghsat', 'mongping', 'mongton']
                                },
                        },
                        {
                            'ky' : 'ky-tachileik',
                            'data' :
                                {
                                    'ts' : ['tachileik']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-nshan',
                'data' :
                    [
                        {
                            'ky' : 'ky-kunlong',
                            'data' :
                                {
                                    'ts' : ['kunlong', 'laukkaing', 'konkyan']
                                },
                        },
                        {
                            'ky' : 'ky-kyaukme',
                            'data' :
                                {
                                    'ts' : ['hsipaw', 'kyaukme', 'namtu', 'nawnghkio', 'mabein', 'namhsan', 'mongmit']
                                },
                        },
                        {
                            'ky' : 'ky-lashio',
                            'data' :
                                {
                                    'ts' : ['hseni', 'lashio', 'mongyai', 'tangyan']
                                },
                        },
                        {
                            'ky' : 'ky-muse',
                            'data' :
                                {
                                    'ts' : ['kutkai', 'muse', 'nanhkan', 'manton']
                                },
                        },
                        {
                            'ky' : 'ky-hopang',
                            'data' :
                                {
                                    'ts' : ['hopang', 'mongmao', 'pangwaun']
                                },
                        },
                        {
                            'ky' : 'ky-matman',
                            'data' :
                                {
                                    'ts' : ['matman', 'pangsang', 'namphan']
                                },
                        },
                    ],
            },
            {
                'div' : 'div-sshan',
                'data' :
                    [
                        {
                            'ky' : 'ky-langkho',
                            'data' :
                                {
                                    'ts' : ['mawkmai', 'mongnai', 'langkho', 'mongpan']
                                },
                        },
                        {
                            'ky' : 'ky-loilen',
                            'data' :
                                {
                                    'ts' : ['loilen', 'kunhing', 'kyethi', 'laihka', 'monghsu', 'mongkaung','nansang']
                                },
                        },
                        {
                            'ky' : 'ky-taunggyi',
                            'data' :
                                {
                                    'ts' : ['hopong', 'hsihseng', 'kalaw', 'lawksawk', 'nyaungshwe', 'pekon', 'pindaya', 'pinlaung', 'taunggyi', 'ywangan']
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
            ["ky-loikaw","400","450"],
            ["ky-bawlakhe","400","450"],
            ["ky-kawthoung","400","450"]
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
        // var territory = [
        //     {
        //         'div': 'div-kachin',
        //         'data':
        //         [
        //             {
        //                 'ky': 'ky-puta-o',
        //                 'data':
        //                 {
        //                     'ts': ['nogmung', 'kawnglanghpu', 'puta-o', 'machanbaw', 'sumprabum']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-myitkyina',
        //                 'data':
        //                 {
        //                     'ts': ['tanai', 'injangyang', 'tsawlaw', 'chipwi', 'myitkyina', 'waingmaw']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-mohnyin',
        //                 'data':
        //                 {
        //                     'ts': ['hpakan', 'mohnyin', 'mogaung']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-bhamo',
        //                 'data':
        //                 {
        //                     'ts': ['momauk', 'shwegu', 'bhamo', 'mansi']
        //                 }
        //             },
        //         ],
        //     },
        //     {
        //         'div': 'div-sagaing',
        //         'data':
        //         [
        //             {
        //                 'ky': 'ky-hkamti',
        //                 'data':
        //                 {
        //                     'ts': ['nanyun', 'lahe', 'hkamti', 'layshi', 'homalin']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-mawlaik',
        //                 'data':
        //                 {
        //                     'ts': ['tamu', 'paungbyin', 'mawlaik']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-katha',
        //                 'data':
        //                 {
        //                     'ts': ['banmauk', 'indaw', 'katha', 'tigyaing', 'pinlebu', 'wuntho', 'kawlin']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-kanbalu',
        //                 'data':
        //                 {
        //                     'ts': ['kyunhla', 'kanbalu']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-kale',
        //                 'data':
        //                 {
        //                     'ts': ['kalewa', 'mingin', 'kale']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-shwebo',
        //                 'data':
        //                 {
        //                     'ts': ['taze', 'ye-u', 'khin-u', 'shwebo', 'tabayin', 'wetlet']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-yinmabin',
        //                 'data':
        //                 {
        //                     'ts': ['kani', 'yinmabin', 'pale', 'salingyi']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-monywa',
        //                 'data':
        //                 {
        //                     'ts': ['budalin', 'ayadaw', 'monywa', 'chaung-u']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-sagaing',
        //                 'data':
        //                 {
        //                     'ts': ['sagaing', 'myinmu', 'myaung']
        //                 }
        //             },
        //         ],
        //     },
        // ];

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

        var covids_positives = [
        ]

        var covids_positives_combied = [

        ]

        var covids_positives_combied_color = [

        ]




        //ZawWaiSoe don't change variable names
        var zawvids_positives =
            <?php echo json_encode($townshipAry); ?>;

        var covid_khayines =
            <?php echo json_encode($districtAry) ; ?> ;

        var covid_tines =
            <?php  echo json_encode($regionAry); ?>;

        var maxDivPos = <?php  echo $maxDivPos; ?>;
        var maxKyPos =  <?php  echo $maxKyPos; ?>;
        var maxTsPos =  <?php  echo $maxTsPos; ?>;
        var maxDivSus = <?php  echo $maxDivSus; ?>;
        var maxKySus =  <?php  echo $maxKySus; ?>;
        var maxTsSus =  <?php  echo $maxTsSus; ?>;


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
                if(covidsCombiedColor[i].name == 'yangon-gp') {
                    if(!toggle) {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + '#1a0033');
                    } else {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + '#1a0033');
                    }
                } else if (covidsCombiedColor[i].name == 'mandalay-gp') {
                    if(!toggle) {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + cv_pos[parseInt(covidsCombiedColor[i].color)-1]);
                    } else {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + cv_pos_sus[parseInt(covidsCombiedColor[i].color)-1]);
                    }
                } else {
                    if(!toggle) {
                        $('#' + covidsCombiedColor[i].name).attr('style', 'fill:' + cv_pos[parseInt(covidsCombiedColor[i].color)-1]);
                    } else {
                        $('#' + covidsCombiedColor[i].name).attr('style', 'fill:' + cv_pos_sus[parseInt(covidsCombiedColor[i].color)-1]);
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
                if(!toggle) {
                    element.classList.add(cv_pos2[parseInt(zawPosActKyColor[i].color)-1]);
                } else {
                    element.classList.add(cv_pos_sus2[parseInt(zawPosActKyColor[i].color)-1]);
                }
                //$('#' + covids_positives_combied_color_kharines_color[i].name).attr('style', 'fill:' + cv_pos[parseInt(covids_positives_combied_color_kharines_color[i].color)-1]);
            }
            //var element = document.getElementById(zawPosActKyColor[i].name);
            //$('#ky-eyangon' + ' polyline').attr('style', 'fill:' + '#1a0033');
        }

        function modeDivisions(zawPosActDivColor) {
            disKhayines();
            disTownships();
            disDivisions();
            showDivisions();
            colorClassRemover();
            for (i in zawPosActDivColor) {
                var element = document.getElementById(zawPosActDivColor[i].name);
                if(!toggle) {
                    element.classList.add(cv_pos2[parseInt(zawPosActDivColor[i].color)-1]);
                } else {
                    element.classList.add(cv_pos_sus2[parseInt(zawPosActDivColor[i].color)-1]);
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
            if(mode=='ky') {
                for(i in khayines) {
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
            } else if(mode=='div') {
                for(i in divisions) {
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

        function changeColorBar(number) {
            console.log('fuck');
            var x = document.getElementsByClassName("color-bar");
            var y = document.getElementsByClassName("color-range");
            var i,j;
            console.log(toggle);
            if(!toggle) {
                for (i = 0; i < x.length; i++) {
                    x[i].setAttribute('style', 'background:' + cv_pos[i] + ';width:10px;');
                }
            } else {
                for (i = 0; i < x.length; i++) {
                    x[i].setAttribute('style', 'background:' + cv_pos_sus[i] + ';width:10px;');
                }
            }
            // var start = 0;
            // var range = parseInt(number)/10;
            // for (i = 0; i < y.length; i++) {
            //     console.log(start);
            //     // y[9].innerHTML = 'အများ';
            //     // y[0].innerHTML = 'အနည်း';
            //     if(i==y.length-1) {
            //         y[i].innerHTML = Math.ceil(start) + '-' + (number+1);
            //     } else {
            //         y[i].innerHTML = Math.ceil(start) + '-' + Math.ceil(start+range);
            //     }
            //     start=start+range;
            // }

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

        $('#mode-tine').on('click', function() {
            $('.mode-btn').removeClass('active');
            $(this).addClass('active');
            //modeDivisions();
            mode='div';
            changeAll();
            $('#searchInput').val('');
            $('#searchFilter').html('');
            $('#searchInput').attr("placeholder", "တိုင်းဒေသကြီး ရှာဖွေရန်");
        });
        $('#mode-khayine').on('click', function() {

            // zws_toggle = 'khayine'
            $('.mode-btn').removeClass('active');
            $(this).addClass('active');
            // modeKhayines(covids_khayines_color);
            mode='ky';
            changeAll();
            $('#searchInput').val('');
            $('#searchFilter').html('');
            $('#searchInput').attr("placeholder", "ခရိုင် ရှာဖွေရန်");





        });
        $('#mode-township').on('click', function() {

            // if(zws_toggle!='quaratine'){
            //   zws_toggle = 'myonal'
            $('.mode-btn').removeClass('active');
            $(this).addClass('active');
            //modeTownShips(covids_combied_color);
            mode='ts';
            changeAll();
            $('#searchInput').val('');
            $('#searchFilter').html('');
            $('#searchInput').attr("placeholder", "မြို့နယ် ရှာဖွေရန်");

            // }



        });
        var covids_combied = [];
        var covids_combied_color = [];

        var covids_khayines_color = [];
        $('#mode-tine').trigger('click');

        zws_toggle = 0;
        $('#toggle-switch').on('change', function() {

            zws_toggle++;
            if(zws_toggle%2 != 0){

                toggle = $(this).prop('checked');
                // zws_toggle = 'quaratine';
                if(!toggle) {
                    $('#svgmaptoggle').html('စစ်ဆေး(တွေ့ရှိ)');
                } else {
                    $('#svgmaptoggle').html('စောင့်/သံသယ');
                }

                $('.mode-btn').removeClass('active');

                $("#mode-khayine").hide();
                $("#mode-township").hide();
                $("#mode-tine").hide();
                //modeDivisions();
                mode='div';
                changeAll();
                $('#searchInput').val('');
                $('#searchFilter').html('');
                $('#searchInput').attr("placeholder", "တိုင်းဒေသကြီး ရှာဖွေရန်");
            }
            else{

                toggle = $(this).prop('checked');
                // zws_toggle = 'confirm';
                if(!toggle) {
                    $('#svgmaptoggle').html('စစ်ဆေး(တွေ့ရှိ)');
                } else {
                    $('#svgmaptoggle').html('စောင့်/သံသယ');
                }
                $("#mode-tine").addClass('active');
                $("#mode-khayine").show();
                $("#mode-township").show();
                $("#mode-tine").show();



                changeAll();
            }
        });
        $('#toggle-switch').trigger('click');
        $('#toggle-switch').trigger('click');

        // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
        let vh = window.innerHeight * 0.01;
        // Then we set the value in the --vh custom property to the root of the document
        document.documentElement.style.setProperty('--vh', `${vh}px`);

        // We listen to the resize event
        window.addEventListener('resize', () => {
            // We execute the same script as before
            let vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        });

        $('#toggle-switch').trigger('click');
        $('#toggle-switch').trigger('click');

        function changeAll() {
            if(mode=='div') {
                function info2MapDiv(covid_tines, toggle) {
                    if(!toggle) {
                        changeColorBar(maxDivPos);
                        covids_tines_color = [];
                        var posMax3 = maxDivPos;
                        // for (i in covid_tines) {
                        //     if(posMax3 < parseInt(covid_tines[i].lab_confirmed)) {
                        //         posMax3 = covid_tines[i++].lab_confirmed;
                        //     }
                        // }
                        //var zawPosActKyColor = [];
                        for (i in covid_tines) {
                            var colorCode = parseInt((covid_tines[i].lab_confirmed/posMax3)*10);
                            if(colorCode == 0) {
                                colorCode = 1;
                            }
                            if(covid_tines[i].lab_confirmed != 0) {
                                covids_tines_color.push({"name": covid_tines[i].name, "number": covid_tines[i].lab_confirmed, "color": colorCode})
                            }
                        }

                    } else {
                        changeColorBar(maxDivSus);
                        covids_tines_color = [];
                        var posMax3 = maxDivSus;
                        // for (i in covid_tines) {
                        //     if(posMax3 < parseInt(covid_tines[i].puinsuspect)) {
                        //         posMax3 = covid_tines[i++].puinsuspect;
                        //     }
                        // }
                        //var zawPosActKyColor = [];
                        for (i in covid_tines) {
                            var colorCode = parseInt((covid_tines[i].puinsuspect/posMax3)*10);
                            if(colorCode == 0) {
                                colorCode = 1;
                            }
                            if(covid_tines[i].puinsuspect != 0) {
                                covids_tines_color.push({"name": covid_tines[i].name, "number": covid_tines[i].puinsuspect, "color": colorCode})
                            }

                        }
                    }
                    return covids_tines_color;
                }
                var covidsCombiedColorDiv = [];
                covidsCombiedColorDiv = info2MapDiv(covid_tines, toggle);
                modeDivisions(covidsCombiedColorDiv);
            } else if(mode=='ky') {
                function info2MapKy(covid_khayines, toggle) {
                    if(!toggle) {
                        changeColorBar(maxKyPos);
                        covids_khayines_color = [];
                        var posMax2 = maxKyPos;
                        // for (i in covid_khayines) {
                        //     if(posMax2 < parseInt(covid_khayines[i].lab_confirmed)) {
                        //         posMax2 = covid_khayines[i++].lab_confirmed;
                        //     }
                        // }
                        //var zawPosActKyColor = [];
                        for (i in covid_khayines) {
                            var colorCode = parseInt((covid_khayines[i].lab_confirmed/posMax2)*10);
                            if(colorCode == 0) {
                                colorCode = 1;
                            }
                            if(covid_khayines[i].lab_confirmed != 0) {
                                covids_khayines_color.push({"name": covid_khayines[i].name, "number": covid_khayines[i].lab_confirmed, "color": colorCode})
                            }
                        }

                    } else {
                        changeColorBar(maxKySus);
                        covids_khayines_color = [];
                        var posMax2 = maxKySus;
                        // for (i in covid_khayines) {
                        //     if(posMax2 < parseInt(covid_khayines[i].puinsuspect)) {
                        //         posMax2 = covid_khayines[i++].puinsuspect;
                        //     }
                        // }
                        //var zawPosActKyColor = [];
                        for (i in covid_khayines) {
                            var colorCode = parseInt((covid_khayines[i].puinsuspect/posMax2)*10);
                            if(colorCode == 0) {
                                colorCode = 1;
                            }
                            if(covid_khayines[i].puinsuspect != 0) {
                                covids_khayines_color.push({"name": covid_khayines[i].name, "number": covid_khayines[i].puinsuspect, "color": colorCode})
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
                    if(!toggle) {
                        changeColorBar(maxTsPos);
                        for (i in zawvids_positives) {
                            if ( !(zawvids_positives[i].name.indexOf("m-") >= 0) && !(zawvids_positives[i].name.indexOf("y-") >= 0)) {
                                covids_combied.push({"name": zawvids_positives[i].name, "number": zawvids_positives[i].lab_confirmed, "puinsuspect": zawvids_positives[i].puinsuspect, "pui": zawvids_positives[i].pui, "suspected": zawvids_positives[i].suspected, "lab_negative": zawvids_positives[i].lab_negative,
                                    "lab_pending": zawvids_positives[i].lab_pending, "die": zawvids_positives[i].die, "recovered": zawvids_positives[i].recovered, "lab_confirmed": zawvids_positives[i].lab_confirmed, "lab_confirmed_now": zawvids_positives[i].lab_confirmed_now});
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
                        var mlab_confirmed_now = 0;
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
                                mlab_confirmed_now += parseInt(zawvids_positives[i].lab_confirmed_now);
                            }
                        }
                        covids_combied.push({"name": "mandalay-gp", "number": mlab_confirmed, "puinsuspect": mpuinsuspect, "pui": mpui, "suspected": msuspected, "lab_negative": mlab_negative, "lab_pending": mlab_pending, "die": mdie, "recovered": mrecovered, "lab_confirmed": mlab_confirmed, "lab_confirmed_now": mlab_confirmed_now});
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
                        var ylab_confirmed_now = 0;
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
                                ylab_confirmed_now += parseInt(zawvids_positives[i].lab_confirmed_now);
                            }
                        }
                        covids_combied.push({"name": "yangon-gp", "number": ylab_confirmed, "puinsuspect": ypuinsuspect, "pui": ypui, "suspected": ysuspected, "lab_negative": ylab_negative, "lab_pending": ylab_pending, "die": ydie, "recovered": yrecovered, "lab_confirmed": ylab_confirmed, "lab_confirmed_now": ylab_confirmed_now});
                    } else {
                        changeColorBar(maxTsSus);
                        for (i in zawvids_positives) {
                            if ( !(zawvids_positives[i].name.indexOf("m-") >= 0) && !(zawvids_positives[i].name.indexOf("y-") >= 0)) {
                                covids_combied.push({"name": zawvids_positives[i].name, "number": zawvids_positives[i].puinsuspect, "puinsuspect": zawvids_positives[i].puinsuspect, "pui": zawvids_positives[i].pui, "suspected": zawvids_positives[i].suspected, "lab_negative": zawvids_positives[i].lab_negative,
                                    "lab_pending": zawvids_positives[i].lab_pending, "die": zawvids_positives[i].die, "recovered": zawvids_positives[i].recovered, "lab_confirmed": zawvids_positives[i].lab_confirmed, "lab_confirmed_now": zawvids_positives[i].lab_confirmed_now});
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
                        var mlab_confirmed_now = 0;
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
                                mlab_confirmed_now += parseInt(zawvids_positives[i].lab_confirmed_now);
                            }
                        }
                        covids_combied.push({"name": "mandalay-gp", "number": mpuinsuspect, "puinsuspect": mpuinsuspect, "pui": mpui, "suspected": msuspected, "lab_negative": mlab_negative, "lab_pending": mlab_pending, "die": mdie, "recovered": mrecovered, "lab_confirmed": mlab_confirmed, "lab_confirmed_now": mlab_confirmed_now});
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
                        var ylab_confirmed_now = 0;
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
                                ylab_confirmed_now += parseInt(zawvids_positives[i].lab_confirmed_now);
                            }
                        }
                        covids_combied.push({"name": "yangon-gp", "number": ypuinsuspect, "puinsuspect": ypuinsuspect, "pui": ypui, "suspected": ysuspected, "lab_negative": ylab_negative, "lab_pending": ylab_pending, "die": ydie, "recovered": yrecovered, "lab_confirmed": ylab_confirmed, "lab_confirmed_now": ylab_confirmed_now});
                    }
                    covidsCombined = covids_combied;
                    console.log(covids_combied);
                    var numSort = [];
                    if(!toggle) {
                        var posMax = maxTsPos;
                    } else {
                        var posMax = maxTsSus;
                    }
                    //numSort.filter( onlyUnique ).sort(sortNumber);
                    for (i in covids_combied) {
                        var colorCode = parseInt((parseInt(covids_combied[i].number)/posMax)*10);
                        if(colorCode == 0) {
                            colorCode = 1;
                        }
                        if(parseInt(covids_combied[i].number) != 0) {
                            covids_combied_color.push({"name": covids_combied[i].name, "number": parseInt(covids_combied[i].number), "color": colorCode});
                        }
                        if(parseInt(covids_combied[i].number) == 0 && parseInt(covids_combied[i].status) > 0) {
                            //covids_combied_color.push({"name": covids_combied[i].name, "number": parseInt(covids_combied[i].number), "color": 1});
                        }
                    }

                    console.log('shwe ' + posMax);
                    console.log(numSort);
                    return covids_combied_color;
                }

                var covidsCombiedColor = info2MapTs(zawvids_positives, toggle);
                console.log('here 0');
                console.log(covidsCombined);
                console.log('here 1');
                console.log(covidsCombiedColor);
                modeTownShips(covidsCombiedColor);
            }
        }
        function onlyUnique(value, index, self) {
            return self.indexOf(value) === index;
        }
        function sortNumber(a, b) {
            return a - b;
        }




        function customPanZoom() {
            window.panZoom = svgPanZoom('#mobile-svg', {
                zoomEnabled: true
                , controlIconsEnabled: true
                , fit: 1
                , center: 1
                , minZoom: 0.7
                , maxZoom: 6
                , refreshRate: 'auto'
                , customEventsHandler: eventsHandler
                , onZoom: function(){
                    $('.tooltipster').tooltipster('close');
                    //$('#'+recentID).attr('style',tempColor);
                    document.getElementById(recentTtip).classList.remove("hoveredShwe");

                }
            });
        }
        //modeTownShips();
        var covidsCombied = [];
        $('.tooltipster').tooltipster({
            animation: 'fade',
            delay:0,
            theme: ['tooltipster-noir', 'tooltipster-noir-customized'],
            trigger: 'click',
            functionAfter: function(instance, helper){

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
        $('#closeResult').on('click', function() {
            $('#searchBox').removeClass('has');
            $('#resultBox').addClass('closed');
            if (recentID != '') {
                document.getElementById(recentID).classList.remove("clickedShwe");
            }
        });

        $(document).on('click','.search-filter',function(){

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
            if(info.length==0) {

            }
            if(mode=='div') {

                $('#z_puinsus').show();
                for(i in divisions_mm) {
                    if(divisions_mm[i][0].substr(4) == info[0]) {
                        info[0] = divisions_mm[i][2];
                        break;
                    }
                }
            } else if(mode=='ky') {
                $('#z_puinsus').hide();
                for(i in khayines_mm) {
                    if(khayines_mm[i][0].substr(3) == info[0]) {
                        info[0] = khayines_mm[i][2];
                        break;
                    }
                }
            } else {
                $('#z_puinsus').hide();
                if(info[0] == 'yangon') {
                    info[0] = 'yangon-gp';
                } else if(info[0] == 'mandalay') {
                    info[0] = 'mandalay-gp';
                }
                for(i in townships_mm) {
                    if(townships_mm[i][0] == info[0]) {
                        info[0] = townships_mm[i][2];
                        break;
                    }
                }
            }
            $('#resultName').html(info[0]);
            $('#resultPuinsuspect').html(info[1]);
            $('#resultLabnegative').html(info[2]);
            $('#resultLabpending').hide();
            $('#resultDie').html(info[4]);
            $('#resultRecovered').html(info[5]);
            $('#resultLabconfirmed').html(info[6]);
            $('#resultLabconfirmedNow').html(info[7]);
        });
        var covidsCombined = [];
        function takeInfo(iD) {
            if(mode=='ts') {
                var info = [];
                var found = false;
                for(i in covidsCombined) {
                    if (iD == covidsCombined[i].name) {
                        if(iD == 'yangon-gp') {
                            iD = 'yangon';
                        } else if(iD == 'mandalay-gp') {
                            iD = 'mandalay';
                        }
                        console.log('babybaby ' + covidsCombined[i].lab_confirmed_now);
                        info.push(iD);
                        info.push(covidsCombined[i].puinsuspect);
                        info.push(covidsCombined[i].lab_negative);
                        info.push(covidsCombined[i].lab_pending);
                        info.push(covidsCombined[i].die);
                        info.push(covidsCombined[i].recovered);
                        info.push(covidsCombined[i].lab_confirmed);
                        info.push(covidsCombined[i].lab_confirmed_now);
                        found = true;
                        break;
                    }
                }
                if (!found) {
                    if(iD == 'yangon-gp') {
                        iD = 'yangon';
                    } else if(iD == 'mandalay-gp') {
                        iD = 'mandalay';
                    }

                    info.push(iD);
                    info.push(0);
                    info.push(0);
                    info.push(0);
                    info.push(0);
                    info.push(0);
                    info.push(0);
                    info.push(0);
                }
            } else if(mode=='ky'){
                var info = [];
                var found = false;
                for(i in covid_khayines) {
                    if (iD == covid_khayines[i].name) {
                        var iD = iD.substr(3);
                        info.push(iD);
                        info.push(covid_khayines[i].puinsuspect);
                        info.push(covid_khayines[i].lab_negative);
                        info.push(covid_khayines[i].lab_pending);
                        info.push(covid_khayines[i].die);
                        info.push(covid_khayines[i].recovered);
                        info.push(covid_khayines[i].lab_confirmed);
                        info.push(covid_khayines[i].lab_confirmed_now);
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
                    info.push(0);
                }
            } else if(mode=='div'){
                var info = [];
                var found = false;
                for(i in covid_tines) {
                    if (iD == covid_tines[i].name) {
                        var iD = iD.substr(4);
                        info.push(iD);
                        info.push(covid_tines[i].puinsuspect);
                        info.push(covid_tines[i].lab_negative);
                        info.push(covid_tines[i].lab_pending);
                        info.push(covid_tines[i].die);
                        info.push(covid_tines[i].recovered);
                        info.push(covid_tines[i].lab_confirmed);
                        info.push(covid_tines[i].lab_confirmed_now);
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
        $('.tooltipster').click(function() {
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


            setTimeout(function(){
                if(iD == null) {
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
                if(mode=="ts") {

                    if(iD==null) {
                        var info = takeInfo(undefine);

                        if(info[0]=='yangon'){
                            info[0]='yangon-gp';
                        } else if(info[0]=='mandalay'){
                            info[0]='mandalay-gp';
                        }

                        for(i in townships_mm) {
                            if(townships_mm[i][0] == info[0]) {
                                info[0] = townships_mm[i][2];
                                break;
                            }
                        }
                        if(info.length==0) {

                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပိုးတွေ့(နယ်တွင်း)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                '0' +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပိုးတွေ့(လက်ရှိ)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                '0' +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0" style="display:none;" id="z_puinsus">' +
                                'စောင့်ကြည့်/သံသယ' +
                                '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                '0' +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'သေဆုံး' +
                                '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                '0' +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0" style="display:none" >' +
                                'စစ်ဆေး(စောင့်ဆိုင်း)' +
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
                                '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                                'စစ်ဆေး(မတွေ့)' +
                                '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                '0' +
                                '</span>' +
                                '</p>'
                            );

                        } else {
                            if(info[1]==null) {
                                info[1]=0;
                            }
                            if(info[2]==null||info[2]=='#fff') {
                                info[2]=0;
                            }
                            if(info[3]==null) {
                                info[3]=0;
                            }
                            if(info[4]==null) {
                                info[4]=0;
                            }
                            if(info[5]==null) {
                                info[5]=0;
                            }
                            if(info[6]==null) {
                                info[6]=0;
                            }
                            if(info[7]==null) {
                                info[7]=0;
                            }
                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပိုးတွေ့(နယ်တွင်း)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                info[6] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပိုးတွေ့(လက်ရှိ)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                info[7] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0" style="display:none;" id="z_puinsus">' +
                                'စောင့်ကြည့်/သံသယ' +
                                '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                info[1] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'သေဆုံး' +
                                '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                info[4] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                                'စစ်ဆေး(စောင့်ဆိုင်း)' +
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
                                '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                                'စစ်ဆေး(မတွေ့)' +
                                '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                info[2] +
                                '</span>' +
                                '</p>'
                            );
                        }


                    } else {

                        var info = takeInfo(iD);
                        for(i in townships_mm) {
                            if(townships_mm[i][0] == info[0]) {
                                info[0] = townships_mm[i][2];
                                break;
                            }
                        }

                        if(info.length==0) {

                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပိုးတွေ့(နယ်တွင်း)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                '0' +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပိုးတွေ့(လက်ရှိ)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                '0' +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0" style="display:none;" id="z_puinsus">' +
                                'စောင့်ကြည့်/သံသယ' +
                                '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                '0' +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'သေဆုံး' +
                                '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                '0' +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                                'စစ်ဆေး(စောင့်ဆိုင်း)' +
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
                                '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                                'စစ်ဆေး(မတွေ့)' +
                                '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                '0' +
                                '</span>' +
                                '</p>'
                            );

                        } else {
                            if(info[1]==null) {
                                info[1]=0;
                            }
                            if(info[2]==null||info[2]=='#fff') {
                                info[2]=0;
                            }
                            if(info[3]==null) {
                                info[3]=0;
                            }
                            if(info[4]==null) {
                                info[4]=0;
                            }
                            if(info[5]==null) {
                                info[5]=0;
                            }
                            if(info[6]==null) {
                                info[6]=0;
                            }
                            if(info[7]==null) {
                                info[7]=0;
                            }
                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပိုးတွေ့(နယ်တွင်း)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                info[6] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'ပိုးတွေ့(လက်ရှိ)' +
                                '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                info[7] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0" style="display:none;" id="z_puinsus">' +
                                'စောင့်ကြည့်/သံသယ' +
                                '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                info[1] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                'သေဆုံး' +
                                '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                info[4] +
                                '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                                'စစ်ဆေး(စောင့်ဆိုင်း)' +
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
                                '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                                'စစ်ဆေး(မတွေ့)' +
                                '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                info[2] +
                                '</span>' +
                                '</p>'
                            );
                        }
                    }
                } else if(mode == 'ky') {
                    if(iD==null) {

                        var info = takeInfo(undefine);
                        for(i in khayines_mm) {
                            if(khayines_mm[i][0].substr(3) == info[0]) {
                                info[0] = khayines_mm[i][2];
                                break;
                            }
                        }
                        $('.tooltipster-content').html(
                            '<p class="font-weight-bold mb-1">' +
                            info[0] +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'ပိုးတွေ့(နယ်တွင်း)' +
                            '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                            info[6] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'ပိုးတွေ့(လက်ရှိ)' +
                            '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                            info[7] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0" style="display:none;" id="z_puinsus"> ' +
                            'စောင့်ကြည့်/သံသယ' +
                            '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                            info[1] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'သေဆုံး' +
                            '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                            info[4] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                            'စစ်ဆေး(စောင့်ဆိုင်း)' +
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
                            '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                            'စစ်ဆေး(မတွေ့)' +
                            '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                            info[2] +
                            '</span>' +
                            '</p>'
                        );
                    } else {
                        var info = takeInfo(iD);
                        for(i in khayines_mm) {
                            if(khayines_mm[i][0].substr(3) == info[0]) {
                                info[0] = khayines_mm[i][2];
                                break;
                            }
                        }
                        $('.tooltipster-content').html(
                            '<p class="font-weight-bold mb-1">' +
                            info[0] +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'ပိုးတွေ့(နယ်တွင်း)' +
                            '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                            info[6] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'ပိုးတွေ့(လက်ရှိ)' +
                            '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                            info[7] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0" style="display:none;" id="z_puinsus">' +
                            'စောင့်ကြည့်/သံသယ' +
                            '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                            info[1] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'သေဆုံး' +
                            '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                            info[4] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                            'စစ်ဆေး(စောင့်ဆိုင်း)' +
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
                            '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                            'စစ်ဆေး(မတွေ့)' +
                            '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                            info[2] +
                            '</span>' +
                            '</p>'
                        );
                    }
                } else if(mode == 'div') {
                    if(iD==null) {
                        var info = takeInfo(undefine);
                        for(i in divisions_mm) {
                            if(divisions_mm[i][0].substr(4) == info[0]) {
                                info[0] = divisions_mm[i][2];
                                break;
                            }
                        }
                        $('.tooltipster-content').html(
                            '<p class="font-weight-bold mb-1">' +
                            info[0] +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'ပိုးတွေ့(နယ်တွင်း)' +
                            '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                            info[6] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'ပိုးတွေ့(လက်ရှိ)' +
                            '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                            info[7] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0" style="display:block;" id="z_puinsus">' +
                            'စောင့်ကြည့်/သံသယ' +
                            '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                            info[1] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'သေဆုံး' +
                            '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                            info[4] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                            'စစ်ဆေး(စောင့်ဆိုင်း)' +
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
                            '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                            'စစ်ဆေး(မတွေ့)' +
                            '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                            info[2] +
                            '</span>' +
                            '</p>'
                        );
                    } else {
                        var info = takeInfo(iD);
                        for(i in divisions_mm) {
                            if(divisions_mm[i][0].substr(4) == info[0]) {
                                info[0] = divisions_mm[i][2];
                                break;
                            }
                        }
                        $('.tooltipster-content').html(
                            '<p class="font-weight-bold mb-1">' +
                            info[0] +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'ပိုးတွေ့(နယ်တွင်း)' +
                            '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                            info[6] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'ပိုးတွေ့(လက်ရှိ)' +
                            '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                            info[7] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0" style="display:block;" id="z_puinsus">' +
                            'စောင့်ကြည့်/သံသယ' +
                            '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                            info[1] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0">' +
                            'သေဆုံး' +
                            '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                            info[4] +
                            '</span>' +
                            '</p>' +
                            '<p class="font-size-sm text-muted mb-0" style="display:none">' +
                            'စစ်ဆေး(စောင့်ဆိုင်း)' +
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
                            '<p class="font-size-sm text-muted mb-0" style="display:none">' +
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
            , onZoom: function(){
                $('.tooltipster').tooltipster('close');
                //$('#'+recentID).attr('style',tempColor);
                document.getElementById(recentTtip).classList.remove("hoveredShwe");

            }
        });

        document.getElementById('mobile-svg').addEventListener('mousedown', start_drag);
        function start_drag() {
            //console.log(window.panZoom.getTransform());
            setTimeout(function(){
                document.getElementById(recentTtip).classList.remove("hoveredShwe");
            }, 0);
        }

        function idToName(idAtt) {
            var newName;

            idAtt = idAtt.replace('div-','');
            idAtt = idAtt.replace('ky-','');
            idAtt = idAtt.replace('-gp','');
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


        $('#zoomIn').on('click', function() {
            window.panZoom.zoomIn();
        });
        $('#zoomReset').on('click', function() {
            window.panZoom.resetZoom();
            window.panZoom.resetPan();
        });
        $('#zoomOut').on('click', function() {
            window.panZoom.zoomOut();
        });

        $('polyline').on('click', function() {
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

        $('#closeSearch').on('click', function() {
            $('#searchBtnBox').removeClass('close');
            $('#searchBox').addClass('close');
            $('#totalBoxm').removeClass('close');
        });
        $('#searchBtnBox').on('click', function() {
            $('#searchBtnBox').addClass('close');
            $('#searchBox').removeClass('close');
            if($('#searchBox').hasClass('mobile')) {
                $('#totalBoxm').addClass('close');
            }
        });
        var ttTownships = [];
        for(i in territories) {
            for(j in territories[i].data) {
                for(k in territories[i].data[j].data.ts) {
                    ttTownships.push(territories[i].data[j].data.ts[k]);
                }
            }
        }

        ttTownships.splice( $.inArray('y-ahlone', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-bahan', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-botahtaung', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-cocokyun', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-dagon', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-dagonmyothitea', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-dagonmyothitno', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-dagonmyothitse', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-dagonmyothitso', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-dala', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-dawbon', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-hlaing', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-hlaingtharya', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-kyeemyindaing', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-mingaladon', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-mingalartaungnyunt', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-northokkalapa', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-pabedan', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-pazundaung', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-seikgyikanaungto', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-seikkan', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-shwepyithar', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-tamwe', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-thingangkuun', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-yankin', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-mayangone', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-insein', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-kamaryut', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-lanmadaw', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-latha', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-sanchaung', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-southokkalapa', ttTownships), 1 );
        ttTownships.splice( $.inArray('y-thaketa', ttTownships), 1 );
        ttTownships.push('yangon-gp');


        ttTownships.splice( $.inArray('m-aungmyaythazan', ttTownships), 1 );
        ttTownships.splice( $.inArray('m-chanayethazan', ttTownships), 1 );
        ttTownships.splice( $.inArray('m-chanmyathazi', ttTownships), 1 );
        ttTownships.splice( $.inArray('m-mahaaungmyay', ttTownships), 1 );
        ttTownships.splice( $.inArray('m-pyigyitagon', ttTownships), 1 );

        ttTownships.push('mandalay-gp');

        ttTownships.sort();
        ttTownships = townships_mm;
        console.log(ttTownships);
        var ttKhayines = [];
        for(i in territories) {
            for(j in territories[i].data) {
                ttKhayines.push(territories[i].data[j].ky);
            }
        }
        ttKhayines.sort();

        var ttDivisions = [];
        for(i in territories) {
            ttDivisions.push(territories[i].div);
        }
        ttDivisions.sort();
        ttDivisions = divisions_mm;
        ttKhayines = khayines_mm;
        $('#searchInput').on('focus', function() {
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
                var tempSearch = [];max = 0;
                if(mode == 'ts') {
                    for (i in ttTownships) {
                        if ((ttTownships[i][1].indexOf($(this).val()) >= 0 && max<5) || (ttTownships[i][2].indexOf($(this).val()) >= 0 && max<5)) {
                            tempSearch.push(ttTownships[i]);
                            max ++;
                        }
                    }
                } else if(mode == 'ky') {
                    for (i in ttKhayines) {
                        if ((ttKhayines[i][1].indexOf($(this).val()) >= 0 && max<5) || (ttKhayines[i][2].indexOf($(this).val()) >= 0 && max<5)) {
                            tempSearch.push(ttKhayines[i]);
                            max ++;
                        }
                    }
                } else {
                    for (i in ttDivisions) {
                        if ((ttDivisions[i][1].indexOf($(this).val()) >= 0 && max<5) || (ttDivisions[i][2].indexOf($(this).val()) >= 0 && max<5)) {
                            tempSearch.push(ttDivisions[i]);
                            max ++;
                        }
                    }
                }
                var searchDivs = ''
                for(i in tempSearch) {
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

        $('#searchInput').on('keyup', function() {
            if ($(this).val() != '') {
                $('#searchBox').addClass('has');
            } else {
                $('#searchBox').removeClass('has');
            }
            // $('#resultBox').
            $('#resultBox').addClass('closed');
            if ($(this).val() != '') {
                var tempSearch = [];max = 0;
                if(mode == 'ts') {
                    for (i in ttTownships) {
                        if ((ttTownships[i][1].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5) || (ttTownships[i][2].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5)) {
                            tempSearch.push(ttTownships[i]);
                            max ++;
                        }
                    }
                } else if(mode == 'ky') {
                    for (i in ttKhayines) {
                        if ((ttKhayines[i][1].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5) || (ttKhayines[i][2].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5)) {
                            tempSearch.push(ttKhayines[i]);
                            max ++;
                        }
                    }
                } else {
                    for (i in ttDivisions) {
                        if ((ttDivisions[i][1].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5) || (ttDivisions[i][2].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5)) {
                            tempSearch.push(ttDivisions[i]);
                            max ++;
                        }
                    }
                }
                console.log(tempSearch);
                var searchDivs = ''
                for(i in tempSearch) {
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



        function triggerEvent( elem, event ) {
            var clickEvent = new Event( event ); // Create the event.
            elem.dispatchEvent( clickEvent );    // Dispatch the event.
        }

        //$('#pyinmana').trigger('mouseover');
        //$("ins[data-radio|='option5']").trigger('click');

    }
    var app = angular.module("myApp", ["ngRoute"]);
    app.config(function($routeProvider) {
        $routeProvider
            .when("/", {
                templateUrl : "htm/svg-map.htm",
                controller : "svgMapCtrl"
            })
            .when("/detail", {
                templateUrl : "htm/detail-map.htm",
                controller : "detailMapCtrl"
            });
    });

    app.controller("detailMapCtrl", function ($scope) {
        // accessToken
        mapboxgl.accessToken =
            "pk.eyJ1IjoiaHRldG9vbmFpbmciLCJhIjoiY2pubmFpa2x2MDN0YTNwcGFzd2RxYjhucSJ9.-iNVlzJCPgH6n99e-tH4nw";
        // initialize map
        let map = new mapboxgl.Map({
            container: "map",
            style: "mapbox://styles/mapbox/streets-v11",
            center: [95.955971, 21.916222],
            zoom: 7,
        });
        // places for autocomplete
        let places = [];

        // add markers to map
        hospitalJSON.features.forEach(function (marker) {
            places.push(marker.properties.place_name.real_name);
            places.push(marker.properties.place_name.unicode);
            places.push(marker.properties.place_name.zawgyi);
            // create a HTML element for each feature
            var el = document.createElement("div");
            el.className = "marker";
            if (marker.properties.lab_confirmed < 1) {
                el.innerHTML =
                    "<i class='far fa-dot-circle' style='color:#0066ff;'></i>";
            } else if (marker.properties.lab_confirmed < 5) {
                el.innerHTML =
                    "<i class='far fa-dot-circle' style='color:#6600cc;'></i>";
            } else {
                el.innerHTML = "<i class='far fa-dot-circle'></i>";
            }
            el.addEventListener("click", function (e) {
                /* Fly to the point */
                map.flyTo({
                    center: marker.geometry.coordinates,
                    zoom: 12,
                });
            });

            // make a marker for each feature and add to the map
            new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(
                    new mapboxgl.Popup() // add popups
                        .setHTML(
                            "<h3>" +
                            marker.properties.place_name.real_name +
                            "</h3><h4> total cases : " +
                            marker.properties.total_cases +
                            "</h4><h4> pui : " +
                            marker.properties.pui +
                            "</h4><h4> suspected : " +
                            marker.properties.suspected +
                            "</h4><h4> lab confirmed : " +
                            marker.properties.lab_confirmed +
                            "</h4><h4> lab negative : " +
                            marker.properties.lab_negative +
                            "</h4><h4> lab pending : " +
                            marker.properties.lab_pending +
                            "</h4><h4> die : " +
                            marker.properties.die +
                            "</h4><h4> recovered : " +
                            marker.properties.recovered +
                            "</h4>"
                        )
                )
                .addTo(map);
        });
        regionJSON.features.map((region) => {
            places.push(region.properties.place_name.real_name);
            places.push(region.properties.place_name.unicode);
            places.push(region.properties.place_name.zawgyi);
        });
        townshipJSON.features.map((township) => {
            places.push(township.properties.place_name.real_name);
            places.push(township.properties.place_name.unicode);
            places.push(township.properties.place_name.zawgyi);
        });
        $(".initialBtn").click(() => {
            map.flyTo({
                center: [95.955971, 21.916222],
                zoom: 7,
            });
        });

        map.addControl(new mapboxgl.NavigationControl(), "bottom-right");

        $(function () {
            let alreadyFilled = false;
            function initDialog() {
                clearDialog();
                for (var i = 0; i < places.length; i++) {
                    $(".dialog").append("<div>" + places[i] + "</div>");
                }
            }
            function clearDialog() {
                $(".dialog").empty();
            }
            $(".autocomplete input").click(function () {
                if (!alreadyFilled) {
                    $(".dialog").addClass("open");
                }
            });
            $("body").on("click", ".dialog > div", function () {
                $(".autocomplete input").val($(this).text()).focus();
                $(".autocomplete .close").addClass("visible");
                alreadyFilled = true;

                let filteredRegion = regionJSON.features.filter(
                    (feature) =>
                        feature.properties.place_name.real_name === $(this).text() ||
                        feature.properties.place_name.zawgyi === $(this).text() ||
                        feature.properties.place_name.unicode === $(this).text()
                );
                if (filteredRegion.length > 0) {
                    map.flyTo({
                        center: filteredRegion[0].geometry.coordinates,
                        zoom: 9,
                        essential: true, // this animation is considered essential with respect to prefers-reduced-motion
                    });
                } else {
                    let filteredTownship = townshipJSON.features.filter(
                        (feature) =>
                            feature.properties.place_name.real_name === $(this).text() ||
                            feature.properties.place_name.zawgyi === $(this).text() ||
                            feature.properties.place_name.unicode === $(this).text()
                    );
                    if (filteredTownship.length > 0) {
                        map.flyTo({
                            center: filteredTownship[0].geometry.coordinates,
                            zoom: 11,
                            essential: true, // this animation is considered essential with respect to prefers-reduced-motion
                        });
                    } else {
                        let filteredHospital = hospitalJSON.features.filter(
                            (feature) =>
                                feature.properties.place_name.real_name === $(this).text() ||
                                feature.properties.place_name.zawgyi === $(this).text() ||
                                feature.properties.place_name.unicode === $(this).text()
                        );
                        map.flyTo({
                            center: filteredHospital[0].geometry.coordinates,
                            zoom: 12,
                            essential: true, // this animation is considered essential with respect to prefers-reduced-motion
                        });
                    }
                }
            });
            $(".autocomplete .close").click(function () {
                alreadyFilled = false;
                initDialog();
                $(".dialog").addClass("open");
                $(".autocomplete input").val("").focus();
                $(this).removeClass("visible");
                map.flyTo({
                    center: [95.955971, 21.916222],
                    zoom: 7,
                    essential: true, // this animation is considered essential with respect to prefers-reduced-motion
                });
            });

            function match(str) {
                str = str.toLowerCase();
                clearDialog();
                for (var i = 0; i < places.length; i++) {
                    if (places[i].toLowerCase().startsWith(str)) {
                        $(".dialog").append("<div>" + places[i] + "</div>");
                    }
                }
            }
            $(".autocomplete input").on("input", function () {
                $(".dialog").addClass("open");
                alreadyFilled = false;
                match($(this).val());
            });
            $("body").click(function (e) {
                if (!$(e.target).is("input, .close")) {
                    $(".dialog").removeClass("open");
                }
            });
            initDialog();
        });
    });
    app.controller("svgMapCtrl", function ($scope) {
        myfunction();
        setTimeout(function(){
            $('#page-loader').addClass('close');
        }, 500);
        $('#detailMap').attr('href','#!detail');
    });

    $( document ).ready(function() {
        $('#dtHorizontalVerticalExample').DataTable({
            "scrollX": true,
            "scrollY": 200,
            "paging": false,
            "language": {
                search: '',
                searchPlaceholder: "မြို့နယ်ရှာဖွေရန်",
            },
            "order": [[ 1, "desc" ]],
            columnDefs: [{
                targets: "_all",
                orderable: false
            }]
        });

        $('#dtHorizontalVerticalKy').DataTable({
            "scrollX": true,
            "scrollY": 200,
            "paging": false,
            "language": {
                search: '',
                searchPlaceholder: "ခရိုင်ရှာဖွေရန်",
            },
            "order": [[ 1, "desc" ]],
            columnDefs: [{
                targets: "_all",
                orderable: false
            }]
        });

        $('#dtHorizontalVerticalDiv').DataTable({
            "scrollX": true,
            "scrollY": 200,
            "paging": false,
            "language": {
                search: '',
                searchPlaceholder: "တိုင်း/နယ်ရှာဖွေရန်",
            },
            "order": [[ 1, "desc" ]],
            columnDefs: [{
                targets: "_all",
                orderable: false
            }]
        });
        $('.dataTables_length').addClass('bs-select');


        $('.table-responsive').addClass('card');
        $('.table-responsive').addClass('shadow-lift');





        "use strict";

        var demoMode = (function () {
            var e,
                t,
                a,
                o,
                l,
                r,
                n,
                s,
                i = document.querySelector("#popoverDemo"),
                c = document.querySelector("#demoForm"),
                d = document.querySelector("#topnav"),
                u = document.querySelector("#topbar"),
                f = document.querySelector("#sidebar"),
                h = document.querySelector("#sidebarSmall"),
                p = document.querySelector("#sidebarUser"),
                g = document.querySelector("#sidebarSmallUser"),
                v = document.querySelector("#sidebarSizeContainer"),
                m = document.querySelectorAll('input[name="navPosition"]'),
                b = document.querySelectorAll('[class^="container"]'),
                S = document.querySelector("#stylesheetLight"),
                y = document.querySelector("#stylesheetDark"),
                C = {
                    showPopover:
                        !localStorage.getItem("dashkitShowPopover") ||
                        localStorage.getItem("dashkitShowPopover"),
                    colorScheme: localStorage.getItem("dashkitColorScheme")
                        ? localStorage.getItem("dashkitColorScheme")
                        : "light",
                    navPosition: localStorage.getItem("dashkitNavPosition")
                        ? localStorage.getItem("dashkitNavPosition")
                        : "sidenav",
                    navColor: localStorage.getItem("dashkitNavColor")
                        ? localStorage.getItem("dashkitNavColor")
                        : "default",
                    sidebarSize: localStorage.getItem("dashkitSidebarSize")
                        ? localStorage.getItem("dashkitSidebarSize")
                        : "base",
                };
            function k(e) {
                "topnav" == e ? $(v).collapse("hide") : $(v).collapse("show");
            }
            function L(e) {
                e && e.setAttribute("style", "display: none !important");
            }
            return (
                i &&
                (JSON.parse(C.showPopover) &&
                "base" === C.sidebarSize &&
                $(i)
                    .popover({
                        boundary: "viewport",
                        offset: "50px",
                        placement: "top",
                        template:
                            '<div class="popover popover-lg popover-dark d-none d-md-block" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
                    })
                    .popover("show"),
                    i.addEventListener("click", function () {
                        $(i).popover("hide"), localStorage.setItem("dashkitShowPopover", !1);
                    })),
                    (function () {
                        for (
                            var e = window.location.search.substring(1).split("&"), t = 0;
                            t < e.length;
                            t++
                        ) {
                            var a = e[t].split("="),
                                o = a[0],
                                l = a[1];
                            ("colorScheme" != o &&
                                "navPosition" != o &&
                                "navColor" != o &&
                                "sidebarSize" != o) ||
                            (localStorage.setItem(
                                "dashkit" + o.charAt(0).toUpperCase() + o.slice(1),
                                l
                            ),
                                (C[o] = l));
                        }
                    })(),
                    "light" == (e = C.colorScheme)
                        ? ((S.disabled = !1), (y.disabled = !0), (e = "light"))
                        : "dark" == e && ((S.disabled = !0), (y.disabled = !1), (e = "dark")),
                    (function (e) {
                        if (d && u && f && h && p && g)
                            if ("topnav" == e) {
                                L(u), L(f), L(h);
                                for (var t = 0; t < b.length; t++)
                                    b[t].classList.remove("container-fluid"),
                                        b[t].classList.add("container");
                            } else if ("combo" == e) {
                                L(d), L(p), L(g);
                                for (t = 0; t < b.length; t++)
                                    b[t].classList.remove("container"),
                                        b[t].classList.add("container-fluid");
                            } else if ("sidenav" == e) {
                                L(d), L(u);
                                for (t = 0; t < b.length; t++)
                                    b[t].classList.remove("container"),
                                        b[t].classList.add("container-fluid");
                            }
                    })(C.navPosition),
                    (t = C.navColor),
                f &&
                h &&
                d &&
                ("default" == t
                    ? (f.classList.add("navbar-light"),
                        h.classList.add("navbar-light"),
                        d.classList.add("navbar-light"))
                    : "inverted" == t
                        ? (f.classList.add("navbar-dark"),
                            h.classList.add("navbar-dark"),
                            d.classList.add("navbar-dark"))
                        : "vibrant" == t &&
                        (f.classList.add("navbar-dark", "navbar-vibrant"),
                            h.classList.add("navbar-dark", "navbar-vibrant"),
                            d.classList.add("navbar-dark", "navbar-vibrant"))),
                    "base" == (a = C.sidebarSize) ? L(h) : "small" == a && L(f),
                    (o = c),
                    (l = C.colorScheme),
                    (r = C.navPosition),
                    (n = C.navColor),
                    (s = C.sidebarSize),
                    $(o)
                        .find('[name="colorScheme"][value="' + l + '"]')
                        .closest(".btn")
                        .button("toggle"),
                    $(o)
                        .find('[name="navPosition"][value="' + r + '"]')
                        .closest(".btn")
                        .button("toggle"),
                    $(o)
                        .find('[name="navColor"][value="' + n + '"]')
                        .closest(".btn")
                        .button("toggle"),
                    $(o)
                        .find('[name="sidebarSize"][value="' + s + '"]')
                        .closest(".btn")
                        .button("toggle"),
                    k(C.navPosition),
                    (document.body.style.display = "block"),
                c &&
                (c.addEventListener("submit", function (e) {
                    var t, a, o, l, r;
                    e.preventDefault(),
                        (a = (t = c).querySelector('[name="colorScheme"]:checked').value),
                        (o = t.querySelector('[name="navPosition"]:checked').value),
                        (l = t.querySelector('[name="navColor"]:checked').value),
                        (r = t.querySelector('[name="sidebarSize"]:checked').value),
                        localStorage.setItem("dashkitColorScheme", a),
                        localStorage.setItem("dashkitNavPosition", o),
                        localStorage.setItem("dashkitNavColor", l),
                        localStorage.setItem("dashkitSidebarSize", r),
                        (window.location = window.location.pathname);
                }),
                    [].forEach.call(m, function (e) {
                        e.parentElement.addEventListener("click", function () {
                            k(e.value);
                        });
                    })),
                    !0
            );
        })();
        !(function () {
            var e = {
                    300: "#E3EBF6",
                    600: "#95AAC9",
                    700: "#6E84A3",
                    800: "#152E4D",
                    900: "#283E59",
                },
                t = { 100: "#D2DDEC", 300: "#A6C5F7", 700: "#2C7BE5" },
                a = "#FFFFFF",
                o = "transparent",
                l = "Cerebri Sans",
                r = document.querySelectorAll('[data-toggle="chart"]'),
                n = document.querySelectorAll('[data-toggle="legend"]');
            function f(t) {
                var a = void 0;
                return (
                    Chart.helpers.each(Chart.instances, function (e) {
                        t == e.chart.canvas && (a = e);
                    }),
                        a
                );
            }
            "undefined" != typeof Chart &&
            ((Chart.defaults.global.responsive = !0),
                (Chart.defaults.global.maintainAspectRatio = !1),
                (Chart.defaults.global.defaultColor = e[600]),
                (Chart.defaults.global.defaultFontColor = e[600]),
                (Chart.defaults.global.defaultFontFamily = l),
                (Chart.defaults.global.defaultFontSize = 13),
                (Chart.defaults.global.layout.padding = 0),
                (Chart.defaults.global.legend.display = !1),
                (Chart.defaults.global.legend.position = "bottom"),
                (Chart.defaults.global.legend.labels.usePointStyle = !0),
                (Chart.defaults.global.legend.labels.padding = 16),
                (Chart.defaults.global.elements.point.radius = 0),
                (Chart.defaults.global.elements.point.backgroundColor = t[700]),
                (Chart.defaults.global.elements.line.tension = 0.4),
                (Chart.defaults.global.elements.line.borderWidth = 3),
                (Chart.defaults.global.elements.line.borderColor = t[700]),
                (Chart.defaults.global.elements.line.backgroundColor = o),
                (Chart.defaults.global.elements.line.borderCapStyle = "rounded"),
                (Chart.defaults.global.elements.rectangle.backgroundColor = t[700]),
                (Chart.defaults.global.elements.rectangle.maxBarThickness = 10),
                (Chart.defaults.global.elements.arc.backgroundColor = t[700]),
                (Chart.defaults.global.elements.arc.borderColor = a),
                (Chart.defaults.global.elements.arc.borderWidth = 4),
                (Chart.defaults.global.elements.arc.hoverBorderColor = a),
                (Chart.defaults.global.tooltips.enabled = !1),
                (Chart.defaults.global.tooltips.mode = "index"),
                (Chart.defaults.global.tooltips.intersect = !1),
                (Chart.defaults.global.tooltips.custom = function (r) {
                    var e = document.getElementById("chart-tooltip"),
                        n = this._chart.config.type;
                    if (
                        (e ||
                        ((e = document.createElement("div")).setAttribute(
                            "id",
                            "chart-tooltip"
                        ),
                            e.setAttribute("role", "tooltip"),
                            e.classList.add("popover"),
                            e.classList.add("bs-popover-top"),
                            document.body.appendChild(e)),
                        0 !== r.opacity)
                    ) {
                        if (r.body) {
                            var t = r.title || [],
                                a = r.body.map(function (e) {
                                    return e.lines;
                                }),
                                s = '<div class="arrow"></div>';
                            t.forEach(function (e) {
                                s += '<h3 class="popover-header text-center">' + e + "</h3>";
                            }),
                                a.forEach(function (e, t) {
                                    var a = r.labelColors[t],
                                        o =
                                            '<span class="popover-body-indicator" style="background-color: ' +
                                            ("line" === n && "rgba(0,0,0,0.1)" !== a.borderColor
                                                ? a.borderColor
                                                : a.backgroundColor) +
                                            '"></span>',
                                        l =
                                            1 < e.length
                                                ? "justify-content-left"
                                                : "justify-content-center";
                                    s +=
                                        '<div class="popover-body d-flex align-items-center ' +
                                        l +
                                        '">' +
                                        o +
                                        e +
                                        "</div>";
                                }),
                                (e.innerHTML = s);
                        }
                        var o = this._chart.canvas.getBoundingClientRect(),
                            l =
                                window.pageYOffset ||
                                document.documentElement.scrollTop ||
                                document.body.scrollTop ||
                                0,
                            i =
                                window.pageXOffset ||
                                document.documentElement.scrollLeft ||
                                document.body.scrollLeft ||
                                0,
                            c = o.top + l,
                            d = o.left + i,
                            u = e.offsetWidth,
                            f = e.offsetHeight,
                            h = c + r.caretY - f - 16,
                            p = d + r.caretX - u / 2;
                        (e.style.top = h + "px"),
                            (e.style.left = p + "px"),
                            (e.style.visibility = "visible");
                    } else e.style.visibility = "hidden";
                }),
                (Chart.defaults.global.tooltips.callbacks.label = function (e, t) {
                    var a = "",
                        o = e.yLabel,
                        l = t.datasets[e.datasetIndex],
                        r = l.label,
                        n = l.yAxisID ? l.yAxisID : 0,
                        s = this._chart.options.scales.yAxes,
                        i = s[0];
                    if (n)
                        i = s.filter(function (e) {
                            return e.id == n;
                        })[0];
                    var c = i.ticks.callback;
                    return (
                        1 <
                        t.datasets.filter(function (e) {
                            return !e.hidden;
                        }).length &&
                        (a = '<span class="popover-body-label mr-auto">' + r + "</span>"),
                            (a += '<span class="popover-body-value">' + c(o) + "</span>")
                    );
                }),
                (Chart.defaults.doughnut.cutoutPercentage = 83),
                (Chart.defaults.doughnut.tooltips.callbacks.title = function (e, t) {
                    return t.labels[e[0].index];
                }),
                (Chart.defaults.doughnut.tooltips.callbacks.label = function (e, t) {
                    var a = t.datasets[0].data[e.index],
                        o = this._chart.options.tooltips.callbacks,
                        l = o.afterLabel() ? o.afterLabel() : "";
                    return (
                        '<span class="popover-body-value">' +
                        (o.beforeLabel() ? o.beforeLabel() : "") +
                        a +
                        l +
                        "</span>"
                    );
                }),
                (Chart.defaults.doughnut.legendCallback = function (e) {
                    var o = e.data,
                        l = "";
                    return (
                        o.labels.forEach(function (e, t) {
                            var a = o.datasets[0].backgroundColor[t];
                            (l += '<span class="chart-legend-item">'),
                                (l +=
                                    '<i class="chart-legend-indicator" style="background-color: ' +
                                    a +
                                    '"></i>'),
                                (l += e),
                                (l += "</span>");
                        }),
                            l
                    );
                }),
                Chart.scaleService.updateScaleDefaults("linear", {
                    gridLines: {
                        borderDash: [2],
                        borderDashOffset: [2],
                        color: e[300],
                        drawBorder: !1,
                        drawTicks: !1,
                        zeroLineColor: e[300],
                        zeroLineBorderDash: [2],
                        zeroLineBorderDashOffset: [2],
                    },
                    ticks: { beginAtZero: !0, padding: 10, stepSize: 10 },
                }),
                Chart.scaleService.updateScaleDefaults("category", {
                    gridLines: { drawBorder: !1, drawOnChartArea: !1, drawTicks: !1 },
                    ticks: { padding: 20 },
                }),
            r &&
            [].forEach.call(r, function (e) {
                var t = e.dataset.trigger;
                e.addEventListener(t, function () {
                    !(function (e) {
                        var t = e.dataset.target,
                            a = e.dataset.action,
                            o = parseInt(e.dataset.dataset),
                            l = f(document.querySelector(t));
                        if ("toggle" === a) {
                            var r = l.data.datasets,
                                n = r.filter(function (e) {
                                    return !e.hidden;
                                })[0],
                                s = r.filter(function (e) {
                                    return 1e3 === e.order;
                                })[0];
                            if (!s) {
                                for (var i in ((s = {}), n)) "_meta" !== i && (s[i] = n[i]);
                                (s.order = 1e3), (s.hidden = !0), r.push(s);
                            }
                            var c = r[o] === n ? s : r[o];
                            for (var i in n) "_meta" !== i && (n[i] = c[i]);
                            l.update();
                        }
                        if ("add" === a) {
                            var d = l.data.datasets[o],
                                u = d.hidden;
                            d.hidden = !u;
                        }
                        l.update();
                    })(e);
                });
            }),
            n &&
            document.addEventListener("DOMContentLoaded", function () {
                [].forEach.call(n, function (e) {
                    var t, a, o;
                    (a = f((t = e)).generateLegend()),
                        (o = t.dataset.target),
                        (document.querySelector(o).innerHTML = a);
                });
            }));
        })(),
            (function () {
                var e = {
                        300: "#E3EBF6",
                        600: "#95AAC9",
                        700: "#6E84A3",
                        800: "#152E4D",
                        900: "#283E59",
                    },
                    t = localStorage.getItem("dashkitColorScheme")
                        ? localStorage.getItem("dashkitColorScheme")
                        : "light";
                function a() {
                    (Chart.defaults.global.defaultColor = e[700]),
                        (Chart.defaults.global.defaultFontColor = e[700]),
                        (Chart.defaults.global.elements.arc.borderColor = e[800]),
                        (Chart.defaults.global.elements.arc.hoverBorderColor = e[800]),
                        Chart.scaleService.updateScaleDefaults("linear", {
                            gridLines: {
                                borderDash: [2],
                                borderDashOffset: [2],
                                color: e[900],
                                drawBorder: !1,
                                drawTicks: !1,
                                zeroLineColor: e[900],
                                zeroLineBorderDash: [2],
                                zeroLineBorderDashOffset: [2],
                            },
                            ticks: {
                                beginAtZero: !0,
                                padding: 10,
                                callback: function (e) {
                                    if (!(e % 10)) return e;
                                },
                            },
                        });
                }
                "undefined" != typeof Chart &&
                (void 0 === demoMode ? a() : demoMode && "dark" == t && a());
            })(),
            (function () {
                var e = document.querySelectorAll('[data-toggle="autosize"]');
                "undefined" != typeof autosize &&
                e &&
                [].forEach.call(e, function (e) {
                    autosize(e);
                });
            })();


        var groupPercentInfo = <?php echo json_encode($donutResult) ?>


            // chart_htetoonaing
            "use strict";

        (function () {
            var e = document.getElementById("trafficChart").getContext("2d");



            let config = {
                type: "doughnut",
                options: {
                    tooltips: {
                        callbacks: {
                            afterLabel: function () {
                                return "ယောက်";
                            },
                        },
                    },
                },
                data: {
                    labels: ["0-17နှစ်", "18နှစ်-44နှစ်", "45နှစ်-64နှစ်", "65နှစ်-74နှစ်", "75နှစ်အထက်"],
                    datasets: [
                        {
                            data: groupPercentInfo.positive.age.num,
                            backgroundColor: ["#fceae9", "#f0948f", "#e0281f", "#70140f", "#000000"],
                        }
                    ],
                },
            };
            let trafficChart = new Chart(e, config);
            var groupChartToggle = false;
            var type = 'age';
            function changeGroupChart() {
                console.log(type + groupChartToggle);
                if(type=='age' && groupChartToggle) {
                    $('.donutModeLabel').attr('style', 'display:none');

                    trafficChart.data.datasets =
                        [
                            {
                                data: groupPercentInfo.dead.age.num,
                                backgroundColor: ["#f2f2f2", "#bfbfbf", "#808080", "#404040", "#000000"],
                            }
                        ];
                    trafficChart.data.labels =  ["0-17နှစ်", "18နှစ်-44နှစ်", "45နှစ်-64နှစ်", "65နှစ်-74နှစ်", "75နှစ်အထက်"];
                    trafficChart.update();
                    $('#donutAgeDieModeLabel').attr('style', 'display:block');
                } else if (type=='age' && !groupChartToggle) {
                    $('.donutModeLabel').attr('style', 'display:none');
                    trafficChart.data.datasets =
                        [
                            {
                                data: groupPercentInfo.positive.age.num,
                                backgroundColor: ["#fceae9", "#f0948f", "#e0281f", "#70140f", "#000000"],
                            }
                        ];
                    trafficChart.data.labels =  ["0-17နှစ်", "18နှစ်-44နှစ်", "45နှစ်-64နှစ်", "65နှစ်-74နှစ်", "75နှစ်အထက်"];
                    trafficChart.update();
                    $('#donutAgePosModeLabel').attr('style', 'display:block');
                } else if (type=='gender' && groupChartToggle) {
                    $('.donutModeLabel').attr('style', 'display:none');
                    trafficChart.data.datasets =
                        [
                            {
                                data: groupPercentInfo.dead.gender.num,
                                backgroundColor: ["#bfbfbf", "#404040"],
                            }
                        ];
                    trafficChart.data.labels =  groupPercentInfo.dead.gender.label;
                    trafficChart.update();
                    $('#donutGenDieModeLabel').attr('style', 'display:block');
                } else if (type=='gender' && !groupChartToggle) {
                    $('.donutModeLabel').attr('style', 'display:none');
                    trafficChart.data.datasets =
                        [
                            {
                                data: groupPercentInfo.positive.gender.num,
                                backgroundColor: ["#f0948f", "#70140f"],
                            }
                        ];
                    trafficChart.data.labels =  groupPercentInfo.positive.gender.label;
                    trafficChart.update();
                    $('#donutGenPosModeLabel').attr('style', 'display:block');
                }
            }
            $('#customSwitch5').on('change', function() {
                if($(this).prop('checked')) {
                    $('#customSwitch5Text').html('ပိုးတွေ့သေဆုံး');
                } else {
                    $('#customSwitch5Text').html('ပိုးတွေ့လူနာ');
                }
                groupChartToggle = $(this).prop('checked');
                changeGroupChart();
            });
            $('#groupAge').on('click', function() {
                type = 'age';
                $('#donutChangeMode').html('အသက်');
                changeGroupChart();
            });
            $('#groupGender').on('click', function() {
                type = 'gender';
                $('#donutChangeMode').html('ကျား/မ');
                changeGroupChart();
            });




        })();





        var dayByDayInfo = <?php echo json_encode($dailyResult); ?>;

        "use strict";
        !function () {
            var glolabels = dayByDayInfo.positive.date;
            var glodatasets =
                [
                    {
                        label: "Confirmed",
                        borderColor:'#ff6666',
                        data: dayByDayInfo.positive.num
                    }
                ]
            var e = document.getElementById("salesChart");
            var dayByDayChart =  new Chart(e, {
                type: "line",
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function (e) {
                                    return  e + 'ယောက်'
                                }
                            }
                        }]
                    }
                },
                data: {
                    labels: glolabels,
                    datasets: glodatasets,
                }
            })

            $('#dayByDayToggle').on('change', function() {

                if(!$(this).prop('checked')) {
                    $('#dayByDayToggleText').html('ပိုးတွေ့လူနာ');
                    labels = dayByDayInfo.positive.date;
                    dayByDayChart.data.datasets =
                        [
                            {
                                label: "Confirmed",
                                borderColor:'#ff6666',
                                data: dayByDayInfo.positive.num
                            }
                        ]
                    console.log(dayByDayInfo.positive.date);
                    console.log(dayByDayInfo.positive.num);
                    dayByDayChart.update();
                } else if($(this).prop('checked')) {
                    $('#dayByDayToggleText').html('ပိုးတွေ့သေဆုံး');
                    labels = dayByDayInfo.dead.date;
                    dayByDayChart.data.datasets =
                        [
                            {
                                label: "Confirmed",
                                borderColor:'#000',
                                data: dayByDayInfo.dead.num
                            }
                        ]
                    console.log(dayByDayInfo.dead.date);
                    console.log(dayByDayInfo.dead.num);
                    dayByDayChart.update();
                }
            });
        }()


        $('.tableTsMode').on('click', function() {
            $('#tableChangeMode').html('မြို့နယ်');
            $('#regionTable .table-responsive').attr('style', 'height: 0px;padding-top: 0px;padding-bottom: 0px;margin-top:0px; margin-bottom: 0px;');
            $('#regionTable #sps-table-ts').attr('style', '');
        });
        $('.tableKyMode').on('click', function() {
            $('#tableChangeMode').html('ခရိုင်');
            $('#regionTable .table-responsive').attr('style', 'height: 0px;padding-top: 0px;padding-bottom: 0px;margin-top:0px; margin-bottom: 0px;');
            $('#regionTable #sps-table-ky').attr('style', '');
        });
        $('.tableDivMode').on('click', function() {
            $('#tableChangeMode').html('တိုင်း/နယ်');
            $('#regionTable .table-responsive').attr('style', 'height: 0px;padding-top: 0px;padding-bottom: 0px;margin-top:0px; margin-bottom: 0px;');
            $('#regionTable #sps-table-div').attr('style', '');
        });

        $('#regionTable .table-responsive #dtHorizontalVerticalDiv input').attr('placeholder', 'search ts');
    });




</script>


<script src="../assets/js/autocomplete.js"></script>
<script>
    $('.about-link-btn').on('click', function() {
        window.location.href = "about-corona-mm.php";
    });

    $('.logo-icon-btn').on('click', function() {
        window.location.href = "index.html";
    });
</script>
</body>
</html>
