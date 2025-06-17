<?php

require_once(__DIR__ . "/../models/EventModel.php");
require_once(__DIR__ . "/../models/TicketModel.php");
require_once(__DIR__ . "/../models/CartModel.php");
require_once(__DIR__ . "/../models/ListItemModel.php");


class PurchaseController
{
    private $eventModel;
    private $ticketModel;
    private $cartModel;
    private $listItemModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->ticketModel = new TicketModel();
        $this->cartModel = new CartModel();
        $this->listItemModel = new ListItemModel();

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
    private function IntegrateListItemsInCart($cart){
        for($i=0; $i<count($cart->CartItems);$i++){
            $cart->CartItems[$i]= $this->listItemModel->getListItemById($cart->CartItems[$i]);
            $cart->CartItems[$i]->ticket = $this->ticketModel->GetShopTicketById($cart->CartItems[$i]->ticket_id);
        }
        return $cart;
    }

    public function HandleCart(){
        $cart = $this->cartModel->getCartByUserId($_SESSION['user_id']);
        if($cart == null){
            $this->cartModel->AddCart($_SESSION['user_id']);
            $cart = $this->cartModel->getCartByUserId($_SESSION['user_id']);
        }
        else{
            $cart = IntegrateListItemsInCart($cart);
        }
        return json_encode($cart);
    }


    public function addTicketInCart(){
        // Read the raw input from the request body
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
    
        // Get the filters from the request body
        $ticket_id = $data['ticket_id'];
        $ticket = $this->ticketModel->GetShopTicketById($ticket_id);
        $cart = $this->cartModel->getCartByUserId($_SESSION['user_id']);
        $listItem = $this->listItemModel->getListIteminCart($cart[0],$ticket[0]);
        if($listItem == null){
            $newItemId=$this->listItemModel->addListItem($ticket[0]);
            $this->cartModel->addInCart($newItemId,$_SESSION['user_id']);
            return json_encode('updated');
        }
        return json_encode('unchanged');

    }
}