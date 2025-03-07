<?php

require_once(__DIR__ . "/BaseModel.php");

class EventModel extends BaseModel
{
    protected $dates;
    protected $eventTypes = ['jazz', 'history', 'yummy', 'magic', 'stories'];
    protected $collectionName = 'HaarlemFestival.Events'; 
    

    public function __construct()
    {
        parent::__construct();
        $this->dates = [date('Y') . '-07-24',date('Y') . '-07-25',date('Y') . '-07-26',date('Y') . '-07-27'];
    }

    public function GetAllEventsOfDay($day)
    {
        $filter = $this->GetDayFilter($day);
        $options = [];

        foreach($this->eventTypes as $type){
            $Qfilter = array_merge($filter,$this->GetTypeFilter($type));
            $events[$type] = $this->QuerryEvents($Qfilter,$options);
        }
        return $events;
    }

    private function QuerryEvents($filter, $options){
        $query = new MongoDB\Driver\Query($filter, $options);
        $documents = $this->manager->executeQuery($this->collectionName, $query);
        return $documents;
    }

    private function GetTypeFilter($type){
        return ['Type' => $type];
    }

    private function GetDayFilter($day){
        $startOfDay = new MongoDB\BSON\UTCDateTime(strtotime($this->dates[$day]) * 1000);
        $endOfDay = new MongoDB\BSON\UTCDateTime(strtotime($this->dates[$day] . ' +1 day') * 1000);
        return ['startTime' => ['$gte' => $startOfDay,'$lt' => $endOfDay]];
    }

}