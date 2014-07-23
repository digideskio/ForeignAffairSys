<?php
/* @var $this ExpenditureController */
/* @var $model Expenditure */

$this->breadcrumbs=array(
	'出访国家地区经费管理'=>array('admin'),
	$model->country_name.'--'.$model->city_name=>array('view','id'=>$model->ID),
	'更新条目',
);

$this->menu=array(
	array('label'=>'返回', 'url'=>array('view', 'id'=>$model->ID)),
);
?>

<h1>更新条目</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>