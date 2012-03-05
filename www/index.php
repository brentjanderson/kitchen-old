<?PHP define('_kexec', 1); ?>
<?PHP $k_pageTitle = 'Anderson Kitchen'; ?>
<?php include('../includes/header.inc'); ?>
<?php include('../includes/page_header.inc'); ?>

<div class="container">
    <a id="addRecipe" class="btn btn-primary pull-right" href="#">New Recipe</a>
    <ul class="recipeGrid span10">
        <li recipe="10">
            <h1>Dream Bars</h1>
            <p>Description Description Description Description Description Description Description Description Description</p>
        </li>
        <li>
            <h1>Recipe B</h1>
            <p>Description</p>
        </li>
        <li>
            <h1>Recipe C</h1>
            <p>Description</p>
        </li>
    </ul>
</div>

<?php include('../includes/script_footer.inc'); ?>
<script>
$('ul.recipeGrid li').click(function() {
    var recID = $(this).attr('recipe');
});
</script>
<?php include('../includes/footer.inc'); ?>