<?php

require_once(__DIR__ . "/../models/PageModel.php");

class HistoryController
{
    private $pageModel;
    
    public function __construct()
    {
        $this->pageModel = new PageModel();
    }
    public function GetHistoryPage(){
        $page = $this->pageModel->getPageById("67dbf703ed593eb7a526a613")[0];
        return $page;
    }
}