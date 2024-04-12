<?php
require_once "pdo.php";
require_once "imanage.php";

$table = "distributor";
class Distributor implements imanage {
    
    private $id = 0;
    private $name;
    private $address; 
    

    public function __construct($name = "", $address = "") {
        $this->name = $name;
        $this->address = $address;
    }

    public function add() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (name, address) 
        VALUES (:name, :address)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':name' => $this->name,
        'address' => $this->address ));
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
        $sql = "UPDATE {$table} SET name = :name, address = :address  WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address
        ]);
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

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
}
?>