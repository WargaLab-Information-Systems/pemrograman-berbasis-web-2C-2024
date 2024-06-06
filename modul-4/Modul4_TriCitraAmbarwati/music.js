// Mengambil referensi elemen-elemen HTML yang diperlukan
var audioPlayer = document.getElementById("audioPlayer");
var playButton = document.getElementById("playButton");
var pauseButton = document.getElementById("pauseButton");
var stopButton = document.getElementById("stopButton");

// Memasang event listener untuk tombol Play
playButton.addEventListener("click", function() {
    audioPlayer.play();
    playButton.style.display = "none"; // Sembunyikan tombol Play
    pauseButton.style.display = "inline-block"; // Tampilkan tombol Pause
});

// Memasang event listener untuk tombol Pause
pauseButton.addEventListener("click", function() {
    audioPlayer.pause();
    playButton.style.display = "inline-block"; // Tampilkan tombol Play kembali
    pauseButton.style.display = "none"; // Sembunyikan tombol Pause
});

// Memasang event listener untuk tombol Stop
stopButton.addEventListener("click", function() {
    audioPlayer.pause();
    audioPlayer.currentTime = 0;
    playButton.style.display = "inline-block"; // Tampilkan tombol Play kembali
    pauseButton.style.display = "none"; // Sembunyikan tombol Pause
});

