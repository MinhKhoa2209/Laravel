function toggleFilter() {
    const filterContent = document.getElementById('filter-content');
    filterContent.classList.toggle('hidden');
    console.log(filterContent.classList.contains('hidden') ? 'Filter hidden' : 'Filter shown');
}

window.toggleFilter = toggleFilter;
