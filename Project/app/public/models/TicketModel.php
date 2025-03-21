<?php

require_once(__DIR__ . "/BaseModel.php");

class TicketModel extends BaseModel
{

    protected $STicketcollection = 'ShopTickets'; 
    

    public function __construct()
    {
        parent::__construct();
    }

    public function GetShopTicketsByEventId($EventId){
        $filter = ['EventId' =>$EventId];
        $options = [];

        $tickets = $this->executeQuery($this->STicketcollection,$filter,$options);
        return $tickets;
    }

}