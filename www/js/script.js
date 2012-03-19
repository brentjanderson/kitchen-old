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
            // Update the category list
            $('.category-menu').html('');
            for (cat in data.result) {
                $('ul.category-menu').append('<li><a href="#">'+data.result[cat].name+'</a></li>');
            }
            $('.category-menu-container').show();
        }
        
    });
}

updateNavbarCategories();