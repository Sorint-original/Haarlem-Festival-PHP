
<script>
    $(function(){
                $('.fadein img:gt(0)').hide(); // Hide all images except the first one initially
            setInterval(function(){
                $('.fadein :first-child').fadeOut().next('img').fadeIn().end()
                .appendTo('.fadein'); // Move the first image to the end after it fades out
            }, 10000); // Change images every 10 seconds
    });
</script>

<div class="fadein w-100">
    <?php
    // Loop through the images array and display each image in the slideshow
    foreach ($images as $img):
    ?>
        <img src="assets/slideshow/<?php echo $img; ?>" alt="Slideshow Image" class="h-100 w-100">
    <?php endforeach; ?>
</div>

<!-- Overlay Image and Text -->
<div class="overlay">
    <div class="overlay-content">
        <img src="assets/favicons/logo.png" alt="Haarlem Festival Logo" class="overlay-image">
        <p class="overlay-text">Haarlem Festival</p>
    </div>
</div>