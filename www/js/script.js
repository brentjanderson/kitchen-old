function isEmpty(obj) {
    if (typeof obj == 'undefined' || obj === null || obj === '') return true;
    if (typeof obj == 'number' && isNaN(obj)) return true;
    if (obj instanceof Date && isNaN(Number(obj))) return true;
    return false;
}

function updateNavbarCategories() {
    $.post('/ajax/category.php', { action: 'list' }, function(data) {
        if (isEmpty(data.result)) {
            // Hide the categories menu
            $('.category-menu-container').hide();
        } else {
            $('.category-menu-container').show();
        }
        
    });
}

updateNavbarCategories();