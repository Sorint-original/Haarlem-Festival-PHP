<?php

require_once(__DIR__ . "/../models/EventModel.php");


Route::add('/', function () {
    // homepage is simply loading a static page
    // view the user routes for example following the MVC pattern
    $model = new EventModel;
    $events = $model->GetAllEventsOfDay(0);
    foreach ($events as $type => $eventList) {
        echo "Events for type $type:\n";
        foreach ($eventList as $event) {
            var_dump($event);
        }
    }
    
    require(__DIR__ . "/../views/pages/index.php");
});


