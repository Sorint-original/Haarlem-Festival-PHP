<?php


class BaseModel
{

    protected static $db;

    function __construct()
    {
        try {
            // Get MongoDB connection string from environment variable
            $mongoUri = getenv('MONGO_URI');
        
            // Create a new MongoDB client
            $manager = new MongoDB\Driver\Manager($mongoUri);

            $filter = [];
            $options = [];

            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $manager->executeQuery('HaarlemFestival.Users', $query);

            foreach ($cursor as $document) {
                var_dump($document);
            }
                    
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
