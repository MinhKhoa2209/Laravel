
function makeCall() {
    window.location.href = 'tel:0123456789';
}

function openMessenger() {
    window.open('https://www.facebook.com/messages/t/182674912385853', '_blank');
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
    });
}

function toggleScrollToTopButton() {
    const scrollToTopButton = document.querySelector('.scroll-to-top');
    if (window.scrollY > 50) {
        scrollToTopButton.style.display = 'block';
    } else {
        scrollToTopButton.style.display = 'none';
    }
}

function init() {
    window.addEventListener('scroll', toggleScrollToTopButton);
    toggleScrollToTopButton();
}

window.onload = init;
window.scrollToTop = scrollToTop;
window.makeCall = makeCall;
window.openMessenger = openMessenger;
