<?php

/**
 * NOTE! this base model handles initializing the database
 * 
 * To use the database in a derived class, use self::$database
 */

class BaseModel
{

    protected static $database;

    function __construct()
    {
        try {
            // Get MongoDB connection string from environment variable
            $mongoUri = getenv('MONGO_URI');
        
            // Create a new MongoDB client
            $client = new MongoDB\Client($mongoUri);
        
            // Select a database
            $database = $client->HaarlemFestival;

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
