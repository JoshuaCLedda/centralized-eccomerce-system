document.addEventListener('DOMContentLoaded', () => {
    const cart = [];
    const cartToggleButton = document.getElementById('cart-toggle');
    const cartCloseButton = document.getElementById('cart-close');
    const cartElement = document.querySelector('.shopping-cart');
    const cartItemsElement = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');

    function updateCart() {
        cartItemsElement.innerHTML = '';
        let total = 0;
        cart.forEach(item => {
            const listItem = document.createElement('li');
            listItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;
            cartItemsElement.appendChild(listItem);
            total += item.price;
        });
        cartTotalElement.textContent = `Total: $${total.toFixed(2)}`;
    }

    function addProductToCart(product) {
        cart.push(product);
        updateCart();
    }

    cartToggleButton.addEventListener('click', () => {
        cartElement.classList.remove('hidden');
    });

    cartCloseButton.addEventListener('click', () => {
        cartElement.classList.add('hidden');
    });

    // Example product data
    const products = [
        { id: 1, name: 'Product 1', price: 19.99 },
        { id: 2, name: 'Product 2', price: 29.99 },
        { id: 3, name: 'Product 3', price: 39.99 },
    ];

    const productListElement = document.getElementById('product-list');
    products.forEach(product => {
        const productElement = document.createElement('div');
        productElement.classList.add('product');
        productElement.innerHTML = `
            <h3>${product.name}</h3>
            <p>$${product.price.toFixed(2)}</p>
            <button data-id="${product.id}">Add to Cart</button>
        `;
        productListElement.appendChild(productElement);
    });

    productListElement.addEventListener('click', (event) => {
        if (event.target.tagName === 'BUTTON') {
            const productId = parseInt(event.target.getAttribute('data-id'));
            const product = products.find(p => p.id === productId);
            addProductToCart(product);
        }
    });

    document.getElementById('checkout').addEventListener('click', () => {
        alert('Checkout functionality not implemented');
    });
});