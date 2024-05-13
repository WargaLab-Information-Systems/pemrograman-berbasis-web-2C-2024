// Toggle class active

const navbarNav = document.querySelector(".navbar-nav");

// ketika humberger menu di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// toggle class active untuk search form

const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector(".search-box");

document.querySelector("#search-button").onclick = () => {
  searchForm.classList.toggle("active");
  searchBox.focus();
};

// Klik di luar sidebar akan menutup sidebar

const hamburger = document.querySelector("#hamburger-menu");

document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

//jika kita klik diluar humberger && navbar maka navbar akan hilang class active nya



// https://youtu.be/MCVkMmYL-aY?si=loHFxQYNuBY-UVMH