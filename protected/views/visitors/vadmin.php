<?php
/* @var $this VisitorsController */
/* @var $model Visitors/// */

$this->breadcrumbs=array(
	//'Visitors'=>array('index'),
	'出国访问管理'=>array('visit/admin'),
	'本次出访详情'=>array('visit/view','id'=>$this->getVisit()->visit_id),
	'出访人员管理',
);

$this->menu=array(
	//array('label'=>'List Visitors', 'url'=>array('index')),
	//array('label'=>'加入新出访', 'url'=>array('create')),
	array('label'=>'返回', 'url'=>array('visit/view','id'=>$model->visit_id)),
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

<h1>出访人员管理</h1>
<p>注意：因为个人隐私保护，出访教职工需要用自己的教职工账户登陆到本系统，选择其准备加入的访问路线。出访线路的管理人员才能选择该名人员加入出访团队。</p>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'visitors-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'visitors_id',
		//'visit_id',
		//'person_id',
		array(
           'name'=>'person_id',
           'type'=>'raw',
           'header'=>'出访人员',
           //'value'=>array($this, 'showUseriew')
           'value'=>array($this,'getVisitPersonName'),
         ),
		'aspire_duty',
		array(
           'name'=>'person_id',
           'type'=>'raw',
           'header'=>'工作单位',
           //'value'=>array($this, 'showUseriew')
           'value'=>array($this,'getPersonWorkUnit'),
         ),
		array(
           'name'=>'person_id',
           'type'=>'raw',
           'header'=>'学院（部门）',
           //'value'=>array($this, 'showUseriew')
           'value'=>array($this,'getPersonDepartment'),
         ),
		array(
			'class'=>'CButtonColumn',
			'header' => '操作',  
            'template'=>' {update} {delete}', 
            'buttons'=>array
		    (
		        'update' => array
		        (
		            'label'=>'修改该成员的拟任职务',
		            'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
		            'url'=>'Yii::app()->createUrl("visitors/update", array("id"=>$data->visitors_id))',
		        ),
		        'delete' => array
		        (
		            'label'=>'删除',
		        )

		    ), 
		),
	),
)); ?>
