<?php

require_once(__DIR__ . "/BaseModel.php");

class EventModel extends BaseModel
{
    protected $dates;
    protected $eventTypes = ['jazz', 'history', 'yummy', 'magic', 'storie'];
    protected $collectionName = 'Events'; 
    

    public function __construct()
    {
        parent::__construct();
        $this->dates = [date('Y') . '-07-24',date('Y') . '-07-25',date('Y') . '-07-26',date('Y') . '-07-27'];
    }

    public function GetAllEventsOfDay($day)
    {
        $filter = $this->GetDayFilter($day);
        $options = ['sort' => ['startTime' => 1]];

        foreach($this->eventTypes as $type){
            $Qfilter = array_merge($filter,$this->GetTypeFilter($type));
            $events[$type] = $this->executeQuery($this->collectionName,$Qfilter,$options);
        }
        return $events;
    }

    public function GetTypeEventsOfDay($day,$type)
    {
        $filter = $this->GetDayFilter($day);
        $filter = array_merge($filter,$this->GetTypeFilter($type));
        $options = ['sort' => ['startTime' => 1]];
        $events = $this->executeQuery($this->collectionName,$filter,$options);

        return $events;
    }

    private function GetTypeFilter($type){
        return ['type' => $type];
    }

    private function GetDayFilter($day){
        $startOfDay = new MongoDB\BSON\UTCDateTime(strtotime($this->dates[$day]) * 1000);
        $endOfDay = new MongoDB\BSON\UTCDateTime(strtotime($this->dates[$day] . ' +1 day') * 1000);
        return ['startTime' => ['$gte' => $startOfDay,'$lt' => $endOfDay]];
    }
}