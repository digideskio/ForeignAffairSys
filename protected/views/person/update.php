<?php
/* @var $this PersonController */
/* @var $model Person */

$this->breadcrumbs=array(
	//'People'=>array('index'),
	//$model->name=>array('view','id'=>$model->person_id),
	$model->name=>array('view'),
	'更新个人信息',
);

$this->menu=array(
	//array('label'=>'List Person', 'url'=>array('index')),
	//array('label'=>'Create Person', 'url'=>array('create')),
	//array('label'=>'View Person', 'url'=>array('view', 'id'=>$model->person_id)),
	//array('label'=>'Manage Person', 'url'=>array('admin')),
	array('label'=>'返回', 'url'=>array('view')),
);
?>

<h1>更新个人信息 <?php //echo $model->person_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>