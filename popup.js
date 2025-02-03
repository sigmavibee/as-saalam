// Get the popup
var popup = document.getElementById("popup");

// Open the popup when the page is loaded
window.onload = function () {
    popup.style.display = "block";
    slideIndex = 0; // Set slideIndex to 0
    showSlides(slideIndex); // Show the first slide
}

// Close the popup when clicking outside
document.addEventListener('click', function (event) {
    if (event.target === popup) {
        popup.style.display = "none";
    }
});
document.querySelector('.close-popup').addEventListener('click', function () {
    document.getElementById('popup').style.display = 'none';
});

// Slideshow functionality
var slideIndex = 0;
var slides = document.getElementsByClassName("popup-slide");

function showSlides(index) {
    // Hide all slides
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    // Show the current slide
    slides[index].style.display = "block";
}

function changeSlide(n) {
    slideIndex += n;
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    } else if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    }
    showSlides(slideIndex);
}

// Automatically cycle through slides
setInterval(function () {
    slideIndex++;
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }
    showSlides(slideIndex);
}, 10000); // Change image every 10 seconds