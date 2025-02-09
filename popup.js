// Get the popup
var popup = document.getElementById("popup");

// Get all slide images
var slideImages = document.querySelectorAll(".popup-slide img");

// Open the popup when the page is loaded
window.onload = function () {
    popup.style.display = "block";
    slideIndex = 0;
    loadPopupImages(); // Load images only when popup opens
    showSlides(slideIndex);
}

// Function to load images lazily
function loadPopupImages() {
    slideImages.forEach(img => {
        if (!img.src) {
            img.src = img.getAttribute("data-src"); // Set src from data-src
        }
    });
}

// Close the popup when clicking outside
document.addEventListener('click', function (event) {
    if (event.target === popup) {
        popup.style.display = "none";
    }
});
document.querySelector('.close-popup').addEventListener('click', function () {
    popup.style.display = 'none';
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

    // Lazy load only the current slide's image
    var currentImg = slides[index].querySelector("img");
    if (!currentImg.src) {
        currentImg.src = currentImg.getAttribute("data-src");
    }
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
