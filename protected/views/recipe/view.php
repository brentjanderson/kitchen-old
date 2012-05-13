<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'View Recipe', 'url'=>array('index')),
	array('label'=>'Add Recipe', 'url'=>array('create')),
	array('label'=>'Edit Recipe', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Recipe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this recipe?')),
	array('label'=>'Manage Recipe', 'url'=>array('admin')),
);
?>

<h1>View Recipe #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'content',
	),
)); ?>
