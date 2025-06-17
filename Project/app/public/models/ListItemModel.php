<?php
require_once(__DIR__ . "/BaseModel.php");
require_once(__DIR__ . "/TicketModel.php");

class ListItemModel extends BaseModel{
    
    protected $collectionName='ListItems';
    private $ticketModel;

    public function __construct()
    {
        parent::__construct();
        $this->ticketModel = new TicketModel();
    }

    // get page by id 

    public function getListIteminCart($cart,$ticket)
    {
        $filter = [
            '_id' => ['$in' => $cart->CartItems],
            'ticket_id' => $ticket->_id
        ];
        $listItem = $this->executeQuery($this->collectionName, $filter);
        return $listItem;
    }
    public function getListItemById($item_id)
    {
        $filter = [
            '_id' => $item_id
        ];
        $listItem = $this->executeQuery($this->collectionName, $filter);
        return $listItem;
    }

    public function addListItem($ticket)
    {
        $doc = [
            'ticket_id'  => $ticket->_id,
            'subtotal' => $ticket->price ,
            'amount' => 1
        ];

        // Build the bulk write operation
        $bulkWrite = new MongoDB\Driver\BulkWrite;
        $insertedId =$bulkWrite->insert($doc);
        // Execute write
        $result = $this->executeWrite($bulkWrite, $this->collectionName);

        if ($result && $result->getInsertedCount() === 1) {
            return $insertedId;
        }
        return false;
    }
    
}