// Toggle class active

const navbarNav = document.querySelector(".navbar-nav");

// ketika humberger menu di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
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