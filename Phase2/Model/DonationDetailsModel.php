<?php
require_once "pdo.php";
require_once "ModifiableAbstModel.php";

class DonationDetailsModel extends ModifiableAbstModel {    
    
    const table = "donation_details";
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
        global $pdo;
        $sql = "INSERT INTO ".self::table." (donation_id, item_id, Qty, price) 
        VALUES (:donation, :item, :qty, :price)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':donation' => $this->donation_id,
        ':item_id' => $this->item_id,
        ':qty' => $this->Qty,
        ':price' => $this->price));
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
        $this->donation_id = $row['donation_id'];
        $this->item_id = $row['item_id'];
        $this->Qty = $row['Qty'];
        $this->price = $row['price'];
        return 1;
    }

    public function edit() {
        global $pdo;
        $sql = "UPDATE ".self::table." SET donation_id = :donation, item_id = :item,
        Qty = :qty, price = :price WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $this->id, 'donation' => $this->donation_id,
        'item' => $this->item_id, 'qty' => $this->Qty, 'price' => $this->price]);
    }

   public static function remove($id) {
        global $pdo;
        $sql = "DELETE FROM ".self::table." WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public static function view_all(){
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM ".self::table);
        return $stmt;
    }
}
