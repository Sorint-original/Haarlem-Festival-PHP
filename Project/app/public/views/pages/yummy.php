<?php

$page_type = "yummy"; #this way we can set which color backround is set in the header based on the page type
$fontColoring = 'fontCdark'; #this is how we define how the font should be colored based on the background

$slides = [ 
    'yummy slide 1.png',
    'yummy slide 2.png',
    'yummy slide 3.png',
    'yummy slide 4.png'
];

$title = "Haarlem Yummy";

require(__DIR__ . "/../partials/header.php"); 

///Image slideshow
require(__DIR__ . "/../partials/slideshow.php");

///Yummy Introduction Section
require(__DIR__ . "/../partials/yummy-partials/yummy_intro.php");
require(__DIR__ . "/../partials/yummy-partials/restaurant_cards.php");

require(__DIR__ . "/../partials/footer.php");
?>

<script src="/assets/js/Yummy.js"></script>