<?php
/* @var $this FamilyController */
/* @var $model Family */
$id=Yii::app()->user->name;//根据用户信息来显示
$user=Person::model()->findByAttributes(array('person_code'=>$id));


$this->breadcrumbs=array(
	//'Families'=>array('index'),
	$user->name=>array('person/view'),
	'家庭成员管理',
);

$this->menu=array(
	//array('label'=>'List Family', 'url'=>array('index')),
	array('label'=>'创建家庭成员', 'url'=>array('create')),
	array('label'=>'返回', 'url'=>array('person/view')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#family-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>家庭主要成员情况</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>

<!--<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div>--><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'family-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		/*'family_id',
		'person_id',*/
		'called',
		'name',
		'age',
		'political',
		'work_unit',
		
		'job',
		'domicile',
		'get_cityzenship',
		'get_long_stay',
		//'get_permenent_stay',
		
		array(
			'class'=>'CButtonColumn',
			'header' => '操作',  
            'template'=>'{update}  {delete}', 

			//'updateButtonUrl'=>Yii::app()->createUrl('family/update',array('id'=>$data->id)),
		),
	),
)); ?>
