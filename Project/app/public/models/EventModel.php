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

    public function GetEventById($event_id){
         $filter = ['_id' => $event_id];
        $event = $this->executeQuery($this->collectionName, $filter);
        if ($event == null){
            return null;
        }
        return $event[0];
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

    public function GetJazzEventsByBand($Id){
        $filter = ['band' =>$Id];
        $options = ['sort' => ['startTime' => 1]];

        $Shows = $this->executeQuery($this->collectionName,$filter,$options);
        return $Shows;
    }

    public function DecreaseSeats($event_id, $decreasedSeats) {
        try {
            // Execute the update operation
            $bulkWrite = new MongoDB\Driver\BulkWrite();
            $bulkWrite->update(
                ['_id' => $event_id], // Filter: find cart by user
                ['$inc' => ['availableSeats' => -$decreasedSeats]], // Remove from array
                ['multi' => false] // Only update one document
            );
            
            // Return true if the document was found and modified
            return $result->getModifiedCount() > 0;
        } catch (Exception $e) {
            // Log or handle the error appropriately
            error_log("Error decreasing seats: " . $e->getMessage());
            return false;
        }
    }

}