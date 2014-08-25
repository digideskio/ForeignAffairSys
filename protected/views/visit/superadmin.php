<?php
/* @var $this VisitController */
/* @var $model Visit */

$this->breadcrumbs=array(
	//'Visits'=>array('index'),
	'所有出访',
);

$this->menu=array(
	//array('label'=>'List Visit', 'url'=>array('index')),
	//array('label'=>'新建出访', 'url'=>array('create')),
	array('label'=>'导出出访详情表格', 'url'=>array('exportexcel')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#visit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>查看所有出访</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'visit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'visit_id',
		'approve_unit',
		'assign_unit',
		'group_unit',
		'claim_unit',
		//'leader_id',
		array(
			'name'=>'lName',
			'header'=>'领队',
			),
		/*array(
           'name'=>'visit_id',
           'type'=>'raw',
           'header'=>'领队',
           //'value'=>array($this, 'showUseriew')
           'value'=>array($this,'getLeaderName'),
         ),*/
		
		'start_date',
		'end_date',
		//'visit_task',
		array(
			//'name'=>'visit_task',
			'header'=>'出访任务',
			'value'=>array($this,'show_visit_task'),
		),
		'fees',
		//'create_person_id',
		
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'template'=>'{view}',
		),
	),
)); ?>
