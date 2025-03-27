<?php
$page_type = "history"; // This way we can set which color background is set in the header based on the page type
$slides = [ 
    'history slide.png'
];
$title = "History";
$fontColoring = 'fontCdark'; // This is how we define how the font should be colored based on the background
require(__DIR__ . "/../partials/header.php");
require(__DIR__ . "/../partials/slideshow.php");
require(__DIR__."/../partials/history-partials/HistoryContent.php");
require(__DIR__."/../partials/footer.php");
?>
