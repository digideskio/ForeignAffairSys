<?php
/* @var $this VisitController */
/* @var $model Visit */
//echo $model->visitors[0]->person_id;
$this->breadcrumbs=array(
	'出国访问管理'=>array('admin'),
	'本次出访详情'
);

$this->menu=array(
	//array('label'=>'List Visit', 'url'=>array('index')),
	//array('label'=>'Create Visit', 'url'=>array('create')),
	//array('label'=>'Update Visit', 'url'=>array('update', 'id'=>$model->visit_id)),
	//array('label'=>'Delete Visit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->visit_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'访问路线管理', 'url'=>array('itinerary/admin', 'vid'=>$model->visit_id)),
	array('label'=>'出访人员管理', 'url'=>array('visitors/vadmin', 'vid'=>$model->visit_id)),
	array('label'=>'表单预览', 'url'=>array('visit/forms', 'id'=>$model->visit_id)),
	array('label'=>'返回', 'url'=>array('admin')),
);
?>

<h1>本次出访详情<?php //echo $model->visit_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'visit_id',
		'approve_unit',
		'assign_unit',
		'group_unit',
		'claim_unit',
		//'leader_id',
		array(
			'name'=>'leader_id',
			'value'=>CHtml::encode($model->getLeaderName())
			),


		'start_date',
		'end_date',
		'visit_task',
		'fees',
		//'create_person_id',
		array(
			'name'=>'create_person_id',
			'value'=>CHtml::encode($model->getCreatorName())
			),
	),
)); ?>
