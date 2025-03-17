<?php

require_once(__DIR__ . "/../models/PageModel.php");

class AdminController
{
    private $pageModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
    }

    // get page content
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

    // update page
    public function updatePage()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $pageId = $data['id'] ?? null;
        $pageData = $data['pageData'] ?? null;

        if (!$pageId || !$pageData) {
            echo json_encode(['error' => 'Missing ID or data']);
            exit;
        }
        $result = $this->pageModel->updatePage($pageId, $pageData);

        if ($result) {
            echo json_encode(['success' => 'Page updated successfully']);
        } else {
            echo json_encode(['error' => 'Page update failed']);
        }
        exit;
    }
}
