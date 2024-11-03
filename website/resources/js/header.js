
function toggleMobileNav() {
    const mobileNav = document.getElementById('mobile-nav');
    mobileNav.classList.toggle('hidden');
    console.log(mobileNav.classList.contains('hidden') ? 'Mobile nav closed' : 'Mobile nav opened');
}

function closeMobileNav() {
    const mobileNav = document.getElementById('mobile-nav');
    mobileNav.classList.add('hidden');
    console.log('Close menu clicked');
}

function showProductCategories() {
    const mainMenu = document.getElementById('main-menu');
    const productCategories = document.getElementById('product-categories');
    mainMenu.classList.add('hidden');
    productCategories.classList.remove('hidden');
    console.log('Product categories opened');
}

function showMainMenu() {
    const mainMenu = document.getElementById('main-menu');
    const productCategories = document.getElementById('product-categories');
    productCategories.classList.add('hidden');
    mainMenu.classList.remove('hidden');
    console.log('Main menu opened');
}

window.toggleMobileNav = toggleMobileNav;
window.closeMobileNav = closeMobileNav;
window.showProductCategories = showProductCategories;
window.showMainMenu = showMainMenu;
