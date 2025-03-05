<?php

require_once(__DIR__ . "/BaseModel.php");

class EventModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $eventCollection = $database->Events;
    }

    public function getAll() {
        $events = $eventCollection->find();
        return $events;
    }
   
}