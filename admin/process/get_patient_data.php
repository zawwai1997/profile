<?php

require_once '../core/init.php';
$columns = array('id','name','age','gender','suffer_type_id','hospital');
$tok =$_SESSION['token'];

$query = "SELECT Patients.id,Patients.name,Patients.age,Gender.type as gender,
 Suffer_Type.name as suffer,Hospitals.name as hospital
 FROM Patients,Gender,Suffer_Type,Hospitals
 WHERE Patients.gender = Gender.id AND
 Patients.suffer_type_id = Suffer_Type.id AND
 Patients.hospital_id = Hospitals.id AND
 (Patients.suffer_type_id = 5 or Patients.suffer_type_id=6 or Patients.suffer_type_id=7)";

if(isset($_POST["search"]["value"]))
{
    $query .= '
  AND (Hospitals.name LIKE "%'.$_POST["search"]["value"].'%" 
 OR Patients.name LIKE "%'.$_POST["search"]["value"].'%" 
 )';
}

if(isset($_POST["order"]))
{
    $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}else{
    $query .=" order by Patients.id ";
}



$query1 = '';
if($_POST["length"] != -1)
{
    if(!isset($_POST['length'])) $query1 = 'LIMIT ' . 1 . ', ' . 10;
    else                         $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$query = $query. $query1;



$patientData =$user->getData($query);
$rowCount = $user->getPatientRowCount();
$rowCount = $rowCount[0]['count'];


$data = array();


foreach ($patientData as $key => $row){
    $sub_array = array();
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="name">' . $row["name"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="age">' . $row["age"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="gender">' . $row["gender"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="suffer_type_id">' . $row["suffer"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="hospital">' . $row["hospital"] . '</div>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';
    $sub_array[] = '<a href="/profile/admin/transfer.php?id='.$row['id'].'&&token='.$tok.'  " type="button" name="transfer" class="btn btn-info btn-xs transfer" id="'.$row["id"].'">Transfer</a>';
    $data[] = $sub_array;
}


$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $rowCount,
 "recordsFiltered" => $rowCount,
 "data"    => $data
);

echo json_encode($output);


?>