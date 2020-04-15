<?php

require_once '../core/init.php';
$columns = array('db_name','1', '2','3','4','5','6','7','real_name');

$query = "SELECT Hospitals.id,States.name as state,States.real_name as real_name,District.name as district,Townships.name as township, Hospitals.name as db_name, Hospitals.zawgyi,Hospitals.unicode,Hospitals.lon, Hospitals.lat, 
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui , 
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected, 
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative, 
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending, 
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death, 
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered, 
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed 
FROM Hospitals, Patients ,Townships ,District ,States 
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id 
";

if(isset($_POST["search"]["value"]))
{
    $query .= '
  AND (Hospitals.name LIKE "%'.$_POST["search"]["value"].'%" 
 OR States.real_name LIKE "%'.$_POST["search"]["value"].'%" 
 )';
}

$query.=" GROUP BY Hospitals.name";
if(isset($_POST["order"]))
{
    $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}else{
    $query .=" order by Hospitals.id ";
}



$query1 = '';
if($_POST["length"] != -1)
{
    if(!isset($_POST['length'])) $query1 = 'LIMIT ' . 1 . ', ' . 10;
    else                         $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$query = $query. $query1;



$hospitalData =$user->getData($query);
$rowCount = $user->getHospitalRowCount();


$data = array();


foreach ($hospitalData as $key => $row){
    $sub_array = array();
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="db_name">' . $row["db_name"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="1">' . $row["pui"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="2">' . $row["suspected"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="3">' . $row["lab_negative"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="4">' . $row["lab_pending"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="5">' . $row["death"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="6">' . $row["recovered"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="7">' . $row["lab_confirmed"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="real_name">' . $row["real_name"] . '</div>';
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