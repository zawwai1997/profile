<?php
require_once 'admin/core/init.php';

$States = $user->get('States');
$District = $user->get('District');
$Townships = $user->get('Townships');
//
//
//$statePositiveData = array();
//$StatePositives = $user->getRegionJson();
//$DistrictPositives = $user->getPositives('District');
//$TownshipPositives = $user->getPositives('Townships');

$regionData = $user->getRegionJson();
$regionAry = array();

$townshipData = $user->getTownshipJson();
$townshipAry = array();

$districtData = $user->getDistrictJson();
$districtAry = array();


foreach ($regionData as $key => $value) {
    $oneRegion = array(
        "name" => $value['db_name'],
        "puinsuspect"=>$value['pui']+$value['suspected'],
        "pui" => $value['pui'],
        "suspected" => $value['suspected'],
        "lab_negative" => $value['lab_negative'],
        "lab_pending" => $value['lab_pending'],
        "die" => $value['death'],
        "recovered" => $value['recovered'],
        "lab_confirmed" => $value['lab_confirmed'],
        "total_cases" => $value['pui'] + $value['suspected'] + $value['lab_negative'] + $value['lab_pending'] +
            $value['death'] + $value['recovered'] + $value['lab_confirmed']
    );
    array_push($regionAry, $oneRegion);
}

echo json_encode($regionAry);
echo "<br>" . "==========================okbro===================================================="."<br>";

foreach ($townshipData as $key => $value) {
    $oneTownship = array(
        "name"=>$value['db_name'],
        "puinsuspect"=>$value['pui']+$value['suspected'],
        "pui"=>$value['pui'],
        "suspected"=>$value['suspected'],
        "lab_negative"=>$value['lab_negative'],
        "lab_pending"=>$value['lab_pending'],
        "die"=>$value['death'],
        "recovered"=>$value['recovered'],
        "lab_confirmed"=>$value['lab_confirmed'],
        "total_cases"=>$value['pui']+$value['suspected']+$value['lab_negative']+$value['lab_pending']+
            $value['death']+$value['recovered']+$value['lab_confirmed']
    );
    array_push($townshipAry, $oneTownship);
}
echo json_encode($townshipAry);




echo "<br>" . "=============================================================================="."<br>";


foreach ($districtData as $key => $value) {
    $oneDistrict = array(
        "name"=>$value['db_name'],
        "pui"=>$value['pui'],
        "puinsuspect"=>$value['pui']+$value['suspected'],
        "suspected"=>$value['suspected'],
        "lab_negative"=>$value['lab_negative'],
        "lab_pending"=>$value['lab_pending'],
        "die"=>$value['death'],
        "recovered"=>$value['recovered'],
        "lab_confirmed"=>$value['lab_confirmed'],
        "total_cases"=>$value['pui']+$value['suspected']+$value['lab_negative']+$value['lab_pending']+
            $value['death']+$value['recovered']+$value['lab_confirmed']
    );
    array_push($districtAry, $oneDistrict);
}
echo json_encode($districtAry);
echo "<br>" . "==============================================================================";


$statesData = array();
$districtData = array();
$townshipData = array();

foreach ($States as $state => $sta) {
//    $statesData[0] = $sta['name'];
//    $statesData[1] = $sta['real_name'];
//    $statesData[2] = $sta['unicode'];
//    $statesData[3] = $sta['zawgyi'];

    $oneState = array(
        $sta['name'],$sta['real_name'],$sta['unicode'],$sta['zawgyi']
    );
    array_push($statesData,$oneState);

};

foreach ($District as $district => $dist) {
    array_push($districtData, $dist['name']);
};

foreach ($Townships as $township => $town) {
    array_push($townshipData, $town['name']);
};
echo "<br>";
echo json_encode($statesData);
die();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Hello
<script>
    var divisions =  <?php echo json_encode($statesData); ?>;
    console.log(divisions);

    var khayines =  <?php echo json_encode($districtData); ?>;
    console.log(khayines);

    var townships =  <?php echo json_encode($townshipData); ?>;
    console.log(townships);
</script>
</body>
</html>