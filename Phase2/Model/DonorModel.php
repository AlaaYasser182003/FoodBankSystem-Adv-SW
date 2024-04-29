<?php
require_once "pdo.php";
require_once "ModifiableAbstModel.php";

class DonorModel extends ModifiableAbstModel {
    
    const table = "donor";
    private $username;
    private $birthdate;
    private $email;
    private $password;
    private $phone_number;
    private $gender;

    public function __construct($username = "", $birthdate = "", $email = "", $password = "", $phone_number = "", $gender = 0) {
        $this->username = $username;
        $this->birthdate = $birthdate;
        $this->email = $email;
        $this->password = $password;
        $this->phone_number = $phone_number;
        $this->gender = $gender;
    }

    public function add() {
        global $pdo;
        $sql = "INSERT INTO ".self::table." (username, birthdate, email, password, phone_number, gender) 
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
        return 1;
    }

    public function read() {
        global $pdo;
        $sql = "SELECT * FROM ".self::table." WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $this->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->username = $row['username'];
        $this->birthdate = $row['birthdate'];
        $this->email =$row['email'];
        $this->password = $row['password'];
        $this->phone_number = $row['phone_number'];
        $this->gender = $row['gender'];
        return 1;
    }

    public function edit() {
        global $pdo;
        $sql = "UPDATE ".self::table." SET username = :username, birthdate = :birthdate,
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

   public static function remove($id) {
        global $pdo;
        $sql = "DELETE FROM ".self::table." WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public static function view_all(){
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM ".self::table);
        return $stmt;
    }

    public function getUserName(){
        return $this->username;
    }
}
?>