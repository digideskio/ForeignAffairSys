<?php
/* @var $this VisitorsController */
/* @var $model Visitors */

$this->breadcrumbs=array(
	'个人出访记录'=>array('visitors/admin'),
	'要加入的出访',
);

$this->menu=array(
	//array('label'=>'List Visitors', 'url'=>array('index')),
	array('label'=>'返回', 'url'=>array('visit/vadmin')),
);
?>

<h1>加入该出访</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'visit_id',
		//'approve_unit',
		//'assign_unit',
		//'group_unit',
		//'claim_unit',
		//'leader_id',
		array(
			'label'=>'领队',
			'name'=>'visit_id',
			'value'=>CHtml::encode($this->getVisit()->getLeaderName())
			),


		//'start_date',
		//'end_date',
		//'visit_task',
		//'fees',
		//'create_person_id',
		array(
			'label'=>'创建者',
			'name'=>'visit_id',
			'value'=>CHtml::encode($this->getVisit()->getCreatorName())
			),
		array(
			'label'=>'出发时间',
			'name'=>'visit_id',
			'value'=>CHtml::encode($this->getVisit()->start_date)
			),
		array(
			'label'=>'结束时间',
			'name'=>'visit_id',
			'value'=>CHtml::encode($this->getVisit()->end_date)
			),
		array(
			'label'=>'访问任务',
			'name'=>'visit_id',
			'value'=>CHtml::encode($this->getVisit()->visit_task)
			),
	),
)); ?>
<?php echo $this->renderPartial('_vform', array('model'=>$model)); ?>
