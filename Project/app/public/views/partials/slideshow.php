
<script>
    $(function(){
            $('.fadein img:gt(0)').hide();
            setInterval(function(){
            $('.fadein :first-child').fadeOut().next('img').fadeIn().end
            ().appendTo('.fadein');
            }, 10000);
    });
</script>

<div class="fadein w-100">
    <?php
    // display images from directory
    // directory path
    $dir = "assets/Sidebar/";
    $scan_dir = scandir($dir);
    foreach($scan_dir as $img):
            if(in_array($img,array('.','..')))
            continue;
    ?>
    <img src="<?php echo $dir.$img ?>" alt="<?php echo $img ?>" class= "h-100 w-100">
    <?php endforeach; ?>

</div> 

<!-- Overlay Image and Text -->
<div class="overlay">
    <div class="overlay-content">
        <img src="assets/favicons/logo.png" alt="Haarlem Festival Logo" class="overlay-image">
        <p class="overlay-text">Haarlem Festival</p>
    </div>
</div>