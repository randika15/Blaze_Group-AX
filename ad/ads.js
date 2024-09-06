document.addEventListener("DOMContentLoaded", function () {
    // Check if the popup has been shown already
    if (!sessionStorage.getItem("popupShown")) {
        // Get the popup element
        var popup = document.getElementById("popup");

        // Show the popup after 2 seconds
        setTimeout(function () {
            popup.style.display = "flex";

            // Set flag in sessionStorage to indicate the popup has been shown
            sessionStorage.setItem("popupShown", "true");
        }, 2000);

        // Get the close button element
        var closeBtn = document.getElementById("closePopup");

        // Get the continue button element
        var continueBtn = document.getElementById("continueBtn");

        // When the user clicks on the close button, hide the popup
        closeBtn.onclick = function () {
            popup.style.display = "none";
        };

        // When the user clicks on the continue button, hide the popup
        continueBtn.onclick = function () {
            window.location.href = "/project/login/login.html"; 
        };
    }
});
