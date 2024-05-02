<?php
require_once "pdo.php";
require_once "ModifiableAbstModel.php";

class SupplierModel extends ModifiableAbstModel {
    
    private $name;
    private $address; 
    const table = "supplier";

    public function __construct($name = "", $address = "") {
        $this->name = $name;
        $this->address = $address;
    }

    public function add() {
        global $pdo;
        $sql = "INSERT INTO ".self::table." (name, address) 
        VALUES (:name, :address)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(array(':name' => $this->name,
        'address' => $this->address ));
    }

    public function read() {
        global $pdo;
        $sql = "SELECT * FROM ".self::table." WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $this->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->address = $row['address'];
        $this->name = $row['name'];
        return 1;
    }

    public function edit() {
        global $pdo;
        $sql = "UPDATE ".self::table." SET name = :name, address = :address  WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address
        ]);
    }

   public static function remove($id) {  
        global $pdo;
        $sql = "DELETE FROM ".self::table." WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    } 

    public static function view_all(){
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM {self::table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
