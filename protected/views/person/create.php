<?php
/* @var $this PersonController */
/* @var $model Person */

$this->breadcrumbs=array(
	//'People'=>array('index'),
	'创建个人信息',
);

$this->menu=array(
	//array('label'=>'List Person', 'url'=>array('index')),
	//array('label'=>'Manage Person', 'url'=>array('admin')),
);
?>

<h1>创建个人信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>