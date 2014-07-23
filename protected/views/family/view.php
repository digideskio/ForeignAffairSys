<?php
/* @var $this FamilyController */
/* @var $model Family */

$this->breadcrumbs=array(
	'家庭成员'=>array('admin'),
	$model->name,
);

$this->menu=array(
	//array('label'=>'List Family', 'url'=>array('index')),
	//array('label'=>'Create Family', 'url'=>array('create')),
	//array('label'=>'Update Family', 'url'=>array('update', 'id'=>$model->family_id)),
	//array('label'=>'Delete Family', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->family_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Family', 'url'=>array('admin')),
	array('label'=>'返回家庭成员管理页', 'url'=>array('admin')),
);
?>

<h1>查看家庭成员<?php echo $model->name; ?>的信息。</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'family_id',
		'person_id',
		'name',
		'age',
		'political',
		'work_unit',
		'job',
		'domicile',
		'get_cityzenship',
		'get_long_stay',
		'get_permenent_stay',
	),
)); ?>
