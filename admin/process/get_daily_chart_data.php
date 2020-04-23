<?php

require_once '../core/init.php';
$columns = array('real_name');

$query = "SELECT * FROM Chart";

if(isset($_POST["search"]["value"]))
{
    $query .= '
  WHERE (Chart.date LIKE "%'.$_POST["search"]["value"].'%" 
 )';
}

if(isset($_POST["order"]))
{
    $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}else{
    $query .=" order by id ";
}



$query1 = '';
if($_POST["length"] != -1)
{
    if(!isset($_POST['length'])) $query1 = 'LIMIT ' . 1 . ', ' . 10;
    else                         $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$query = $query. $query1;


$dailyChartData =$user->getData($query);
$rowCount =$user->getCount("SELECT * FROM Chart");

$data = array();


foreach ($dailyChartData as $key => $row){
    $sub_array = array();

    $sub_array[] = '<div  class="update" data-id="'.$row["id"].'" data-column="real_name">' . $row["id"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="date">' . $row["date"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="confirmed">' . $row["confirmed"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="die">' . $row["die"] . '</div>';

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