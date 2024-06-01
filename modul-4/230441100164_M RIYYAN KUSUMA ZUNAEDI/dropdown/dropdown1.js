let play = document.getElementById('play');
let pause = document.getElementById('pause');
let stop = document.getElementById('stop');
let audio = new Audio("musik2.mp3");
let isPlaying = false; // Menyimpan status apakah lagu sedang dimainkan atau tidak
let pausedTime = 0; // Menyimpan waktu terakhir ketika lagu di-pause

function playMusic() {
    if (!isPlaying) {
        audio.play();
        isPlaying = true;
    } else {
        audio.currentTime = pausedTime; // Memulai dari waktu terakhir jika di-pause
        audio.play();
    }
}

function pauseMusic() {
    if (isPlaying) {
        audio.pause();
        pausedTime = audio.currentTime; // Menyimpan waktu saat di-pause
        isPlaying = false;
    }
}

function stopMusic() {
    audio.pause();
    audio.currentTime = 0;
    pausedTime = 0;
    isPlaying = false;
}

play.addEventListener('click', playMusic);
pause.addEventListener('click', pauseMusic);
stop.addEventListener('click', stopMusic);

let submenu=document.getElementById("submenu");

function toggleMenu(){
    submenu.classList.toggle("openMenu");
}

feather.replace();
