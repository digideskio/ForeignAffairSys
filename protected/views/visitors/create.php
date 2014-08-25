<?php
/* @var $this VisitorsController */
/* @var $model Visitors */

$this->breadcrumbs=array(
	'个人出访记录'=>array('visitors/admin'),
	'新建出访',
);

$this->menu=array(
	//array('label'=>'List Visitors', 'url'=>array('index')),
	array('label'=>'返回', 'url'=>array('admin')),
);
?>

<h1>创建新出访</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>