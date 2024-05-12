<?php
require_once "pdo.php";
require_once "ModifiableAbstModel.php";


class ItemModel extends ModifiableAbstModel {
    const table = "item";
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

        $sql = "INSERT INTO ".self::table." (program_id, item_name, item_cost, amount) 
        VALUES (:program_id, :item_name, :item_cost, :amount)";
        $stmt = Singleton::getpdo()->prepare($sql);
        $stmt->execute(array(':program_id' => $this->program_id,
        ':item_name' => $this->item_name,
        ':item_cost' => $this->item_cost,
        ':amount' => $this->amount ));
        $lastInsertedId = Singleton::getpdo()->lastInsertId();

        $md5Hash = md5($lastInsertedId);
        
        $sql = "UPDATE ".self::table." SET itemid = :md5Hash WHERE id = :lastInsertedId";
        $stmt = Singleton::getpdo()->prepare($sql);
       return  $stmt->execute(array(
            ':md5Hash' => $md5Hash,
            ':lastInsertedId' => $lastInsertedId
        ));
    }
    public function read() {

        $sql = "SELECT * FROM " . self::table . " WHERE itemid = :id";
        $stmt = Singleton::getpdo()->prepare($sql);
        $stmt->execute(['id' => $this->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->program_id = $row['program_id'];
        $this->item_name = $row['item_name'];
        $this->item_cost = $row['item_cost'];
        $this->amount = $row['amount'];
        
    }

    public function edit() {

        $sql = "UPDATE " . self::table . " SET program_id = :program_id, item_name = :Iname, item_cost = :cost,
        amount = :amount  WHERE itemid = :id";
        $stmt = Singleton::getpdo()->prepare($sql);
        return $stmt->execute([
            'id' => $this->id,
            'program_id' => $this->program_id,
            'Iname' => $this->item_name,
            'cost' => $this->item_cost,
            'amount' => $this->amount
        ]);
    }

   public static function remove($id) {

        $sql = "DELETE FROM " . self::table . " WHERE itemid = :id";
        $stmt = Singleton::getpdo()->prepare($sql);
        return $stmt->execute(['id' => $id]);
    } 

    public static function view_all(){

        $stmt = Singleton::getpdo()->query("SELECT * FROM " . self::table );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function view_all_id($id){

        $sql = "SELECT * FROM ".self::table." WHERE program_id = :id";
        $stmt = Singleton::getpdo()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItemName(){
        return $this->item_name;
    }
    public function getProgramID(){
        return $this->program_id;
    }
    
    public function getCost(){
        return $this->item_cost;
    }
    
    public function getAmount(){
        return $this->amount;
    }
    
    public static function getByHash($hash) {
        $sql = "SELECT id FROM ".self::table." WHERE itemid = :id";
        $stmt = Singleton::getpdo()->prepare($sql);
        $stmt->execute(['id' => $hash]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['id'];
    }
}
?>
