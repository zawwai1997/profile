<?php


require_once '../core/init.php';

if(isset($_POST["patient_id"]))
{

    $value = strtolower($_POST['value']);
    if($value == "male") $value = 1;
    else if($value == "female") $value =2;
    else if($value == "unknown") $value =3;

    else if($value == "die") $value = 5;
    else if($value == "recovered") $value = 6;
    else if($value == "confirmed") $value = 7;



    $rowCount =$user->update('Patients',$_POST['key'],$value,$_POST['patient_id']);
    if($rowCount) echo $rowCount.' Row Updated Successfully';
    else echo "Update Error";
}





?>