<?php
/* @var $this ExpenditureController */
/* @var $model Expenditure */

$this->breadcrumbs=array(
	'出访国家地区经费管理'=>array('admin'),
	$model->country_name.'--'.$model->city_name,
);

$this->menu=array(
	array('label'=>'更新条目', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'删除条目', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'是否确定删除该条目?')),
	array('label'=>'返回', 'url'=>array('admin')),
);
?>

<h1>查看经费</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'country_name',
		'city_name',
		'currency',
		'accommodation_expenses',
		'diet_expenses',
		'miscellaneous_expenses',
	),
)); ?>
