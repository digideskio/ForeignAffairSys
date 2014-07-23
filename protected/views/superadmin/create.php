<?php
/* @var $this SuperadminController */
/* @var $model Superadmin */

$this->breadcrumbs=array(
	'超级权限管理'=>array('admin'),
	'添加超级管理员',
);

$this->menu=array(
	//array('label'=>'List Superadmin', 'url'=>array('index')),
	//array('label'=>'Manage Superadmin', 'url'=>array('admin')),
	array('label'=>'返回', 'url'=>array('admin')),
);
?>

<h1>添加超级管理员</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>