<?php
require_once '../core/init.php';

$properties = $user->getHospitalJson();
$featuresAry = array();
$featuresAry['type'] = "FeatureCollection";
foreach ($properties as $key => $value) {
    $place = array(
        "db_name" => trim($value['db_name'], " "),
        "real_name" => trim($value['db_name'], " "),
        "zawgyi" => trim($value['zawgyi'], " "),
        "unicode" => trim($value['unicode'], " ")
    );

    $propertyAry = array(
        "place_name"=>$place,
        "description"=>"",
        "pui"=>$value['pui'],
        "suspected"=>$value['suspected'],
        "lab_negative"=>$value['lab_negative'],
        "lab_pending"=>$value['lab_pending'],
        "die"=>$value['death'],
        "recovered"=>$value['recovered'],
        "lab_confirmed"=>$value['lab_confirmed'],
        "total_cases"=>$value['pui']+$value['suspected']+$value['lab_negative']+$value['lab_pending']+
            $value['death']+$value['recovered']+$value['lab_confirmed'],
        "township"=>$value['township'],
        "district"=>$value['district'],
        "region"=>$value['state']

    );
    //    For Geometry
    $geometryAry = array("type"=>"Point","coordinates"=>[$value['lon'],$value['lat']]);
    $oneAry = array(
        "type"=>"Feature",
        "geometry"=>$geometryAry,
        "properties"=>$propertyAry
    );
    if(!isset($featuresAry['features'])) {
        $featuresAry['features'] = array();
    }
    $featuresAry['features'][] = $oneAry;
}
$finalAry =  json_encode($featuresAry);
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
