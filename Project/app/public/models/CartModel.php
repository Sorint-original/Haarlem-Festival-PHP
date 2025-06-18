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
    
}