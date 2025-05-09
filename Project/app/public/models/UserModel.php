<?php

require_once(__DIR__ . '/BaseModel.php');

class UserModel extends BaseModel
{
    private $collectionName = 'Users';

    // get all users 
    public function getAllUsers()
    {
        $filter = [];
        $options = [
            // projection => to include only specific fields or format them in a certain way.
            'projection' => [
                'full_name' => 1,
                'username' => 1,
                'email' => 1,
                'role' => 1,
                '_id' => 1,
                'created_at' => [
                    '$dateToString' => [
                        'format' => '%Y-%m-%d %H:%M:%S',
                        'date' => '$created_at'
                    ]
                ]
            ]
        ];
        $result = $this->executeQuery($this->collectionName, $filter, $options);
        return $result;
    }
    //get user by userid
    public function getUserByUserId($id)
    {
        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $user = $this->executeQuery($this->collectionName, $filter);
        return $user;
    }
    // get users by role - filter by role 
    public function getUsersByRole($role)
    {
        $filter = ['role' => $role];
        $result = $this->executeQuery($this->collectionName, $filter);
        return $result;
    }
    public function getUserByEmail($email)
    {
        $filter = ['email' => $email];
        $result = $this->executeQuery($this->collectionName, $filter);
        return !empty($result) ? $result[0] : null;
    }
    // create user for login form. Role set to the customer by default.
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
    // create user in in the admin panel
    public function createUserAdminPanel($data)
    {
        $doc = [
            'full_name'   => $data['full_name'],
            'username'    => $data['username'],
            'email'       => $data['email'],
            'password'    => password_hash($data['password'], PASSWORD_BCRYPT),  // Hashing password
            'role'        => $data['role'],
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

    // update user
    public function updateUser($userId, $data)
    {
        $update = [
            '$set' => [
                'full_name' => $data['full_name'],
                'username'  => $data['username'],
                'email'     => $data['email'],
                'role'      => $data['role']
            ]
        ];
        $bulkWrite = new MongoDB\Driver\BulkWrite;
        $bulkWrite->update(
            ['_id' => new MongoDB\BSON\ObjectId($userId)],
            $update
        );
        return $this->executeWrite($bulkWrite, $this->collectionName);
    }
    //delete user
    public function delete($filter)
    {
        $bulkWrite = new MongoDB\Driver\BulkWrite();
        $bulkWrite->delete($filter); // Delete operation with the filter
        return $this->executeWrite($bulkWrite, $this->collectionName);
    }
}
