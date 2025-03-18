document.addEventListener('DOMContentLoaded', () =>{

const progressContainer = document.getElementById('progress-container');
const disc = document.getElementById('disc');
const progress = document.getElementById('progress');
const timer = document.getElementById('timer');
const duration = document.getElementById('duration');
const play = document.getElementById('play');
let songIndex = 0;

function playPauseMedia() {
    if (disc.paused) {
        disc.play();
    } else {
        disc.pause();
    }
}

function updatePlayPauseIcon() {
    if (disc.paused) {
        play.classList.remove('fa-pause');
        play.classList.add('fa-play');
    } else {
        play.classList.remove('fa-play');
        play.classList.add('fa-pause');
    }
}


// Update progress bar
function updateProgress() {
    progress.style.width = (disc.currentTime / disc.duration) * 100 + '%';

    let minutes = Math.floor(disc.currentTime / 60);
    let seconds = Math.floor(disc.currentTime % 60);
    if (seconds < 10) {
        seconds = '0' + seconds;
    }
    timer.textContent = `${minutes}:${seconds}`;
}

// Change song progress when clicked on progress bar
function setProgress(ev) {
    const totalWidth = this.clientWidth;
    const clickWidth = ev.offsetX;
    const clickWidthRatio = clickWidth / totalWidth;
    disc.currentTime = clickWidthRatio * disc.duration;
}

// Navigate song slider
function progressSlider(ev) {
    var is_playing = !disc.paused
    if (is_playing)
        disc.pause()
    const totalWidth = this.clientWidth;
    const clickWidth = ev.offsetX;
    const clickWidthRatio = clickWidth / totalWidth;
    disc.currentTime = clickWidthRatio * disc.duration;
    if (is_playing)
        disc.play()
    document.addEventListener('mousemove', slideMoving);
    document.addEventListener('mouseup', function() {
        if (is_playing)
            disc.play()
        document.removeEventListener('mousemove', slideMoving);
    });

}

// Navigate song slider while moving
function slideMoving(ev) {
    var is_playing = !disc.paused
    if (is_playing)
        disc.pause()
    const totalWidth = progressContainer.clientWidth;
    const clickWidth = ev.offsetX;
    const clickWidthRatio = clickWidth / totalWidth;
    disc.currentTime = clickWidthRatio * disc.duration;
    if (is_playing)
        disc.play()
}
play.addEventListener('click', playPauseMedia);

// Various events on disc
disc.addEventListener('play', updatePlayPauseIcon);
disc.addEventListener('pause', updatePlayPauseIcon);
disc.addEventListener('timeupdate', updateProgress);


// Move to different place in the song
progressContainer.addEventListener('mousedown', progressSlider);

disc.addEventListener('canplaythrough', function() {
    dur = disc.duration
    mins = Math.floor(Math.abs(dur / 60))
    mins = String(mins).padStart('2', 0)
    sec = Math.floor(dur - (parseInt(mins) * 60))
    sec = String(sec).padStart('2', 0)
    duration.textContent = `${mins}:${sec}`
})
})