<?php

$page_type = "jazz"; #this way we can set which color backround is set in the header based on the page type
$fontColoring = 'fontCdark'; #this is how we define how the font should be colored based on the background

require(__DIR__ . "/../partials/header.php");

///Image slideshow

?>

<header class="display-1 text-center pt-3"> Listen to Haarlem’s  Jazz</header>

<p class="h1 text-center px-5 mx-5">Haarlem Jazz is an enchanting music festival held annually, celebrating through the amazing sounds of jazz,
     the event brings together renowned international artists, emerging talents, and local performers for a multi-day musical experience. 
    Whether you’re a jazz aficionado or a casual listener, Haarlem Jazz promises unforgettable moments of artistry, connection, and celebration.
</p>

<?php
require(__DIR__ . "/../partials/jazz-partials/jazz_schedule.php");

require(__DIR__ . "/../partials/footer.php");

