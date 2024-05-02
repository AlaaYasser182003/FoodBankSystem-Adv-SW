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
        return 1;
    }

    public function read() {
        global $pdo;
        $sql = "SELECT * FROM ".self::table." WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $this->id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
/*
    public function Checkemail($email){
        global$pdo;
         $sql = "SELECT COUNT(*) AS num_rows FROM".self::table."WHERE email = :email";
         $stmt = $pdo->prepare($sql);
         $stmt->bindParam(':email', $email, PDO::PARAM_STR);
         $stmt->execute(); // Execute the prepared statement
         $result = $stmt->fetch(PDO::FETCH_ASSOC);

         if($result !== false){
 
         return true;
         }
         else return false;

    }*/
    public function getUserName(){
        return $this->username;
    }

    /**
     * Get the value of birthdate
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of phone_number
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }
}
