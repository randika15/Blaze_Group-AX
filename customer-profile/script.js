window.onload = function() {
    // Fetch user data and orders
    fetch('/api/user/profile')
        .then(response => response.json())
        .then(data => {
            document.getElementById('username').innerText = data.username;
            document.getElementById('username-display').innerText = data.username;
            document.getElementById('email-display').innerText = data.email;
            document.getElementById('profile-img').src = data.profilePicUrl || 'default-avatar.png';
            loadOrders(data.orders);
        })
        .catch(error => console.error('Error fetching user data:', error));
    
    // Handle profile picture upload
    document.getElementById('upload-img').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const formData = new FormData();
        formData.append('profileImg', file);

        fetch('/api/user/upload', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('profile-img').src = data.newProfilePicUrl;
            }
        })
        .catch(error => console.error('Error uploading profile picture:', error));
    });
};

function loadOrders(orders) {
    const container = document.getElementById('orders-container');
    orders.forEach(order => {
        const orderCard = document.createElement('div');
        orderCard.className = 'order-card';
        orderCard.innerHTML = `
            <img src="${order.productImageUrl}" alt="Product Image">
            <div class="order-details">
                <p>${order.productName}</p>
                <p>Date: ${order.date}</p>
                <p>Status: ${order.status}</p>
            </div>
        `;
        container.appendChild(orderCard);
    });
}
