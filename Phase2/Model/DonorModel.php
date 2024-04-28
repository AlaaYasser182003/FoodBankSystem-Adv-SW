<?php
require_once "pdo.php";
require_once "ModifiableAbstModel.php";

$table = "donor";
class DonorModel extends ModifiableAbstModel {
    
    private $username;
    private $birthdate;
    private $email;
    private $password;
    private $phone_number;
    private $gender;
    private $id = 0;

    public function __construct($username = "", $birthdate = "", $email = "", $password = "", $phone_number = "", $gender = 0) {
        $this->username = $username;
        $this->birthdate = $birthdate;
        $this->email = $email;
        $this->password = $password;
        $this->phone_number = $phone_number;
        $this->gender = $gender;
    }

    public function add() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (username, birthdate, email, password, phone_number, gender) 
        VALUES (:username, :birthdate, :email, :password, :phonenumber, :gender)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':username' => $this->username,
        ':birthdate' => $this->birthdate,
        ':email' => $this->email,
        ':password' => $this->password,
        ':phonenumber' => $this->phone_number,
        ':gender' => $this->gender));
        $stmt = $pdo->query("SELECT LAST_INSERT_ID()");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['LAST_INSERT_ID()'];
        return 0;
    }

    public function read() {
        global $pdo, $table;
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $this->id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function edit() {
        global $pdo, $table;
        $sql = "UPDATE {$table} SET username = :username, birthdate = :birthdate,
        email = :email, password = :password, phone_number = :phonenumber,
        gender = :gender WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id,
        'username' => $this->username,
        'birthdate' => $this->birthdate,
        'email' => $this->email,
        'password' => $this->password,
        'phonenumber' => $this->phone_number,
        'gender' => $this->gender]);
    }    

   public function remove() {
        global $pdo, $table;
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id]);
    }

    public static function view_all(){
        global $pdo, $table;
        $stmt = $pdo->query("SELECT * FROM {$table}");
        return $stmt;
    }

    public function getById($ID){
        global $pdo, $table;
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $ID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->username = $row['username'];
        $this->birthdate = $row['birthdate'];
        $this->email =$row['email'];
        $this->password = $row['password'];
        $this->phone_number = $row['phone_number'];
        $this->gender = $row['gender'];
    }
    public function getUserName(){
        return $this->username;
    }
}
?>