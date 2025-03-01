let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

function showNextItem() {
    currentIndex = (currentIndex + 1) % totalItems; // Loop kembali ke awal
    updateCarousel();
}

function updateCarousel() {
    const carousel = document.querySelector('.carousel');
    const offset = -currentIndex * 100; // Hitung offset
    carousel.style.transform = `translateX(${offset}%)`;
}

// Set interval untuk menggeser gambar setiap 3 detik
setInterval(showNextItem, 10000);