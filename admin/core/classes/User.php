<?php

/* error_reporting(0);
ini_set('display_errors', 0); */

class User {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($table, $email,$password)
    {
        $query = "SELECT * FROM $table WHERE email = :email AND password= :password";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function checkInput($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        $data = addslashes(strip_tags($data));

        return $data;
    }
    public function insert($data)
    {

        $query = "INSERT INTO `person`(`generate_code`) VALUES ('$data')";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->rowCount();
    }
    public function get($table)
    {

        $query = "SELECT * FROM $table";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($table, array $fields) {
        $columns = implode(', ', array_keys($fields));
        $values = ':' . implode(', :', array_keys($fields));
        $query = "INSERT INTO {$table} ({$columns}) VALUES ($values);";
        //echo $query; --> success

        if ($stmt = $this->pdo->prepare($query)) {
            foreach ($fields as $keys => $data) {
                $stmt->bindValue(':' . $keys, $data);
            }
            return $stmt->execute();

        } else {
            return false;
        }
    }
    public function create_get_last_id($table, array $fields) {
        $columns = implode(', ', array_keys($fields));
        $values = ':' . implode(', :', array_keys($fields));
        $query = "INSERT INTO {$table} ({$columns}) VALUES ($values);";

        //echo $query; --> success

        if ($stmt = $this->pdo->prepare($query)) {
            foreach ($fields as $keys => $data) {
                $stmt->bindValue(':' . $keys, $data);
            }
            $stmt->execute();
            return $this->pdo->lastInsertId();

        } else {
            return false;
        }
    }

    public function getHospitalId($hospital_name){
        $query = "SELECT id FROM Hospitals WHERE name = :name";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':name', $hospital_name, PDO::PARAM_STR);
        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPositives($val){
        $query = "SELECT $val.name , Count($val.name) as number from States, Patients, Hospitals , Townships, District where Patients.hospital_id = Hospitals.id and Hospitals.township_id = Townships.id AND Townships.district_id = District.id AND District.state_id = States.id AND (Patients.suffer_type_id = 9 or Patients.suffer_type_id=7) group by $val.name ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }






    public function getAll($order){
        $query = "SELECT Hospitals.id,Hospitals.name as hospital , Townships.name as township ,District.name as district,States.name as state,
Hospitals.lon as longitude, Hospitals.lat as latitude,
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui , 
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected, 
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative,
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending,
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death, 
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered, 
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed 
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id  and District.state_id= States.id
GROUP BY Hospitals.name order by $order ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllBy($condition,$order){
        $query = "SELECT Hospitals.id,Hospitals.name as hospital , Townships.name as township ,District.name as district,States.name as state,
Hospitals.lon as longitude, Hospitals.lat as latitude,
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui , 
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected, 
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative,
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending,
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death, 
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered, 
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed 
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id  and District.state_id= States.id and $condition
GROUP BY Hospitals.name order by $order ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRegionJson(){
            $query = " SELECT States.id as s_id,States.name as db_name,States.real_name,States.zawgyi,States.unicode,States.lat,States.lon,
    COUNT(case when (Patients.suffer_type_id = 1 AND Patients.hospital_id = Hospitals.id) 
          then 1 else NULL end) as pui ,
    COUNT(case when (Patients.suffer_type_id = 2 AND Patients.hospital_id = Hospitals.id) 
          then 1 else NULL end) as suspected,
    (SELECT Div_Pos.count FROM Div_Pos WHERE Div_Pos.state_id = s_id) as puinsus	,
    COUNT(case when (Patients.suffer_type_id = 3 AND Patients.hospital_id = Hospitals.id) 
          then 1 else NULL end) as lab_negative,
    COUNT(case when (Patients.suffer_type_id = 4 AND Patients.hospital_id = Hospitals.id)
          then 1 else NULL end) as lab_pending,
    COUNT(case when (Patients.suffer_type_id = 5 AND Patients.first_hospital_id = Hospitals.id) 
          then 1 else NULL end) as death,
    COUNT(case when (Patients.suffer_type_id = 6 AND Patients.first_hospital_id = Hospitals.id)
          then 1 else NULL end) as recovered,
    COUNT(case when (Patients.suffer_type_id = 7 AND Patients.hospital_id = Hospitals.id) 
          then 1 else NULL end) as lab_confirmed_now,
    COUNT(case when ( (Patients.suffer_type_id = 7 or Patients.suffer_type_id =6 or Patients.suffer_type_id=5) AND Patients.first_hospital_id = Hospitals.id) 
          then 1 else NULL end) as lab_confirmed
     FROM Hospitals, Patients ,Townships ,District ,States 
    WHERE Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id 
    GROUP BY States.name order by lab_confirmed DESC ,`death`  DESC , recovered DESC ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTownshipJson(){
        $query = " SELECT Townships.id,States.name as state,States.id as s_id,
 District.name as district,Townships.name as db_name,District.id as d_id,
Townships.real_name,Townships.zawgyi,Townships.unicode,Townships.lat,Townships.lon,
COUNT(case when (Patients.suffer_type_id = 1 AND Patients.hospital_id = Hospitals.id) 
      then 1 else NULL end) as pui ,
COUNT(case when (Patients.suffer_type_id = 2 AND Patients.hospital_id = Hospitals.id) 
      then 1 else NULL end) as suspected,
(SELECT Div_Pos.count FROM Div_Pos WHERE Div_Pos.state_id = s_id) as puinsus	,
COUNT(case when (Patients.suffer_type_id = 3 AND Patients.hospital_id = Hospitals.id) 
      then 1 else NULL end) as lab_negative,
COUNT(case when (Patients.suffer_type_id = 4 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as lab_pending,
COUNT(case when (Patients.suffer_type_id = 5 AND Patients.first_hospital_id = Hospitals.id) 
      then 1 else NULL end) as death,
COUNT(case when (Patients.suffer_type_id = 6 AND Patients.first_hospital_id = Hospitals.id)
      then 1 else NULL end) as recovered,
COUNT(case when (Patients.suffer_type_id = 7 AND Patients.hospital_id = Hospitals.id) 
      then 1 else NULL end) as lab_confirmed_now,
COUNT(case when ( (Patients.suffer_type_id = 7 or Patients.suffer_type_id =6 or Patients.suffer_type_id=5) AND Patients.first_hospital_id = Hospitals.id) 
          then 1 else NULL end) as lab_confirmed
FROM Hospitals, Patients ,Townships ,District ,States 
WHERE   Hospitals.township_id = Townships.id and 
Townships.district_id = District.id and District.state_id= States.id 
GROUP BY Townships.name order by lab_confirmed DESC ,`death`  DESC , recovered DESC ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHospitalJson(){
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
GROUP BY Hospitals.name 
order by Hospitals.id";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData($query){
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getHospitalJsonWithCondition($hospitalName,$stateName){
        $query = "SELECT Hospitals.id,States.name as state,States.real_name as real_name,District.name as district,Townships.name as township, Hospitals.name as db_name, Hospitals.zawgyi,Hospitals.unicode,Hospitals.lon, Hospitals.lat, 
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui , 
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected, 
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative, 
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending, 
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death, 
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered, 
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed 
FROM Hospitals, Patients ,Townships ,District ,States 
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id Hospitals.name LIKE %$hospitalName % OR States.real_name %$stateName% ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHospitalRowCount(){
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
GROUP BY Hospitals.name 
order by Hospitals.id;";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }

    public function getCount($query){
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }


    public function getPatientRowCount(){
        $query = "SELECT Count(Patients.name) as count
 FROM Patients,Gender,Suffer_Type,Hospitals
 WHERE Patients.gender = Gender.id AND
 Patients.suffer_type_id = Suffer_Type.id AND
 Patients.hospital_id = Hospitals.id AND
 (Patients.suffer_type_id = 5 or Patients.suffer_type_id=6 or Patients.suffer_type_id=7)";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPatientsCount($hospitalId,$sufferTypeId){
        $query = "SELECT count(Patients.name)  as total FROM `Patients` WHERE Patients.hospital_id = $hospitalId and Patients.suffer_type_id = $sufferTypeId";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletePatients($hospitalId,$sufferTypeId,$limit){
        $query = "DELETE FROM Patients where Patients.suffer_type_id = $sufferTypeId and Patients.hospital_id = $hospitalId LIMIT $limit ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }




    public function getDistrictJson(){
        $query = "SELECT District.id,District.name as db_name,District.unicode ,States.id as s_id,
COUNT(case when (Patients.suffer_type_id = 1 AND Patients.hospital_id = Hospitals.id) 
      then 1 else NULL end) as pui ,
COUNT(case when (Patients.suffer_type_id = 2 AND Patients.hospital_id = Hospitals.id) 
      then 1 else NULL end) as suspected,
(SELECT Div_Pos.count FROM Div_Pos WHERE Div_Pos.state_id = s_id) as puinsus	,
COUNT(case when (Patients.suffer_type_id = 3 AND Patients.hospital_id = Hospitals.id) 
      then 1 else NULL end) as lab_negative,
COUNT(case when (Patients.suffer_type_id = 4 AND Patients.hospital_id = Hospitals.id)
      then 1 else NULL end) as lab_pending,
COUNT(case when (Patients.suffer_type_id = 5 AND Patients.first_hospital_id = Hospitals.id) 
      then 1 else NULL end) as death,
COUNT(case when (Patients.suffer_type_id = 6 AND Patients.first_hospital_id = Hospitals.id)
      then 1 else NULL end) as recovered,
COUNT(case when (Patients.suffer_type_id = 7 AND Patients.hospital_id = Hospitals.id) 
      then 1 else NULL end) as lab_confirmed_now,
COUNT(case when ( (Patients.suffer_type_id = 7 or Patients.suffer_type_id =6 or Patients.suffer_type_id=5) AND Patients.first_hospital_id = Hospitals.id) 
          then 1 else NULL end) as lab_confirmed
FROM Hospitals, Patients ,Townships ,District ,States 
WHERE Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id 
GROUP BY District.name 
order by lab_confirmed DESC ,`death`  DESC , recovered DESC";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTransferPatients($patient_id){
        $query = "SELECT Patients.id as p_id,Patients.name,
(SELECT Hospitals.name FROM Hospitals,Patients WHERE Patients.first_hospital_id = Hospitals.id and Patients.id = p_id) as first_hospital,
(SELECT Hospitals.id FROM Hospitals,Patients WHERE Patients.first_hospital_id = Hospitals.id and Patients.id = p_id) as first_hospital_id,
(SELECT Hospitals.name FROM Hospitals,Patients WHERE Patients.hospital_id = Hospitals.id and Patients.id = p_id) as current_hospital,
(SELECT Hospitals.id FROM Hospitals,Patients WHERE Patients.hospital_id = Hospitals.id and Patients.id = p_id) as current_hospital_id
FROM Patients
WHERE Patients.id = $patient_id";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getVisitedPlaces($condition){
        $query = "SELECT Visited_Places.name as visited 
FROM `Visited_Places`, Townships,District ,States
WHERE Visited_Places.township_id = Townships.id and Townships.district_id = District.id and District.state_id = States.id and $condition";


        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTownships($state_id){
        $query = "SELECT Townships.name as townships
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id and States.id = $state_id
GROUP BY Townships.name order by Townships.id";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHospitals($condition,$order){
        $query = "SELECT Hospitals.name as hospitals
FROM Hospitals, Patients ,Townships ,District ,States
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and 
Townships.district_id = District.id and District.state_id= States.id $condition
GROUP BY Hospitals.name order by $order";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($table,$key,$value,$patient_id){
        $query = "UPDATE `$table` SET `$key` = '$value' WHERE `$table`.`id` = $patient_id;";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->rowCount();
    }
    public function updateSummary($status,$confirm,$pui,$die,$test,$cure,$recovered){
        $query = "UPDATE `Summary` SET `status` = '$status' ,`confirm` = '$confirm', `pui` = '$pui', `die` = '$die', `test` = '$test', `cure` = '$cure', `recovered` = '$recovered' WHERE `Summary`.`id` = 7; ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }








    public function delete($table,$id){
        $query = "DELETE FROM `$table` WHERE id = $id ";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->rowCount();
    }


}