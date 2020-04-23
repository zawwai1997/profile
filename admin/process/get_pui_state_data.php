<?php

require_once '../core/init.php';
$columns = array('real_name');

$query = "SELECT Div_Pos.id,States.id as state_id,States.real_name,Div_Pos.count FROM States,Div_Pos WHERE Div_Pos.state_id = States.id";
if(isset($_POST["order"]))
{
    $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
if(isset($_POST["search"]["value"]))
{
    $query .= '
  AND (States.real_name LIKE "%'.$_POST["search"]["value"].'%" 
 )';
}

$puiStateData =$user->getData($query);
$rowCount = 17;


$data = array();


foreach ($puiStateData as $key => $row){
    $sub_array = array();

    $sub_array[] = '<div  class="update" data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
    $sub_array[] = '<div  class="update" data-id="'.$row["id"].'" data-column="real_name">' . $row["real_name"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="count">' . $row["count"] . '</div>';


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