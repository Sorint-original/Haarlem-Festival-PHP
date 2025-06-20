<?php

require_once(__DIR__ . "/../models/EventModel.php");
require_once(__DIR__ . "/../models/TicketModel.php");
require_once(__DIR__ . "/../models/PageModel.php");

class JazzController
{
    private $eventModel;
    private $ticketModel;
    private $pageModel;
    
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->ticketModel = new TicketModel();
        $this->pageModel = new PageModel();
    }

    public function getDayPasses(){
        $passes['daypass'] = $this->ticketModel->GetShopTicketsByEventId("Jazz Festival Day Pass")[0];
        $passes['weekpass'] = $this->ticketModel->GetShopTicketsByEventId("Jazz Festival Week Pass")[0];
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
        $events = $this->IntegrateTicketsinEvents($events);

        // Return events as JSON
        echo json_encode($events);
        exit;
    }

    public function GetBand($Id){
        $Band = $this->eventModel->GetBandById(new MongoDB\BSON\ObjectID($Id));
        return $Band[0];
    }

    public function GetBandShows($Id){
        $events = $this->eventModel->GetJazzEventsByBand(new MongoDB\BSON\ObjectID($Id));
        $events = $this->IntegrateTicketsinEvents($events);
        return $events;
    }

    private function IntegrateTicketsinEvents($events){
        for($i=0; $i<count($events);$i++){
            $events[$i]->tickets = $this->ticketModel->GetShopTicketsByEventId($events[$i]->_id);
        }
        return $events;
    }

    public function GetJazzPage(){
        $page = $this->pageModel->getPageById("67dbf703ed593eb7a526a613")[0];
        return $page;
    }

}