<?php
require_once "pdo.php";
require_once "ModifiableAbstModel.php";

$table = "donation_details";
class DonationDetailsModel extends ModifiableAbstModel {    
    
    private $donor_name;
    private $total_cost;
    private $program_name;
    private $donation_date;

    public function __construct($donor_name = "", $total_cost = 0, $program_name = "", $donation_date = "") {
        $this->donor_name = $donor_name;
        $this->total_cost = $total_cost;
        $this->program_name = $program_name;
        $this->donation_date = $donation_date;
    }

    public function add() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (donor_name, total_cost, program_name, donation_date) 
        VALUES (:donor, :cost, :program, :date)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':donor' => $this->donor_name,
        ':cost' => $this->total_cost,
        ':program' => $this->program_name,
        ':date' => $this->donation_date));
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
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->donor_name = $row['donor_name'];
        $this->donation_date = $row['donation_date'];
        $this->total_cost = $row['total_cost'];
        $this->program_name = $row['program_name'];
        return 0;
    }

    public function edit() {
        global $pdo, $table;
        $sql = "UPDATE {$table} SET donor_name = :donor, total_cost = :cost,
        program_name = :program, donation_date = :date WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id, 'donor' => $this->donor_name,
        'cost' => $this->total_cost, 'program' => $this->program_name, 'date' => $this->donation_date]);
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
}
