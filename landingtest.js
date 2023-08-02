document.addEventListener("DOMContentLoaded", function() {
    const revealSection = document.querySelector(".reveal-section");

    window.addEventListener("scroll", function() {
        // Calculate the position at which the reveal section should be shown
        const revealPosition = revealSection.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (revealPosition < windowHeight - 50) {
            revealSection.style.display = "block";
        }
    });
});
