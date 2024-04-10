<?php
require_once "pdo.php";
require_once "imanage.php";

$table = "donation_details";
class DonationDetails implements imanage {    
    
    private $donor_name ="";
    private $total_cost = 0;
    private $program_name = "";
    private $donation_date = "";
    private $id = 0;

    public function __construct($id, $donor_name, $total_cost, $program_name, $donation_date) {
        $this->id = $id;
        $this->donor_name = $donor_name;
        $this->total_cost = $total_cost;
        $this->program_name = $program_name;
        $this->donation_date = $donation_date;
    }

    public function create() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (id, donor_name, total_cost, program_name, donation_date) 
        VALUES (:id, :donor, :cost, :program, :date)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(array('id' => $this->id,
        ':donor' => $this->donor_name,
        ':cost' => $this->total_cost,
        ':program' => $this->program_name,
        ':date' => $this->donation_date));
    }

    public function read() {
        global $pdo, $table;
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $this->id]);
        print_r($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public function update() {
        global $pdo, $table;
        $sql = "UPDATE {$table} SET donor_name = :donor, total_cost = :cost,
        program_name = :program, donation_date = :date WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id, 'donor' => $this->donor_name,
        'cost' => $this->total_cost, 'program' => $this->program_name, 'date' => $this->donation_date]);
    }

   public function delete() {
        global $pdo, $table;
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id]);
    }

    public static function view_all(){
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM donation_details");
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            print_r($row);
        }
        echo "</pre>\n";
    }
}
?>