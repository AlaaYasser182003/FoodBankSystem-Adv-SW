<?php
require_once "pdo.php";
require_once "imodifiable.php";

$table = "item";
class Item implements imodifiable {
    
    private $id = 0;
    private $program_id;
    private $item_name;
    private $item_cost;
    private $amount; 
    

    public function __construct($program_id = 0, $item_name = "", $item_cost = 0, $amount = 0) {
        $this->program_id = $program_id;
        $this->item_name = $item_name;
        $this->item_cost = $item_cost;
        $this->amount = $amount;
    }

    public function add() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (program_id, item_name, item_cost, amount) 
        VALUES (:PID, :Iname, :cost, :amount)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':PID' => $this->program_id,
        ':Iname' => $this->item_name,
        ':cost' => $this->item_cost,
        'amount' => $this->amount ));
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
        $sql = "UPDATE {$table} SET program_id = :program_id, item_name = :Iname, item_cost = :cost,
        amount = :amount  WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'id' => $this->id,
            'program_id' => $this->program_id,
            'Iname' => $this->item_name,
            'cost' => $this->item_cost,
            'amount' => $this->amount
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