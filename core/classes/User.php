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
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
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


    public function getPositives($val){
        $query = "SELECT $val.name , Count($val.name) as number from States, Patients, Hospitals , Townships, District where Patients.hospital_id = Hospitals.id and Hospitals.township_id = Townships.id AND Townships.district_id = District.id AND District.state_id = States.id AND (Patients.suffer_type_id = 9 or Patients.suffer_type_id=7) group by $val.name ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getGeoLocation(){
        $query = "SELECT $val.name , Count($val.name) as number from States, Patients, Hospitals , Townships, District where Patients.hospital_id = Hospitals.id and Hospitals.township_id = Townships.id AND Townships.district_id = District.id AND District.state_id = States.id AND (Patients.suffer_type_id = 9 or Patients.suffer_type_id=7) group by $val.name ";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}