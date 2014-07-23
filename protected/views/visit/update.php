<?php
/* @var $this VisitController */
/* @var $model Visit */

$this->breadcrumbs=array(
	'出国访问管理'=>array('admin'),
	'修改出访信息'
);

$this->menu=array(
	//array('label'=>'List Visit', 'url'=>array('index')),
	//array('label'=>'Create Visit', 'url'=>array('create')),
	//array('label'=>'View Visit', 'url'=>array('view', 'id'=>$model->visit_id)),
	array('label'=>'返回', 'url'=>array('admin')),
);
?>

<h1>修改本次出访信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>