<?php

require_once(__DIR__ . "/../models/PageModel.php");
require_once(__DIR__ . "/../models/EventModel.php");

class HomepageController
{
    private $eventModel;
    private $pageModel;
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->pageModel= new PageModel();
    }

    public function getPageContent(){
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(['error' => 'Missing ID']);
            exit;
        }
        echo json_encode($this->pageModel->getPageById($id));
        exit;
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