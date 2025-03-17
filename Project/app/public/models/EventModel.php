<?php

require_once(__DIR__ . "/BaseModel.php");

class EventModel extends BaseModel
{
    protected $dates;
    protected $eventTypes = ['jazz', 'history', 'yummy', 'museum', 'story'];
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
            $Qfilter = array_merge($filter,['type' => $type]);
            $events[$type] = $this->executeQuery($this->collectionName,$Qfilter,$options);
        }
        return $events;
    }

    public function GetTypeEventsOfDay($day,$type)
    {
        $filter = $this->GetDayFilter($day);
        $filter = array_merge($filter,['type' => $type]);
        $options = ['sort' => ['startTime' => 1]];
        $events = $this->executeQuery($this->collectionName,$filter,$options);

        return $events;
    }

    private function GetDayFilter($day){
        $startOfDay = new MongoDB\BSON\UTCDateTime(strtotime($this->dates[$day]) * 1000);
        $endOfDay = new MongoDB\BSON\UTCDateTime(strtotime($this->dates[$day] . ' +1 day') * 1000);
        return ['startTime' => ['$gte' => $startOfDay,'$lt' => $endOfDay]];
    }


    //Sub collection functions

    //Band SubCollection
    public function GetBandById($Id){
        $filter = ['_id' =>$Id];
        $options = [];

        $Band = $this->executeQuery("Bands",$filter,$options);
        return $Band;
    }

    public function GetJazzByBand($Id){
        $filter = ['band' =>$Id];
        $options = [];

        $Shows = $this->executeQuery($this->collectionName,$filter,$options);
        return $Shows;
    }


}