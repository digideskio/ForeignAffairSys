<?php
/* @var $this VisitController */
/* @var $model Visit */

$this->breadcrumbs=array(
	'出国访问管理'=>array('visit/admin'),
	'新建出访',
);

$this->menu=array(
	//array('label'=>'List Visit', 'url'=>array('index')),
	array('label'=>'返回', 'url'=>array('admin')),
);
?>

<h1>新建出访</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>