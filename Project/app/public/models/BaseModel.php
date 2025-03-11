<?php

class BaseModel
{
    protected $manager;
    protected $databaseName;

    public function __construct()
    {
        try {
            // Get MongoDB connection string from environment variable
            $mongoUri = getenv('MONGO_URI');

            // Create a new MongoDB Manager 
            $this->manager = new MongoDB\Driver\Manager($mongoUri);

            // Define database name
            $this->databaseName = 'HaarlemFestival';

        } catch (Exception $e) {
            error_log("MongoDB Connection Error: " . $e->getMessage());
            die("Database connection failed. Try again later.");
        }
    }

    protected function executeQuery($collectionName, $filter = [], $options = [])
    {
        try {
            // Execute query
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $this->manager->executeQuery("{$this->databaseName}.{$collectionName}", $query);
            return $cursor->toArray();
        } catch (Exception $e) {
            error_log("MongoDB Query Error: " . $e->getMessage());
            return [];
        }
    }

    protected function executeWrite($bulkWrite, $collectionName)
 {
    try {
       
        $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY);

        // Pass it as an array option
        $result = $this->manager->executeBulkWrite(
            "{$this->databaseName}.{$collectionName}",
            $bulkWrite,
            ['writeConcern' => $writeConcern]
        );

        return $result;
    } catch (Exception $e) {
        error_log("MongoDB Write Error: " . $e->getMessage());
        return false;
    }
 }
}
?>