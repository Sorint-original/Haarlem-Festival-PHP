<?php
// Model class for handling page data.
require_once(__DIR__ . "/BaseModel.php");

class PageModel extends BaseModel{
    
    protected $collectionName='Pages';

    public function __construct()
    {
        parent::__construct();
    }

    // get page by id 

    public function getPageById($id)
    {
        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $pageData = $this->executeQuery($this->collectionName, $filter);
        return $pageData;
    }
    
    // update page content
    public function updatePage($pageId, $data) {
        // Filter to find the page by ID
        $filter = ['_id' => new MongoDB\BSON\ObjectId($pageId)];
        // Use the update method from BaseModel
        return $this->update($this->collectionName, $filter, $data);
    }
}

