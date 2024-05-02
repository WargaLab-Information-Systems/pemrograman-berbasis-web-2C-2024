function playAudio() {
    var audio = document.getElementById('audioPlayer');
    audio.play();
}

function pauseAudio() {
    var audio = document.getElementById('audioPlayer');
    audio.pause();
}

function stopAudio() {
    var audio = document.getElementById('audioPlayer');
    audio.pause();
    audio.currentTime = 0; // Mengatur waktu audio kembali ke 0
}
