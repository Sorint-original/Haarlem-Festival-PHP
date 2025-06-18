<?php

$page_type = "jazz"; #this way we can set which color backround is set in the header based on the page type
$fontColoring = 'fontCdark'; #this is how we define how the font should be colored based on the background

$slides = [ 
    'jazz slide.png',
];

$title = "Haarlem Jazz";


require(__DIR__ . "/../partials/header.php");

///Image slideshow
require(__DIR__ . "/../partials/slideshow.php");

?>

<header class="display-3 text-center py-3"><?php echo $page->header; ?></header>


<?php echo $page->text; ?>


<?php
require(__DIR__ . "/../partials/jazz-partials/jazz_schedule.php");

require(__DIR__ . "/../partials/footer.php");

