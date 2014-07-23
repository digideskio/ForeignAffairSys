<?php
/* @var $this PersonController */
/* @var $model Person */

$this->breadcrumbs=array(
	'People'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Person', 'url'=>array('index')),
	array('label'=>'Create Person', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#person-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage People</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'person-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'person_id',
		'person_code',
		'name',
		'china_xing',
		'china_ming',
		'spell_xing',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
