<?php
require_once "pdo.php";
require_once "ModifiableAbstModel.php";


class ProgramModel extends ModifiableAbstModel {
    const table = "program";
    private $program_name;
    private $description;

    public function __construct($program_name = "", $description = "") {
        $this->program_name = $program_name;
        $this->description = $description;
    }

    public function add() {
        global $pdo;
        $sql = "INSERT INTO " . self::table . " (program_name, description) 
        VALUES (:program, :description)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':program' => $this->program_name,
        ':description' => $this->description));
        $stmt = $pdo->query("SELECT LAST_INSERT_ID()");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['LAST_INSERT_ID()'];
        return 1;
    }

    public function read() {
        global $pdo;
        $sql = "SELECT * FROM " . self::table . " WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $this->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->program_name = $row['program_name'];
        $this->description = $row['description'];
        return 1;
    }

    public function edit() {
        global $pdo;
        $sql = "UPDATE " . self::table . " SET 
        program_name = :program, description = :description WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id,
        'program' => $this->program_name,
        'description' => $this->description]);
    }

   public static function remove($id) {
        global $pdo;
        $sql = "DELETE FROM " . self::table . " WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public static function view_all(){
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM " . self::table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getProgramName(){
        return $this->program_name;
    }
}
?>
