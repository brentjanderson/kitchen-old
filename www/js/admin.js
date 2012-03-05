var currentCatID, currentCat, currentCatSaveState;

function setupEditButtons() {
    $('.categoryEditButton').unbind('click');
    $('.categoryEditButton').click(function() {
        $('#categoryForm div.modal-header h3').html('Edit Category');
        currentCatID = $(this).parent().parent().attr('catID');
        currentCat = $(this).parent().siblings('.catName').html();
        currentCatSaveState = 'edit';
        
        $('#categoryForm div.modal-body input#catName').attr('value', currentCat);
        $('#categoryForm').modal('show');
    });
}

setupEditButtons();

$('#closeModalButton').click(function() {
    $('#categoryForm').modal('hide');
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
            // Add a new row to our table
            //@TODO: Get a new ID from the database, use that to add the row
            $('table.catForm > tbody:last').append('<tr><td>'+newValue+'</td><td><a href="#" class="btn btn-success categoryEditButton">Edit</a></td></tr>');
            setupEditButtons(); // Refresh edit button events to include new button
        } else {
            // We have a new category name, let's store it!
            $('#catID-'+currentCatID+' td.catName').html(newValue);
            //@TODO: Send the new value to the API for storage
        }
        
    }
    
    $('#categoryForm').modal('hide');
});

$('div.modal-body form').submit(function() { return false; });