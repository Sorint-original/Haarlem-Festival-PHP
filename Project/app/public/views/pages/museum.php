<?php

$page_type = "museum"; #this way we can set which color backround is set in the header based on the page type
$fontColoring = 'fontCdark'; #this is how we define how the font should be colored based on the background

require(__DIR__ . "/../partials/header.php");

require(__DIR__ . "/../partials/museum-partials/museum-top-picture.php");

require(__DIR__ . "/../partials/museum-partials/museum-intro.php");

require(__DIR__ . "/../partials/museum-partials/teyler-section.php");

require(__DIR__ . "/../partials/museum-partials/lorentz-section.php");

require(__DIR__ . "/../partials/footer.php");

?>
<script src="/assets/js/Museum.js"></script>