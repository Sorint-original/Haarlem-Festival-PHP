<?php

require_once(__DIR__ . "/../models/EventModel.php");
require_once(__DIR__ . "/../models/TicketModel.php");


class PurchaseController
{
    private $eventModel;
    private $ticketModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->ticketModel = new TicketModel();
    }

    public function getEventsandTickets() {
        // Read the raw input from the request body
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
    
        // Get the filters from the request body
        $type = $data['type'];
        $day = $data['day'];
    
        // Fetch events for the day
        $events = $this->eventModel->GetTypeEventsOfDay($day,$type);
        $events = $this->IntegrateTicketsinEvents($events);

        // Return events as JSON
        echo json_encode($events);
        exit;
    }

    private function IntegrateTicketsinEvents($events){
        for($i=0; $i<count($events);$i++){
            $events[$i]->tickets = $this->ticketModel->GetShopTicketsByEventId($events[$i]->_id);
        }
        return $events;
    }
}