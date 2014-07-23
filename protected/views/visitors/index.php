<?php
/* @var $this VisitorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Visitors',
);

$this->menu=array(
	array('label'=>'Create Visitors', 'url'=>array('create')),
	array('label'=>'Manage Visitors', 'url'=>array('admin')),
);
?>

<h1>Visitors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
