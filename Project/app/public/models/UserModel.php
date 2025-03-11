<?php

require_once(__DIR__ . '/BaseModel.php');

class UserModel extends BaseModel
{
    private $collectionName = 'HaarlemFestival.Users';

    
    public function getUserByEmail($email)
    {
        $filter = ['email' => $email];
        $result = $this->executeQuery($this->collectionName, $filter);


        return !empty($result) ? $result[0] : null;
    }

    
    public function createUser($data)
    {
        $doc = [
            'full_name'   => $data['full_name'],
            'username'    => $data['username'],
            'email'       => $data['email'],
            'password'    => $data['password'],  // Already hashed
            'role'        => 'customer',         // auto-set here
            'created_at'  => new MongoDB\BSON\UTCDateTime()
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
}