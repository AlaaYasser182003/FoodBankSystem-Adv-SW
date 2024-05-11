<?php
require_once "../item.php";
require_once "OrderStatus.php";
Class Order{
    private $orderIdD;
    private $status;
    private $requesterlD;
    private $orderltems = array();

    public function setStatus (Orderstatus $orderstatus) : void{

    }

    public function getStatus() : OrderStatus{

    }

    public function getOrderID() : int{

    }

    public function addltem(item $Item) : void{

    }

    public function removeltem(Item $item) : void{

    }

    public function calcTotalnoOfltems() : int{

    }

    public function updateltemQuantity($itemID, int $quantity ) : void{

    }

    public function calcTotalQuantity() : int{

    }
}    
