<?php
/* @var $this VisitorsController */
/* @var $model Visitors */

$this->breadcrumbs=array(
	'Visitors'=>array('index'),
	$model->visitors_id,
);

$this->menu=array(
	array('label'=>'List Visitors', 'url'=>array('index')),
	array('label'=>'Create Visitors', 'url'=>array('create')),
	array('label'=>'Update Visitors', 'url'=>array('update', 'id'=>$model->visitors_id)),
	array('label'=>'Delete Visitors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->visitors_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Visitors', 'url'=>array('admin')),
);
?>

<h1>View Visitors #<?php echo $model->visitors_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'visitors_id',
		'visit_id',
		'person_id',
	),
)); ?>
