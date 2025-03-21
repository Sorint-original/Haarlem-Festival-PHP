document.addEventListener('DOMContentLoaded', () =>{

const progressContainerArray = document.getElementsByClassName('progress-container');
const discArray = document.getElementsByClassName('disc');
const progressArray = document.getElementsByClassName('progress');
const timerArray = document.getElementsByClassName('timer');
const durationArray = document.getElementsByClassName('duration');
const playArray = document.getElementsByClassName('play');

function playPauseMedia(index) {
    if (discArray[index].paused) {
        discArray[index].play();
    } else {
        discArray[index].pause();
    }
}

function updatePlayPauseIcon(index) {

    if (discArray[index].paused) {
        playArray[index].classList.remove('fa-pause');
        playArray[index].classList.add('fa-play');
    } else {
        playArray[index].classList.remove('fa-play');
        playArray[index].classList.add('fa-pause');
    }
}


// Update progress bar
function updateProgress(index) {
    progressArray[index].style.width = (discArray[index].currentTime / discArray[index].duration) * 100 + '%';

    let minutes = Math.floor(discArray[index].currentTime / 60);
    let seconds = Math.floor(discArray[index].currentTime % 60);
    if (seconds < 10) {
        seconds = '0' + seconds;
    }
    timerArray[index].textContent = `${minutes}:${seconds}`;
}

// Change song progress when clicked on progress bar
function setProgress(ev,index) {
    const totalWidth = this.clientWidth;
    const clickWidth = ev.offsetX;
    const clickWidthRatio = clickWidth / totalWidth;
    discArray[index].currentTime = clickWidthRatio * discArray[index].duration;
}

// Navigate song slider
function progressSlider(index,ev) {
    var is_playing = !discArray[index].paused
    if (is_playing)
        discArray[index].pause()

    const totalWidth = progressContainerArray[index].clientWidth;
    const clickWidth = ev.offsetX;
    const clickWidthRatio = clickWidth / totalWidth;
    discArray[index].currentTime =clickWidthRatio * discArray[index].duration;
    if (is_playing)
        discArray[index].play()
    document.addEventListener('mousemove', slideMoving(ev,index));
    document.addEventListener('mouseup', function() {
        if (is_playing)
            discArray[index].play()
        document.removeEventListener('mousemove', slideMoving(ev,index));
    });

}

// Navigate song slider while moving
function slideMoving(ev,index) {
    var is_playing = !discArray[index].paused
    if (is_playing)
        discArray[index].pause()
    const totalWidth = progressContainerArray[index].clientWidth;
    const clickWidth = ev.offsetX;
    const clickWidthRatio = clickWidth / totalWidth;
    discArray[index].currentTime = clickWidthRatio * discArray[index].duration;
    if (is_playing)
        discArray[index].play()
}

function SetSong(index){
    dur = discArray[index].duration
    mins = Math.floor(Math.abs(dur / 60))
    mins = String(mins).padStart('2', 0)
    sec = Math.floor(dur - (parseInt(mins) * 60))
    sec = String(sec).padStart('2', 0)
    durationArray[index].textContent = `${mins}:${sec}`
}

for(i=0;i<playArray.length;i++){

    (function (index) {
        //The play button event
        playArray[index].addEventListener('click',  () => playPauseMedia(index));
        // Various events on disc
        discArray[index].addEventListener('play',  () => updatePlayPauseIcon(index));
        discArray[index].addEventListener('pause',() => updatePlayPauseIcon(index));
        discArray[index].addEventListener('timeupdate',() =>  updateProgress(index));
        // Move to different place in the song
        progressContainerArray[index].addEventListener('mousedown',(ev) =>  progressSlider(index,ev));

        discArray[index].addEventListener('canplaythrough', () => SetSong(index));
    })(i);


}


})