<?PHP define('_kexec', 1); ?>
<?PHP $k_pageTitle = 'Anderson Kitchen'; ?>
<?php include('../includes/header.inc'); ?>
<?php include('../includes/page_header.inc'); ?>

<div class="container">
    <a id="addRecipe" class="btn btn-primary pull-right" href="#">New Recipe</a>
    <div class="bubbles">
    </div>
    <ul class="recipeGrid span10">
       <li><img src="/img/ajax-loader.gif" alt="Loading..." /></li>
    </ul>
</div>

<div class="modal fade" id="recipeEditor" style="display: none">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Edit Category</h3>
  </div>
  <div class="modal-body">
    <form>
        <label for="recipeName">Recipe Name: <input type="text" placeholder="Enter a recipe name here" name="recipeName" id="recipeName" /></label>
        <label for="recipeDesc">Description: <textarea placeholder="Briefly describe this recipe" name="recipeDesc" id="recipeDesc"></textarea></label>
        <label for="recipeText">Recipe: <textarea placeholder="How do you make it?" name="recipeText" id="recipeText"></textarea></label>
        <label for="recipeCat">Category: <select class="recipeSelect" name="recipeCat" id="recipeCat" ></select></label>
    </form>
    <div class="formAlertBox alert alert-error" style="display: none">
        <!-- This is where we put any alerts that happen -->
    </div>
  </div>
  <div class="modal-footer">
    <a href="#" id="saveModalButton" class="btn btn-primary">Save changes</a>
    <a href="#" class="btn closeModalButton">Cancel</a>
  </div>
</div>

<?php include('../includes/script_footer.inc'); ?>
<script src="/js/main.js?<?PHP echo time(); ?>"></script>
<?php include('../includes/footer.inc'); ?>