<?php
require_once '../core/init.php';
$properties = $user->getDistrictJson();

$featuresAry = array();
$featuresAry['type'] = "FeatureCollection";

foreach ($properties as $key => $value) {
    $place =array(
        "db_name" => trim($value['db_name']," "),
        "real_name" => trim($value['real_name']," "),
        "zawgyi" => trim($value['zawgyi']," "),
        "unicode" => trim($value['unicode']," ")
    );
    $district_id = $value['id'];
    $visited_places = $user->getVisitedPlaces('District.id = '.$district_id);
}