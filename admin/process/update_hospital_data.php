<?php


require_once '../core/init.php';

if(isset($_POST["hospital_id"]))
{
    $patientCount = $user->getPatientsCount($_POST['hospital_id'],$_POST['suffer_type_id']);
    $patientCount = $patientCount[0]['total'];

    if($patientCount < $_POST['value']) {
        $insertCount = $_POST['value'] - $patientCount;
        for ($i = 0 ; $i < $insertCount ; $i++){
            $final_result = $user->create('Patients', array(
                'name' => "Name Blank",
                'age' => 0,
                'gender'=>3,
                'suffer_type_id'=>$_POST['suffer_type_id'],
                'hospital_id'=>$_POST['hospital_id']
            ));
        }

        echo 'Data Updated';
    }
    else{
       $deleteCount= $patientCount - $_POST['value'];
          $effectiveCount=  $final_result = $user->deletePatients($_POST['hospital_id'],$_POST['suffer_type_id'],$deleteCount);
          if($effectiveCount) echo $effectiveCount." rows effected";
          else echo "Error Deleting Rows";
    }
}




?>