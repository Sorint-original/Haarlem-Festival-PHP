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
        $page = $this->pageModel->getPageById("67e5484886b6f03e6b7d0934")[0];
        return $page;
    }
}