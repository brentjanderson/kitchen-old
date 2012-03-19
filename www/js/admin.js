var currentCatID, currentCat, currentCatSaveState;
var k_categoryButtons = '<a href="#" class="btn btn-success categoryEditButton">Edit</a><a href="#" class="btn btn-danger categoryDeleteButton">Delete</a>';


function setupTableButtons() {
    $('.categoryEditButton').unbind('click');
    $('.categoryEditButton').click(function() {
        $('#categoryForm div.modal-header h3').html('Edit Category');
        currentCatID = $(this).parent().parent().attr('catID');
        currentCat = $(this).parent().siblings('.catName').html();
        currentCatSaveState = 'edit';
        
        $('#categoryForm div.modal-body input#catName').attr('value', currentCat);
        $('#categoryForm').modal('show');
    });
    
    $('.categoryDeleteButton').unbind('click');
    $('.categoryDeleteButton').click(function() {
        // Delete the category
        currentCatID = $(this).parent().parent().attr('catID');
        currentCat = $(this).parent().siblings('.catName').html();
        $('#catDeleteConfirmText').html('"'+currentCat+'"');
        $('#categoryDeleteConfirm').modal('show');
    });
}

setupTableButtons();

$('.closeModalButton').click(function() {
    $('#categoryForm').modal('hide');
    $('#categoryDeleteConfirm').modal('hide');
});


$('#addCategoryButton').click(function() {
    $('#categoryForm div.modal-header h3').html('Add Category');
    currentCat = '';
    currentCatID = -1;
    currentCatSaveState = 'add';
    
    $('#categoryForm div.modal-body input#catName').attr('value', '');
    
    $('#categoryForm').modal('show');
});


$('#saveModalButton').click(function() {
    var newValue = $('#categoryForm div.modal-body input#catName').attr('value');
    if (newValue != currentCat) {
        if (currentCatSaveState == 'add') {
            // We have a new category name, let's store it!
            $.post("/ajax/category.php", {
                action: 'add',
                name: newValue
            }, function(data) {
                // Add a new row to our table
                cID = data['id'];
                $('table.catForm > tbody:last').append('<tr id="catID-'+cID+'" catID="'+cID+'"><td class="catName">'+newValue+'</td><td>'+k_categoryButtons+'</td></tr>');
                setupTableButtons(); // Refresh edit button events to include new button
                checkTableStatus();
            });
            
        } else {
            $.post("/ajax/category.php", {
                action: 'edit',
                name: newValue,
                id: currentCatID
            }, function(data) {
                $('#catID-'+currentCatID+' td.catName').html(newValue);
            });
        }
    }
    
    $('#categoryForm').modal('hide');
});

$('#deleteModalButton').click(function() {    
    $('#categoryDeleteConfirm').modal('hide');
    $('table.catForm tbody tr#catID-'+currentCatID).hide('slow', function() {
        $(this).remove();
        checkTableStatus();
    });

    // Fire off call to API for delete
    $.getJSON("/ajax/category.php", {
        action: 'delete',
        id: currentCatID
    }, function(data) {
        
    });
});

$('div.modal-body form').submit(function() { return false; });

function checkTableStatus() {
    if ($('table.catForm tbody tr').length == 0) {
        $('table.catForm').hide('slow');
    } else {
        $('table.catForm').show('slow');
    }
    updateNavbarCategories();
}

function buildTable() {
    $.post('/ajax/category.php', { action: 'list' }, function(data) {
        result = data['result'];
        $('table.catForm tbody').empty();
        checkTableStatus();
        for (row in result) {
            cID = result[row].id;
            newValue = result[row].name;
            $('table.catForm tbody').append('<tr id="catID-'+cID+'" catID="'+cID+'"><td class="catName">'+newValue+'</td><td>'+k_categoryButtons+'</td></tr>');
        }
        checkTableStatus();
        setupTableButtons();
        $('.ajaxLoader').hide();
    });
}

checkTableStatus();

buildTable();