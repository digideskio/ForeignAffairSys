<?php
/* @var $this VisitorsController */
/* @var $model Visitors */

$this->breadcrumbs=array(
	'个人出访记录'=>array('admin'),
	//$model->visitors_id=>array('view','id'=>$model->visitors_id),
	'更新',
);

$this->menu=array(
	//array('label'=>'List Visitors', 'url'=>array('index')),
	//array('label'=>'Create Visitors', 'url'=>array('create')),
	//array('label'=>'View Visitors', 'url'=>array('view', 'id'=>$model->visitors_id)),
	array('label'=>'返回', 'url'=>array('admin')),
);
?>

<h1>更新本次出访 <?php //echo $model->visitors_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>