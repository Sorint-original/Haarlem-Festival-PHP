<?php

require_once(__DIR__ . "/BaseModel.php");

class UserModel extends BaseModel {
    private $collectionName = 'HaarlemFestival.Users';
    private $collection;

    public function __construct() {
        parent::__construct();
    }

}