


<section class="audio-play d-flex flex-row align-items-center justify-content-around w-100 py-3 px-5">
    <header class="h2 me-5 w-50 text-center"><?php echo $track; ?></header>
    <div class="w-50 d-flex flex-row">
        <i class="play special-btn fas fa-play"></i>
        <div class="d-flex flex-column w-100">
            <audio class="disc" ><source src="/../assets/audio/<?php echo $track; ?>.mp3" type="audio/mp3"></audio>
            <div class="progress-container">
                <div class="progress"></div>
            </div>
            <div class="timer-bar">
                <span class="timer">0:00</span>
                <span class="duration"></span>
            </div>
        </div>
    </div>
</section>



    