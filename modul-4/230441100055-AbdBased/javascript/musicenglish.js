let proggress = document.getElementById("proggress");
let song = document.getElementById("song");
let ctrlIcon = document.getElementById("ctrlIcon");

// Saat lagu dimuat, atur nilai maksimum progress ke song.duration
song.addEventListener("loadedmetadata", function () {
  proggress.max = song.duration;
});

// Fungsi untuk memperbarui nilai progress dan waktu lagu secara bersamaan
song.addEventListener("timeupdate", function () {
  proggress.value = song.currentTime;
});

function playPause() {
  if (song.paused) {
    song.play();
    ctrlIcon.classList.remove("fa-play");
    ctrlIcon.classList.add("fa-pause");
  } else {
    song.pause();
    ctrlIcon.classList.remove("fa-pause");
    ctrlIcon.classList.add("fa-play");
  }
}

// Ketika menggeser progress bar, mengatur waktu menyesuaikan lagu
proggress.oninput = function () {
  song.currentTime = proggress.value;
};
