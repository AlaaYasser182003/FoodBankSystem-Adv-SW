<?php
require_once "pdo.php";

$table = "Item";
class Item {
    
    private $id =0;
    private $program_id = 0;
    private $item_name ="";
    private $item_cost = 0;
    private $description = ""; 
    

    public function __construct($id, $program_id, $item_name, $item_cost, $description) {
        $this->id = $id;
        $this->program_id = $program_id;
        $this->item_name = $item_name;
        $this->item_cost = $item_cost;
        $this->description = $description;
    }

    public function create() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (id,program_id, item_name, item_cost, description) 
        VALUES (:id, :PID, :Iname, :cost, :description)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(array('id' => $this->id,
        ':PID' => $this->program_id,
        ':Iname' => $this->item_name,
        ':cost' => $this->item_cost,
        'description' => $this->description ));
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
        $sql = "UPDATE {$table} SET item_name = :Iname, item_cost = :cost,
        description = :description  WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'id' => $this->id,
            'Iname' => $this->item_name,
            'cost' => $this->item_cost,
            'description' => $this->description
        ]);
    }

   public function delete($id) {  
        global $pdo, $table;
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    } 

}
?>