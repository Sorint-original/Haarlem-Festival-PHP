<?php

$page_type = "homepage"; #this way we can set which color backround is set in the header based on the page type
$fontColoring = 'fontCdark'; #this is how we define how the font should be colored based on the background

require(__DIR__ . "/../partials/header.php");

require(__DIR__ . "/../partials/stories-partials/stories-top-picture.php");

require(__DIR__ . "/../partials/stories-partials/stories-intro.php");

require(__DIR__ . "/../partials/stories-partials/card-littleones.php");

require(__DIR__ . "/../partials/stories-partials/card-educational-stories.php");

require(__DIR__ . "/../partials/stories-partials/card-podcasts.php");

require(__DIR__ . "/../partials/stories-partials/storytelling-highlights.php");

require(__DIR__ . "/../partials/stories-partials/pricing.php");

require(__DIR__ . "/../partials/stories-partials/donation-card.php");

require(__DIR__ . "/../partials/footer.php");
