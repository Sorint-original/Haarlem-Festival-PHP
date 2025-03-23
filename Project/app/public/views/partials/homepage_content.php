

<!-- Call all the partials that need to be in homepage here. 
Then this file will be included in the index.php file (which is in pages.)-->

<?php
// top picture
require(__DIR__ . "/../partials/slideshow.php");

// welcoming part
require(__DIR__ . "/../partials/welcoming.php");

// event dates
require(__DIR__ . "/../partials/eventDates.php");

// map ?>
<div class="map-container align-self-center">
    <div class="map" id="map"></div>
</div>

<?php // faq 
require(__DIR__ . "/../partials/faq.php");
