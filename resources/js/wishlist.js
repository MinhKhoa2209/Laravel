import Swal from 'sweetalert2';

function showSuccessMessage(title, message) {
    Swal.fire({
        icon: 'success',
        title: title,
        text: message,
        showConfirmButton: false,
        timer: 1000
    });
}


function showErrorMessage(title, message) {
    Swal.fire({
        icon: 'error',
        title: title,
        text: message,
        showConfirmButton: false,
        timer: 1000
    });
}

function addToWishlist(productId) {
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
        if (data.success) {
            showSuccessMessage('Added to Wishlist', data.message);
            updateWishlistCounts(data.wishlistCount);
        } else {
            showErrorMessage('Added to Wishlist', data.message );
        }
    })
    .catch(error => {
        showErrorMessage('Error', 'An error occurred. Please try again.');
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
        showSuccessMessage('Removed from Wishlist', data.message);
        updateWishlistCounts(data.wishlistCount);

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
        showErrorMessage('Error', 'An error occurred. Please try again.');
        console.error('Error:', error);
    });
}


function updateWishlistCounts(wishlistCount) {
    const wishlistIconCount = document.querySelector('.wishlist-count');
    if (wishlistCount > 0) {
        wishlistIconCount.textContent = wishlistCount;
        wishlistIconCount.style.display = 'inline-block';
        localStorage.setItem('wishlistCount', wishlistCount);
    } else {
        wishlistIconCount.style.display = 'none';
        localStorage.removeItem('wishlistCount');
    }
    console.log('Wishlist count updated:', wishlistCount);
}

window.addToWishlist = addToWishlist;
window.removeFromWishlist = removeFromWishlist;
