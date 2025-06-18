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
        return $listItem[0];
    }

    public function addListItem($ticket)
    {
        $doc = [
            'ticket_id'  => $ticket->_id,
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

    // In your ListItemModel.php
    public function RemoveListItem($listItemId) {
        try {
            // 1. Convert string ID to MongoDB ObjectId
            $objectId = new MongoDB\BSON\ObjectId($listItemId);

            // 2. Create bulk write operation for deletion
            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->delete(
                ['_id' => $objectId], // Filter
                ['limit' => 1] // Only delete one document
            );

            // 3. Execute the deletion
            $result = $this->executeWrite($bulkWrite, 'ListItems'); // Replace 'ListItems' with your collection name

            // 4. Return true if deleted, false if not found
            return $result && $result->getDeletedCount() > 0;

        } catch (Exception $e) {
            // Log error and return false
            error_log("Error deleting list item: " . $e->getMessage());
            return false;
        }
    }

    // In your ListItemModel.php
    public function UpdateListItem($listItemId, $amount) {
        try {
            // 1. Convert string ID to MongoDB ObjectId
            $objectId = new MongoDB\BSON\ObjectId($listItemId);

            // 2. Create bulk write operation for update
            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->update(
                ['_id' => $objectId], // Filter
                ['$set' => ['amount' => (int)$amount]], // Update operation
                ['multi' => false, 'upsert' => false] // Only update one document
            );

            // 3. Execute the update using BaseModel's executeWrite
            $result = $this->executeWrite($bulkWrite, 'ListItems'); // Replace 'ListItems' with your collection name

            // 4. Return true if modified, false if not found
            return $result && $result->getModifiedCount() > 0;

        } catch (Exception $e) {
            // Log error and return false
            error_log("Error updating list item amount: " . $e->getMessage());
            return false;
        }
    }
    
}