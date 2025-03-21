<?php

// json_encode => Converts PHP data types (array, object, etc.) to JSON format.
// json_decode => Converts JSON format data from JavaScript to PHP data types (usually array or object).
// Create and Update: Data is sent in the request body because these operations involve creating or modifying multiple fields of the resource.
// Delete: Only the ID of the resource is needed, so it's passed in the query string (URL) instead of the body.

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
        echo json_encode($result);
    }
    // get all users 
    public function getAllUsers()
    {
        $users = $this->userModel->getAllUsers();
        echo json_encode($users);
    }
    // get user by user id
    public function getUserByUserId()
    {
        $id = $_GET['id'] ?? null;
        $user = $this->userModel->getUserByUserId($id);
        echo json_encode($user);
    }
    // create user in the admin panel
    public function createUserAdminPanel()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        
        $result = $this->userModel->createUserAdminPanel($data);
        echo json_encode($result);
        
    }

    // update user
    public function updateUser()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $userId = $data['id'] ?? null;
        $userData = $data['userData'] ?? null;

        $result = $this->userModel->updateUser($userId, $userData);
        echo json_encode($result);
    }
    // delete user
    public function deleteUser()
    {
        $userId = $_GET['id'] ?? null;
        $result = $this->userModel->delete(['_id' => new MongoDB\BSON\ObjectId($userId)]);
        echo json_encode($result);
    }
}
