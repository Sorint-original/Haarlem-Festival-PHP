<?php
require_once(__DIR__ . "/BaseModel.php");

class CartModel extends BaseModel{
    
    protected $collectionName='Carts';

    public function __construct()
    {
        parent::__construct();
    }

    // get page by id 

    public function getCartByUserId($user_id)
    {
        $filter = ['user_id' => new MongoDB\BSON\ObjectId($user_id)];
        $CartData = $this->executeQuery($this->collectionName, $filter);
        return $CartData[0];
    }

    public function addCart($user_id)
    {
        $doc = [
            'user_id'   =>  new MongoDB\BSON\ObjectId($user_id),
            'CartItems' => []
        ];

        // Build the bulk write operation
        $bulkWrite = new MongoDB\Driver\BulkWrite;
        $bulkWrite->insert($doc);
        // Execute write
        $result = $this->executeWrite($bulkWrite, $this->collectionName);

        if ($result && $result->getInsertedCount() === 1) {
            return true;
        }
        return false;
    }

    public function addInCart($itemId, $user_id){

        $bulkWrite = new MongoDB\Driver\BulkWrite;
        $bulkWrite->update(
            ['user_id' => new MongoDB\BSON\ObjectId($user_id)], // Filter
            ['$push' => ['CartItems' => $itemId]], // Update
            ['multi' => false] // Options
        );
        $this->executeWrite($bulkWrite, $this->collectionName);
    }

    public function RemoveFromCart($listItemId, $userId) {
        try {
            // 1. Convert string IDs to MongoDB ObjectId
            $listItemObjectId = new MongoDB\BSON\ObjectId($listItemId);
            $userObjectId = new MongoDB\BSON\ObjectId($userId);

            // 2. Create bulk write operation for array removal
            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->update(
                ['user_id' => $userObjectId], // Filter: find cart by user
                ['$pull' => ['CartItems' => $listItemObjectId]], // Remove from array
                ['multi' => false] // Only update one document
            );

            // 3. Execute the update using BaseModel's executeWrite
            $result = $this->executeWrite($bulkWrite, 'Carts'); // Replace 'Carts' with your collection name

            // 4. Return true if modified, false if not found/no change
            return $result && $result->getModifiedCount() > 0;

        } catch (Exception $e) {
            // Log error and return false
            error_log("Error removing from cart: " . $e->getMessage());
            return false;
        }
    }
    
}