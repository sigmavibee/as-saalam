// Get the popup
var popup = document.getElementById("popup");

// Open the popup when the page is loaded
window.onload = function () {
    popup.style.display = "block";
    fetchImages(); // Fetch images when the popup opens
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
let currentSlide = 0;
let images = [];
var slides = document.getElementsByClassName("popup-slide");

function fetchImages() {
    fetch('get-images.php')
        .then(response => response.json())
        .then(data => {
            console.log("Data received:", data); // Periksa data
            images = data.map(image => `assets/images/freetrial/${image}`);
            console.log("Image paths:", images); // Periksa path gambar
            showSlide(currentSlide);
        })
        .catch(error => console.error('Error fetching images:', error));
}

function showSlides(index) {
    // Pastikan slides[index] ada
    if (!slides[index]) {
        console.error("Slide not found at index:", index);
        return;
    }

    // Cari elemen <img> di dalam slide
    var currentImg = slides[index].querySelector("img");
    if (!currentImg) {
        console.error("Image not found in slide:", index);
        return;
    }

    // Lazy load gambar jika src belum di-set
    if (!currentImg.src && currentImg.hasAttribute("data-src")) {
        currentImg.src = currentImg.getAttribute("data-src");
    }
}

function changeSlide(n) {
    currentSlide += n;
    if (currentSlide < 0) currentSlide = images.length - 1;
    if (currentSlide >= images.length) currentSlide = 0;
    showSlide(currentSlide);
}

document.addEventListener('DOMContentLoaded', fetchImages);

// Automatically cycle through slides
setInterval(function () {
    currentSlide++;
    if (currentSlide >= images.length) {
        currentSlide = 0;
    }
    showSlide(currentSlide);
}, 10000); // Change image every 10 seconds