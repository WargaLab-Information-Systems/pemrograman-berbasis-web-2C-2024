// Perintah ini untuk mengakses elemen HTML dengan ID "myAudio" menggunakan metode document
// .getElementById(), dan kemudian menyimpannya dalam variabel audio
const audio = document.getElementById('myAudio');

function togglePlayPause(){
    if(audio.paused)
    audio.play();
    else
    audio.pause();
}
// Fungsi ini akan dijalankan setiap kali tombol dengan kelas "play-pause-button"  di klik
const PlayPauseButton = document.querySelector('.play-pause-button')
PlayPauseButton.addEventListener('click',togglePlayPause)