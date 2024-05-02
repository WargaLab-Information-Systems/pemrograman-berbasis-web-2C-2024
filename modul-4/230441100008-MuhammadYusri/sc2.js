// Dapatkan elemen audio dan tombol

const music = document.getElementById("music"); // const adalah variabel yang nilainya tidak bisa diubah
const playBtn = document.getElementById("playBtn");
const pauseBtn = document.getElementById("pauseBtn");

// Event listener untuk tombol play
playBtn.addEventListener("click", function () {
  music.play();
});

// Event listener untuk tombol pause
pauseBtn.addEventListener("click", function () {
  //  addEventListener adalah
  music.pause();
});

// Dropdown menu toggle
const dropdownMenus = document.querySelectorAll(".menu");

dropdownMenus.forEach(function (dropdown) {
  dropdown.addEventListener("mouseover", function () {
    //mouseover adalah
    this.querySelector(".dropdown-menu").style.display = "block"; //dropdown-menu dipanggil dari css
  });

  dropdown.addEventListener("mouseout", function () {
    this.querySelector(".dropdown-menu").style.display = "none";
  });
});
