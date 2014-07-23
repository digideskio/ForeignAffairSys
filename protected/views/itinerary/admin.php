<?php
/* @var $this ItineraryController */
/* @var $model Itinerary */


$this->breadcrumbs=array(

	//'Itineraries'=>array('index'),
	'出国访问管理'=>array('visit/admin'),
	'本次出访详情'=>array('visit/view','id'=>$this->getVisit()->visit_id),
	'访问路线安排',
);

$this->menu=array(
	//array('label'=>'List Itinerary', 'url'=>array('index')),
	array('label'=>'添加访问路线', 'url'=>array('create','vid'=>$model->visit_id)),//
	//array('label'=>'添加访问国家/地区', 'url'=>array('create')),//
	array('label'=>'返回', 'url'=>array('visit/view','id'=>$model->visit_id)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#itinerary-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>访问路线管理</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php// $this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div>--><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'itinerary-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'itinerary_id',
		'invit_unit',
		//'visit_place',
		array(
			'name'=>'expenditure.country_name',
			'header'=>'出访国家',
		),
		array(
			'name'=>'expenditure.city_name',
			'header'=>'出访地区',
		),
		'travel_fee',
		//'other_fee',
		array(
			'header'=>'其它费用',
			'value'=>array($this,'show_other_fee'),
		),
		// array(
		// 	'name'=>'expenditure.currency',
		// 	'header'=>'资费币种',
		// ),
		// 'exchange_rate',
		array(
			'name'=>'expenditure.accommodation_expenses',
			'header'=>'住宿费(每人每天)',
			'value'=>array($this,'show_accommodation_expenses'),
		),
		array(
			'name'=>'expenditure.diet_expenses',
			'header'=>'伙食费(每人每天)',
			'value'=>array($this,'show_diet_expenses'),
		),
		array(
			'name'=>'expenditure.miscellaneous_expenses',
			'header'=>'公杂费(每人每天)',
			'value'=>array($this,'show_miscellaneous_expenses'),
		),
		'stay_days',
		//'visit_id',
		array(
			'class'=>'CButtonColumn',
			'header' => '操作',  
            'template'=>'{update}  {delete}', 
		),
	),
)); ?>
