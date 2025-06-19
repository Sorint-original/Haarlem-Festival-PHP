<?php
require_once("BaseModel.php");

class LocationModel extends BaseModel
{
    public function getAllLocations()
    {
        $filter = []; // get everything
        $options = ['sort' => ['title' => 1]]; // sort alphabetically

        $query = new MongoDB\Driver\Query($filter, $options);
        $cursor = $this->manager->executeQuery($this->databaseName . '.Locations', $query);


        return $cursor;
    }
}
