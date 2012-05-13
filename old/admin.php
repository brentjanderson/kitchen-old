<?PHP define('_kexec', 1); ?>
<?PHP $k_pageTitle = 'Anderson Kitchen'; ?>
<?php include('../includes/header.inc'); ?>
<?php include('../includes/page_header.inc'); ?>
<?PHP $k_categoryButtons = '<a href="#" class="btn btn-success categoryEditButton">Edit</a><a href="#" class="btn btn-danger categoryDeleteButton">Delete</a>'; ?>
<div class="container">
    <div class="row">
        <h1>Categories</h1>
        <table class="catForm table table-striped table-bordered table-condensed" style="display:none">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <!--
                <tr id="catID-1" catID="1">
                    <td class="catName">Salads</td>
                    <td><?PHP echo $k_categoryButtons; ?></td>
                </tr>
                <tr id="catID-2" catID="2">
                    <td class="catName">Meat Dishes</td>
                    <td><?PHP echo $k_categoryButtons; ?></td>
                </tr>
                <tr id="catID-3" catID="3">
                    <td class="catName">Desserts</td>
                    <td><?PHP echo $k_categoryButtons; ?></td>
                </tr>-->
                
            </tbody>
        </table>
        <img class="ajaxLoader" src="img/ajax-loader.gif" alt="Loading..." />
    </div>
    <div class="row">
        <a id="addCategoryButton" class="btn btn-primary" href="#">Add Category</a>
    </div>
</div>

<div class="modal fade" id="categoryForm" style="display: none">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Edit Category</h3>
  </div>
  <div class="modal-body">
    <form>
        <label for="catName">Category Name: <input type="text" placeholder="Enter a category name here" name="catName" id="catName" /></label>
    </form>
  </div>
  <div class="modal-footer">
    <a href="#" id="saveModalButton" class="btn btn-primary">Save changes</a>
    <a href="#" class="btn closeModalButton">Cancel</a>
  </div>
</div>

<div class="modal fade" id="categoryDeleteConfirm" style="display: none">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Delete Category?</h3>
  </div>
  <div class="modal-body">
    <p>Are you sure you want to delete category <span id="catDeleteConfirmText">placeholder</span>?</p>
  </div>
  <div class="modal-footer">
    <a href="#" id="deleteModalButton" class="btn btn-danger">Delete</a>
    <a href="#" class="btn closeModalButton">Cancel</a>
  </div>
</div>

<?php include('../includes/script_footer.inc'); ?>
<script src="js/admin.js?<?PHP echo time(); ?>"></script>
<?php include('../includes/footer.inc'); ?>
