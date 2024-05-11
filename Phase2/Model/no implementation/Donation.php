<?php
require_once "../imodifiableModel.php";
require_once "Receipt.php";
require_once "../DonationDetailModel.php";
require_once "../pdo.php";

class Donation implements IModifiable{
    private $donationID;
    private $donationDate;
    private $receipt;

    
    public function __construct($donationDate) {
        $this->donationDate = $donationDate;
    }

    
    public function getDonationDate(): DateTime {
        return $this->donationDate;
    }

    
    public function setReceiptInfo(Receipt $r): void {
        $this->receipt = $r;
    }

    
    public function sendConfirmationEmail(): bool {
        
    }

    public function sendReceiptToDonor(Receipt $r): void {
        
    }

    public function displayReceipt(Receipt $r): void {
        
    }

    public function exportToFormat(Receipt $r): void {
        
    }

    public function getReceiptID(Receipt $r): string {
        return $r->receiptID;
    }

    
    public function add(){

    }

    public function edit(){

    }

    public function read(){

    }

    public function remove(){

    }

    public function view_all(){

    }
}
