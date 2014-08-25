<?php
/* @var $this ExpenditureController */
/* @var $model Expenditure */

$this->breadcrumbs=array(
	'出访国家地区经费管理',
);

$this->menu=array(
	array('label'=>'新建条目', 'url'=>array('create')),
	//array('label'=>'返回', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#expenditure-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>出访国家地区经费管理</h1>

<p>
在此页面可以对出访国家地区及经费进行增、删、改、查等操作。
</p>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'expenditure-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'country_name',
		'city_name',
		'currency',
		'accommodation_expenses',
		'diet_expenses',
		'miscellaneous_expenses',
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
		),
	),
)); ?>
