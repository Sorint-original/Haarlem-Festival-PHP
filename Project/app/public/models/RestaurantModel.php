<?php

require_once(__DIR__ . "/BaseModel.php");

class RestaurantModel extends BaseModel
{
    protected $collectionName = 'Restaurants';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllRestaurants()
    {
        return $this->executeQuery($this->collectionName);
    }

    public function getRestaurantsByCuisine($cuisine)
    {
        // $cuisine is a string, e.g., "Dutch" or "French"
        $filter = ['cuisineTypes' => $cuisine];
        return $this->executeQuery($this->collectionName, $filter);
    }

    public function getRestaurantById($id)
    {
        $filter = ['_id' => new MongoDB\BSON\ObjectID($id)];
        $result = $this->executeQuery($this->collectionName, $filter);
        return $result[0] ?? null;
    }
}
