<?php
/* @var $this ExpenditureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Expenditures',
);

$this->menu=array(
	array('label'=>'Create Expenditure', 'url'=>array('create')),
	array('label'=>'Manage Expenditure', 'url'=>array('admin')),
);
?>

<h1>Expenditures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
