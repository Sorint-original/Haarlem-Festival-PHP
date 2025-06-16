<?php

require_once(__DIR__ . "/../models/EventModel.php");
require_once(__DIR__ . "/../models/TicketModel.php");
require_once(__DIR__ . "/../models/CartModel.php");


class PurchaseController
{
    private $eventModel;
    private $ticketModel;
    private $cartModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->ticketModel = new TicketModel();
        $this->cartModel = new CartModel();

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

    public function HandleCart(){
        $cart = $this->cartModel->getCartByUserId($_SESSION['user_id']);
        if($cart == null){
            $this->cartModel->AddCart($_SESSION['user_id']);
            $cart = $this->cartModel->getCartByUserId($_SESSION['user_id']);
        }
        return $cart;
    }
}