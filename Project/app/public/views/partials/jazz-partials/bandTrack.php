

<section class="audio-play d-flex flex-row align-items-center justify-content-center w-100 py-3">
    <audio class="disc" ><source src="/../assets/audio/<?php echo $track; ?>.mp3" type="audio/mp3"></audio>
    <header class="h2 me-5"><?php echo $track; ?></header>
    <i class="play special-btn fas fa-play"></i>
    <div class="d-flex flex-column w-50">
        <div class="progress-container">
            <div class="progress"></div>
        </div>
        <div class="timer-bar">
            <span class="timer">0:00</span>
            <span class="duration"></span>
        </div>
    </div>
</section>



    