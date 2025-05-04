<?php

require_once(__DIR__ . "/../models/PageModel.php");
require_once(__DIR__ . "/../models/EventModel.php");
require_once(__DIR__ . "/../models/RestaurantModel.php");

class YummyController
{
    private $pageModel;
    private $eventModel;
    private $restaurantModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
        $this->eventModel = new EventModel();
        $this->restaurantModel = new RestaurantModel();
    }

    public function getYummyPage()
    {
        $page = $this->pageModel->getPageById("6811ffb19df8bed5daae433d")[0]; 
        return $page;
    }

    public function getPageContent()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(['error' => 'Missing ID']);
            exit;
        }
        echo json_encode($this->pageModel->getPageById($id));
        exit;
    }

    // API endpoint: Get all restaurants
    public function getAllRestaurants()
    {
        $restaurants = $this->restaurantModel->getAllRestaurants();
        echo json_encode($restaurants);
        exit;
    }

    // API endpoint: Get restaurants by cuisine
    public function getRestaurantsByCuisine()
    {
        $cuisine = $_GET['cuisine'] ?? null;
        if (!$cuisine) {
            echo json_encode(['error' => 'Missing cuisine parameter']);
            exit;
        }
        $restaurants = $this->restaurantModel->getRestaurantsByCuisine($cuisine);
        echo json_encode($restaurants);
        exit;
    }

    // API endpoint: Get restaurant by ID
    public function getRestaurantById()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(['error' => 'Missing id parameter']);
            exit;
        }
        $restaurant = $this->restaurantModel->getRestaurantById($id);
        echo json_encode($restaurant);
        exit;
    }
}
?> 