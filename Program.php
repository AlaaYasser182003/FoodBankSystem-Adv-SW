<?php
require_once "pdo.php";
require_once "Item.php";

$table = "Program";
class Program {
    
    private $program_name ="";
    private $id = 0;

    public function __construct($id, $program_name) {
        $this->id = $id;
        $this->program_name = $program_name;
    }

    public function create() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (id,program_name) 
        VALUES (:id,:programn)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(array('id' => $this->id,
        ':program' => $this->program_name,));
    }

    public static function read($id) {
        global $pdo, $table;
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        print_r($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public function update() {
        global $pdo, $table;
        $sql = "UPDATE {$table} SET 
        program_name = :program WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id,
        'program' => $this->program_name]);
    }

   public function delete($id) {
        global $pdo, $table;
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function view_all(){
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Program");
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            print_r($row);
        }
        echo "</pre>\n";
    }
}
?>