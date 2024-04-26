<?php
require_once "pdo.php";
require_once "imanage.php";

$table = "donations";
class Donation implements imanage {

    private $donor_id;
    private $program_id;
    private $amount;
    private $id = 0;

    public function __construct($donor_id = "", $program_id = "", $amount = 0) {
        $this->donor_id = $donor_id;
        $this->program_id = $program_id;
        $this->amount = $amount;
    }

    public function add() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (donor_id, program_id, amount)
        VALUES (:donor, :program, :amount)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            'donor' => $this->donor_id,
            'program' => $this->program_id,
            'amount' => $this->amount,
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
        $sql = "UPDATE {$table} SET donor_id = :donor, program_id = :program, amount = :amount WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'id' => $this->id,
            'donor' => $this->donor_id,
            'program' => $this->program_id,
            'amount' => $this->amount,
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
