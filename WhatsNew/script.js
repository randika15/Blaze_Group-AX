// Add hover effect for product cards
document.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.classList.add('hover');
    });

    card.addEventListener('mouseleave', () => {
        card.classList.remove('hover');
    });
});

// Show modal when "See more" button is clicked
document.querySelectorAll('.See-more').forEach(button => {
    button.addEventListener('click', (event) => {
        const product = event.target.getAttribute('data-product');
        showProductModal(product);
    });
});

function showProductModal(product) {
    const modal = document.getElementById('productModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');

    // Set the content of the modal based on the product
    switch (product) {
        case 'Amber Strike':
            modalTitle.textContent = 'Amber Strike';
            modalDescription.textContent = 'Amber Strike is a rich and warming infusion of caramelized apple and cinnamon that provides a sweet yet energizing kick. The natural sweetness of caramelized apples is perfectly balanced with a hint of spicy cinnamon, creating a comforting flavor profile. This drink is enriched with green tea extract for a natural energy boost and includes a blend of essential vitamins, such as Vitamin A for eye health and Vitamin E for skin protection.';
            break;
        case 'Mystic Melont':
            modalTitle.textContent = 'Mystic Melont';
            modalDescription.textContent = 'Mystic Melon offers a vibrant, juicy mix of watermelon and kiwi flavors that provides a sweet and tangy energy boost. This refreshing drink combines the luscious taste of ripe watermelon with the tartness of kiwi, delivering a delightful tropical flavor. Infused with aloe vera extract for added hydration and a blend of B vitamins to support energy metabolism, Mystic Melon is perfect for those seeking a natural, invigorating lift.';
            break;
        case 'Tropical Storm':
            modalTitle.textContent = 'Nectar Nova';
            modalDescription.textContent = 'Nectar Nova is a tantalizing blend of exotic passionfruit and sweet lychee, delivering a refreshing burst of energy with every sip. This drink combines the tangy notes of passionfruit with the subtle sweetness of lychee, providing a uniquely balanced taste. Infused with ginseng and guarana extracts, Nectar Nova is designed to boost your energy levels naturally, while a mix of essential B vitamins and Vitamin C supports overall health and wellness.';
            break;
        default:
            modalTitle.textContent = '';
            modalDescription.textContent = '';
    }

    modal.style.display = 'block';
}

// Close modal when the close button is clicked
document.querySelector('.close-button').addEventListener('click', () => {
    document.getElementById('productModal').style.display = 'none';
});

// Close modal when clicking outside of the modal content
window.addEventListener('click', (event) => {
    const modal = document.getElementById('productModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});


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

