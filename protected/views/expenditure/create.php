<?php
/* @var $this ExpenditureController */
/* @var $model Expenditure */

$this->breadcrumbs=array(
	'出访国家地区经费管理'=>array('admin'),
	'新建条目',
);

$this->menu=array(
	array('label'=>'返回', 'url'=>array('admin')),
);
?>

<h1>新建条目</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>