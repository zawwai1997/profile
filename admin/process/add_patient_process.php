<?php
require_once '../core/init.php';
if (isset($_POST['btnAddPatient']) && $_POST['tok'] == $_SESSION['token']) {
    $patient_name = $_POST['patient_name'];
    $hospital_name = $_POST['hospital_name'];
    $suffer_type = $_POST['suffer_type'];
    $age = $_POST['patient_age'];
    $gender = $_POST['gender'];
    $country_ids = $_POST['country_ids'];





    $result = $user->create_get_last_id('Patients', array(
        'name' => $patient_name,
        'age' => $age,
        'gender' => $gender,

        'suffer_type_id' => $suffer_type,
        'hospital_id' => $hospital_name,
    ));

    if ($result) {


        foreach ($country_ids as $country)
        {
            $final_result = $user->create('Patient_Country', array(
                'patient_id' => $result,
                'country_id' => $country
            ));
        }
        if($final_result)
        {
        flash('success', "Successfully Added");
        header("location:../add-patient.php");
        exit();
        }
        else
        {
         flash('success', "Failed to Add");
         header("location:../add-patient.php");
         exit();
        }




    } else {
        flash('success', "Failed to Add");
        header("location:../add-patient.php");
        exit();
    }


} else {
    session_destroy();
    header("location: ../error/404.php");
    exit();
}