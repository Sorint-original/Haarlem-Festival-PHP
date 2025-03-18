<?php

require_once(__DIR__ . "/../models/StoriesModel.php");

class StoriesController
{
    private $storiesModel;
    public function __construct()
    {
        $this->storiesModel = new StoriesModel();
    }

    public function getAllStories()
    {
        return $this->storiesModel->GetAllStories();
    }

    public function getStories() {
        // Fetch stories
        $stories = $this->getAllStories();
        // Return stories as JSON
        echo json_encode($stories);
        exit;
    }

}