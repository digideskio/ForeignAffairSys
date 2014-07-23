<?php
/* @var $this VisitorsController */
/* @var $model Visitors */

$this->breadcrumbs=array(
	//'Visitors'=>array('index'),
	'加入出访',
);

$this->menu=array(
	//array('label'=>'List Visitors', 'url'=>array('index')),
	array('label'=>'加入新出访', 'url'=>array('visit/vadmin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#visitors-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>个人出访历史记录</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div>--><!-- search-form -->

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'visitors-grid',
	'dataProvider'=>$model->search(),//>with('visit')
	//'with'=>'visit',
	//'filter'=>$model,

	'columns'=>array(
		//'visitors_id',

		'visit_id',
		/*array(
			'name'=>'person_id',
			//'value'=>$model->getVisitLeaderName($model->visit_id);
			//'value'=>CHtml::encode($model->getVisitLeaderName());
			'value'=>CHtml::encode($model->person_id);
			),*/
	 array(
           'name'=>'visit_id',
           'type'=>'raw',
           'header'=>'领队',
           //'value'=>array($this, 'showUseriew')
           'value'=>array($this,'getVisitLeaderName'),
           //'htmlOptions'=>array( 'width'=>'120', 'style'=>'text-align:center', ),
         ),
	 array(
           'name'=>'visit_id',
           'type'=>'raw',
           'header'=>'出访任务',
           //'value'=>array($this, 'showUseriew')
           'value'=>array($this,'getVisitTask'),
         ),
	   // 'visitTask',
	  /* 'visit_task'=>array(
	   	'name'=>'visit.visit_task',

	   	//'filter'=true,
	   	),*/
	array(
           'name'=>'visit_id',
           'type'=>'raw',
           'header'=>'创建人',
           //'value'=>array($this, 'showUseriew')
           'value'=>array($this,'getVisitCreatorName'),
         ),
		//'person_id',
		array(
			'class'=>'CButtonColumn',
			'header' => '操作',  
            'template'=>'  {delete}', 
            'buttons'=>array
		    (
		        /*'vupdate' => array
		        (
		            'label'=>'更新',
		            'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
		            'url'=>'Yii::app()->createUrl("visitors/vupdate", array("id"=>$data->visitors_id))',
		        ),*/
		        'delete' => array
		        (
		            'label'=>'删除',
		        )

		    ), 
		),
	),
)); ?>
