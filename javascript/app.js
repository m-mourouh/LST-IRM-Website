//variables
const prevBtn = document.querySelector(".prevImg");
const nextBtn = document.querySelector(".nextImg");
const dots = document.querySelectorAll(".dot");
const slides = document.querySelectorAll(".mySlides");
const newSlides = document.querySelectorAll(".slide");
let mytimer;
let slideIndex = 1;
//Events
prevBtn.addEventListener("click", function () {plusSlides(-1);});
nextBtn.addEventListener("click", function () {plusSlides(1);});
dots.forEach((dot, index) => {
  dot.addEventListener("click", function () {currentSlide(index + 1);});
});

window.addEventListener("load", function () {
  showSlides(slideIndex);
  myTimer = setInterval(function () {plusSlides(1);}, 5000);
});

// Next/previous controls
function plusSlides(n) {
  clearInterval(myTimer);
  if (n < 0) {
    showSlides((slideIndex -= 1));
  } else {
    showSlides((slideIndex += 1));
  }
  if (n === -1) {
    myTimer = setInterval(function () {
      plusSlides(n + 2);
    }, 5000);
  } else {
    myTimer = setInterval(function () {
      plusSlides(n + 1);
    }, 5000);
  }
}

// image controls
function currentSlide(n) {
  clearInterval(myTimer);
  myTimer = setInterval(function () {plusSlides(n + 1);}, 5000);
  showSlides((slideIndex = n));
}
//show current image
function showSlides(n) {
  let i;
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  if (n > newSlides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = newSlides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < newSlides.length; i++) {
    newSlides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  newSlides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}
//hide loader
$(document).ready(function () {
  $(window).on("load", function () {
    $(".loader-container").fadeOut("slow");
  });
});
