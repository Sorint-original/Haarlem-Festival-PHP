
<script>
    $(function(){
            $('.fadein img:gt(0)').hide();
            setInterval(function(){
            $('.fadein :first-child').fadeOut().next('img').fadeIn().end
            ().appendTo('.fadein');
            }, 9500);
    });
</script>
<div class="fadein p-0">
    <?php
    // dsplay images from directory
    // directory path
    $dir = "assets/Sidebar/";
    
    $scan_dir = scandir($dir);
    foreach($scan_dir as $img):
            if(in_array($img,array('.','..')))
            continue;
    ?>
    <img src="<?php echo $dir.$img ?>" alt="<?php echo $img ?> " class = "image-fluid";>
    <?php endforeach; ?>
</div>