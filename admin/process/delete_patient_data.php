<?php


require_once '../core/init.php';

if(isset($_POST["patient_id"]))
{

    $rowCount =$user->delete('Patients',$_POST['patient_id']);
    if($rowCount) echo $rowCount.' Row Deleted Successfully';
    else echo "Delete Error";
}






?>