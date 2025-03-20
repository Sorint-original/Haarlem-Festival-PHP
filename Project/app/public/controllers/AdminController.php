<?php

require_once(__DIR__ . "/../models/PageModel.php");
require_once(__DIR__ . "/../models/UserModel.php");

class AdminController
{
    private $pageModel;
    private $userModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
        $this->userModel = new UserModel();
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
    // get all users 
    public function getAllUsers()
    {
        $users = $this->userModel->getAllUsers();
        echo json_encode($users);
    }
    //get user by user id 
    public function getUserByUserId()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(['error' => 'Missing ID']);
            exit;
        }
        $user = $this->userModel->getUserByUserId($id);

        echo json_encode($user);
    }

    // update user
    public function updateUser()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $userId = $data['id'] ?? null;
        $userData = $data['userData'] ?? null;

        if (!$userId || !$userData) {
            echo json_encode(['error' => 'Missing user ID or data']);
            exit;
        }

        $result = $this->userModel->updateUser($userId, $userData);

        if ($result) {
            echo json_encode(['success' => 'User updated successfully']);
        } else {
            echo json_encode(['error' => 'User update failed']);
        }
        exit;
    }

    // delete user
    public function deleteUser()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $userId = $data['id'] ?? null;

        if (!$userId) {
            echo json_encode(['error' => 'Missing user ID']);
            exit;
        }
        $result = $this->userModel->delete(['_id' => new MongoDB\BSON\ObjectId($userId)]);

        if ($result) {
            echo json_encode(['success' => 'User deleted successfully']);
        } else {
            echo json_encode(['error' => 'User delete failed']);
        }
        exit;
    }
}
