<?php

require_once(__DIR__ . "/../models/EventModel.php");

class HomepageController
{
    private $eventModel;
    public function __construct()
    {
        $this->eventModel = new EventModel();
    }


    public function getAllEvents()
    {
        return $this->eventModel->getAll();
    }
}
