<?php
require_once '../core/init.php';
if ($_POST['tok'] == $_SESSION['token']) {

    if(isset($_POST['btnAddDistrict'])) {

        $district_name = $_POST['district_name'];
        $state_id = $_POST['state_id'];


        $result = $user->create('District', array(
            'name' => $district_name,
            'state_id' => $state_id));

        if ($result)  {
            flash('success', "Successfully Added");
            header("location:../add-district.php");
            exit();
        }
        else {
            flash('success', "Failed to Add");
            header("location:../add-district.php");
            exit();
        }
    }
    else if(isset($_POST['btnAddTownship'])){
        $township_name = $_POST['township_name'];
        $district_id = $_POST['district_id'];


        $result = $user->create('Townships', array(
            'name' => $township_name,
            'district_id' => $district_id));

        if ($result) {
            flash('success', "Successfully Added");
            header("location:../add-township.php");
            exit();
        }
        else {
            flash('success', "Failed to Add");
            header("location:../add-township.php");
            exit();
        }
    }
    else{
        echo "err";
    }


}