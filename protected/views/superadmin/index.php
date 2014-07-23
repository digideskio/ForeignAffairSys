<?php
/* @var $this SuperadminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'查看超级权限',
);

$this->menu=array(
	//array('label'=>'Create Superadmin', 'url'=>array('create')),
	//array('label'=>'Manage Superadmin', 'url'=>array('admin')),
);
?>

<h1>查看超级权限</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
