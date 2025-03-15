<?php

require_once(__DIR__ . "/../models/EventModel.php");
require_once(__DIR__ . "/../models/TicketModel.php");

class JazzController
{
    private $eventModel;
    private $ticketModel;
    
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->ticketModel = new TicketModel();
    }

    public function getDayPasses(){
        $passes['daypass'] = $this->ticketModel->GetShopTicketsByEventId("jazzDayPass")[0];
        $passes['weekpass'] = $this->ticketModel->GetShopTicketsByEventId("jazzWeekPass")[0];
        return $passes;
    }

    public function getEvents() {
        // Read the raw input from the request body
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
    
        // Get the day index from the request body
        $day = $data['day'];
    
        // Fetch events for the day
        $events = $this->eventModel->GetTypeEventsOfDay($day,"jazz");
        for($i=0; $i<count($events);$i++){
            $events[$i]->ticket = $this->ticketModel->GetShopTicketsByEventId($events[$i]->_id)[0];
        }

        // Return events as JSON
        echo json_encode($events);
        exit;
    }

}