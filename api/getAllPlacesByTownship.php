<?php

require_once '../core/init.php';
$data = $user->getAll('Townships.name');

$overall = array();
$finalAry = array();

$total_pui = 0;
$total_suspected = 0;
$total_lab_negative = 0;
$total_lab_pending = 0;
$total_lab_death = 0;
$total_recovered = 0;
$total_confirmed = 0;

$townshipAry= array();

foreach ($data as $key => $value) {

    $total_pui = $total_pui + $value['pui'];
    $total_suspected = $total_suspected + $value['suspected'];
    $total_lab_negative = $total_lab_negative + $value['lab_negative'];
    $total_lab_pending = $total_lab_pending + $value['lab_pending'];
    $total_lab_death = $total_lab_death + $value['death'];
    $total_recovered = $total_recovered + $value['recovered'];
    $total_confirmed = $total_confirmed + $value['lab_confirmed'];

    $OneHospitalAry = array(
        "id" => $value['id'],
        "name" => $value['hospital'],
        "township" => $value['township'],
        "district" => $value['district'],
        "state" => $value['state'],
        "longitude" => $value['longitude'],
        "latitude" => $value['latitude'],
        "pui" => $value['pui'],
        "suspected" => $value['suspected'],
        "lab_negative" => $value['lab_negative'],
        "lab_pending" => $value['lab_pending'],
        "death" => $value['death'],
        "recovered" => $value['recovered'],
        "lab_confirmed" => $value['lab_confirmed'],
        "total_cases" => $value['pui'] + $value['suspected'] + $value['lab_negative'] + $value['lab_pending'] +
            $value['death'] + $value['lab_confirmed'] + $value['recovered']
    );

    if(!isset($townshipAry[$value['township']])) {
        $townshipAry[$value['township']] = array();
    }

    $townshipAry[$value['township']][] = $OneHospitalAry;
}
$overall = array(
    "total_pui" => $total_pui,
    "total_suspected" => $total_suspected,
    "total_lab_negative" => $total_lab_negative,
    "total_lab_pending" => $total_lab_pending,
    "total_lab_death" => $total_lab_death,
    "total_recovered" => $total_recovered,
    "total_confirmed" => $total_confirmed,
    "total_cases" => $total_pui+$total_suspected+$total_lab_negative+$total_lab_pending+$total_lab_death+$total_recovered+$total_confirmed

    );


$finalAry = array("overall" => $overall, "details" => $townshipAry);

$finalAry = json_encode($finalAry);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/jsonFormatter.js"></script>
    <script src="js/jsonFormatter.min.js"></script>

    <link href="css/jsonFormatter.css" rel="stylesheet">
    <link href="css/jsonFormatter.min.css" rel="stylesheet">
</head>
<body>
<p class="demo"><?php echo $finalAry ?></p>

<script>
    $('.demo').jsonFormatter();
</script>
<script>
    $('.jsonFormatterCustom').jsonFormatter({quoteKeys: false, collapsible: false, hideOriginal: false});

</script>

</body>
</html>
