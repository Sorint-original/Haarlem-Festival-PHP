<?php

require_once(__DIR__ . "/../models/PageModel.php");
require_once(__DIR__ . "/../models/HistoryModel.php");
require_once(__DIR__ . "/../models/EventModel.php");
$model = new EventModel();
$events = $model->getAllHistoryEvents(); // or getHistoryEventsByDate($date)


class HistoryController
{
    private $pageModel;
    private $historyModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
        $this->historyModel = new HistoryModel();
    }

    public function GetHistoryPage()
    {
        return $this->pageModel->getPageById("67e5484886b6f03e6b7d0934")[0];
    }

    public function GetLocation($slug)
    {
        return $this->historyModel->getLocationBySlug($slug);
    }

    public function GetAllLocations()
    {
        return $this->historyModel->getAllLocations();
    }
    public function GetSchedule()
    {
        require_once(__DIR__ . "/../models/HistoryScheduleModel.php");
        $model = new EventModel();
        return $model->getAllHistoryEvents();
    }
    public function GetHistoryTourInfo()
    {
        return $this->pageModel->getPageByIdentifier("history-tour-info");
    }
    public function tickets()
    {
        $model = new EventModel();
        $historyEvents = $model->getAllHistoryEvents();
        include(__DIR__ . '/../views/history/tickets.php');
    }

}

