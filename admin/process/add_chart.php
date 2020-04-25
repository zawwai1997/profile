<?php
include ('../core/init.php');
if(isset($_POST["date"], $_POST["confirm"] , $_POST['die']))
{
    $date = $user->checkInput($_POST["date"]);
    $confirm = $user->checkInput($_POST["confirm"]);
    $die = $user->checkInput($_POST["die"]);
 $result =$user->create('Chart',array(
     "date"=>$date,
     "confirmed" => $confirm,
     "die" =>$die
 ));
 if($result) echo "Data Updated";
 else echo "Update Error";
}
?>