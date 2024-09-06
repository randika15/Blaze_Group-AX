document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('.search-input');
    const productCards = document.querySelectorAll('.product-card');

    // Filter products based on search input
    searchInput.addEventListener('input', () => {
        const searchValue = searchInput.value.toLowerCase().trim();
        
        productCards.forEach(card => {
            const productName = card.querySelector('h2').textContent.toLowerCase();
            const productDescription = card.querySelector('p').textContent.toLowerCase();

            if (productName.includes(searchValue) || productDescription.includes(searchValue)) {
                card.style.display = ''; // Show the product card
            } else {
                card.style.display = 'none'; // Hide the product card
            }
        });
    });
});
