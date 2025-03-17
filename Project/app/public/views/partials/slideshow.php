
<script>
    $(function(){
                $('.fadein img:gt(0)').hide(); // Hide all images except the first one initially
            setInterval(function(){
                $('.fadein :first-child').fadeOut().next('img').fadeIn().end()
                .appendTo('.fadein'); // Move the first image to the end after it fades out
            }, 10000); // Change images every 10 seconds
    });
</script>
<div class="header-content w-100">
<div class="fadein w-100">
    <?php
    // Loop through the images array and display each image in the slideshow
    foreach ($slides as $img):
    ?>
        <img src="assets/slideshow/<?php echo $img; ?>" alt="Slideshow Image" class="h-100 w-100">
    <?php endforeach; ?>
</div>
<!-- Overlay Image and Text -->
<div class="overlay">
    <div class="overlay-content">
        <?php if ($page_type == "homepage") {?>
        <img src="assets/favicons/logo.png" alt="Haarlem Festival Logo" class="overlay-image">
        <?php } ?>
        <p class="overlay-text display-1 font-weight-bold <?php echo $page_type; ?>" ><?php echo $title; ?></p>
    </div>
</div>
</div>