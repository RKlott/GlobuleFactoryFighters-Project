const mobileMenu = document.getElementById("mobile-menu");
const navLinks = document.querySelector(".nav-links");

mobileMenu.addEventListener("click", () => {
  navLinks.classList.toggle("active");
  mobileMenu.classList.toggle("toggle");
});

let lat = 44.552900059185355;
let lng = -0.25013630273803555;

var map = L.map("map").setView([lat, lng], 16);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var marker = L.marker([lat, lng]).addTo(map);
marker.bindPopup("<b>Globule Fitness</b>").openPopup();

//
