<?php


$page_type = "homepage"; #this way we can set which color backround is set in the header based on the page type
$slides = [ 
    'front slide 1.png',
    'front slide 2.png',
    'front slide 3.png',
    'front slide 4.png',
    'front slide 5.png'
];

$title = "Haarlem Festival";

$fontColoring = 'fontCdark'; #this is how we define how the font should be colored based on the background

require(__DIR__ . "/../partials/header.php");

require(__DIR__ . "/../partials/homepage_content.php");

require(__DIR__ . "/../partials/footer.php");
?>
<script src="/assets/js/HomepageContent.js"></script>
