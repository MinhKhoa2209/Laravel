function addToCart(productId) {
    const quantityInput = document.getElementById(`quantity-${productId}`);
    const quantity = parseInt(quantityInput.value);
    fetch(`/pages/cart/add/${productId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCartDisplay(data.cart, data.totalAmount);
            updateCartCounts( data.cartCount);
            alert(data.message);
        } else {
            alert(data.message, true);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred. Please try again.", true);
    });
}

function buyNow(productId) {
    const quantityInput = document.getElementById(`quantity-${productId}`);
    const quantity = parseInt(quantityInput.value);
    if (isNaN(quantity) || quantity < 1) {
        alert("Please enter a valid quantity.");
        return;
    }

    fetch(`/pages/cart/add/${productId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCartDisplay(data.cart, data.totalAmount);
            updateCartCounts( data.cartCount);
            window.location.href = '/pages/cart';
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred. Please try again.");
    });
}


function removeFromCart(productId) {
    fetch(`/pages/cart/remove/${productId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const cartItem = document.getElementById(`cart-item-${productId}`);
            if (cartItem) {
                cartItem.remove();
            }
            updateCartDisplay(data.cart, data.totalAmount);
            updateCartCounts( data.cartCount);
        } else {
            alert(data.message, true);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred. Please try again.", true);
    });
}

function updateCartQuantity(productId, change) {
    const quantityInput = document.getElementById(`quantity-${productId}`);
    let currentQuantity = parseInt(quantityInput.value);
    const maxQuantity = parseInt(quantityInput.getAttribute('data-max-quantity'));
    let newQuantity = currentQuantity + change;
    if (newQuantity < 1) {
        newQuantity = 1;
        return;
    }
    else if (newQuantity > maxQuantity) {
    newQuantity = maxQuantity;
    alert("Requested quantity exceeds available stock.");
    }
    quantityInput.value = newQuantity;
    fetch(`/pages/cart/update/${productId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ quantity: newQuantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCartDisplay(data.cart, data.totalAmount, data.productId, data.subAmount);
            updateCartCounts( data.cartCount);
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

function updateProductQuantity(productId, change) {
    const quantityInput = document.getElementById(`quantity-${productId}`);
    let currentQuantity = parseInt(quantityInput.value);
    const maxQuantity = parseInt(quantityInput.getAttribute('data-max-quantity'));
    let newQuantity = currentQuantity + change;

    if (newQuantity < 1) {
        newQuantity = 1;
    } else if (newQuantity > maxQuantity) {
        newQuantity = maxQuantity;
        alert("Requested quantity exceeds available stock.");
    }
    quantityInput.value = newQuantity;
}


function updateCartDisplay(cart, totalAmount, productId, subAmount) {

    const productSubtotalElement = document.getElementById(`subtotal-${productId}`);
    if (productSubtotalElement) {
        productSubtotalElement.textContent = subAmount.toLocaleString('vi-VN') + ' VND';
    }
    const totalAmountElement = document.getElementById('total-amount');
    if (totalAmountElement) {
        totalAmountElement.textContent = totalAmount.toLocaleString('vi-VN') + ' VND';
    }

    cart.forEach(item => {
        const quantityElement = document.getElementById(`quantity-${item.product_id}`);
        if (quantityElement) {
            quantityElement.value = item.quantity;
        }

        const subtotalElement = document.getElementById(`subtotal-${item.product_id}`);
        if (subtotalElement) {
            subtotalElement.textContent = (item.quantity * item.product.price).toLocaleString('vi-VN') + ' VND';
        }
    });
}

function filterProducts() {
    const priceFilters = document.querySelectorAll('.filter-price:checked');
    const products = document.querySelectorAll('.product');
    const selectedPriceRanges = Array.from(priceFilters).map(filter => filter.value);
    let anyVisibleProduct = false;

    if (selectedPriceRanges.length === 0) {
        products.forEach(product => {
            product.style.display = 'block';
        });
        document.getElementById('no-product-message').classList.add('hidden');
        return;
    }

    products.forEach(product => {
        const price = parseInt(product.getAttribute('data-price'));
        const isVisible = selectedPriceRanges.some(range => {
            const [min, max] = range.split('-').map(Number);
            return price >= min && (max === undefined || price < max);
        });

        product.style.display = isVisible ? 'block' : 'none';
        if (isVisible) anyVisibleProduct = true;
    });

    const noProductMessage = document.getElementById('no-product-message');
    noProductMessage.classList.toggle('hidden', anyVisibleProduct);
}

function updateCartCounts( cartCount) {
    const cartIconCount = document.querySelector('.cart-count');

    if (cartCount > 0) {
        cartIconCount.textContent = cartCount;
        cartIconCount.style.display = 'inline-block';
        localStorage.setItem('cartCount', cartCount);
    } else {
        cartIconCount.style.display = 'none';
        localStorage.removeItem('cartCount');
    }
}

window.buyNow = buyNow;
window.filterProducts = filterProducts;
window.updateProductQuantity = updateProductQuantity;
window.addToCart = addToCart;
window.removeFromCart = removeFromCart;
window.updateCartQuantity = updateCartQuantity;
