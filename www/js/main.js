function displayRecipe(recipeID) {
    $.post('/ajax/recipe.php', { action: 'delete', id: recipeID }, function(data){
        updateRecipeGrid();
        console.log(data);
    });
}

function updateRecipeGrid() {
    $('.recipeGrid').html('<li><img src="/img/ajax-loader.gif" alt="Loading..." /></li>');
    $.post('/ajax/recipe.php', { action: 'list' }, function(data) {
        $('.recipeGrid').html('');
        for (recipe in data.result)
        {
            el = data.result[recipe];
            $('.recipeGrid').append('<li class="recipe" recipe="'+el.id+'"><h1>'+el.name+'</h1><p>'+el.description+'</p></li>');
        }
        
        $('.recipe').click(function() {
            displayRecipe($(this).attr('recipe'));
        });
        
        if ($('.recipeGrid').html() == '') {
            $('.recipeGrid').html('<h1>Ack! No recipes? Go add some!</h1>');
        }
    });
}

updateRecipeGrid();

function updateRecipeCategories(activeID) {
    $.post('/ajax/category.php', {action: 'list'}, function(data) {
        $('.recipeSelect').html('');
        $('.recipeSelect').unbind('change');
        
        if (activeID == -1) {
            $('.recipeSelect').html('<option class="removableCategory" value="-1" selected>Choose a Category</option>');
            $('.recipeSelect').change(function() {
                if ($(this).val() != 'Choose a Category') {
                    $(this).children('.removableCategory').remove();
                }
            });
        }
        
        for (category in data.result)
        {
            el = data.result[category];
            if (activeID == el.id) {
                $('.recipeSelect').append('<option selected>'+el.name+'</option>');
            } else {
                $('.recipeSelect').append('<option value="'+el.id+'">'+el.name+'</option>');
            }
        }
    });
}

//updateRecipeCategories();

$('#addRecipe').click(function() {
    $('#recipeEditor div.modal-header h3').html('Add Recipe');
    $('#recipeName').html('');
    $('#saveModalButton').html('Add Recipe');
    updateRecipeCategories(-1);
    $('#recipeEditor').modal('show');
});

$('.closeModalButton').click(function() {
    $(this).parent().parent('.modal').modal('hide');
});

function modalAlert(modal, alertString) {
    var el = modal.children('.modal-body').children('.formAlertBox');
    el.slideUp();
    el.html(alertString);
    el.append('<a class="closeFormAlertBox close" href="#">&times;</a>');
    el.slideDown('slow');
    el.children('.closeFormAlertBox').click(function() {
        el.slideUp('slow');
    });
}

$('.closeFormAlertBox').click(function() {
    $(this).parent().slideUp('slow');
});

$('#saveModalButton').click(function() {
    var modal = $(this).parent().parent();
    recName = $('#recipeName').val();
    recDesc = $('#recipeDesc').val();
    recText = $('#recipeText').val();
    recCat  = $('#recipeCat').val();
    
    // Input validation
    if (recName == '') {
        modalAlert(modal, 'Please enter a recipe name.');
    } else if  (recText == '') {
        modalAlert(modal, 'Please enter your recipe.');
    } else if (recCat == -1) {
        modalAlert(modal, 'Please choose a category.');
    } else { // We pass!
        modal.children('.modal-body').children('.formAlertBox').fadeOut();
        $.post('/ajax/recipe.php', {
                action: 'add', 
                name: recName,
                desc: recDesc,
                recipe: recText,
                catid: recCat
            }, function(data) {
                modal.modal('hide');
                updateRecipeGrid();
        });
    }
});


