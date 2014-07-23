<?php
/* @var $this PersonController */
/* @var $model Person */

$this->breadcrumbs=array(
	//'People'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'更新个人信息', 'url'=>array('update')),
	array('label'=>'家庭成员管理', 'url'=>array('family/admin')),
	//array('label'=>'List Person', 'url'=>array('index')),
	//array('label'=>'Create Person', 'url'=>array('create')),
	//array('label'=>'Update Person', 'url'=>array('update', 'id'=>$model->person_id)),
	//array('label'=>'Delete Person', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->person_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Person', 'url'=>array('admin')),
);
?>

<!--<h1>View Person #<?php echo $model->person_id; ?></h1>-->
<h1>用户个人信息</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'person_id',
		'person_code',
		'name',
		'china_xing',
		'china_ming',
		'spell_xing',
		'spell_ming',
		'gender',
		'health',
		'birth_place',
		'hukou_place',
		'nation',
		'birth_day',
		'cert_name',
		'cert_number',
		'spouse_name',
		'political_status',
		'workunit',
		'department',
		'job',
		'job_attribute',
		'admin_level',
		'is_secret',
		'secret_level',
		'foreign_identity',
	),
)); ?>
