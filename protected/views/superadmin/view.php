<?php
/* @var $this SuperadminController */
/* @var $model Superadmin */

$this->breadcrumbs=array(
	'超级权限管理'=>array('admin'),
	//$model->id,
	$model->admin_code
);

$this->menu=array(
	//array('label'=>'List Superadmin', 'url'=>array('index')),
	//array('label'=>'Create Superadmin', 'url'=>array('create')),
	//array('label'=>'Update Superadmin', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Superadmin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Superadmin', 'url'=>array('admin')),
	array('label'=>'返回', 'url'=>array('admin')),
);
?>

<h1>查看管理员 <?php echo $model->admin_code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'admin_code',
	),
)); ?>
