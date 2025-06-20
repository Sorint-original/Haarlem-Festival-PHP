<?php

require_once(__DIR__ . "/BaseModel.php");

class TicketModel extends BaseModel
{

    protected $STicketcollection = 'ShopTickets'; 
    

    public function __construct()
    {
        parent::__construct();
    }

    public function GetShopTicketsByEventId($EventId){
        $filter = ['EventId' =>$EventId];
        $options = [];

        $tickets = $this->executeQuery($this->STicketcollection,$filter,$options);
        return $tickets;
    }

    public function GetShopTicketById($_Id){
        $filter;
        if ($_Id instanceof MongoDB\BSON\ObjectId) {
            $filter = ['_id' =>$_Id];
        }
        else {
            $filter = ['_id' => new MongoDB\BSON\ObjectId($_Id)];
        }

        $options = [];

        $ticket = $this->executeQuery($this->STicketcollection,$filter,$options);
        return $ticket[0];
    }

    public function GenerateNewClientTicket($STicketId){
        try {      

            // 3. Create the Cticket document
            $CTicketDocument = [
                'shopTicketId' => $STicketId,
                'status' => "Available",
                'createdAt' => new MongoDB\BSON\UTCDateTime() // Add creation timestamp
            ];
            
            // 4. Insert into orders collection
            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $insertedId = $bulkWrite->insert($CTicketDocument);
            $result = $this->executeWrite($bulkWrite, 'ClientTickets');
            return (string)$insertedId;// return id of new client ticket
        }
        catch (Exception $e) {
            error_log("Error transforming cart to order: " . $e->getMessage());
            return false;
        }
    }

}