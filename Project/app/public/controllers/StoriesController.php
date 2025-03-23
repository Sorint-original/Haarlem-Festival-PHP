<?php

require_once(__DIR__ . "/../models/PageModel.php");
require_once(__DIR__ . "/../models/EventModel.php");

class StoriesController
{
    private $pageModel;
    private $eventModel;
    public function __construct()
    {
      $this->pageModel = new PageModel();
      $this->eventModel = new EventModel();
    }

    public function getPageContent(){
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(['error' => 'Missing ID']);
            exit;
        }
        echo json_encode($this->pageModel->getPageById($id));
        exit;
    }
    // public function getEvent(){

}