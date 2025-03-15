<?php

require_once(__DIR__ . "/../models/EventModel.php");

class HomepageController
{
    private $eventModel;
    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    public function getEvents() {
        // Read the raw input from the request body
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
    
        // Get the day index from the request body
        $day = $data['day'];
    
        // Fetch events for the day
        $events = $this->eventModel->GetAllEventsOfDay($day);
        // Return events as JSON
        echo json_encode($events);
        exit;
    }

}