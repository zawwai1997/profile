<?php
require_once '../core/init.php';
if (isset($_POST['btnAddHospital']) && $_POST['tok'] == $_SESSION['token']) {

    $hospital_name = $user->checkInput($_POST['hospital_name']);
    $hospital_unicode = $user->checkInput($_POST['hospital_unicode']);
    $hospital_zawgyi = $user->checkInput($_POST['hospital_zawgyi']);
    $township_id = $user->checkInput($_POST['hospital_township']);
    $latitude = $user->checkInput($_POST['latitude']);
    $longitude = $user->checkInput($_POST['longitude']);


    $pui = $user->checkInput($_POST['pui']);
    $suspected = $user->checkInput($_POST['suspected']);
    $lab_confirmed = $user->checkInput($_POST['lab_confirmed']);
    $lab_negative = $user->checkInput($_POST['lab_negative']);
    $lab_pending = $user->checkInput($_POST['lab_pending']);



    $hospital_id = $user->create_get_last_id('Hospitals', array(
        'name' => $hospital_name,
        'zawgyi' => $hospital_zawgyi,
        'unicode' => $hospital_unicode,
        'township_id' => $township_id,
        'lon' => $longitude,
        'lat' => $latitude
    ));


    if ($hospital_id) {

        if($pui) {
            for($i = 0 ;$i < $pui ; $i++){
                $final_result = $user->create('Patients', array(
                    'name' => "Name Blank",
                    'age' => 0,
                    'gender'=>3,
                    'suffer_type_id'=>1,
                    'hospital_id'=>$hospital_id
                ));
            }
        }
        if($suspected) {
            for($i = 0 ;$i < $suspected ; $i++){
                $final_result = $user->create('Patients', array(
                    'name' => "Name Blank",
                    'age' => 0,
                    'gender'=>3,
                    'suffer_type_id'=>2,
                    'hospital_id'=>$hospital_id
                ));
            }
        }
        if($lab_negative) {
            for($i = 0 ;$i < $lab_negative ; $i++){
                $final_result = $user->create('Patients', array(
                    'name' => "Name Blank",
                    'age' => 0,
                    'gender'=>3,
                    'suffer_type_id'=>3,
                    'hospital_id'=>$hospital_id
                ));
            }
        }
        if($lab_pending) {
            for($i = 0 ;$i < $lab_pending ; $i++){
                $final_result = $user->create('Patients', array(
                    'name' => "Name Blank",
                    'age' => 0,
                    'gender'=>3,
                    'suffer_type_id'=>4,
                    'hospital_id'=>$hospital_id
                ));
            }
        }

        flash('success', "Successfully Added");
        header("location:../add-hospital.php");
        exit();

    } else {
        flash('success', "Failed to Add");
        header("location:../add-hospital.php");
        exit();
    }


} else {
    session_destroy();
    header("location: ../error/404.php");
    exit();
}