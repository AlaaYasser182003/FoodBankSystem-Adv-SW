<?php
require_once "pdo.php";
require_once "ModifiableAbstModel.php";

$table3 = "donation_details";
class DonationDetailsModel extends ModifiableAbstModel {    
    
    private $donation_id;
    private $item_id;
    private $Qty;
    private $price;

    public function __construct($donation_id = 0, $item_id = 0, $Qty=0, $price=0) {
        $this->donation_id = $donation_id;
        $this->item_id = $item_id;
        $this->Qty = $Qty;
        $this->price = $price;
    }

    public function add() {
        global $pdo, $table;
        $sql = "INSERT INTO {$table} (donation_id, item_id, Qty, price) 
        VALUES (:donation, :item, :qty, :price)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':donation' => $this->donation_id,
        ':item_id' => $this->item_id,
        ':qty' => $this->Qty,
        ':price' => $this->price));
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
        $this->donation_id = $row['donation_id'];
        $this->item_id = $row['item_id'];
        $this->Qty = $row['Qty'];
        $this->price = $row['price'];
        return 0;
    }

    public function edit() {
        global $pdo, $table;
        $sql = "UPDATE {$table} SET donation_id = :donation, item_id = :item,
        Qty = :qty, price = :price WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id, 'donation' => $this->donation_id,
        'item' => $this->item_id, 'qty' => $this->Qty, 'price' => $this->price]);
    }

   public function remove() {
        global $pdo, $table;
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id]);
    }

    public static function view_all(){
        global $pdo, $table3;
        $stmt = $pdo->query("SELECT * FROM {$table3}");
        return $stmt;
    }
}
