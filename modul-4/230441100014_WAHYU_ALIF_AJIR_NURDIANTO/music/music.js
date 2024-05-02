document.addEventListener("DOMContentLoaded", function() {
    const music = document.getElementById("music");
    const playBtn = document.getElementById("playBtn");
    const pauseBtn = document.getElementById("pauseBtn");
    const skipBtn = document.getElementById("skipBtn");
  
    playBtn.addEventListener("click", function() {
      music.play();
    });
  
    pauseBtn.addEventListener("click", function() {
      music.pause();
    });
  
    skipBtn.addEventListener("click", function() {
    });
  });
  