<?php

require_once(__DIR__ . "/BaseModel.php");

class HistoryModel extends BaseModel
{
    private $collectionName = "Locations";

    public function getLocationBySlug($slug)
    {
        $result = $this->executeQuery($this->collectionName, ['slug' => $slug]);

        // Return the first match or null
        return count($result) > 0 ? $result[0] : null;
    }

    public function getAllLocations()
    {
        return $this->executeQuery($this->collectionName);
    }
}
