<?php

require_once(__DIR__ . "/../models/EventModel.php");
require_once(__DIR__ . "/../models/TicketModel.php");
require_once(__DIR__ . "/../models/CartModel.php");
require_once(__DIR__ . "/../models/OrderModel.php");
require_once(__DIR__ . "/../models/ListItemModel.php");


class PurchaseController
{
    private $eventModel;
    private $ticketModel;
    private $cartModel;
    private $orderModel;
    private $listItemModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->ticketModel = new TicketModel();
        $this->cartModel = new CartModel();
        $this->orderModel = new OrderModel();
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
    }

    private function IntegrateTicketsinEvents($events){
        for($i=0; $i<count($events);$i++){
            $events[$i]->tickets = $this->ticketModel->GetShopTicketsByEventId($events[$i]->_id);
        }
        return $events;
    }

    private function GetListItem($ListItemId){
        $item = $this->listItemModel->getListItemById($ListItemId);
        $item ->ticket = $this->ticketModel->GetShopTicketById($item->ticket_id);
        $item ->event = $this->eventModel->GetEventById($item->ticket->EventId);
        return $item;
    }

    public function HandleCart(){
        $cart = $this->cartModel->getCartByUserId($_SESSION['user_id']);
        if($cart == null){
            $this->cartModel->AddCart($_SESSION['user_id']);
            $cart = $this->cartModel->getCartByUserId($_SESSION['user_id']);
        }
        else{
            for($i=0; $i<count($cart->CartItems);$i++){
                $cart->CartItems[$i]= $this->GetListItem($cart->CartItems[$i]);
            }
        }
        echo json_encode($cart);
        return $cart;
    }

    public function GetCart(){
        $cart = $this->cartModel->getCartByUserId($_SESSION['user_id']);
        for($i=0; $i<count($cart->CartItems);$i++){
            $cart->CartItems[$i]= $this->GetListItem($cart->CartItems[$i]);
        }
        return $cart;
    }


    public function addTicketInCart(){
        // Read the raw input from the request body
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
    
        // Get the filters from the request body
        $ticket_id = $data['ticket_id'];
        $ticket = $this->ticketModel->GetShopTicketById($ticket_id);
        $cart = $this->cartModel->getCartByUserId($_SESSION['user_id']);
        $listItem = $this->listItemModel->getListIteminCart($cart,$ticket);
        if($listItem == null){
            $newItemId = $this->listItemModel->addListItem($ticket);
            $this->cartModel->addInCart($newItemId,$_SESSION['user_id']);
            $newItem = $this->GetListItem($newItemId);
            echo json_encode($newItem);
            exit;
        }
        echo json_encode('unchanged');

    }

    public function RemoveFromCart(){
        // Read the raw input from the request body
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
    
        // Get the filters from the request body
        $lItem_id = $data['lItem_id'];
        $this->cartModel->RemoveFromCart($lItem_id,$_SESSION['user_id']);//remove from cart
        $this->listItemModel->RemoveListItem($lItem_id);
    }

    public function UpdateAmount($increment){
        // Read the raw input from the request body
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
    
        // Get the filters from the request body
        $lItem_id = $data['lItem_id'];
        $item = $this->GetListItem($lItem_id);
        if($item->amount +$increment <  $item->event->availableSeats){
            $this->listItemModel->UpdateListItem($lItem_id,$item->amount +$increment);
            echo true;
        }
        else{
            echo false;
        }
    }

    public function EmptyCart(){
        $cart = $this->cartModel->getCartByUserId($_SESSION['user_id']);
        for($i=0; $i<count($cart->CartItems);$i++){
            $this->listItemModel->RemoveListItem($cart->CartItems[$i]);
        }
        $this->cartModel->EmptyCart($_SESSION['user_id']);
    }

    public function CompleteCheckout(){
        $cart = $this->GetCart();
        //createClientTickets
        $newClientTickets = [];
        for($i=0; $i<count($cart->CartItems);$i++){
            for($j=0; $j<$cart->CartItems[$i]->amount;$j++){
                $newClientTicket=$this->ticketModel->GenerateNewClientTicket($cart->CartItems[$i]->ticket_id);
                $newClientTickets[] = $newClientTicket;//create Client Ticket
            }
            //decrease seats left
            if($cart->CartItems[$i]->ticket->seatingNumber >0){
                $this->eventModel->DecreaseSeats($cart->CartItems[$i]->ticket->EventId,$cart->CartItems[$i]->ticket->seatingNumber*$cart->CartItems[$i]->amount);
            }
        }
        //create order
        $this->orderModel->TransformIntoOrder($cart,$_SESSION['user_id'],$newClientTickets);
        //send email based on order etc.

        //emptycart
        $this->cartModel->EmptyCart($_SESSION['user_id']);

    }


}