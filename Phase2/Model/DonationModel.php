<?php
require_once "pdo.php";
require_once "ModifiableAbstModel.php";

class DonationModel extends ModifiableAbstModel {

    const table = "donations";
    private $donor_id;
    private $total_cost;
    private $donation_date;

    public function __construct($donor_id = "", $total_cost = 0, $donation_date = "") {
        $this->donor_id = $donor_id;
        $this->total_cost = $total_cost;
        $this->amount = $donation_date;
    }

    public function add() {
        global $pdo;
        $sql = "INSERT INTO ".self::table." (donor_id, total_cost, donation_date)
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
        return 1;
    }

    public function read() {
        global $pdo;
        $sql = "SELECT * FROM ".self::table." WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $this->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->donor_id = $row['donor_id'];
        $this->total_cost = $row['total_cost'];
        $this->donation_date = $row['donation_date'];
        return 1;
    }

    public function edit() {
        global $pdo, $table;
        $sql = "UPDATE ".self::table." SET donor_id = :donor, total_cost = :cost, donation_date = :date WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'id' => $this->id,
            'donor' => $this->donor_id,
            'cost' => $this->total_cost,
            'date' => $this->donation_date,
        ]);
    }

    public static function remove($id) {
        global $pdo, $table;
        $sql = "DELETE FROM ".self::table." WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public static function view_all(){
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM ".self::table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the value of donor_id
     */
    public function getDonorId()
    {
        return $this->donor_id;
    }

    /**
     * Set the value of donor_id
     */
    public function setDonorId($donor_id): self
    {
        $this->donor_id = $donor_id;

        return $this;
    }
}