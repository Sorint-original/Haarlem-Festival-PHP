<?php
class BaseModel
{
    protected $manager;

    function __construct()
    {
        try {
            // Get MongoDB connection string from environment variable
            $mongoUri = getenv('MONGO_URI');
        
            // Create a new MongoDB client
            $this->manager = new MongoDB\Driver\Manager($mongoUri);
                    
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
