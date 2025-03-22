<?php

require_once(__DIR__ . "/../models/PageModel.php");

class MuseumController
{
    private $pageModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
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
}