<?php
require_once "pdo.php";
require_once "imanage.php";

$table = "donations";
class Donation implements imanage {

    private $donor_id;
    private $program_id;
    private $amount;
    private $item_id;
    private $id = 0;

    public function __construct($donor_id = "", $program_id = "", $amount = 0, $item_id = "") {
        $this->donor_id = $donor_id;
        $this->program_id = $program_id;
        $this->amount = $amount;
        $this->item_id = $item_id;
    }

    public function add() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (donor_id, program_id, amount, item_id)
        VALUES (:donor, :program, :amount, :item)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            'donor' => $this->donor_id,
            'program' => $this->program_id,
            'amount' => $this->amount,
            'item' => $this->item_id
        ));
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
        $sql = "UPDATE {$table} SET donor_id = :donor, program_id = :program, amount = :amount, item_id = :item WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'id' => $this->id,
            'donor' => $this->donor_id,
            'program' => $this->program_id,
            'amount' => $this->amount,
            'item' => $this->item_id
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
