document.querySelectorAll('.accordion-link').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        this.classList.toggle('active');
        const pane = this.nextElementSibling;
        if (pane.style.display === "block") {
            pane.style.display = "none";
        } else {
            pane.style.display = "block";
        }
    });
});