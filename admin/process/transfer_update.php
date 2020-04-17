<?php
require_once '../core/init.php';
if (isset($_POST['btnTransfer']) && $_POST['tok'] == $_SESSION['token']) {
    $first_hospital_id =$_POST['first_hospital_id'];
    $current_hospital_id =$_POST['current_hospital_id'];
    $patient_id = $_POST['patient_id'];
    $query = "UPDATE `Patients` SET `hospital_id` = '$current_hospital_id', `first_hospital_id` = '$first_hospital_id' WHERE `Patients`.`id` = $patient_id";

    $result =$user->getData($query);


        flash('success', "Successfully Updated");
        header("location:../all-positive-patient.php");
        exit();


}else {

    session_destroy();
    header("location: ../error/404.php");
    exit();
}