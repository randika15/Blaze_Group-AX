document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Simulate form submission for demonstration purposes
    var userEmail = document.getElementById('email').value;

    // Create the notification element
    var notification = document.createElement('div');
    notification.className = 'notification';
    notification.innerHTML = `
        <div class="notification-content">
            <p>Thank you for reaching out, ${userEmail}.<br>
            We will get back to you shortly.</p>
            <button onclick="closeNotification()">Continue</button>
        </div>
    `;

    // Style the notification element
    notification.style.position = 'fixed';
    notification.style.top = '50%';
    notification.style.left = '50%';
    notification.style.transform = 'translate(-50%, -50%)';
    notification.style.backgroundColor = '#333';
    notification.style.color = '#fff';
    notification.style.padding = '20px';
    notification.style.boxShadow = '0px 5px 15px rgba(0, 0, 0, 0.3)';
    notification.style.borderRadius = '10px';
    notification.style.zIndex = '1000';
    notification.style.textAlign = 'center';

    // Append the notification to the body
    document.body.appendChild(notification);

    // Optionally, submit the form data using AJAX or proceed with regular submission
    // this.submit(); // Uncomment this line to allow form submission
});

function closeNotification() {
    var notification = document.querySelector('.notification');
    if (notification) {
        notification.remove();
    }

    // Reset the form fields after closing the notification
    document.getElementById('contactForm').reset();
}
