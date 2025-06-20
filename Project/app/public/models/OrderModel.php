<?php
require_once(__DIR__ . "/BaseModel.php");

class OrderModel extends BaseModel{

    public function __construct()
    {
        parent::__construct();
    }

    public function TransformIntoOrder($cart,$user_id,$newClientTickets){
        try {
            // 1. Convert user_id to ObjectId
            $userObjectId = new MongoDB\BSON\ObjectId($user_id);
            
            // 2. Extract OrderItems (list of list item IDs) from cart
            $orderItems = array_map(function($item) {
                return $item->_id;
            }, $cart->CartItems);
            
            // 3. Create the order document
            $orderDocument = [
                'UserId' => $userObjectId,
                'OrderItems' => $orderItems,
                'ClientTickets' => $newClientTickets,
                'madeAt' => new MongoDB\BSON\UTCDateTime() // Current timestamp
            ];
            
            // 4. Insert into orders collection
            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $insertedId = $bulkWrite->insert($orderDocument);
            $result = $this->executeWrite($bulkWrite, 'Orders');
        }
        catch (Exception $e) {
            error_log("Error transforming cart to order: " . $e->getMessage());
            return false;
        }
    }


}