<?php
/* @var $this SuperadminController */
/* @var $model Superadmin */

$this->breadcrumbs=array(
	'超级权限管理'=>array('admin'),
	$model->admin_code=>array('view','id'=>$model->id),
	'修改管理员账号',
);

$this->menu=array(
	//array('label'=>'List Superadmin', 'url'=>array('index')),
	//array('label'=>'Create Superadmin', 'url'=>array('create')),
	//array('label'=>'View Superadmin', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage Superadmin', 'url'=>array('admin')),
	array('label'=>'返回', 'url'=>array('admin')),
);
?>

<h1>修改管理员账号 <?php //echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>