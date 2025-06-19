<?php

require_once("BaseModel.php");

class HistoryScheduleModel extends BaseModel
{
    public function getAllHistoryEvents()
    {
        $filter = ['type' => 'history'];
        $query = new MongoDB\Driver\Query($filter);
        $cursor = $this->manager->executeQuery($this->databaseName . '.Events', $query);
        return $cursor->toArray();
    }
    public function getHistoryEventsByDate($date)
{
    $filter = [
        'type' => 'history',
        'date' => $date
    ];
    $query = new MongoDB\Driver\Query($filter);
    $cursor = $this->manager->executeQuery($this->databaseName . '.Events', $query);
    return $cursor->toArray();
}


}
