// Function to change the main image
function changeImage(src) {
    const mainImage = document.getElementById('mainImage');
    mainImage.classList.remove('fade-in');
    void mainImage.offsetWidth; // Trigger a reflow to restart the animation
    mainImage.src = src;
    mainImage.classList.add('fade-in');
}



// JavaScript for interactive star rating
document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('.star');
    stars.forEach(star => {
        star.addEventListener('click', () => {
            resetStars();
            star.classList.add('active');
            let previousStar = star.previousElementSibling;

            while (previousStar) {
                previousStar.classList.add('active');
                previousStar = previousStar.previousElementSibling;
            }
        });

        star.addEventListener('mouseover', () => {
            resetStars();
            star.classList.add('active');
            let previousStar = star.previousElementSibling;

            while (previousStar) {
                previousStar.classList.add('active');
                previousStar = previousStar.previousElementSibling;
            }
        });

        star.addEventListener('mouseout', () => {
            resetStars();
            document.querySelectorAll('.star.active').forEach(activeStar => {
                activeStar.classList.add('active');
            });
        });
    });

    function resetStars() {
        stars.forEach(star => {
            star.classList.remove('active');
        });
    }
});
