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
        $query = "SELECT States.id,States.name as db_name,States.real_name,States.zawgyi,States.unicode,States.lat,States.lon,
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui ,
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected,
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative,
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending,
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death,
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered,
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed FROM Hospitals, Patients ,Townships ,District ,States 
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id 
GROUP BY States.name order by States.id";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTownshipJson(){
        $query = " SELECT Townships.id,States.name as state,District.name as district,Townships.name as db_name,
Townships.real_name,Townships.zawgyi,Townships.unicode,Townships.lat,Townships.lon,
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui ,
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected,
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative,
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending,
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death,
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered,
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed 
FROM Hospitals, Patients ,Townships ,District ,States 
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and 
Townships.district_id = District.id and District.state_id= States.id 
GROUP BY Townships.name order by Townships.id";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHospitalJson(){
        $query = "SELECT States.name as state,District.name as district,Townships.name as township, Hospitals.name as db_name, Hospitals.zawgyi,Hospitals.unicode,Hospitals.lon, Hospitals.lat, 
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
order by Townships.name";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDistrictJson(){
        $query = "SELECT District.name as db_name,
COUNT(case when Patients.suffer_type_id = 1 then 1 else NULL end) as pui , 
COUNT(case when Patients.suffer_type_id = 2 then 1 else NULL end) as suspected, 
COUNT(case when Patients.suffer_type_id = 3 then 1 else NULL end) as lab_negative, 
COUNT(case when Patients.suffer_type_id = 4 then 1 else NULL end) as lab_pending, 
COUNT(case when Patients.suffer_type_id = 5 then 1 else NULL end) as death, 
COUNT(case when Patients.suffer_type_id = 6 then 1 else NULL end) as recovered, 
COUNT(case when Patients.suffer_type_id = 7 then 1 else NULL end) as lab_confirmed 
FROM Hospitals, Patients ,Townships ,District ,States 
WHERE Patients.hospital_id = Hospitals.id AND Hospitals.township_id = Townships.id and Townships.district_id = District.id and District.state_id= States.id 
GROUP BY District.name 
order by District.name";

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



}