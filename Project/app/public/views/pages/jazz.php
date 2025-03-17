<?php

$page_type = "jazz"; #this way we can set which color backround is set in the header based on the page type
$fontColoring = 'fontCdark'; #this is how we define how the font should be colored based on the background

require(__DIR__ . "/../partials/header.php");

///Image slideshow

?>

<header class="display-3 text-center py-3"> Listen to Haarlem’s  Jazz</header>

<p class="h3 text-center  w-75 align-self-center">Haarlem Jazz is an enchanting music festival held annually, celebrating through the amazing sounds of jazz,
     the event brings together renowned international artists, emerging talents, and local performers for a multi-day musical experience. 
    Whether you’re a jazz aficionado or a casual listener, Haarlem Jazz promises unforgettable moments of artistry, connection, and celebration.
</p>

<?php
require(__DIR__ . "/../partials/jazz-partials/jazz_schedule.php");

require(__DIR__ . "/../partials/footer.php");

