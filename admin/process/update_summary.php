<?php


require_once '../core/init.php';

if ($_POST['tok'] == $_SESSION['token'] && isset($_POST['btnUpdate'])) {

   $confirm = $user->checkInput($_POST['confirm']);
   $pui = $user->checkInput($_POST['pui']);
   $die = $user->checkInput($_POST['die']);
   $test = $user->checkInput($_POST['test']);
   $cure = $user->checkInput($_POST['cure']);
   $recovered = $user->checkInput($_POST['recovered']);
   $status = $user->checkInput($_POST['status']);

   $result =$user->updateSummary($status,$confirm,$pui,$die,$test,$cure,$recovered);
   if($result>0) {
       flash('success', "Successfully Updated");
       header("location:../summary.php");
       exit();
   }
   else{
       flash('success', "Update Fail1");
       header("location:../summary.php");
       exit();
   }

}
else{
    flash('success', "Update Fail");
    header("location:../summary.php");
    exit();
}





?>