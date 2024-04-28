<?php
require_once "pdo.php";
require_once "ModifiableAbstModel.php";

$table2 = "donations";
class DonationModel extends ModifiableAbstModel {

    private $donor_id;
    private $total_cost;
    private $donation_date;

    public function __construct($donor_id = "", $total_cost = 0, $donation_date = "") {
        $this->donor_id = $donor_id;
        $this->total_cost = $total_cost;
        $this->amount = $donation_date;
    }

    public function add() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (donor_id, total_cost, donation_date)
        VALUES (:donor, :cost, :date)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            'donor' => $this->donor_id,
            'cost' => $this->total_cost,
            'date' => $this->donation_date,
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
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->donor_id = $row['donor_id'];
        $this->total_cost = $row['total_cost'];
        $this->donation_date = $row['donation_date'];
        return 0;
    }

    public function edit() {
        global $pdo, $table;
        $sql = "UPDATE {$table} SET donor_id = :donor, total_cost = :cost, donation_date = :date WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'id' => $this->id,
            'donor' => $this->donor_id,
            'cost' => $this->total_cost,
            'date' => $this->donation_date,
        ]);
    }

    public function remove() {
        global $pdo, $table;
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id]);
    }

    public static function view_all(){
        global $pdo, $table2;
        $stmt = $pdo->query("SELECT * FROM {$table2}");
        return $stmt;
    }

    public function getById($ID){
        global $pdo, $table;
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $ID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->donor_id = $row['donor_id'];
        $this->total_cost = $row['total_cost'];
        $this->donation_date = $row['donation_date'];
    }
    
    public function setDonorId($donorid){
        $this->donor_id=$donorid;
    }
    public function getDonorId(){
        return $this->donor_id;
    }
}

/*$obj = new DonationModel();
$obj->getById(3);
echo $obj->getAmount();*/