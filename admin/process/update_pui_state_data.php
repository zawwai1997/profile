<?php


require_once '../core/init.php';

if(isset($_POST["id"]))
{

    $key = strtolower($_POST['key']);
    $value = strtolower($_POST['value']);

    $rowCount =$user->update('Div_Pos',$key,$value,$_POST['id']);
    if($rowCount) echo $rowCount.' Row Updated Successfully';
    else echo "Update Error";
}





?>