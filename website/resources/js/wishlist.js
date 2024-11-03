function addToWishlist( productId) {
    event.preventDefault();
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch(`/pages/wishlist/add/${productId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function removeFromWishlist(productId) {
    event.preventDefault();
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch(`/pages/wishlist/remove/${productId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        const productElement = document.getElementById(`product-${productId}`);
        if (productElement) {
            productElement.remove();

            const wishlistContainer = document.querySelector('.wishlist-container');
            if (wishlistContainer.children.length === 0) {
                wishlistContainer.innerHTML = `
                    <div class="col-span-full text-center p-4">
                        <h2 class="text-lg font-semibold">Your wishlist is empty.</h2>
                        <p class="text-gray-500">Add items to your wishlist to save them for later.</p>
                    </div>
                `;
            } else {

                wishlistContainer.classList.remove('opacity-0');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


window.addToWishlist = addToWishlist;
window.removeFromWishlist = removeFromWishlist;
