<?php
require_once "pdo.php";
require_once "imanage.php";

$table = "program";
class Program implements imanage {
    
    private $program_name;
    private $description;
    private $id = 0;

    public function __construct($program_name = "", $description = "") {
        $this->program_name = $program_name;
        $this->description = $description;
    }

    public function add() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (program_name, description) 
        VALUES (:program, :description)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':program' => $this->program_name,
        ':description' => $this->description));
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
        $sql = "UPDATE {$table} SET 
        program_name = :program, description = :description WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id,
        'program' => $this->program_name,
        'description' => $this->description]);
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