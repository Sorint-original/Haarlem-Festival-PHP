<?php

$page_type = "jazz"; #this way we can set which color backround is set in the header based on the page type
$fontColoring = 'fontCdark'; #this is how we define how the font should be colored based on the background

$slides = [ 
    $band->name.'.png'
];

$title = $band->name;

require(__DIR__ . "/../partials/header.php");

// This is where the slide show + title will be
require(__DIR__ . "/../partials/slideshow.php");
?>

<p class="h3 w-75 text-center align-self-center py-5"><?php echo $band->text ?></p>

<div class="imageCluster mb-5" > 
    <img id= "img_1" src= "/assets/images/jazz/<?php echo $band->name; ?>1.png">  
    <img id= "img_2" src= "/assets/images/jazz/<?php echo $band->name; ?>2.png">  
    <img id= "img_3" src= "/assets/images/jazz/<?php echo $band->name; ?>3.png">  
</div>

<header class="display-2 align-self-left ps-5 pb-5 align-self-center">Notorious Songs</header>

<section class="jazz-Section py-5 w-75 align-self-center   ">
    <?php 
    foreach($band->tracks as $track){
        require(__DIR__ . "/../partials/jazz-partials/bandTrack.php");
    }
    ?>
</section>

<?php require(__DIR__ . "/../partials/jazz-partials/bandShows.php");?>

<script src="/assets/js/SongPlayer.js"></script>


<?php require(__DIR__ . "/../partials/footer.php");?>

